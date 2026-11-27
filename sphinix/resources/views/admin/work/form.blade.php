@php
    $isEdit = $project->exists;
    $selectedCategories = array_filter(explode(' ', (string) old('categories_fallback', $project->categories)));
    if (is_array(old('category_list'))) {
        $selectedCategories = old('category_list');
    }
@endphp
<x-admin.layouts.app :title="($isEdit ? 'Edit Case Study' : 'New Case Study') . ' — Sphinix CMS'" :heading="$isEdit ? 'Edit Case Study: ' . $project->name : 'Add Case Study'">
    <x-slot:actions>
        @if ($isEdit && $project->is_published)
            <a href="{{ route('work.show', $project->slug) }}" target="_blank" rel="noopener" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">View Live ↗</a>
        @endif
        <a href="{{ route('admin.work.index') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">← Back to Work</a>
    </x-slot:actions>

    <form action="{{ $isEdit ? route('admin.work.update', $project) : route('admin.work.store') }}"
          method="POST" enctype="multipart/form-data"
          class="bg-white border border-[#E4E4E7] rounded-lg p-6 md:p-8 flex flex-col gap-6">
        @csrf
        @if ($isEdit) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="name" class="font-semibold text-[13px]">Client / Project Name *</label>
                <input id="name" name="name" type="text" value="{{ old('name', $project->name) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="slug" class="font-semibold text-[13px]">URL Slug</label>
                <input id="slug" name="slug" type="text" value="{{ old('slug', $project->slug) }}" placeholder="auto-from-name"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[13px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="industry" class="font-semibold text-[13px]">Industry *</label>
                <input id="industry" name="industry" type="text" value="{{ old('industry', $project->industry) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <span class="font-semibold text-[13px]">Filter Categories *</span>
            <div class="flex flex-wrap gap-4">
                @foreach ($categoryOptions as $key => $label)
                    <label class="inline-flex items-center gap-2 text-[14px]">
                        <input type="checkbox" name="category_list[]" value="{{ $key }}" @checked(in_array($key, $selectedCategories, true))>
                        <span>{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="services_delivered" class="font-semibold text-[13px]">Services Delivered</label>
                <input id="services_delivered" name="services_delivered" type="text" value="{{ old('services_delivered', $project->services_delivered) }}"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="video_url" class="font-semibold text-[13px]">Campaign Video URL (YouTube / Vimeo / MP4)</label>
                <input id="video_url" name="video_url" type="text" value="{{ old('video_url', $project->video_url) }}" placeholder="https://www.youtube.com/watch?v=... or .mp4"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
                @if ($project->video_url)
                    <label class="inline-flex items-center gap-1.5 text-[12px] text-[#BA1A1A] pt-1">
                        <input type="checkbox" name="remove_video" value="1"> Remove attached video
                    </label>
                @endif
            </div>
        </div>

        <div class="p-4 rounded border border-[#E4E4E7] bg-[#FAF9F7] flex flex-col gap-2">
            <label for="video_file" class="font-semibold text-[13px]">Or Upload Campaign Video File (MP4 / WebM / MOV — max 50MB)</label>
            <input id="video_file" name="video_file" type="file" accept=".mp4,.webm,.mov" class="text-[13px]">
        </div>

        <div class="flex flex-col gap-1.5">
            <label for="description" class="font-semibold text-[13px]">Meta Description *</label>
            <input id="description" name="description" type="text" value="{{ old('description', $project->description) }}" required
                   class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
        </div>

        <div class="flex flex-col gap-1.5">
            <label for="summary" class="font-semibold text-[13px]">Case Study Summary *</label>
            <textarea id="summary" name="summary" rows="4" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('summary', $project->summary) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="p-4 rounded border border-[#E4E4E7] bg-[#FAF9F7] flex flex-col gap-2">
                <label for="cover_image" class="font-semibold text-[13px]">3:4 Cover Poster {{ $isEdit ? '' : '*' }}</label>
                @if ($project->cover_url)
                    <img src="{{ $project->cover_url }}" alt="" class="w-24 h-32 object-cover border border-[#E4E4E7]">
                @endif
                <input id="cover_image" name="cover_image" type="file" accept=".png,.jpg,.jpeg,.webp" class="text-[12.5px]">
            </div>

            <div class="p-4 rounded border border-[#E4E4E7] bg-[#FAF9F7] flex flex-col gap-2">
                <label for="client_logo" class="font-semibold text-[13px]">Client Logo File (Optional)</label>
                @if ($project->client_logo_url)
                    <img src="{{ $project->client_logo_url }}" alt="" class="h-12 w-auto object-contain bg-white p-1.5 border border-[#E4E4E7]">
                    <label class="inline-flex items-center gap-1.5 text-[12px] text-[#BA1A1A]">
                        <input type="checkbox" name="remove_client_logo" value="1"> Remove logo
                    </label>
                @endif
                <input id="client_logo" name="client_logo" type="file" accept=".png,.jpg,.jpeg,.webp,.svg" class="text-[12.5px]">
            </div>

            <div class="p-4 rounded border border-[#E4E4E7] bg-[#FAF9F7] flex flex-col gap-2">
                <label for="video_poster" class="font-semibold text-[13px]">Video Poster Image (Optional)</label>
                @if ($project->video_poster_url)
                    <img src="{{ $project->video_poster_url }}" alt="" class="h-16 w-28 object-cover border border-[#E4E4E7]">
                @endif
                <input id="video_poster" name="video_poster" type="file" accept=".png,.jpg,.jpeg,.webp" class="text-[12.5px]">
            </div>
        </div>

        <div class="p-4 rounded border border-[#E4E4E7] bg-[#FAF9F7] flex flex-col gap-3">
            <label for="slides" class="font-semibold text-[13px]">Add Gallery Slides / Posters (Multiple allowed)</label>
            <input id="slides" name="slides[]" type="file" multiple accept=".png,.jpg,.jpeg,.webp" class="text-[13px]">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
            <div class="flex flex-col gap-1.5">
                <label for="sort_order" class="font-semibold text-[13px]">Sort Order</label>
                <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $project->sort_order) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <label class="inline-flex items-center gap-2 text-[14px] pt-4">
                <input type="checkbox" name="has_dot_mark" value="1" @checked(old('has_dot_mark', $project->has_dot_mark))>
                <span>Accent dot mark (e.g. aabo.)</span>
            </label>
            <label class="inline-flex items-center gap-2 text-[14px] pt-4">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $project->is_published))>
                <span>Published</span>
            </label>
        </div>

        <div class="pt-2 flex items-center gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                {{ $isEdit ? 'Save Case Study' : 'Create Case Study' }}
            </button>
        </div>
    </form>

    @if ($isEdit && $project->slides->isNotEmpty())
        <section class="bg-white border border-[#E4E4E7] rounded-lg p-6 flex flex-col gap-4">
            <h2 class="font-display font-bold text-[17px]">Current Gallery Slides ({{ $project->slides->count() }})</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ($project->slides as $slide)
                    <div class="border border-[#E4E4E7] rounded overflow-hidden flex flex-col">
                        <img src="{{ $slide->image_url }}" alt="{{ $slide->caption }}" class="w-full h-32 object-cover bg-[#F7F6F4]">
                        <div class="p-2 flex items-center justify-between gap-2 bg-white">
                            <span class="font-mono text-[11px] text-[#52525B] truncate">#{{ $loop->iteration }}</span>
                            <form action="{{ route('admin.work.slides.destroy', [$project, $slide]) }}" method="POST" onsubmit="return confirm('Remove this slide?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[12px] text-[#BA1A1A] hover:underline">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</x-admin.layouts.app>
