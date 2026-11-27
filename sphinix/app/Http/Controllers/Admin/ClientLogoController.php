<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\ClientLogo;
use App\Support\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientLogoController extends Controller
{
    public function index(): View
    {
        return view('admin.logos.index', [
            'logos' => ClientLogo::query()->orderBy('carousel_row')->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.logos.form', [
            'logo' => new ClientLogo([
                'subtitle' => 'Client Partner',
                'carousel_row' => 1,
                'show_in_marquee' => true,
                'show_in_directory' => true,
                'is_active' => true,
                'sort_order' => (ClientLogo::query()->max('sort_order') ?? 0) + 1,
            ]),
            'caseStudies' => CaseStudy::query()->orderBy('name')->get(['slug', 'name']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            $data['logo_path'] = Media::storeUploaded($request->file('logo'), 'logos');
        }

        ClientLogo::query()->create($data);

        return redirect()->route('admin.logos.index')
            ->with('status', 'Client logo created and synced to the website.');
    }

    public function edit(ClientLogo $logo): View
    {
        return view('admin.logos.form', [
            'logo' => $logo,
            'caseStudies' => CaseStudy::query()->orderBy('name')->get(['slug', 'name']),
        ]);
    }

    public function update(Request $request, ClientLogo $logo): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->boolean('remove_logo')) {
            Media::deleteIfStored($logo->logo_path);
            $data['logo_path'] = null;
        }

        if ($request->hasFile('logo')) {
            Media::deleteIfStored($logo->logo_path);
            $data['logo_path'] = Media::storeUploaded($request->file('logo'), 'logos');
        }

        $logo->update($data);

        return redirect()->route('admin.logos.index')
            ->with('status', "Updated \"{$logo->name}\". Changes are live on the website.");
    }

    public function destroy(ClientLogo $logo): RedirectResponse
    {
        Media::deleteIfStored($logo->logo_path);
        $name = $logo->name;
        $logo->delete();

        return redirect()->route('admin.logos.index')
            ->with('status', "Removed \"{$name}\" from client logos.");
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'subtitle' => ['nullable', 'string', 'max:120'],
            'industry' => ['nullable', 'string', 'max:120'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'case_study_slug' => ['nullable', 'string', 'max:120'],
            'carousel_row' => ['required', 'integer', 'in:1,2'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp,svg', 'max:2048'],
        ]);

        unset($validated['logo']);

        $validated['show_in_marquee'] = $request->boolean('show_in_marquee');
        $validated['show_in_directory'] = $request->boolean('show_in_directory');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['case_study_slug'] = ($validated['case_study_slug'] ?? null) ?: null;

        return $validated;
    }
}
