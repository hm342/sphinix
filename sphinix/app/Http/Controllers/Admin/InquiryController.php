<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $status = (string) $request->query('status', 'all');
        $search = trim((string) $request->query('q', ''));

        $inquiries = ContactInquiry::query()
            ->when($status !== 'all' && array_key_exists($status, ContactInquiry::STATUSES), static fn ($q) => $q->where('status', $status))
            ->when($search !== '', static function ($q) use ($search): void {
                $q->where(static function ($inner) use ($search): void {
                    $inner->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('service', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.inquiries.index', [
            'inquiries' => $inquiries,
            'activeStatus' => $status,
            'search' => $search,
            'statuses' => ContactInquiry::STATUSES,
        ]);
    }

    public function show(ContactInquiry $inquiry): View
    {
        if (! $inquiry->read_at) {
            $inquiry->update(['read_at' => now()]);
        }

        return view('admin.inquiries.show', [
            'inquiry' => $inquiry,
            'statuses' => ContactInquiry::STATUSES,
        ]);
    }

    public function update(Request $request, ContactInquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(array_keys(ContactInquiry::STATUSES))],
            'admin_notes' => ['nullable', 'string', 'max:3000'],
        ]);

        $inquiry->update($validated);

        return back()->with('status', 'Inquiry status and notes updated.');
    }

    public function destroy(ContactInquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
            ->with('status', 'Inquiry deleted.');
    }
}
