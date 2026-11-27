<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        return view('admin.testimonials.index', [
            'testimonials' => Testimonial::query()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.testimonials.form', [
            'testimonial' => new Testimonial([
                'rating' => 5,
                'is_active' => true,
                'sort_order' => (Testimonial::query()->max('sort_order') ?? 0) + 1,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        Testimonial::query()->create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('status', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', [
            'testimonial' => $testimonial,
        ]);
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($this->validated($request));

        return redirect()->route('admin.testimonials.index')
            ->with('status', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('status', 'Testimonial deleted.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'tab_label' => ['required', 'string', 'max:80'],
            'quote' => ['required', 'string', 'max:1000'],
            'author_name' => ['required', 'string', 'max:120'],
            'author_role' => ['required', 'string', 'max:160'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}
