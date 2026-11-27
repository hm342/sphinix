@php
    $isEdit = $testimonial->exists;
@endphp
<x-admin.layouts.app :title="($isEdit ? 'Edit Testimonial' : 'Add Testimonial') . ' — Sphinix CMS'" :heading="$isEdit ? 'Edit Testimonial' : 'Add Testimonial'">
    <x-slot:actions>
        <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">← Back</a>
    </x-slot:actions>

    <form action="{{ $isEdit ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
          method="POST" class="bg-white border border-[#E4E4E7] rounded-lg p-6 md:p-8 flex flex-col gap-5 max-w-3xl">
        @csrf
        @if ($isEdit) @method('PUT') @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="tab_label" class="font-semibold text-[13px]">Tab Label *</label>
                <input id="tab_label" name="tab_label" type="text" value="{{ old('tab_label', $testimonial->tab_label) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="rating" class="font-semibold text-[13px]">Rating (1-5)</label>
                <input id="rating" name="rating" type="number" min="1" max="5" value="{{ old('rating', $testimonial->rating) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="flex flex-col gap-1.5">
            <label for="quote" class="font-semibold text-[13px]">Quote / Review Text *</label>
            <textarea id="quote" name="quote" rows="4" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('quote', $testimonial->quote) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="author_name" class="font-semibold text-[13px]">Author / Client Name *</label>
                <input id="author_name" name="author_name" type="text" value="{{ old('author_name', $testimonial->author_name) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="author_role" class="font-semibold text-[13px]">Role / Company *</label>
                <input id="author_role" name="author_role" type="text" value="{{ old('author_role', $testimonial->author_role) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="sort_order" class="font-semibold text-[13px]">Sort Order *</label>
                <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $testimonial->sort_order) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <label class="inline-flex items-center gap-2 text-[14px]">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active))>
            <span>Active (Show in home carousel)</span>
        </label>

        <div>
            <button type="submit" class="px-6 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                {{ $isEdit ? 'Save Testimonial' : 'Add Testimonial' }}
            </button>
        </div>
    </form>
</x-admin.layouts.app>
