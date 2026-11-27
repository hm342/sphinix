@php
    $pillars = [
        ['key' => 'why', 'label' => 'WHY', 'active' => true],
        ['key' => 'how', 'label' => 'HOW', 'active' => false],
        ['key' => 'what', 'label' => 'WHAT', 'active' => false],
        ['key' => 'who', 'label' => 'WHO', 'active' => false],
    ];
    $filterTabs = [
        ['key' => 'all', 'label' => 'All', 'href' => route('insights.index')],
        ['key' => 'ads', 'label' => 'Paid Ads', 'href' => '#category-ads'],
        ['key' => 'seo', 'label' => 'SEO & Organic', 'href' => '#category-seo'],
        ['key' => 'strategy', 'label' => 'Strategy & Systems', 'href' => '#category-strategy'],
    ];
@endphp
<x-layouts.app
    title="Insights & Articles — Sphinix Marketing | Growth Playbooks"
    description="Notes from Sphinix Marketing on Google Ads, Meta Ads, SEO, and WhatsApp business workflows."
    active-nav="insights"
    :header-solid="true"
    main-class="flex-1 relative">

    <!-- Zero-JS URL Fragment Filter Targets -->
    <span id="category-ads" class="filter-target" aria-hidden="true"></span>
    <span id="category-seo" class="filter-target" aria-hidden="true"></span>
    <span id="category-strategy" class="filter-target" aria-hidden="true"></span>

    <!-- Section 1: Orange Swiss Editorial Hero + Speech Bubble Card -->
    <section class="bg-[#ec7a2d] overflow-x-clip pt-14 sm:pt-16 pb-14 lg:pt-20 lg:pb-20 px-6 sm:px-10">
        <div class="max-w-[1160px] mx-auto">
            <h1 class="sr-only">Sphinix Marketing Insights</h1>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                <div id="pillar-stack" class="lg:col-span-6 flex flex-col items-start gap-1 sm:gap-2 min-w-0" role="group" aria-label="Insights focus areas">
                    @foreach ($pillars as $pillar)
                        <button type="button"
                                data-pillar="{{ $pillar['key'] }}"
                                aria-pressed="{{ $pillar['active'] ? 'true' : 'false' }}"
                                class="pillar-word {{ $pillar['active'] ? 'is-active' : '' }} text-left uppercase select-none focus-visible:outline-none">
                            {{ $pillar['label'] }}
                        </button>
                    @endforeach
                </div>

                <div class="lg:col-span-6 lg:pl-6">
                    <div class="pillar-speech-card relative bg-white text-[#111111] w-full max-w-[520px] lg:ml-auto min-h-[300px] sm:min-h-[380px] lg:min-h-[430px] pt-9 px-8 pb-10 sm:pt-12 sm:px-11 sm:pb-12 lg:pt-14 lg:px-14 lg:pb-14 flex flex-col justify-start">
                        <span id="pillar-pointer" class="hidden lg:block absolute -left-[19px]" style="top: 13%;" aria-hidden="true"></span>
                        <p id="pillar-desc" class="font-body text-[17px] sm:text-[18.5px] lg:text-[19.5px] leading-[1.68] text-[#111111] max-w-[36ch]" aria-live="polite">
                            “We publish <strong>practical field notes</strong> instead of agency buzzwords—documenting what actually changes <strong>ad spend efficiency, search indexing, and conversion follow-up</strong>.”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Centered Title, Underlined Categories & Row List -->
    <section class="py-16 lg:py-20 px-6 bg-[#FFFFFF]">
        <div class="max-w-5xl mx-auto flex flex-col gap-8">
            <div class="flex flex-col items-center gap-6 text-center">
                <h2 class="font-display font-bold text-[34px] sm:text-[42px] leading-[1.1] tracking-[-0.028em] text-[#18181B]">
                    Latest Insights
                </h2>

                <nav id="blog-filters" aria-label="Filter articles by category" class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3">
                    @foreach ($filterTabs as $i => $tab)
                        <a href="{{ $tab['href'] }}"
                           data-blog-filter="{{ $tab['key'] }}"
                           @if($i === 0) aria-current="page" @endif
                           class="insight-pill pb-1.5 border-b-2 {{ $i === 0 ? 'border-[#A83300] text-[#A83300]' : 'border-transparent text-[#18181B] hover:text-[#A83300]' }} font-body font-bold text-[15px] transition-colors duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#A83300] focus-visible:ring-offset-4">
                            {{ $tab['label'] }}
                        </a>
                    @endforeach
                </nav>
            </div>

            <!-- Horizontal Insights Row List -->
            <div id="articles-grid" class="flex flex-col divide-y divide-[#D4D0C8] border-t border-b border-[#D4D0C8]" aria-live="polite">
                @forelse ($articles as $article)
                    <div data-category="{{ $article->category }}" class="article-card insight-row py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 sm:gap-8">
                        <div class="flex flex-col gap-1.5 min-w-0">
                            <h3 class="insight-row-title font-display font-bold text-[19px] sm:text-[21px] leading-[1.3]">
                                <a href="{{ $article->target_url }}" class="hover:underline">{{ $article->title }}</a>
                            </h3>
                            <p class="font-body text-[14px] text-[#52525B]">
                                {{ $article->category_label }} • {{ $article->author_name }} • {{ $article->formatted_date }} • {{ $article->read_time }}
                            </p>
                        </div>
                        <a href="{{ $article->target_url }}" class="inline-flex items-center justify-center gap-3 px-5 py-2.5 rounded-full bg-[#E85D2A] hover:bg-[#18181B] text-[#18181B] hover:text-white font-body font-semibold text-[14px] transition-colors shrink-0 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#A83300] focus-visible:ring-offset-2">
                            <span>Read Article</span>
                            <span class="w-5 h-5 rounded-full border border-current flex items-center justify-center" aria-hidden="true">
                                <span class="material-symbols-outlined text-[13px]">arrow_forward</span>
                            </span>
                        </a>
                    </div>
                @empty
                    <p class="py-10 text-center font-body text-[15px] text-[#52525B]">No insights published yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <x-section-cta
        variant="dark"
        title="Want this applied to your account?"
        primary-label="Book a call"
        :primary-href="route('contact.show')" />

</x-layouts.app>
