<x-admin.layouts.app title="Agency Settings — Sphinix CMS" heading="Agency Stats, Contact Details & Media">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white border border-[#E4E4E7] rounded-lg p-6 md:p-8 flex flex-col gap-6 max-w-4xl">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="flex flex-col gap-1.5">
                <label for="years_label" class="font-semibold text-[13px]">Years Label</label>
                <input id="years_label" name="years_label" type="text" value="{{ old('years_label', $settings['years_label']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="clients_count_label" class="font-semibold text-[13px]">Clients Label</label>
                <input id="clients_count_label" name="clients_count_label" type="text" value="{{ old('clients_count_label', $settings['clients_count_label']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="projects_count_label" class="font-semibold text-[13px]">Projects Label</label>
                <input id="projects_count_label" name="projects_count_label" type="text" value="{{ old('projects_count_label', $settings['projects_count_label']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="industries_count_label" class="font-semibold text-[13px]">Industries Label</label>
                <input id="industries_count_label" name="industries_count_label" type="text" value="{{ old('industries_count_label', $settings['industries_count_label']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="primary_email" class="font-semibold text-[13px]">Primary Email *</label>
                <input id="primary_email" name="primary_email" type="email" value="{{ old('primary_email', $settings['primary_email']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="whatsapp_number" class="font-semibold text-[13px]">WhatsApp Number (Digits with country code) *</label>
                <input id="whatsapp_number" name="whatsapp_number" type="text" value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="primary_phone" class="font-semibold text-[13px]">Head Office Phone *</label>
                <input id="primary_phone" name="primary_phone" type="text" value="{{ old('primary_phone', $settings['primary_phone']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="studio_phone" class="font-semibold text-[13px]">Creative Studio Phone *</label>
                <input id="studio_phone" name="studio_phone" type="text" value="{{ old('studio_phone', $settings['studio_phone']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="head_office_address" class="font-semibold text-[13px]">Head Office Address *</label>
                <textarea id="head_office_address" name="head_office_address" rows="2" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('head_office_address', $settings['head_office_address']) }}</textarea>
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="studio_address" class="font-semibold text-[13px]">Creative Studio Address *</label>
                <textarea id="studio_address" name="studio_address" rows="2" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('studio_address', $settings['studio_address']) }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="studio_hours" class="font-semibold text-[13px]">Studio Hours *</label>
                <input id="studio_hours" name="studio_hours" type="text" value="{{ old('studio_hours', $settings['studio_hours']) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="agency_reel_url" class="font-semibold text-[13px]">Home Agency Showreel Video URL (Optional)</label>
                <input id="agency_reel_url" name="agency_reel_url" type="text" value="{{ old('agency_reel_url', $settings['agency_reel_url']) }}" placeholder="YouTube / Vimeo / MP4 URL" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div>
            <button type="submit" class="px-6 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                Save Agency Settings
            </button>
        </div>
    </form>
</x-admin.layouts.app>
