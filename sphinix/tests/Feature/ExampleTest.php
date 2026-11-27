<?php

namespace Tests\Feature;

use App\Data\AgencyData;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_public_pages_render_cleanly(): void
    {
        $pages = [
            '/' => 'Turning attention into',
            '/about' => 'Digital marketing &amp; web builds',
            '/services' => 'Eight services, all in-house.',
            '/services/seo' => 'SEO built for',
            '/services/social-media-marketing' => 'Social media built around',
            '/products' => 'Software built for',
            '/work' => 'Selected',
            '/insights' => 'Latest Insights',
            '/contact' => 'Request a Consultation',
        ];

        foreach ($pages as $uri => $expectedText) {
            $response = $this->get($uri);
            $response->assertStatus(200);
            $response->assertSee($expectedText, false);
        }
    }

    public function test_all_six_work_case_studies_render_and_assets_exist(): void
    {
        foreach (AgencyData::caseStudies() as $slug => $project) {
            $response = $this->get('/work/'.$slug);
            $response->assertStatus(200);
            $response->assertSee($project['name'], false);
            $response->assertSee('Posters &amp; Project Visuals', false);

            $this->assertFileExists(public_path($project['cover']));
            foreach ($project['slides'] as $slide) {
                $this->assertFileExists(public_path($slide));
            }
        }
    }

    public function test_legacy_blog_route_redirects_to_insights(): void
    {
        $this->get('/blog')->assertRedirect('/insights');
    }

    public function test_unknown_routes_and_invalid_work_slugs_render_404(): void
    {
        $this->get('/work/does-not-exist')->assertStatus(404)->assertSee('Page Not Found');
        $this->get('/nonexistent-route')->assertStatus(404)->assertSee('Page Not Found');
    }

    public function test_contact_and_newsletter_endpoints_validate_and_respond(): void
    {
        $this->postJson('/contact', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'phone', 'service']);

        $this->postJson('/contact', [
            'name' => 'Test User',
            'email' => 'team@example.com',
            'phone' => '+91 7048239155',
            'service' => 'Google Ads Performance',
            'message' => 'Testing inquiry routing.',
        ])->assertStatus(200)->assertJsonStructure(['message']);

        $this->postJson('/newsletter', ['email' => 'invalid'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);

        $this->postJson('/newsletter', ['email' => 'team@example.com'])
            ->assertStatus(200)
            ->assertJsonStructure(['message']);
    }
}
