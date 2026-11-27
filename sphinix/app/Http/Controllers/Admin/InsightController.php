<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insight;
use App\Support\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class InsightController extends Controller
{
    public function index(): View
    {
        return view('admin.insights.index', [
            'insights' => Insight::query()
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.insights.form', [
            'insight' => new Insight([
                'category' => 'strategy',
                'author_name' => 'Sphinix Marketing Team',
                'read_time' => '4 min read',
                'published_at' => now()->toDateString(),
                'show_on_home' => true,
                'is_published' => true,
                'sort_order' => (Insight::query()->max('sort_order') ?? 0) + 1,
            ]),
            'categories' => Insight::CATEGORIES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = Media::storeUploaded($request->file('cover_image'), 'insights');
        }

        if ($data['is_featured']) {
            Insight::query()->update(['is_featured' => false]);
        }

        $insight = Insight::query()->create($data);

        return redirect()->route('admin.insights.index')
            ->with('status', "Published note \"{$insight->title}\".");
    }

    public function edit(Insight $insight): View
    {
        return view('admin.insights.form', [
            'insight' => $insight,
            'categories' => Insight::CATEGORIES,
        ]);
    }

    public function update(Request $request, Insight $insight): RedirectResponse
    {
        $data = $this->validated($request, $insight->id);

        if ($request->boolean('remove_cover_image')) {
            Media::deleteIfStored($insight->cover_image);
            $data['cover_image'] = null;
        }

        if ($request->hasFile('cover_image')) {
            Media::deleteIfStored($insight->cover_image);
            $data['cover_image'] = Media::storeUploaded($request->file('cover_image'), 'insights');
        }

        if ($data['is_featured']) {
            Insight::query()->where('id', '!=', $insight->id)->update(['is_featured' => false]);
        }

        $insight->update($data);

        return redirect()->route('admin.insights.index')
            ->with('status', "Updated \"{$insight->title}\".");
    }

    public function destroy(Insight $insight): RedirectResponse
    {
        Media::deleteIfStored($insight->cover_image);
        $title = $insight->title;
        $insight->delete();

        return redirect()->route('admin.insights.index')
            ->with('status', "Deleted \"{$title}\".");
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $slugInput = $request->input('slug') ?: Str::slug((string) $request->input('title'));
        $request->merge(['slug' => Str::slug($slugInput)]);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:160', 'regex:/^[a-z0-9-]+$/', Rule::unique('insights', 'slug')->ignore($ignoreId)],
            'category' => ['required', 'string', Rule::in(array_keys(Insight::CATEGORIES))],
            'excerpt' => ['required', 'string', 'max:600'],
            'body' => ['nullable', 'string', 'max:30000'],
            'cover_alt' => ['nullable', 'string', 'max:255'],
            'author_name' => ['required', 'string', 'max:120'],
            'read_time' => ['required', 'string', 'max:60'],
            'published_at' => ['required', 'date'],
            'cta_label' => ['nullable', 'string', 'max:100'],
            'external_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'cover_image' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);

        $validated['category_label'] = Insight::CATEGORIES[$validated['category']];
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['show_on_home'] = $request->boolean('show_on_home');
        $validated['is_published'] = $request->boolean('is_published');

        unset($validated['cover_image']);

        return $validated;
    }
}
