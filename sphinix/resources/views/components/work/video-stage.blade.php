@props([
    'company',
])
<section class="bg-[#ECEBE9] py-14 lg:py-20 px-6 border-b border-[#E4E4E7]">
    <div class="max-w-5xl mx-auto flex flex-col gap-4">
        <div class="flex items-center justify-between gap-4">
            <span class="font-mono text-[12px] font-semibold uppercase tracking-[0.08em] text-[#52525B]">Campaign Video</span>
            <span class="font-mono text-[11.5px] text-[#52525B]">16:9 Video</span>
        </div>

        <div class="case-video-stage aspect-video w-full rounded-xl overflow-hidden bg-[#18181B] border border-[#D4D0C8] flex items-center justify-center p-8 text-center"
             data-video-src=""
             data-video-title="{{ $company }} Campaign Video"
             data-video-poster="">
            <div class="max-w-md flex flex-col items-center gap-3">
                <span class="w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center" aria-hidden="true">
                    <span class="material-symbols-outlined text-[24px] text-[#FF9F7A]">play_arrow</span>
                </span>
                <span class="font-mono text-[11.5px] uppercase tracking-[0.08em] text-[#FF9F7A]">16:9 Campaign Video Slot</span>
                <h2 class="font-display font-bold text-[22px] sm:text-[26px] leading-[1.2] text-white">
                    {{ $company }} Video Showcase
                </h2>
                <p class="font-mono text-[12px] text-white/70">
                    [ADD REAL YOUTUBE EMBED URL OR MP4 FILE IN data-video-src]
                </p>
            </div>
        </div>
    </div>
</section>
