@php
    $isEdit = $insight->exists;
@endphp
<x-admin.layouts.app :title="($isEdit ? 'Edit Insight' : 'New Insight') . ' — Sphinix CMS'" :heading="$isEdit ? 'Edit Insight' : 'New Insight'">
    <x-slot:actions>
        @if ($isEdit && $insight->is_published)
            <a href="{{ route('insights.show', $insight->slug) }}" target="_blank" rel="noopener" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">View Live ↗</a>
        @endif
        <a href="{{ route('admin.insights.index') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">← Back to Insights</a>
    </x-slot:actions>

    <form action="{{ $isEdit ? route('admin.insights.update', $insight) : route('admin.insights.store') }}"
          method="POST" enctype="multipart/form-data"
          class="bg-white border border-[#E4E4E7] rounded-lg p-6 md:p-8 flex flex-col gap-6">
        @csrf
        @if ($isEdit) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="md:col-span-2 flex flex-col gap-1.5">
                <label for="title" class="font-semibold text-[13px]">Title *</label>
                <input id="title" name="title" type="text" value="{{ old('title', $insight->title) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="category" class="font-semibold text-[13px]">Category *</label>
                <select id="category" name="category" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
                    @foreach ($categories as $key => $label)
                        <option value="{{ $key }}" @selected(old('category', $insight->category) === $key)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div class="md:col-span-2 flex flex-col gap-1.5">
                <label for="slug" class="font-semibold text-[13px]">URL Slug</label>
                <input id="slug" name="slug" type="text" value="{{ old('slug', $insight->slug) }}" placeholder="auto-from-title"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[13px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="published_at" class="font-semibold text-[13px]">Publish Date *</label>
                <input id="published_at" name="published_at" type="date" value="{{ old('published_at', $insight->published_at?->toDateString() ?? now()->toDateString()) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="read_time" class="font-semibold text-[13px]">Read Time *</label>
                <input id="read_time" name="read_time" type="text" value="{{ old('read_time', $insight->read_time) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="author_name" class="font-semibold text-[13px]">Author *</label>
                <input id="author_name" name="author_name" type="text" value="{{ old('author_name', $insight->author_name) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="cta_label" class="font-semibold text-[13px]">Featured Card CTA Text</label>
                <input id="cta_label" name="cta_label" type="text" value="{{ old('cta_label', $insight->cta_label) }}" placeholder="Read Note"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="sort_order" class="font-semibold text-[13px]">Sort Order</label>
                <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $insight->sort_order) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="flex flex-col gap-1.5">
            <label for="excerpt" class="font-semibold text-[13px]">Short Excerpt *</label>
            <textarea id="excerpt" name="excerpt" rows="2" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('excerpt', $insight->excerpt) }}</textarea>
        </div>

        <div class="flex flex-col gap-1.5">
            <label for="body" class="font-semibold text-[13px]">Full Article Body (Paragraphs separated by blank lines)</label>
            <textarea id="body" name="body" rows="8" class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('body', $insight->body) }}</textarea>
        </div>

        <div class="p-4 rounded border border-[#E4E4E7] bg-[#FAF9F7] grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
            <div class="flex flex-col gap-2">
                <label for="cover_image" class="font-semibold text-[13px]">Editorial Cover / Hover Thumbnail</label>
                @if ($insight->cover_image)
                    <img src="{{ $insight->cover_url }}" alt="" class="w-40 h-24 object-cover border border-[#E4E4E7]">
                    <label class="inline-flex items-center gap-1.5 text-[12px] text-[#BA1A1A]">
                        <input type="checkbox" name="remove_cover_image" value="1"> Reset to category default image
                    </label>
                @endif
                <input id="cover_image" name="cover_image" type="file" accept=".png,.jpg,.jpeg,.webp" class="text-[13px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="cover_alt" class="font-semibold text-[13px]">Image Alt Text</label>
                <input id="cover_alt" name="cover_alt" type="text" value="{{ old('cover_alt', $insight->cover_alt) }}"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-white text-[14px]">
                <label for="external_url" class="font-semibold text-[13px] mt-2">Optional Custom Link URL</label>
                <input id="external_url" name="external_url" type="url" value="{{ old('external_url', $insight->external_url) }}" placeholder="Leave empty for /insights/{slug}"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-white text-[14px]">
            </div>
        </div>

        <div class="flex flex-wrap gap-6">
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $insight->is_featured))>
                <span>Primary Featured Cover (Right column on Home)</span>
            </label>
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="show_on_home" value="1" @checked(old('show_on_home', $insight->show_on_home))>
                <span>Show in Home Left List</span>
            </label>
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $insight->is_published))>
                <span>Published</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="px-6 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                {{ $isEdit ? 'Save Insight' : 'Publish Insight' }}
            </button>
        </div>
    </form>
</x-admin.layouts.app>
