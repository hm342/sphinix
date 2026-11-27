@php
    $isEdit = $service->exists;
    $chipsText = old('chips_text', implode(', ', $service->chips ?? []));
    $featuresText = old('features_text', implode("\n", $service->features ?? []));
@endphp
<x-admin.layouts.app :title="($isEdit ? 'Edit Service' : 'New Service') . ' — Sphinix CMS'" :heading="$isEdit ? 'Edit Service: ' . $service->title : 'New Service'">
    <x-slot:actions>
        <a href="{{ route('admin.services.index') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">← Back to Services</a>
    </x-slot:actions>

    <form action="{{ $isEdit ? route('admin.services.update', $service) : route('admin.services.store') }}"
          method="POST" enctype="multipart/form-data"
          class="bg-white border border-[#E4E4E7] rounded-lg p-6 md:p-8 flex flex-col gap-6">
        @csrf
        @if ($isEdit) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="num" class="font-semibold text-[13px]">Number *</label>
                <input id="num" name="num" type="text" value="{{ old('num', $service->num) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[14px]">
            </div>
            <div class="md:col-span-2 flex flex-col gap-1.5">
                <label for="title" class="font-semibold text-[13px]">Full Title *</label>
                <input id="title" name="title" type="text" value="{{ old('title', $service->title) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="card_title" class="font-semibold text-[13px]">Card Title *</label>
                <input id="card_title" name="card_title" type="text" value="{{ old('card_title', $service->card_title) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="slug" class="font-semibold text-[13px]">Slug / Anchor</label>
                <input id="slug" name="slug" type="text" value="{{ old('slug', $service->slug) }}" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[13px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="nav_title" class="font-semibold text-[13px]">Mega Menu Title *</label>
                <input id="nav_title" name="nav_title" type="text" value="{{ old('nav_title', $service->nav_title) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="nav_icon" class="font-semibold text-[13px]">Material Icon Name *</label>
                <input id="nav_icon" name="nav_icon" type="text" value="{{ old('nav_icon', $service->nav_icon) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[13px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="eyebrow" class="font-semibold text-[13px]">Eyebrow Label *</label>
                <input id="eyebrow" name="eyebrow" type="text" value="{{ old('eyebrow', $service->eyebrow) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="nav_desc" class="font-semibold text-[13px]">Mega Menu Subtitle *</label>
                <input id="nav_desc" name="nav_desc" type="text" value="{{ old('nav_desc', $service->nav_desc) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="tools" class="font-semibold text-[13px]">Tools / Platforms</label>
                <input id="tools" name="tools" type="text" value="{{ old('tools', $service->tools) }}" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="short_desc" class="font-semibold text-[13px]">Card Short Description *</label>
                <textarea id="short_desc" name="short_desc" rows="3" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('short_desc', $service->short_desc) }}</textarea>
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="full_desc" class="font-semibold text-[13px]">Accordion Full Description *</label>
                <textarea id="full_desc" name="full_desc" rows="3" required class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('full_desc', $service->full_desc) }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="chips_text" class="font-semibold text-[13px]">Card Chips (comma-separated)</label>
                <input id="chips_text" name="chips_text" type="text" value="{{ $chipsText }}" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="features_text" class="font-semibold text-[13px]">Bullet Features (one per line)</label>
                <textarea id="features_text" name="features_text" rows="4" class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ $featuresText }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="route_name" class="font-semibold text-[13px]">Target Route *</label>
                <select id="route_name" name="route_name" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
                    <option value="services.index" @selected(old('route_name', $service->route_name) === 'services.index')>All Services (/services)</option>
                    <option value="services.social" @selected(old('route_name', $service->route_name) === 'services.social')>Social Media (/services/social-media-marketing)</option>
                    <option value="services.seo" @selected(old('route_name', $service->route_name) === 'services.seo')>SEO Page (/services/seo)</option>
                    <option value="services.google-ads" @selected(old('route_name', $service->route_name) === 'services.google-ads')>Google Ads (/services/google-ads)</option>
                    <option value="services.branding" @selected(old('route_name', $service->route_name) === 'services.branding')>Branding &amp; Design (/services/branding)</option>
                    <option value="services.video" @selected(old('route_name', $service->route_name) === 'services.video')>Video Production (/services/video-production)</option>
                    <option value="services.ecommerce" @selected(old('route_name', $service->route_name) === 'services.ecommerce')>E-Commerce (/services/ecommerce)</option>
                    <option value="services.email" @selected(old('route_name', $service->route_name) === 'services.email')>Email Marketing (/services/email-marketing)</option>
                    <option value="services.dev" @selected(old('route_name', $service->route_name) === 'services.dev')>Web &amp; App Dev (/services/web-app-development)</option>
                </select>
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="anchor" class="font-semibold text-[13px]">Hash Anchor (optional)</label>
                <input id="anchor" name="anchor" type="text" value="{{ old('anchor', $service->anchor) }}" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] font-mono text-[13px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="cta_card" class="font-semibold text-[13px]">Card CTA *</label>
                <input id="cta_card" name="cta_card" type="text" value="{{ old('cta_card', $service->cta_card) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="cta_detail" class="font-semibold text-[13px]">Accordion CTA *</label>
                <input id="cta_detail" name="cta_detail" type="text" value="{{ old('cta_detail', $service->cta_detail) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
        </div>

        <input type="hidden" name="dot_color" value="{{ old('dot_color', $service->dot_color) }}">
        <input type="hidden" name="detail_route" value="{{ old('detail_route', $service->detail_route) }}">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-center">
            <div class="p-4 rounded border border-[#E4E4E7] bg-[#FAF9F7] flex flex-col gap-2">
                <label for="image" class="font-semibold text-[13px]">Service Visual</label>
                @if ($service->image_url)
                    <img src="{{ $service->image_url }}" alt="" class="w-32 h-20 object-cover border border-[#E4E4E7]">
                @endif
                <input id="image" name="image" type="file" accept=".png,.jpg,.jpeg,.webp" class="text-[12.5px]">
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="sort_order" class="font-semibold text-[13px]">Sort Order</label>
                <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $service->sort_order) }}" required class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
            </div>
            <label class="inline-flex items-center gap-2 text-[14px] pt-4">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active))>
                <span>Active</span>
            </label>
        </div>

        <div>
            <button type="submit" class="px-6 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                {{ $isEdit ? 'Save Service' : 'Create Service' }}
            </button>
        </div>
    </form>
</x-admin.layouts.app>
