<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact');
    }

    public function submit(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['required', 'string', 'max:40'],
            'service' => ['required', 'string', 'max:120'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        Log::info('Sphinix contact inquiry submitted', $validated);

        $confirmation = 'Thanks, '.$validated['name'].'. Your inquiry for '.$validated['service'].' has been received. You can also reach us directly at +91 7048239155.';

        if ($request->expectsJson()) {
            return response()->json([
                'message' => $confirmation,
            ]);
        }

        return back()->with('contact_success', $confirmation);
    }

    public function subscribe(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:160'],
        ]);

        Log::info('Sphinix newsletter signup', $validated);

        $confirmation = 'Subscribed '.$validated['email'].'. Direct inquiries: info@sphinixmarketing.com.';

        if ($request->expectsJson()) {
            return response()->json([
                'message' => $confirmation,
            ]);
        }

        return back()->with('newsletter_success', $confirmation);
    }
}
