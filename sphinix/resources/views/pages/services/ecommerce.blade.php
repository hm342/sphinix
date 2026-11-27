@php
    $servicesList = [
        ['num' => '01', 'title' => 'Account Setup & Approval', 'desc' => 'Seller verification, brand registry assistance, tax/compliance setup, and category approvals across marketplaces.'],
        ['num' => '02', 'title' => 'Catalog & Category Management', 'desc' => 'Clean SKU structuring, variation families, pricing sync, and inventory hygiene across channels.'],
        ['num' => '03', 'title' => 'Product Listing & Optimization', 'desc' => 'Benefit-led product titles, scannable bullet points, and high-resolution lifestyle & infographic slides.'],
        ['num' => '04', 'title' => 'Keyword Research & SEO', 'desc' => 'Buyer search-term research and backend search tag structuring so products rank organically in marketplace search.'],
        ['num' => '05', 'title' => 'A+ Content & Enhanced Listings', 'desc' => 'Rich visual comparison charts, brand story modules, and deep feature banners that boost detail-page conversion.'],
        ['num' => '06', 'title' => 'Brand Store Design & Setup', 'desc' => 'Dedicated multi-category marketplace storefronts designed to showcase your full product line clearly.'],
        ['num' => '07', 'title' => 'Sponsored Ads & Promotions', 'desc' => 'Sponsored Product, Sponsored Brand, lightning deals, and coupon campaigns calibrated for profitable ACOS.'],
        ['num' => '08', 'title' => 'Account & Operations Management', 'desc' => 'Day-to-day account health checks, suppressed listing fixes, claim support, and performance reviews.'],
    ];
    $marketplaces = ['Amazon', 'Flipkart', 'JioMart', 'Meesho', 'Etsy', 'Nykaa', '& More Marketplaces'];
    $steps = [
        ['num' => '01', 'title' => 'Account Setup & Audit', 'desc' => 'Review current catalog structure, suppressed SKUs, brand approvals, and account health metrics.'],
        ['num' => '02', 'title' => 'Product Research & Listing', 'desc' => 'Map high-volume marketplace keywords and publish clean titles, attributes, and backend search terms.'],
        ['num' => '03', 'title' => 'Content & Image Optimization', 'desc' => 'Create infographic product slides, A+ comparison modules, and branded storefront layouts.'],
        ['num' => '04', 'title' => 'Launch & Monitoring', 'desc' => 'Activate Sponsored Product campaigns, promotional coupons, and inventory pacing checks.'],
        ['num' => '05', 'title' => 'Reporting & Growth', 'desc' => 'Track conversion rate, ad spend efficiency (ACOS/ROAS), and expand winning SKUs across portals.'],
    ];
@endphp
<x-layouts.app
    title="E-commerce Management — Sphinix Marketing | Marketplace Growth"
    description="End-to-end e-commerce management on Amazon, Flipkart, JioMart, Meesho, Etsy, and Nykaa: catalogs, A+ content, brand stores, and sponsored ads."
    active-nav="services">

    <x-services.hero
        service-num="06"
        service-name="E-Commerce Management"
        headline="Marketplace growth managed"
        accent-word="end to end."
        description="We manage your online stores end to end so you can focus on growing your business."
        cta-label="Scale Your Store"
        tools-summary="Amazon · Flipkart · JioMart · Meesho · Etsy · Nykaa"
        image="images/svc_06_ecommerce.jpg"
        image-alt="E-commerce catalog management, A+ content, and marketplace growth illustration" />

    <!-- Deliverables -->
    <section class="py-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">Marketplace Operations</span>
                    <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]">
                        Eight pillars of marketplace management.
                    </h2>
                </div>
                <p class="font-body text-[15px] text-[#52525B] max-w-md">
                    Selling online is more than just listing products—we optimize every aspect of your presence to maximize visibility and revenue.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 lg:gap-x-16 border-t border-[#D4D0C8]">
                @foreach ($servicesList as $idx => $item)
                    <div data-reveal style="--stagger: {{ $idx % 4 }};" class="py-7 border-b border-[#D4D0C8] flex flex-col gap-2">
                        <span class="font-mono text-[12px] font-semibold text-[#A83300]">{{ $item['num'] }}</span>
                        <h3 class="font-title font-bold text-[21px] text-[#18181B]">{{ $item['title'] }}</h3>
                        <p class="font-body text-[15px] leading-[1.6] text-[#52525B]">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Marketplaces Band -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 flex flex-col gap-4">
                <h2 data-reveal class="font-headline text-headline-lg text-light-on-surface">
                    Marketplaces we work on.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    From onboarding and brand store setup to sponsored keyword bidding across major Indian and global portals.
                </p>
            </div>

            <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-3">
                @foreach ($marketplaces as $idx => $mp)
                    <div data-reveal style="--stagger: {{ $idx }};" class="p-4 bg-white border border-light-outline-variant font-title font-semibold text-[15px] text-[#18181B] flex items-center gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-[#E85D2A] shrink-0" aria-hidden="true"></span>
                        <span>{{ $mp }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-services.process-band
        heading="The 5-step marketplace growth process."
        :steps="$steps"
        note="(Note: Listing and optimization process may vary depending on marketplace policies and product category requirements.)" />

    <x-services.other-services current-slug="ecommerce" />

    <x-section-cta
        variant="warm"
        title="Want to improve marketplace rankings and conversions?"
        description="Share your seller storefront or SKU count and our e-commerce team will map the next steps."
        primary-label="Scale Your Store"
        :primary-href="route('contact.show')" />

</x-layouts.app>
