@php
    $areas = [
        ['num' => '01', 'title' => 'Technical SEO', 'desc' => 'Page speed fixes, site architecture, crawl error cleanup, XML sitemaps, schema markup, and canonical tags.'],
        ['num' => '02', 'title' => 'On-Page SEO', 'desc' => 'Keyword mapping, titles, meta descriptions, heading structure (H1-H3), image weight cleanup, and internal links.'],
        ['num' => '03', 'title' => 'Off-Page Backlinks', 'desc' => 'Directory and niche citations, guest articles, and outreach for links from relevant industry websites.'],
        ['num' => '04', 'title' => 'Local SEO & Maps', 'desc' => 'Google Business Profile setup, consistent address/phone (NAP) citations, local photos, and review workflows.'],
        ['num' => '05', 'title' => 'E-Commerce SEO', 'desc' => 'Category page cleanup, product title structure, breadcrumb links, and parameter control for large catalogs.'],
        ['num' => '06', 'title' => 'Mobile App SEO (ASO)', 'desc' => 'Google Play and Apple App Store keyword placement, store screenshots, and app description updates.'],
    ];
    $steps = [
        ['num' => '01', 'title' => 'Site Audit & Analysis', 'desc' => 'Check indexing, page speed, mobile layout, and crawl blockers.'],
        ['num' => '02', 'title' => 'Keyword Research', 'desc' => 'Find search terms with buyer intent and spot competitor gaps.'],
        ['num' => '03', 'title' => 'On-Page & Tech Fixes', 'desc' => 'Update titles, page copy, schema tags, and load times.'],
        ['num' => '04', 'title' => 'Content & Backlinks', 'desc' => 'Publish helpful pages and earn links from relevant websites.'],
        ['num' => '05', 'title' => 'Ongoing Updates', 'desc' => 'Monitor rankings, adapt to search updates, and expand target terms.'],
    ];
    $benefits = [
        ['title' => 'Local Visibility', 'desc' => 'Show up in Google Search and Maps when nearby buyers look for your service.'],
        ['title' => 'Commercial Rankings', 'desc' => 'Focus effort on product and service terms people actually search before buying.'],
        ['title' => 'Cleaner Site Health', 'desc' => 'Fix broken links, slow pages, and indexing gaps that block search engines.'],
        ['title' => 'Monthly Reporting', 'desc' => 'Clear Search Console and Analytics numbers showing clicks, queries, and leads.'],
    ];
@endphp
<x-layouts.app
    title="SEO Services — Sphinix Marketing | Search Engine Optimization"
    description="Technical SEO, on-page SEO, off-page authority link building, local SEO, eCommerce SEO, and Mobile App Store Optimization (ASO)."
    active-nav="services">

    <section class="bg-[#F7F6F4] pt-32 pb-16 lg:pt-36 lg:pb-20 px-6 border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <div class="lg:col-span-7 flex flex-col gap-6">
                <nav aria-label="Breadcrumb" class="flex items-center gap-2 font-mono text-[12px] text-[#71717A]">
                    <a href="{{ route('home') }}" class="hover:text-[#A83300]">Home</a>
                    <span>/</span>
                    <a href="{{ route('services.index') }}" class="hover:text-[#A83300]">Services</a>
                    <span>/</span>
                    <span class="text-[#18181B]">SEO</span>
                </nav>

                <h1 class="font-display font-extrabold text-[34px] sm:text-[44px] lg:text-[50px] leading-[1.06] tracking-[-0.028em] text-[#18181B] text-balance">
                    SEO built for <span class="text-[#E85D2A]">steady organic traffic.</span>
                </h1>

                <p class="font-body text-[17px] leading-[1.6] text-[#52525B] max-w-[52ch]">
                    We fix technical site errors, optimize page structure and local Google Maps profiles, and build relevant backlinks so buyers find you in search.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[15px] transition-colors">
                        <span>Request SEO Review</span>
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                    </a>
                    <span class="font-mono text-[12px] text-[#52525B]">Semrush · Ahrefs · Search Console · [CONFIRM PARTNER BADGES]</span>
                </div>
            </div>

            <div class="lg:col-span-5 flex items-center justify-center">
                <img src="{{ asset('images/svc_02_seo.jpg') }}" alt="Search engine optimization and organic rankings illustration" class="w-full max-w-[440px] h-auto object-contain" style="mix-blend-mode: multiply; filter: brightness(1.03) contrast(1.03);" loading="eager" decoding="async">
            </div>
        </div>
    </section>

    <!-- Ruled 2-Column SEO Scope Index -->
    <section class="py-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <h2 class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B] text-balance">
                        Six areas we cover in <span class="text-[#E85D2A]">organic search.</span>
                    </h2>
                </div>
                <p class="font-body text-[15px] text-[#52525B] max-w-md">
                    Scope adjusts by site size, industry competition, and technical state.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 lg:gap-x-16 border-t border-[#D4D0C8]">
                @foreach ($areas as $area)
                    <div class="py-7 border-b border-[#D4D0C8] flex flex-col gap-2.5">
                        <span class="font-mono text-[12px] font-semibold text-[#A83300]">{{ $area['num'] }}</span>
                        <h3 class="font-title font-bold text-[21px] text-[#18181B]">{{ $area['title'] }}</h3>
                        <p class="font-body text-[15px] leading-[1.6] text-[#52525B]">{{ $area['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5-Step Process Section -->
    <section class="py-20 px-6 bg-light-surface-container-lowest border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                    The 5-step SEO workflow.
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach ($steps as $idx => $step)
                    <div data-reveal style="--stagger: {{ $idx }};" class="p-6 rounded-lg bg-light-surface border border-light-outline-variant flex flex-col gap-3">
                        <span class="font-display font-extrabold text-display-lg text-brand-orange">{{ $step['num'] }}</span>
                        <h3 class="font-title text-title-md text-light-on-surface">{{ $step['title'] }}</h3>
                        <p class="font-body text-body-sm text-light-on-surface-variant">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Expected Benefits -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 flex flex-col gap-4">
                <h2 class="font-headline text-headline-lg text-light-on-surface">What organic search is built to improve.</h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    Search traffic compounds slowly and lowers how much you have to spend on paid clicks over time. [ADD REAL CLIENT SEO RESULT WHEN AVAILABLE]
                </p>
            </div>

            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($benefits as $benefit)
                    <div class="p-6 rounded bg-light-surface-container-lowest border border-light-outline-variant flex flex-col gap-1.5">
                        <h3 class="font-title text-title-md text-light-on-surface">{{ $benefit['title'] }}</h3>
                        <p class="font-body text-body-sm text-light-on-surface-variant">{{ $benefit['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-section-cta
        variant="dark"
        title="Want us to check your site’s SEO? [CONFIRM IF AUDIT IS FREE]"
        description="Send your website URL and we will review indexing, page speed, and search gaps."
        primary-label="Request SEO Review"
        :primary-href="route('contact.show')" />

</x-layouts.app>
