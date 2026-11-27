<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'settings' => SiteSetting::allMap(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'years_label' => ['required', 'string', 'max:20'],
            'clients_count_label' => ['required', 'string', 'max:20'],
            'projects_count_label' => ['required', 'string', 'max:20'],
            'industries_count_label' => ['required', 'string', 'max:20'],
            'primary_email' => ['required', 'email', 'max:160'],
            'primary_phone' => ['required', 'string', 'max:40'],
            'studio_phone' => ['required', 'string', 'max:40'],
            'whatsapp_number' => ['required', 'string', 'max:30'],
            'head_office_address' => ['required', 'string', 'max:300'],
            'studio_address' => ['required', 'string', 'max:300'],
            'studio_hours' => ['required', 'string', 'max:160'],
            'agency_reel_url' => ['nullable', 'string', 'max:500'],
        ]);

        SiteSetting::setMany($validated, 'agency');

        return back()->with('status', 'Agency settings updated.');
    }
}
