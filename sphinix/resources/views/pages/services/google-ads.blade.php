@php
    $campaignTypes = [
        ['num' => '01', 'title' => 'Search Ads', 'desc' => 'High-intent keyword targeting when buyers actively search for your products or services on Google.'],
        ['num' => '02', 'title' => 'Display Ads', 'desc' => 'Visual banner campaigns across news sites, blogs, and partner placements to keep your brand top-of-mind.'],
        ['num' => '03', 'title' => 'Video Ads', 'desc' => 'Skippable and in-stream YouTube video placements engineered to capture attention and prompt inquiries.'],
        ['num' => '04', 'title' => 'Gmail Ads', 'desc' => 'Targeted inbox placements reaching decision-makers directly inside Promotions and Social tabs.'],
        ['num' => '05', 'title' => 'App Installs Ads', 'desc' => 'Universal app campaigns built to grow Android and iOS installs with tracked cost-per-install.'],
        ['num' => '06', 'title' => 'Shopping Ads', 'desc' => 'Product feed ads showcasing prices, photos, and availability right at the top of commercial searches.'],
        ['num' => '07', 'title' => 'Remarketing Ads', 'desc' => 'Follow-up ads re-engaging past website visitors and cart abandoners until they convert.'],
        ['num' => '08', 'title' => 'Dynamic Ads', 'desc' => 'Automated ad headlines and landing pages matched dynamically to real-time user search queries.'],
    ];
    $benefits = [
        ['title' => 'Maximise Leads', 'desc' => 'Capture high-intent phone calls, consultation requests, and WhatsApp inquiries from active buyers.'],
        ['title' => 'Increase Online Sales', 'desc' => 'Scale Shopping and Search campaigns around high-margin products with tight ROAS monitoring.'],
        ['title' => 'Drive In-Store Foot Traffic', 'desc' => 'Connect local search intent and Google Maps extensions to nearby showroom or clinic visits.'],
        ['title' => 'Show Your Brand to More People', 'desc' => 'Expand reach across Search, Display, and YouTube with structured audience segmentation.'],
    ];
    $tools = ['Google Analytics', 'Google Ads', 'Adalysis', 'SpyFu', '& More Tools'];
    $steps = [
        ['num' => '01', 'title' => 'Goals Setting', 'desc' => 'Define lead cost targets, conversion tracking events, and geographic boundaries before launch.'],
        ['num' => '02', 'title' => 'Keyword Research', 'desc' => 'Build commercial keyword clusters alongside clean negative-keyword lists to block wasted spend.'],
        ['num' => '03', 'title' => 'Campaign Setup', 'desc' => 'Structure ad groups, responsive search copy, extensions, and conversion pixel verification.'],
        ['num' => '04', 'title' => 'Budget & Optimization', 'desc' => 'Adjust daily budgets, bid strategies, and search term exclusions based on live performance.'],
        ['num' => '05', 'title' => 'Monitoring & Reporting', 'desc' => 'Deliver regular campaign metrics covering clicks, cost per lead, conversions, and next actions.'],
    ];
@endphp
<x-layouts.app
    title="Google Ads Management — Sphinix Marketing | Performance Campaigns"
    description="Search, Display, Video, Gmail, App Installs, Shopping, Remarketing, and Dynamic Google Ads managed by Sphinix Marketing."
    active-nav="services">

    <x-services.hero
        service-num="03"
        service-name="Google Ads"
        headline="Google Ads built to"
        accent-word="stand out & convert."
        description="From crafting compelling ad campaigns to meticulous keyword targeting, we're here to ensure your business stands out in the digital landscape."
        cta-label="Request Ads Plan"
        :partner-badges="['Google Partner']"
        tools-summary="Google Ads · Analytics · Adalysis · SpyFu"
        image="images/svc_03_ads.jpg"
        image-alt="Google Ads performance targeting and conversion campaign illustration" />

    <!-- Ruled 2-Column Campaign Types Index -->
    <section class="py-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">Campaign Architecture</span>
                    <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]">
                        Eight Google Ads formats we manage.
                    </h2>
                </div>
                <p class="font-body text-[15px] text-[#52525B] max-w-md">
                    Every account is structured around buyer intent, clean negative lists, and measurable conversion actions.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 lg:gap-x-16 border-t border-[#D4D0C8]">
                @foreach ($campaignTypes as $idx => $item)
                    <div data-reveal style="--stagger: {{ $idx % 4 }};" class="py-7 border-b border-[#D4D0C8] flex flex-col gap-2">
                        <h3 class="font-title font-bold text-[21px] text-[#18181B]">{{ $item['title'] }}</h3>
                        <p class="font-body text-[15px] leading-[1.6] text-[#52525B]">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Business Outcomes + Technologies Stack -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-5 flex flex-col gap-6">
                <h2 data-reveal class="font-headline text-headline-lg text-light-on-surface">
                    Built around four commercial goals.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    Whether your priority is phone calls, online store orders, showroom foot traffic, or brand reach, campaigns align to one clear conversion outcome.
                </p>

                <div class="pt-2 border-t border-[#D4D0C8] flex flex-col gap-3">
                    <span class="font-mono text-[11.5px] uppercase tracking-[0.08em] text-[#52525B]">Technologies That We Use</span>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($tools as $tool)
                            <span class="px-3 py-1.5 bg-white border border-[#D4D0C8] font-mono text-[12px] text-[#18181B]">{{ $tool }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($benefits as $idx => $benefit)
                    <div data-reveal style="--stagger: {{ $idx }};" class="p-6 bg-white border border-light-outline-variant flex flex-col gap-2">
                        <h3 class="font-title text-title-md text-light-on-surface">{{ $benefit['title'] }}</h3>
                        <p class="font-body text-body-sm text-light-on-surface-variant">{{ $benefit['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-services.process-band
        heading="The 5-step Google Ads work process."
        :steps="$steps"
        note="(Note: Google Ads campaign process may vary depending on the specific goals and requirements.)" />

    <x-services.other-services current-slug="google-ads" />

    <x-section-cta
        variant="warm"
        title="Ready to tighten ad spend and grow leads?"
        description="Share your monthly budget range and target locations for a focused Google Ads plan."
        primary-label="Request Ads Plan"
        :primary-href="route('contact.show')" />

</x-layouts.app>
