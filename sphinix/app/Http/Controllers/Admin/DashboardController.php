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
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'client_logos' => ClientLogo::query()->where('is_active', true)->count(),
                'client_logos_with_file' => ClientLogo::query()->whereNotNull('logo_path')->count(),
                'case_studies' => CaseStudy::query()->where('is_published', true)->count(),
                'insights' => Insight::query()->where('is_published', true)->count(),
                'inquiries_new' => ContactInquiry::query()->where('status', 'new')->count(),
                'inquiries_total' => ContactInquiry::query()->count(),
                'subscribers' => NewsletterSubscriber::query()->where('status', 'active')->count(),
                'services' => Service::query()->where('is_active', true)->count(),
                'testimonials' => Testimonial::query()->where('is_active', true)->count(),
                'faqs' => Faq::query()->where('is_active', true)->count(),
            ],
            'recentInquiries' => ContactInquiry::query()->latest()->take(6)->get(),
            'recentInsights' => Insight::query()->latest('published_at')->latest('id')->take(4)->get(),
        ]);
    }
}
