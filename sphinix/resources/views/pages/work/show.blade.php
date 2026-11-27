@php
    $clientLogoUrl = $project->resolved_client_logo_url ?? $project->client_logo_url;
@endphp
<x-layouts.app
    :title="$project->name . ' Case Study — Sphinix Marketing'"
    :description="$project->description"
    active-nav="work">

    <!-- Section 1: Unboxed Editorial Case Study Header & Spec Rail -->
    <section class="bg-[#F7F6F4] pt-28 sm:pt-32 pb-14 lg:pt-36 lg:pb-16 px-6 border-b border-[#E4E4E7]">
        <div class="max-w-6xl mx-auto flex flex-col gap-10">
            <nav aria-label="Breadcrumb" class="flex items-center gap-2 font-mono text-[12px] text-[#52525B]">
                <a href="{{ route('home') }}" class="hover:text-[#A83300]">Home</a>
                <span>/</span>
                <a href="{{ route('work.index') }}" class="hover:text-[#A83300]">Work</a>
                <span>/</span>
                <span class="text-[#18181B]">{{ $project->name }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
                <!-- Left: Unboxed Brand Logo + Case Study Title & Summary -->
                <div class="hero-pose-1 lg:col-span-8 flex flex-col items-start gap-5">
                    @if ($clientLogoUrl)
                        <img src="{{ $clientLogoUrl }}"
                             alt="{{ $project->name }} logo"
                             class="h-11 sm:h-12 w-auto max-w-[220px] object-contain"
                             loading="eager"
                             decoding="async">
                    @elseif ($project->has_dot_mark)
                        <div class="inline-flex items-center gap-1.5 text-[#18181B]">
                            <span class="font-display font-bold text-[30px] tracking-tight">aabo</span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#E85D2A] -mt-4" aria-hidden="true"></span>
                        </div>
                    @endif

                    <h1 class="font-display font-extrabold text-[34px] sm:text-[42px] lg:text-[48px] leading-[1.08] tracking-[-0.028em] text-[#18181B] text-balance">
                        {{ $project->name }} <span class="text-[#E85D2A]">Case Study</span>
                    </h1>

                    <p class="font-body text-[16.5px] sm:text-[17px] leading-[1.7] text-[#3F3F46] max-w-[60ch]">
                        {{ $project->summary }}
                    </p>
                </div>

                <!-- Right: Hairline Project Metadata Rail -->
                <dl class="hero-pose-2 lg:col-span-4 border-t lg:border-t-0 lg:border-l border-[#D4D0C8] pt-6 lg:pt-1 lg:pl-10 flex flex-col divide-y divide-[#D4D0C8]">
                    <div class="py-3.5 first:pt-0 flex flex-col gap-1">
                        <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-[#71717A]">Client</dt>
                        <dd class="font-body font-semibold text-[15px] text-[#18181B]">{{ $project->name }}</dd>
                    </div>
                    <div class="py-3.5 flex flex-col gap-1">
                        <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-[#71717A]">Industry</dt>
                        <dd class="font-body font-semibold text-[15px] text-[#18181B]">{{ $project->industry }}</dd>
                    </div>
                    <div class="py-3.5 last:pb-0 flex flex-col gap-1">
                        <dt class="font-mono text-[11px] uppercase tracking-[0.08em] text-[#71717A]">Services Delivered</dt>
                        <dd class="font-body text-[14.5px] leading-[1.55] text-[#3F3F46]">{{ $project->services_delivered ?: 'Digital Marketing & Creative Production' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    @php
        $fallbackVideoBackdrop = $project->video_poster_url ?: ($project->slides->first()?->image_url ?? $project->cover_url);
    @endphp
    <x-work.video-stage
        :company="$project->name"
        :industry="$project->industry"
        :video-src="$project->video_source_url ?? ''"
        :video-poster="$project->video_poster_url ?? ''"
        :fallback-img="$fallbackVideoBackdrop ?? ''" />

    <x-work.case-gallery :company="$project->name" :slides="$project->slides" />

    <!-- Section 4: Other Work Reference Cards (3:4 Cover Cards) -->
    <section class="bg-[#F7F6F4] py-16 lg:py-20 px-6 border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-8">
            <div class="flex items-end justify-between gap-4">
                <div class="flex flex-col gap-1">
                    <h2 class="font-display font-bold text-[28px] sm:text-[32px] leading-[1.15] tracking-[-0.025em] text-[#18181B]">
                        Other Work
                    </h2>
                </div>
                <div class="flex items-center gap-4 shrink-0">
                    <span class="font-mono text-[11px] text-[#52525B] lg:hidden">Swipe →</span>
                    <a href="{{ route('work.index') }}" class="font-mono text-[12.5px] font-semibold text-[#A83300] hover:text-[#18181B] inline-flex items-center gap-1 transition-colors">
                        <span>All Work</span>
                        <span class="material-symbols-outlined text-[16px]" aria-hidden="true">arrow_forward</span>
                    </a>
                </div>
            </div>

            <div class="flex lg:grid lg:grid-cols-4 gap-6 overflow-x-auto pb-3 snap-x snap-mandatory" aria-label="Other projects">
                @foreach ($otherProjects as $peer)
                    <x-work.cover-card :project="$peer" variant="carousel" />
                @endforeach
            </div>
        </div>
    </section>

    <x-section-cta
        variant="warm"
        title="Want to discuss a similar project?"
        description="Talk to our team about branding, social media, video shoots, websites, or performance ads."
        primary-label="Start A Project"
        :primary-href="route('contact.show')"
        secondary-label="Back To All Work"
        :secondary-href="route('work.index')" />

</x-layouts.app>
