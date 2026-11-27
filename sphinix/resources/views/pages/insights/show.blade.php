<x-layouts.app
    :title="$insight->title . ' — Sphinix Marketing Insights'"
    :description="$insight->excerpt"
    active-nav="insights"
    :header-solid="true"
    main-class="flex-1 bg-[#FFFFFF]">

    <article class="pt-12 sm:pt-16 pb-16 lg:pb-20 px-6 border-b border-[#E4E4E7]">
        <div class="max-w-4xl mx-auto flex flex-col gap-8">
            <nav aria-label="Breadcrumb" class="flex flex-wrap items-center gap-2 font-mono text-[12px] text-[#52525B]">
                <a href="{{ route('home') }}" class="hover:text-[#A83300]">Home</a>
                <span>/</span>
                <a href="{{ route('insights.index') }}" class="hover:text-[#A83300]">Insights</a>
                <span>/</span>
                <span class="text-[#18181B]">{{ $insight->category_label }}</span>
            </nav>

            <header class="flex flex-col gap-4">
                <div class="flex flex-wrap items-center gap-3 font-mono text-[12px] text-[#52525B]">
                    <span class="px-3 py-1 bg-[#ec7a2d] text-[#18181B] font-semibold uppercase tracking-[0.06em]">{{ $insight->category_label }}</span>
                    <span>{{ $insight->formatted_date }}</span>
                    <span>·</span>
                    <span>{{ $insight->read_time }}</span>
                    <span>·</span>
                    <span>{{ $insight->author_name }}</span>
                </div>

                <h1 class="font-display font-extrabold text-[32px] sm:text-[42px] lg:text-[48px] leading-[1.08] tracking-[-0.028em] text-[#18181B] text-balance">
                    {{ $insight->title }}
                </h1>

                <p class="font-body text-[17px] sm:text-[18.5px] leading-[1.6] text-[#3F3F46] max-w-[62ch]">
                    {{ $insight->excerpt }}
                </p>
            </header>

            @if ($insight->cover_url)
                <div class="aspect-[16/9] w-full overflow-hidden border border-[#18181B] bg-[#141416]">
                    <img src="{{ $insight->cover_url }}" alt="{{ $insight->cover_alt ?: $insight->title }}" class="w-full h-full object-cover" loading="eager">
                </div>
            @endif

            <div class="pt-4 border-t border-[#D4D0C8] flex flex-col gap-5 font-body text-[16.5px] leading-[1.78] text-[#27272A]">
                @foreach (preg_split('/\R{2,}/', trim((string) ($insight->body ?: $insight->excerpt))) as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </article>

    @if ($relatedInsights->isNotEmpty())
        <section class="py-16 px-6 bg-[#F7F6F4] border-b border-[#E4E4E7]">
            <div class="max-w-6xl mx-auto flex flex-col gap-8">
                <div class="flex items-end justify-between gap-4">
                    <h2 class="font-display font-bold text-[26px] sm:text-[32px] tracking-[-0.02em] text-[#18181B]">
                        More Notes &amp; Insights
                    </h2>
                    <a href="{{ route('insights.index') }}" class="font-mono text-[12.5px] font-semibold text-[#A83300] hover:underline">All Insights →</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedInsights as $rel)
                        <a href="{{ $rel->target_url }}" class="bg-white border border-[#E4E4E7] hover:border-[#ec7a2d] p-6 flex flex-col justify-between gap-4 transition-colors">
                            <div class="flex flex-col gap-2">
                                <span class="font-mono text-[11px] uppercase tracking-[0.06em] text-[#A83300]">{{ $rel->category_label }} · {{ $rel->formatted_date }}</span>
                                <h3 class="font-display font-bold text-[19px] leading-[1.25] text-[#18181B]">{{ $rel->title }}</h3>
                                <p class="font-body text-[14px] text-[#52525B] line-clamp-2">{{ $rel->excerpt }}</p>
                            </div>
                            <span class="font-mono text-[12px] font-semibold text-[#18181B]">Read Note →</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-section-cta
        variant="dark"
        title="Want to apply this playbook to your business?"
        primary-label="Talk to Our Team"
        :primary-href="route('contact.show')" />

</x-layouts.app>
