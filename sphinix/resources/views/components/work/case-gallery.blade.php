@props([
    'company',
    'slides' => [],
])
@php
    $slideItems = collect($slides);
@endphp
<section class="bg-[#FFFFFF] py-16 lg:py-20 px-6 border-b border-[#E4E4E7]">
    <div id="case-gallery" class="max-w-6xl mx-auto flex flex-col gap-6" role="region" aria-roledescription="carousel" aria-label="{{ $company }} images and posters" tabindex="0">
        <div class="flex items-center justify-between gap-4">
            <div class="flex flex-col gap-1">
                <h2 class="font-display font-bold text-[24px] sm:text-[28px] leading-[1.15] tracking-[-0.02em] text-[#18181B]">
                    Posters &amp; Project Visuals
                </h2>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span id="gallery-counter" class="font-mono text-[12.5px] font-medium text-[#52525B] tabular-nums" aria-live="polite">1 / {{ max(1, $slideItems->count()) }}</span>
                <div class="flex items-center gap-2">
                    <button type="button" id="gallery-prev" aria-label="Previous visual" class="w-10 h-10 rounded-full border border-[#D4D0C8] bg-white text-[#18181B] hover:border-[#A83300] hover:text-[#A83300] flex items-center justify-center transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A]">
                        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">arrow_back</span>
                    </button>
                    <button type="button" id="gallery-next" aria-label="Next visual" class="w-10 h-10 rounded-full bg-[#A83300] text-white hover:bg-[#18181B] flex items-center justify-center transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A]">
                        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-hidden border border-[#E4E4E7] bg-[#F7F6F4]">
            <div id="gallery-track" class="flex transition-transform duration-300 ease-out" style="transform: translateX(0%);">
                @forelse ($slideItems as $idx => $slide)
                    @php
                        $src = is_object($slide) ? $slide->image_url : asset($slide);
                        $caption = is_object($slide) ? ($slide->caption ?: $company . ' campaign visual ' . ($idx + 1)) : $company . ' campaign visual ' . ($idx + 1);
                    @endphp
                    <div class="gallery-slide w-full shrink-0 aspect-[16/10] bg-[#F7F6F4] flex items-center justify-center" role="group" aria-roledescription="slide" aria-label="Slide {{ $idx + 1 }} of {{ $slideItems->count() }}">
                        <img src="{{ $src }}" alt="{{ $caption }}" class="w-full h-full object-contain" loading="{{ $idx === 0 ? 'eager' : 'lazy' }}" decoding="async">
                    </div>
                @empty
                    <div class="gallery-slide w-full shrink-0 aspect-[16/10] bg-[#F7F6F4] flex items-center justify-center font-body text-[14.5px] text-[#52525B]">
                        No campaign slides uploaded yet.
                    </div>
                @endforelse
            </div>
        </div>

        @if ($slideItems->isNotEmpty())
            <div class="flex items-center justify-between gap-4">
                <span class="font-mono text-[11.5px] text-[#52525B]">Use arrows or swipe to view each poster</span>
                <div class="flex items-center gap-2" role="group" aria-label="Slide pagination">
                    @foreach ($slideItems as $idx => $slide)
                        <button type="button"
                                data-slide-to="{{ $idx }}"
                                aria-label="Go to visual {{ $idx + 1 }}"
                                aria-current="{{ $idx === 0 ? 'true' : 'false' }}"
                                class="gallery-dot h-2.5 rounded-full transition-all duration-200 {{ $idx === 0 ? 'w-7 bg-[#A83300]' : 'w-2.5 bg-[#D4D0C8] hover:bg-[#71717A]' }} focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A]"></button>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
