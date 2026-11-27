<?php

namespace App\Http\Controllers;

use App\Models\ClientLogo;
use App\Models\Faq;
use App\Models\Insight;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $services = Service::active()->get();

        $marqueeRow1 = ClientLogo::active()
            ->where('show_in_marquee', true)
            ->where('carousel_row', 1)
            ->get();

        $marqueeRow2 = ClientLogo::active()
            ->where('show_in_marquee', true)
            ->where('carousel_row', 2)
            ->get();

        $featuredInsight = Insight::published()->where('is_featured', true)->first()
            ?? Insight::published()->first();

        $homeInsights = Insight::published()
            ->where('show_on_home', true)
            ->when($featuredInsight, static fn ($q) => $q->where('id', '!=', $featuredInsight->id))
            ->take(4)
            ->get();

        if ($homeInsights->isEmpty()) {
            $homeInsights = Insight::published()
                ->when($featuredInsight, static fn ($q) => $q->where('id', '!=', $featuredInsight->id))
                ->take(3)
                ->get();
        }

        $testimonials = Testimonial::active()->get();
        $homeFaqs = Faq::activeFor('home')->get();
        $settings = SiteSetting::allMap();

        return view('pages.home', [
            'services' => $services,
            'marqueeRow1' => $marqueeRow1,
            'marqueeRow2' => $marqueeRow2,
            'featuredInsight' => $featuredInsight,
            'homeInsights' => $homeInsights,
            'testimonials' => $testimonials,
            'homeFaqs' => $homeFaqs,
            'settings' => $settings,
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'settings' => SiteSetting::allMap(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services.index', [
            'services' => Service::active()->get(),
        ]);
    }

    public function seo(): View
    {
        return view('pages.services.seo');
    }

    public function socialMedia(): View
    {
        return view('pages.services.social-media');
    }

    public function googleAds(): View
    {
        return view('pages.services.google-ads');
    }

    public function branding(): View
    {
        return view('pages.services.branding');
    }

    public function videoProduction(): View
    {
        return view('pages.services.video-production');
    }

    public function ecommerce(): View
    {
        return view('pages.services.ecommerce');
    }

    public function emailMarketing(): View
    {
        return view('pages.services.email-marketing');
    }

    public function webAppDev(): View
    {
        return view('pages.services.web-app-development');
    }

    public function products(): View
    {
        return view('pages.products');
    }

    public function insights(): View
    {
        return view('pages.insights', [
            'articles' => Insight::published()->get(),
        ]);
    }

    public function insightShow(string $slug): View
    {
        $insight = Insight::published()->where('slug', $slug)->firstOrFail();
        $related = Insight::published()
            ->where('id', '!=', $insight->id)
            ->take(3)
            ->get();

        return view('pages.insights.show', [
            'insight' => $insight,
            'relatedInsights' => $related,
        ]);
    }
}
