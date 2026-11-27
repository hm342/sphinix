<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\CaseStudySlide;
use App\Support\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CaseStudyController extends Controller
{
    public function index(): View
    {
        return view('admin.work.index', [
            'caseStudies' => CaseStudy::query()->withCount('slides')->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.work.form', [
            'project' => new CaseStudy([
                'categories' => 'iot',
                'is_published' => true,
                'sort_order' => (CaseStudy::query()->max('sort_order') ?? 0) + 1,
            ]),
            'categoryOptions' => CaseStudy::CATEGORY_LABELS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = Media::storeUploaded($request->file('cover_image'), 'work');
        }
        if ($request->hasFile('client_logo')) {
            $data['client_logo_path'] = Media::storeUploaded($request->file('client_logo'), 'work/logos');
        }
        if ($request->hasFile('video_poster')) {
            $data['video_poster_path'] = Media::storeUploaded($request->file('video_poster'), 'work/posters');
        }
        if ($request->hasFile('video_file')) {
            $data['video_url'] = $request->file('video_file')->store('work/videos', 'public');
        }

        $caseStudy = CaseStudy::query()->create($data);
        $this->storeSlides($request, $caseStudy);

        return redirect()->route('admin.work.edit', $caseStudy)
            ->with('status', "Case study \"{$caseStudy->name}\" created.");
    }

    public function edit(CaseStudy $work): View
    {
        $work->load('slides');

        return view('admin.work.form', [
            'project' => $work,
            'categoryOptions' => CaseStudy::CATEGORY_LABELS,
        ]);
    }

    public function update(Request $request, CaseStudy $work): RedirectResponse
    {
        $data = $this->validated($request, $work->id);

        if ($request->boolean('remove_client_logo')) {
            Media::deleteIfStored($work->client_logo_path);
            $data['client_logo_path'] = null;
        }
        if ($request->hasFile('cover_image')) {
            Media::deleteIfStored($work->cover_image);
            $data['cover_image'] = Media::storeUploaded($request->file('cover_image'), 'work');
        }
        if ($request->hasFile('client_logo')) {
            Media::deleteIfStored($work->client_logo_path);
            $data['client_logo_path'] = Media::storeUploaded($request->file('client_logo'), 'work/logos');
        }
        if ($request->boolean('remove_video')) {
            Media::deleteIfStored($work->video_url);
            $data['video_url'] = null;
        }
        if ($request->hasFile('video_poster')) {
            Media::deleteIfStored($work->video_poster_path);
            $data['video_poster_path'] = Media::storeUploaded($request->file('video_poster'), 'work/posters');
        }
        if ($request->hasFile('video_file')) {
            Media::deleteIfStored($work->video_url);
            $data['video_url'] = $request->file('video_file')->store('work/videos', 'public');
        }

        $work->update($data);
        $this->storeSlides($request, $work);

        return redirect()->route('admin.work.edit', $work)
            ->with('status', "Saved changes for \"{$work->name}\".");
    }

    public function destroy(CaseStudy $work): RedirectResponse
    {
        Media::deleteIfStored($work->cover_image);
        Media::deleteIfStored($work->client_logo_path);
        Media::deleteIfStored($work->video_poster_path);
        Media::deleteIfStored($work->video_url);

        foreach ($work->slides as $slide) {
            Media::deleteIfStored($slide->image_path);
        }

        $name = $work->name;
        $work->delete();

        return redirect()->route('admin.work.index')
            ->with('status', "Deleted case study \"{$name}\".");
    }

    public function destroySlide(CaseStudy $work, CaseStudySlide $slide): RedirectResponse
    {
        abort_unless($slide->case_study_id === $work->id, 404);
        Media::deleteIfStored($slide->image_path);
        $slide->delete();

        return back()->with('status', 'Gallery slide removed.');
    }

    private function storeSlides(Request $request, CaseStudy $caseStudy): void
    {
        if (! $request->hasFile('slides')) {
            return;
        }

        $nextOrder = ($caseStudy->slides()->max('sort_order') ?? 0) + 1;
        foreach ($request->file('slides', []) as $file) {
            if (! $file) {
                continue;
            }
            $path = Media::storeUploaded($file, 'work/slides');
            $caseStudy->slides()->create([
                'image_path' => $path,
                'caption' => $caseStudy->name.' campaign visual',
                'sort_order' => $nextOrder++,
            ]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $slugInput = $request->input('slug') ?: Str::slug((string) $request->input('name'));
        $request->merge(['slug' => Str::slug($slugInput)]);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'slug' => ['required', 'string', 'max:120', 'regex:/^[a-z0-9-]+$/', Rule::unique('case_studies', 'slug')->ignore($ignoreId)],
            'category_list' => ['required', 'array', 'min:1'],
            'category_list.*' => ['string', Rule::in(array_keys(CaseStudy::CATEGORY_LABELS))],
            'industry' => ['required', 'string', 'max:160'],
            'services_delivered' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'summary' => ['required', 'string', 'max:3000'],
            'video_url' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'cover_image' => [$ignoreId ? 'nullable' : 'required', 'file', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
            'client_logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp,svg', 'max:2048'],
            'video_poster' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
            'video_file' => ['nullable', 'file', 'mimes:mp4,webm,mov', 'max:51200'],
            'slides' => ['nullable', 'array'],
            'slides.*' => ['file', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);

        $validated['categories'] = implode(' ', $validated['category_list']);
        $validated['has_dot_mark'] = $request->boolean('has_dot_mark');
        $validated['is_published'] = $request->boolean('is_published');

        unset($validated['category_list'], $validated['cover_image'], $validated['client_logo'], $validated['video_poster'], $validated['video_file'], $validated['slides']);

        return $validated;
    }
}
