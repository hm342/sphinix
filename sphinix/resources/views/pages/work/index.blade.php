@php
    $filters = [
        ['key' => 'all', 'label' => 'All'],
        ['key' => 'iot', 'label' => 'Tech & Product'],
        ['key' => 'healthcare', 'label' => 'Healthcare & Services'],
        ['key' => 'ecommerce', 'label' => 'Retail & E-Commerce'],
        ['key' => 'industrial', 'label' => 'Manufacturing & Trade'],
        ['key' => 'jewelry', 'label' => 'Jewelry & Lifestyle'],
    ];
@endphp
<x-layouts.app
    title="Work & Clients — Sphinix Marketing | 150+ Brand Partners"
    description="Work and case studies from Sphinix Marketing across 150+ clients worldwide: aabo., WeConnect Care, Saurashtra Group, Veer Jewellers, Kothari Agencies, and Riyom Jewels."
    active-nav="work"
    wrapper-class="min-h-[1024px] flex flex-col">

    <!-- Minimal Editorial Hero + Centered Underlined Category Bar -->
    <section class="bg-[#FFFFFF] pt-28 sm:pt-32 pb-8 lg:pt-36 lg:pb-10 px-6">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 items-start">
                <div class="lg:col-span-5">
                    <h1 class="hero-pose-1 font-display font-extrabold text-[38px] sm:text-[46px] lg:text-[52px] leading-[1.06] tracking-[-0.03em] text-[#18181B]">
                        Selected<br><span class="text-[#E85D2A]">Work</span>
                    </h1>
                </div>
                <p class="hero-pose-2 lg:col-span-6 lg:col-start-7 font-body text-[15.5px] leading-[1.7] text-[#3F3F46] max-w-[54ch]">
                    Since 2017, Sphinix Marketing has partnered with 150+ businesses across 15+ industries on campaigns, websites, social media, and video production. Browse by category or click any project to open the case study, video, and gallery.
                </p>
            </div>

            <!-- Centered Clean Text Filter Tabs -->
            <div id="work-filter-tabs" class="pt-2 flex flex-wrap items-center justify-center gap-x-7 gap-y-3" role="tablist" aria-label="Filter projects by category">
                @foreach ($filters as $i => $tab)
                    <button type="button"
                            role="tab"
                            aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                            aria-controls="projects-grid"
                            data-filter="{{ $tab['key'] }}"
                            class="filter-btn pb-1 border-b-2 {{ $i === 0 ? 'border-[#A83300] text-[#A83300]' : 'border-transparent text-[#18181B] hover:text-[#A83300]' }} font-body font-bold text-[12.5px] tracking-[0.04em] uppercase transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A] focus-visible:ring-offset-4">
                        {{ $tab['label'] }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4-In-A-Row 3:4 Sharp Rectangle Cover Image Cards -->
    <section class="pt-4 pb-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto">
            <div id="projects-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" aria-live="polite">
                @foreach ($caseStudies as $idx => $project)
                    <article data-category="{{ $project->categories }}" data-reveal style="--stagger: {{ $idx % 4 }};" class="project-card">
                        <x-work.cover-card :project="$project" :eager="$idx < 4" />
                    </article>
                @endforeach
            </div>
            <p id="projects-empty" class="hidden py-12 text-center font-body text-[15px] text-[#52525B]">
                No projects match this category yet.
            </p>
        </div>
    </section>

    <!-- Ruled Client Family Directory (+100 More) -->
    <section class="py-20 px-6 bg-[#F7F6F4] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <h2 class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]">
                        150+ businesses in our <span class="text-[#E85D2A]">client family.</span>
                    </h2>
                </div>
                <span class="font-mono text-[12px] text-[#52525B]">+100 More Brand Partners</span>
            </div>

            <ul class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-x-6 border-t border-[#D4D0C8]">
                @foreach ($clients as $client)
                    <li class="py-4 border-b border-[#D4D0C8] font-body font-semibold text-[15px] text-[#18181B] flex items-center gap-2.5">
                        @if ($client->logo_url)
                            <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" class="h-5 w-auto max-w-[36px] object-contain shrink-0" loading="lazy">
                        @endif
                        @if ($client->case_study_slug)
                            <a href="{{ route('work.show', $client->case_study_slug) }}" class="hover:text-[#A83300] truncate">{{ $client->name }}</a>
                        @else
                            <span class="truncate">{{ $client->name }}</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-section-cta
        variant="warm"
        title="Want to discuss a similar project?"
        description="Send us your brief or talk with our Bhavnagar team about campaigns, branding, or software."
        primary-label="Start A Project"
        :primary-href="route('contact.show')" />

</x-layouts.app>
