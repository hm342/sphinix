<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\ClientLogo;
use App\Models\ContactInquiry;
use App\Models\Faq;
use App\Models\Insight;
use App\Models\NewsletterSubscriber;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $now = Carbon::now();
        $thirtyDaysAgo = $now->copy()->subDays(30);

        $inquiriesTotal = ContactInquiry::query()->count();
        $inquiriesNew = ContactInquiry::query()->where('status', 'new')->count();
        $inquiriesRecentCount = ContactInquiry::query()->where('created_at', '>=', $thirtyDaysAgo)->count();

        // Build 7-day inquiry series for the primary dashboard chart
        $dailyCounts = ContactInquiry::query()
            ->where('created_at', '>=', $now->copy()->subDays(6)->startOfDay())
            ->get(['created_at'])
            ->groupBy(static fn ($row): string => $row->created_at->format('Y-m-d'))
            ->map(static fn ($group): int => $group->count());

        $inquirySeries = [];
        for ($i = 6; $i >= 0; $i--) {
            $day = $now->copy()->subDays($i);
            $key = $day->format('Y-m-d');
            $inquirySeries[] = [
                'label' => $day->format('D'),
                'date' => $day->format('M j'),
                'count' => $dailyCounts[$key] ?? 0,
                'is_today' => $i === 0,
            ];
        }

        $inventory = [
            ['label' => 'Company logos', 'count' => ClientLogo::query()->where('is_active', true)->count(), 'route' => 'admin.logos.index'],
            ['label' => 'Case studies', 'count' => CaseStudy::query()->where('is_published', true)->count(), 'route' => 'admin.work.index'],
            ['label' => 'Insights & notes', 'count' => Insight::query()->where('is_published', true)->count(), 'route' => 'admin.insights.index'],
            ['label' => 'Services', 'count' => Service::query()->where('is_active', true)->count(), 'route' => 'admin.services.index'],
            ['label' => 'Testimonials', 'count' => Testimonial::query()->where('is_active', true)->count(), 'route' => 'admin.testimonials.index'],
            ['label' => 'FAQs', 'count' => Faq::query()->where('is_active', true)->count(), 'route' => 'admin.faqs.index'],
        ];

        $maxInventory = max(1, collect($inventory)->max('count'));

        return view('admin.dashboard', [
            'stats' => [
                'client_logos' => ClientLogo::query()->where('is_active', true)->count(),
                'client_logos_with_file' => ClientLogo::query()->whereNotNull('logo_path')->count(),
                'case_studies' => CaseStudy::query()->where('is_published', true)->count(),
                'insights' => Insight::query()->where('is_published', true)->count(),
                'insights_home' => Insight::query()->where('is_published', true)->where('show_on_home', true)->count(),
                'inquiries_new' => $inquiriesNew,
                'inquiries_total' => $inquiriesTotal,
                'inquiries_30d' => $inquiriesRecentCount,
                'subscribers' => NewsletterSubscriber::query()->where('status', 'active')->count(),
                'period_label' => $now->format('F Y'),
            ],
            'inquirySeries' => $inquirySeries,
            'inventory' => $inventory,
            'maxInventory' => $maxInventory,
            'recentInquiries' => ContactInquiry::query()->latest()->take(6)->get(),
            'recentInsights' => Insight::query()->latest('published_at')->latest('id')->take(5)->get(),
        ]);
    }
}
