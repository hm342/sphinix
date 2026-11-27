<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\ClientLogo;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        return view('pages.work.index', [
            'caseStudies' => CaseStudy::published()->get(),
            'clients' => ClientLogo::active()->where('show_in_directory', true)->get(),
        ]);
    }

    public function show(string $slug): View
    {
        $project = CaseStudy::published()
            ->with('slides')
            ->where('slug', $slug)
            ->firstOrFail();

        if (! $project->client_logo_path) {
            $linkedLogo = ClientLogo::active()
                ->where('case_study_slug', $project->slug)
                ->whereNotNull('logo_path')
                ->first();

            if ($linkedLogo) {
                $project->setAttribute('resolved_client_logo_url', $linkedLogo->logo_url);
            }
        }

        $otherProjects = CaseStudy::published()
            ->where('slug', '!=', $slug)
            ->take(4)
            ->get();

        return view('pages.work.show', [
            'project' => $project,
            'otherProjects' => $otherProjects,
        ]);
    }
}
