@props([
    'company',
    'industry' => '',
    'videoSrc' => '',
    'videoPoster' => '',
    'fallbackImg' => '',
])
<section class="bg-[#ECEBE9] py-14 lg:py-20 px-6 border-b border-[#E4E4E7]">
    <div class="max-w-6xl mx-auto flex flex-col gap-5">
        <div class="flex flex-wrap items-end justify-between gap-4 pb-3 border-b border-[#D4D0C8]">
            <div class="flex flex-col gap-1">
                <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">Campaign Film</span>
                <h2 class="font-display font-bold text-[24px] sm:text-[28px] leading-[1.15] tracking-[-0.02em] text-[#18181B]">
                    {{ $company }} Video Showcase
                </h2>
            </div>
            <div class="flex items-center gap-3 font-mono text-[11.5px] text-[#52525B]">
                @if ($industry)
                    <span>{{ $industry }}</span>
                    <span>·</span>
                @endif
                <span>16:9 Showcase</span>
            </div>
        </div>

        <div class="case-video-stage relative aspect-video w-full overflow-hidden bg-[#141416] border border-[#18181B] flex items-center justify-center p-8 text-center"
             data-video-src="{{ $videoSrc }}"
             data-video-title="{{ $company }} Campaign Video"
             data-video-poster="{{ $videoPoster }}">
            @if ($fallbackImg)
                <img src="{{ $fallbackImg }}" alt="{{ $company }} campaign visual frame" class="absolute inset-0 w-full h-full object-cover opacity-35" loading="lazy" decoding="async">
                <div class="pointer-events-none absolute inset-0" style="background: linear-gradient(to top, rgba(18, 18, 20, 0.92) 0%, rgba(18, 18, 20, 0.55) 55%, rgba(18, 18, 20, 0.72) 100%);"></div>
            @endif

            <div class="relative z-10 max-w-lg flex flex-col items-center gap-4">
                <span class="w-14 h-14 rounded-full border border-white/25 bg-[#18181B]/80 flex items-center justify-center" aria-hidden="true">
                    <span class="material-symbols-outlined text-[26px] text-[#ec7a2d]">play_arrow</span>
                </span>
                <div class="flex flex-col gap-1.5">
                    <span class="font-mono text-[11px] uppercase tracking-[0.12em] text-[#FF9F7A]">Campaign Reel</span>
                    <p class="font-display font-bold text-[22px] sm:text-[26px] leading-[1.2] text-white text-balance">
                        {{ $company }} Motion &amp; Visual Highlights
                    </p>
                </div>
                <a href="#case-gallery" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#ec7a2d] hover:bg-white text-[#18181B] font-body font-semibold text-[13.5px] transition-colors">
                    <span>Explore Project Posters</span>
                    <span class="material-symbols-outlined text-[16px]" aria-hidden="true">arrow_downward</span>
                </a>
            </div>
        </div>
    </div>
</section>
