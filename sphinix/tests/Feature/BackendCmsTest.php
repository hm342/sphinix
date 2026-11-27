<?php

namespace Tests\Feature;

use App\Models\ClientLogo;
use App\Models\ContactInquiry;
use App\Models\Insight;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BackendCmsTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
        $this->admin = User::query()->where('is_admin', true)->firstOrFail();
    }

    public function test_admin_routes_require_authenticated_admin_user(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/logos')->assertRedirect('/admin/login');

        $nonAdmin = User::factory()->create(['is_admin' => false]);
        $this->actingAs($nonAdmin)->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_admin_can_sign_in_and_view_dashboard(): void
    {
        $this->post('/admin/login', [
            'email' => $this->admin->email,
            'password' => 'Sphinix@2026',
        ])->assertRedirect('/admin');

        $adminPages = [
            '/admin',
            '/admin/logos',
            '/admin/logos/create',
            '/admin/work',
            '/admin/work/create',
            '/admin/insights',
            '/admin/insights/create',
            '/admin/inquiries',
            '/admin/subscribers',
            '/admin/services',
            '/admin/services/create',
            '/admin/testimonials',
            '/admin/testimonials/create',
            '/admin/faqs',
            '/admin/faqs/create',
            '/admin/settings',
        ];

        foreach ($adminPages as $uri) {
            $this->actingAs($this->admin)->get($uri)->assertStatus(200);
        }
    }

    public function test_attached_client_logo_from_backend_automatically_renders_in_home_carousel(): void
    {
        Storage::fake('public');

        $logoFile = UploadedFile::fake()->create('acme-brand.png', 20, 'image/png');

        $this->actingAs($this->admin)
            ->post('/admin/logos', [
                'name' => 'Acme Robotics',
                'subtitle' => 'Automation Partner',
                'carousel_row' => 1,
                'sort_order' => 1,
                'show_in_marquee' => '1',
                'show_in_directory' => '1',
                'is_active' => '1',
                'logo' => $logoFile,
            ])
            ->assertRedirect('/admin/logos');

        $created = ClientLogo::query()->where('name', 'Acme Robotics')->firstOrFail();
        $this->assertNotNull($created->logo_path);
        Storage::disk('public')->assertExists($created->logo_path);

        $home = $this->get('/');
        $home->assertStatus(200);
        $home->assertSee('Acme Robotics');
        $home->assertSee('storage/'.$created->logo_path);
    }

    public function test_published_insight_renders_on_home_index_and_detail_page(): void
    {
        $this->actingAs($this->admin)
            ->post('/admin/insights', [
                'title' => 'Scaling Local Search Visibility in Gujarat',
                'category' => 'seo',
                'excerpt' => 'Structured Google Business Profile cleanup steps.',
                'body' => "First paragraph of guidance.\n\nSecond paragraph of checklist items.",
                'author_name' => 'Sphinix SEO Team',
                'read_time' => '6 min read',
                'published_at' => '2026-11-27',
                'show_on_home' => '1',
                'is_published' => '1',
                'sort_order' => 0,
            ])
            ->assertRedirect('/admin/insights');

        $insight = Insight::query()->where('title', 'Scaling Local Search Visibility in Gujarat')->firstOrFail();

        $this->get('/')->assertStatus(200)->assertSee($insight->title);
        $this->get('/insights')->assertStatus(200)->assertSee($insight->title);
        $this->get('/insights/'.$insight->slug)
            ->assertStatus(200)
            ->assertSee($insight->title)
            ->assertSee('First paragraph of guidance.');
    }

    public function test_admin_can_manage_inquiries_subscribers_and_settings(): void
    {
        $inquiry = ContactInquiry::query()->create([
            'name' => 'Rohan Mehta',
            'email' => 'rohan@example.com',
            'phone' => '+91 9876543210',
            'service' => 'Google Ads Performance',
            'message' => 'Need search ads audit.',
            'status' => 'new',
        ]);

        $this->actingAs($this->admin)
            ->get('/admin/inquiries/'.$inquiry->id)
            ->assertStatus(200)
            ->assertSee('Rohan Mehta');

        $this->actingAs($this->admin)
            ->patch('/admin/inquiries/'.$inquiry->id, [
                'status' => 'in_progress',
                'admin_notes' => 'Scheduled discovery call.',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('contact_inquiries', [
            'id' => $inquiry->id,
            'status' => 'in_progress',
        ]);

        NewsletterSubscriber::query()->create([
            'email' => 'lead@example.com',
            'status' => 'active',
            'subscribed_at' => now(),
        ]);

        $csv = $this->actingAs($this->admin)->get('/admin/subscribers/export');
        $csv->assertStatus(200);
        $this->assertStringContainsString('lead@example.com', $csv->streamedContent());

        $this->actingAs($this->admin)
            ->put('/admin/settings', [
                'years_label' => '10+',
                'clients_count_label' => '175+',
                'projects_count_label' => '750+',
                'industries_count_label' => '15+',
                'primary_email' => 'info@sphinixmarketing.com',
                'primary_phone' => '+91 7048239155',
                'studio_phone' => '+91 9081711900',
                'whatsapp_number' => '917048239155',
                'head_office_address' => 'Parimal Chowk, Bhavnagar',
                'studio_address' => 'Mokhdaji Circle, Bhavnagar',
                'studio_hours' => 'Mon - Sat · 10 AM - 7 PM',
                'agency_reel_url' => '',
            ])
            ->assertRedirect();

        $this->get('/')->assertSee('175+');
    }
}
