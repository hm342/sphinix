@props([
    'featured' => null,
    'entries' => null,
])
@php
    $entries = collect($entries ?? []);
    $featuredUrl = $featured?->target_url ?? route('insights.index');
    $featuredCover = $featured?->cover_url ?? asset('images/insight_featured_cover.jpg');
    $featuredAlt = $featured?->cover_alt ?? 'Warm directional sunlight across dark architectural desk and editorial proofs';
    $featuredBadge = $featured ? 'Featured · ' . $featured->category_label : 'Featured Note';
    $featuredReadTime = $featured?->read_time ?? '5 min read';
    $featuredTitle = $featured?->title ?? 'Notes & Insights from Sphinix Studio';
    $featuredExcerpt = $featured?->excerpt ?? 'Practical field notes documenting what actually changes ad spend efficiency, search indexing, and conversion follow-up.';
    $featuredCta = $featured?->cta_label ?: 'Read Featured Note';
@endphp
<section id="insights" class="py-20 lg:py-24 px-6 bg-light-surface-container-lowest border-b border-light-outline-variant">
    <div class="max-w-7xl mx-auto flex flex-col gap-12">

        <!-- Distinctive Editorial Header -->
        <div data-reveal class="flex flex-col gap-4 pb-8 border-b-2 border-[#18181B]">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <h2 class="font-display font-extrabold text-[32px] sm:text-[42px] lg:text-[48px] leading-[1.04] tracking-[-0.03em] text-[#18181B] text-balance max-w-[16ch]">
                    Notes &amp; Insights <span class="text-[#ec7a2d]">from the studio.</span>
                </h2>

                <div class="flex flex-col sm:flex-row lg:flex-col items-start sm:items-center lg:items-end justify-between gap-4 shrink-0">
                    <p class="font-body text-[15px] leading-[1.6] text-[#52525B] max-w-[42ch] lg:text-right">
                        Field notes documenting what actually changes ad spend efficiency, search indexing, and conversion follow-up.
                    </p>
                    <a href="{{ route('insights.index') }}" class="group/all inline-flex items-center gap-3 px-5 py-2.5 rounded-none border border-[#18181B] bg-white hover:bg-[#18181B] text-[#18181B] hover:text-white font-body font-semibold text-[13.5px] tracking-[0.01em] transition-colors duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                        <span>Read All Insights</span>
                        <span class="material-symbols-outlined text-[16px] text-[#ec7a2d] transition-transform duration-200 group-hover/all:translate-x-1" aria-hidden="true">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Two-Column Asymmetrical Journal Spread -->
        <div id="insights-spread" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-stretch">

            <!-- Left Column: Curated Editorial Article Index -->
            <div id="insights-list" class="lg:col-span-7 flex flex-col justify-between gap-6">
                <div class="flex flex-col divide-y divide-[#D4D0C8] border-b border-[#D4D0C8]">
                    @forelse ($entries as $entry)
                        @php
                            $badge = str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) . ' · ' . $entry->category_label;
                        @endphp
                        <a href="{{ $entry->target_url }}"
                           data-insight-key="{{ $entry->slug }}"
                           data-badge="{{ $badge }}"
                           data-read-time="{{ $entry->read_time }}"
                           data-title="{{ $entry->title }}"
                           data-desc="{{ $entry->excerpt }}"
                           data-cta="{{ $entry->cta_label ?: 'Read Note' }}"
                           data-img="{{ $entry->cover_url }}"
                           data-alt="{{ $entry->cover_alt ?: $entry->title }}"
                           class="journal-row group py-7 pl-4 sm:pl-5 pr-2 flex flex-col sm:flex-row sm:items-start justify-between gap-4 sm:gap-7 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                            <div class="journal-date-slot relative shrink-0 sm:w-[144px] sm:min-h-[106px] flex items-start">
                                <span class="journal-date-label pt-0.5 font-mono text-[12.5px] sm:text-[13px] tracking-[0.02em] text-[#52525B]">
                                    {{ $entry->formatted_date }}
                                </span>
                                <div class="journal-row-thumb hidden sm:block pointer-events-none border border-[#D4D0C8] bg-[#18181B]" aria-hidden="true">
                                    <img src="{{ $entry->cover_url }}" alt="" class="w-full h-full object-cover" loading="lazy" decoding="async">
                                </div>
                            </div>

                            <div class="flex flex-col gap-2.5 min-w-0 flex-1">
                                <h3 class="journal-title font-display font-bold text-[19px] sm:text-[21px] leading-[1.22] tracking-[-0.02em] text-[#18181B]">
                                    {{ $entry->title }}
                                </h3>
                                <p class="font-body text-[14.5px] leading-[1.58] text-[#52525B] max-w-[46ch]">
                                    {{ $entry->excerpt }}
                                </p>
                                <div class="pt-1 flex flex-wrap items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#F2F0EC] text-[#3F3F46] font-body font-medium text-[12px]">{{ $entry->category_label }}</span>
                                    <span class="px-3 py-1 rounded-full bg-[#F2F0EC] text-[#52525B] font-body font-medium text-[12px]">{{ $entry->read_time }}</span>
                                </div>
                            </div>

                            <span class="journal-arrow-box hidden sm:flex w-9 h-9 border border-[#D4D0C8] bg-white text-[#18181B] items-center justify-center shrink-0 mt-0.5" aria-hidden="true">
                                <span class="journal-arrow-icon material-symbols-outlined text-[17px]">north_east</span>
                            </span>
                        </a>
                    @empty
                        <div class="py-12 text-center font-body text-[15px] text-[#52525B]">
                            New field notes and studio insights will appear here shortly.
                        </div>
                    @endforelse
                </div>

                <!-- Editorial Footer Strip -->
                <div class="hidden lg:flex items-center justify-between gap-4 pt-2">
                    <span class="inline-flex items-center gap-2 font-mono text-[11px] uppercase tracking-[0.08em] text-[#71717A]">
                        <span class="w-1.5 h-1.5 bg-[#ec7a2d] inline-block" aria-hidden="true"></span>
                        Hover any entry to preview cover
                    </span>
                    <button type="button" id="insight-reset-featured" class="font-mono text-[11px] uppercase tracking-[0.08em] text-[#18181B] hover:text-[#A83300] border-b border-[#18181B] hover:border-[#A83300] pb-0.5 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                        Featured Cover
                    </button>
                </div>
            </div>

            <!-- Right Column: Monumental Featured Editorial Cover -->
            <div class="lg:col-span-5 flex">
                <a id="insight-featured-card"
                   href="{{ $featuredUrl }}"
                   data-default-href="{{ $featuredUrl }}"
                   data-featured-badge="{{ $featuredBadge }}"
                   data-featured-readtime="{{ $featuredReadTime }}"
                   data-featured-kicker="Editorial Cover"
                   data-featured-title="{{ $featuredTitle }}"
                   data-featured-desc="{{ $featuredExcerpt }}"
                   data-featured-cta="{{ $featuredCta }}"
                   data-featured-alt="{{ $featuredAlt }}"
                   class="group relative w-full min-h-[430px] sm:min-h-[490px] lg:min-h-[540px] bg-[#141416] border border-[#18181B] rounded-none overflow-hidden flex flex-col justify-between focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#ec7a2d] focus-visible:ring-offset-2">
                    <img id="insight-cover-primary" src="{{ $featuredCover }}" data-featured-src="{{ $featuredCover }}" alt="{{ $featuredAlt }}" class="journal-cover-img absolute inset-0 w-full h-full object-cover object-center opacity-100" loading="lazy" decoding="async">
                    <img id="insight-cover-secondary" src="{{ $featuredCover }}" alt="" aria-hidden="true" class="journal-cover-img absolute inset-0 w-full h-full object-cover object-center opacity-0 pointer-events-none" loading="lazy" decoding="async">

                    <div class="pointer-events-none absolute inset-0" style="background: linear-gradient(to top, rgba(16, 16, 18, 0.94) 0%, rgba(16, 16, 18, 0.66) 44%, rgba(16, 16, 18, 0.12) 78%, rgba(16, 16, 18, 0.34) 100%);"></div>

                    <div class="relative z-10 p-6 sm:p-8 flex items-center justify-between gap-4">
                        <span id="insight-stage-badge" class="px-3 py-1.5 rounded-none bg-[#ec7a2d] text-[#18181B] font-mono font-medium text-[11px] uppercase tracking-[0.1em]">
                            {{ $featuredBadge }}
                        </span>
                        <span id="insight-stage-readtime" class="font-mono text-[11.5px] tracking-[0.06em] uppercase text-white/90 bg-[#141416]/70 px-2.5 py-1 border border-white/15">
                            {{ $featuredReadTime }}
                        </span>
                    </div>

                    <div id="insight-stage-body" class="journal-stage-body relative z-10 p-6 sm:p-8 lg:p-10 flex flex-col gap-4">
                        <div class="flex items-center gap-3">
                            <span class="journal-accent-rule h-[2px] bg-[#ec7a2d] inline-block" aria-hidden="true"></span>
                            <span id="insight-stage-kicker" class="font-mono text-[11px] uppercase tracking-[0.12em] text-[#FF9F7A]">Editorial Cover</span>
                        </div>

                        <h3 id="insight-stage-title" class="font-display font-bold text-[24px] sm:text-[28px] lg:text-[31px] leading-[1.12] tracking-[-0.025em] text-white text-balance">
                            {{ $featuredTitle }}
                        </h3>

                        <p id="insight-stage-desc" class="font-body text-[15px] leading-[1.6] text-white/80 max-w-[44ch]">
                            {{ $featuredExcerpt }}
                        </p>

                        <div class="pt-4 mt-1 border-t border-white/20 flex items-center justify-between gap-4">
                            <span id="insight-stage-cta" class="font-body font-semibold text-[14px] tracking-[0.01em] text-white">
                                {{ $featuredCta }}
                            </span>
                            <span class="w-9 h-9 bg-[#ec7a2d] text-[#18181B] flex items-center justify-center shrink-0" aria-hidden="true">
                                <span class="journal-card-arrow material-symbols-outlined text-[18px]">arrow_forward</span>
                            </span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
