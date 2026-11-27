@php
    $isEdit = $faq->exists;
@endphp
<x-admin.layouts.app :title="($isEdit ? 'Edit FAQ' : 'Add FAQ') . ' — Sphinix CMS'" :heading="$isEdit ? 'Edit FAQ' : 'Add FAQ'">
    <x-slot:actions>
        <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">← Back</a>
    </x-slot:actions>

    <form action="{{ $isEdit ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}"
          method="POST" class="bg-white border border-[#E4E4E7] rounded-lg p-6 md:p-8 flex flex-col gap-5 max-w-3xl">
        @csrf
        @if ($isEdit) @method('PUT') @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="placement" class="font-semibold text-[13px]">Page Placement *</label>
                <select id="placement" name="placement" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
                    <option value="home" @selected(old('placement', $faq->placement) === 'home')>Home Page (#products)</option>
                    <option value="contact" @selected(old('placement', $faq->placement) === 'contact')>Contact Page</option>
                </select>
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="sort_order" class="font-semibold text-[13px]">Sort Order *</label>
                <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $faq->sort_order) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="flex flex-col gap-1.5">
            <label for="question" class="font-semibold text-[13px]">Question *</label>
            <input id="question" name="question" type="text" value="{{ old('question', $faq->question) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
        </div>

        <div class="flex flex-col gap-1.5">
            <label for="answer" class="font-semibold text-[13px]">Answer *</label>
            <textarea id="answer" name="answer" rows="4" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div class="flex flex-wrap gap-6">
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="is_open_by_default" value="1" @checked(old('is_open_by_default', $faq->is_open_by_default))>
                <span>Open by default</span>
            </label>
            <label class="inline-flex items-center gap-2 text-[14px]">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $faq->is_active))>
                <span>Active</span>
            </label>
        </div>

        <div>
            <button type="submit" class="px-6 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                {{ $isEdit ? 'Save FAQ' : 'Add FAQ' }}
            </button>
        </div>
    </form>
</x-admin.layouts.app>
