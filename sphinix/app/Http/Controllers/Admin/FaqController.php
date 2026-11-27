<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        return view('admin.faqs.index', [
            'faqs' => Faq::query()->orderBy('placement')->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.faqs.form', [
            'faq' => new Faq([
                'placement' => 'home',
                'is_active' => true,
                'sort_order' => (Faq::query()->max('sort_order') ?? 0) + 1,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Faq::query()->create($this->validated($request));

        return redirect()->route('admin.faqs.index')
            ->with('status', 'FAQ added.');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.form', [
            'faq' => $faq,
        ]);
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $faq->update($this->validated($request));

        return redirect()->route('admin.faqs.index')
            ->with('status', 'FAQ updated.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('status', 'FAQ deleted.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'placement' => ['required', Rule::in(['home', 'contact'])],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:2000'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        $validated['is_open_by_default'] = $request->boolean('is_open_by_default');
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}
