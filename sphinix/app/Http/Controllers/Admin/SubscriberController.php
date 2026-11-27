<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\View\View;

class SubscriberController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));
        $status = (string) $request->query('status', 'all');

        $subscribers = NewsletterSubscriber::query()
            ->when($status !== 'all' && array_key_exists($status, NewsletterSubscriber::STATUSES), static fn ($q) => $q->where('status', $status))
            ->when($search !== '', static fn ($q) => $q->where('email', 'like', "%{$search}%"))
            ->latest()
            ->paginate(25)
            ->withQueryString();

        return view('admin.subscribers.index', [
            'subscribers' => $subscribers,
            'search' => $search,
            'activeStatus' => $status,
            'statuses' => NewsletterSubscriber::STATUSES,
        ]);
    }

    public function toggle(NewsletterSubscriber $subscriber): RedirectResponse
    {
        $next = $subscriber->status === 'active' ? 'unsubscribed' : 'active';
        $subscriber->update(['status' => $next]);

        return back()->with('status', "{$subscriber->email} marked {$next}.");
    }

    public function export(): StreamedResponse
    {
        $rows = NewsletterSubscriber::query()->orderBy('id')->get();

        return response()->streamDownload(static function () use ($rows): void {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['ID', 'Email', 'Status', 'Source Page', 'Subscribed At']);
            foreach ($rows as $row) {
                fputcsv($out, [
                    $row->id,
                    $row->email,
                    $row->status,
                    $row->source_page ?? '',
                    $row->subscribed_at?->toIso8601String() ?? $row->created_at?->toIso8601String() ?? '',
                ]);
            }
            fclose($out);
        }, 'sphinix-newsletter-subscribers.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function destroy(NewsletterSubscriber $subscriber): RedirectResponse
    {
        $subscriber->delete();

        return back()->with('status', 'Subscriber removed.');
    }
}
