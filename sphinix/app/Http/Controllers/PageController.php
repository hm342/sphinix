<?php

namespace App\Http\Controllers;

use App\Data\AgencyData;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'services' => AgencyData::services(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function services(): View
    {
        return view('pages.services.index', [
            'services' => AgencyData::services(),
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

    public function products(): View
    {
        return view('pages.products');
    }

    public function insights(): View
    {
        return view('pages.insights', [
            'articles' => AgencyData::insightsArticles(),
        ]);
    }
}
