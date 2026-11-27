<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\Faq;
use App\Models\NewsletterSubscriber;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        $serviceTitles = Service::active()->pluck('title')->all();
        $servicesList = array_values(array_unique(array_merge($serviceTitles, [
            'ChatBox 360 Suite (WhatsApp API)',
            'Social 360 Suite Demo',
        ])));

        return view('pages.contact', [
            'servicesList' => $servicesList,
            'faqs' => Faq::activeFor('contact')->get(),
            'settings' => SiteSetting::allMap(),
        ]);
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

        ContactInquiry::query()->create([
            'name' => trim($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'phone' => trim($validated['phone']),
            'service' => trim($validated['service']),
            'message' => isset($validated['message']) ? trim($validated['message']) : null,
            'status' => 'new',
            'source_page' => $request->headers->get('referer'),
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 500),
        ]);

        Log::info('Sphinix contact inquiry submitted', ['email' => $validated['email'], 'service' => $validated['service']]);

        $phone = SiteSetting::getValue('primary_phone', '+91 7048239155');
        $confirmation = 'Thanks, '.$validated['name'].'. Your inquiry for '.$validated['service'].' has been received. You can also reach us directly at '.$phone.'.';

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

        $email = strtolower(trim($validated['email']));

        NewsletterSubscriber::query()->updateOrCreate(
            ['email' => $email],
            [
                'status' => 'active',
                'source_page' => $request->headers->get('referer'),
                'ip_address' => $request->ip(),
                'subscribed_at' => now(),
            ]
        );

        Log::info('Sphinix newsletter signup', ['email' => $email]);

        $contactEmail = SiteSetting::getValue('primary_email', 'info@sphinixmarketing.com');
        $confirmation = 'Subscribed '.$email.'. Direct inquiries: '.$contactEmail.'.';

        if ($request->expectsJson()) {
            return response()->json([
                'message' => $confirmation,
            ]);
        }

        return back()->with('newsletter_success', $confirmation);
    }
}
