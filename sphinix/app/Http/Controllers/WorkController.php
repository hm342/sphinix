<?php

namespace App\Http\Controllers;

use App\Data\AgencyData;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        return view('pages.work.index', [
            'caseStudies' => array_values(AgencyData::caseStudies()),
            'clients' => AgencyData::clientDirectory(),
        ]);
    }

    public function show(string $slug): View
    {
        $caseStudies = AgencyData::caseStudies();
        abort_unless(isset($caseStudies[$slug]), 404);

        return view('pages.work.show', [
            'project' => $caseStudies[$slug],
            'otherProjects' => AgencyData::otherCaseStudies($slug),
        ]);
    }
}
