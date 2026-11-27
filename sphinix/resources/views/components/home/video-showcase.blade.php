@props([
    'videoUrl' => '',
])
<section id="agency-reel" class="relative bg-brand-charcoal overflow-hidden">
    <div class="relative max-h-96 overflow-hidden case-video-stage"
         data-video-src="{{ $videoUrl }}"
         data-video-title="Sphinix Marketing Agency Showreel"
         data-video-poster="{{ asset('images/video_showcase_reel.jpg') }}">
        <img src="{{ asset('images/video_showcase_reel.jpg') }}" alt="Sphinix Marketing video production team and setup" class="w-full h-96 object-cover object-center opacity-70" loading="lazy" decoding="async">
        <div class="absolute inset-0 bg-brand-charcoal/70 flex flex-col items-center justify-center gap-4 px-6 text-center">
            <a href="{{ route('work.index') }}" aria-label="Explore Sphinix Marketing case studies and video work" class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-light-surface-container-lowest text-light-on-surface ring-1 ring-white/25 transition-transform duration-state-change hover:scale-105 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-light-primary">
                <span class="material-symbols-outlined text-headline-md text-brand-orange" aria-hidden="true">play_arrow</span>
            </a>
            <p class="font-label text-label-lg text-light-on-secondary bg-brand-charcoal/85 backdrop-blur-sm border border-white/15 px-4 py-1.5 rounded-full">
                Marketing Agency &amp; Software Studio
            </p>
        </div>
    </div>
</section>
