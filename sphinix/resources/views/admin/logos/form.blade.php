@php
    $isEdit = $logo->exists;
@endphp
<x-admin.layouts.app :title="($isEdit ? 'Edit Logo' : 'Add Logo') . ' — Sphinix CMS'" :heading="$isEdit ? 'Edit Company Logo: ' . $logo->name : 'Add Company Logo'">
    <x-slot:actions>
        <a href="{{ route('admin.logos.index') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">← Back to Logos</a>
    </x-slot:actions>

    <form action="{{ $isEdit ? route('admin.logos.update', $logo) : route('admin.logos.store') }}"
          method="POST" enctype="multipart/form-data"
          class="bg-white border border-[#E4E4E7] rounded-lg p-6 md:p-8 flex flex-col gap-6 max-w-3xl">
        @csrf
        @if ($isEdit) @method('PUT') @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="name" class="font-semibold text-[13px]">Company Name *</label>
                <input id="name" name="name" type="text" value="{{ old('name', $logo->name) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="subtitle" class="font-semibold text-[13px]">Subtitle / Tag</label>
                <input id="subtitle" name="subtitle" type="text" value="{{ old('subtitle', $logo->subtitle) }}" placeholder="e.g. Client Partner, Jewelry"
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="p-4 rounded-lg border border-[#E4E4E7] bg-[#FAF9F7] flex flex-col gap-3">
            <label for="logo" class="font-semibold text-[13px]">Attach Logo Image (PNG, WebP, JPG, SVG — max 2MB)</label>
            @if ($logo->logo_url)
                <div class="flex items-center gap-4">
                    <div class="w-40 h-16 bg-white border border-[#E4E4E7] rounded flex items-center justify-center p-2">
                        <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}" class="max-h-12 w-auto object-contain">
                    </div>
                    <label class="inline-flex items-center gap-2 text-[13px] text-[#BA1A1A]">
                        <input type="checkbox" name="remove_logo" value="1">
                        <span>Remove attached logo file</span>
                    </label>
                </div>
            @endif
            <input id="logo" name="logo" type="file" accept=".png,.jpg,.jpeg,.webp,.svg"
                   class="text-[13.5px] file:mr-3 file:py-2 file:px-4 file:rounded file:border-0 file:bg-[#18181B] file:text-white file:text-[13px] file:font-semibold">
            <p class="text-[12px] text-[#52525B]">When attached, this logo renders automatically in the home page carousel cards.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="carousel_row" class="font-semibold text-[13px]">Carousel Row *</label>
                <select id="carousel_row" name="carousel_row" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
                    <option value="1" @selected((int) old('carousel_row', $logo->carousel_row) === 1)>Row 1 (Left → Right)</option>
                    <option value="2" @selected((int) old('carousel_row', $logo->carousel_row) === 2)>Row 2 (Right → Left)</option>
                </select>
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="case_study_slug" class="font-semibold text-[13px]">Linked Case Study</label>
                <select id="case_study_slug" name="case_study_slug" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
                    <option value="">None</option>
                    @foreach ($caseStudies as $cs)
                        <option value="{{ $cs->slug }}" @selected(old('case_study_slug', $logo->case_study_slug) === $cs->slug)>{{ $cs->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="sort_order" class="font-semibold text-[13px]">Sort Order *</label>
                <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $logo->sort_order) }}" required
                       class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="flex flex-wrap gap-6 pt-1">
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="show_in_marquee" value="1" @checked(old('show_in_marquee', $logo->show_in_marquee))>
                <span>Show in Home Carousel</span>
            </label>
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="show_in_directory" value="1" @checked(old('show_in_directory', $logo->show_in_directory))>
                <span>Show in Work Directory</span>
            </label>
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $logo->is_active))>
                <span>Active (Visible)</span>
            </label>
        </div>

        <div class="pt-2 flex items-center gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                {{ $isEdit ? 'Save Logo' : 'Create Logo' }}
            </button>
            <a href="{{ route('admin.logos.index') }}" class="px-4 py-2.5 text-[14px] text-[#52525B] hover:text-[#18181B]">Cancel</a>
        </div>
    </form>
</x-admin.layouts.app>
