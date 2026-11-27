@php
    $servicesList = [
        ['num' => '01', 'title' => 'Promotional Email Campaigns', 'desc' => 'Launch announcements, product spotlights, and limited-time offer blasts designed for fast inbox scanning.'],
        ['num' => '02', 'title' => 'Automated Drip Sequences', 'desc' => 'Scheduled multi-step education and follow-up flows triggered automatically by signup or inquiry tags.'],
        ['num' => '03', 'title' => 'Welcome & Onboarding Emails', 'desc' => 'Warm first-impression sequences introducing your brand, core products, and direct next steps.'],
        ['num' => '04', 'title' => 'Abandoned Cart Emails', 'desc' => 'Automated reminder sequences recovering left-behind checkout carts before buyers lose momentum.'],
        ['num' => '05', 'title' => 'Newsletter Design & Management', 'desc' => 'Consistent monthly brand digests featuring curated updates, product stories, and blog notes.'],
        ['num' => '06', 'title' => 'Re-engagement Campaigns', 'desc' => 'Win-back campaigns targeting dormant subscribers and past customers with timely incentives.'],
        ['num' => '07', 'title' => 'Transactional Email Setup', 'desc' => 'Clean, branded order confirmations, dispatch alerts, and invoice templates with verified sender auth.'],
        ['num' => '08', 'title' => 'Festival & Seasonal Campaigns', 'desc' => 'Dedicated campaign calendars timed around Indian festivals, clearance events, and peak gifting seasons.'],
    ];
    $tools = ['Mailchimp', 'Brevo', 'HubSpot', 'Klaviyo', 'Zoho Mail', 'OpenAI', '& More Tools'];
    $steps = [
        ['num' => '01', 'title' => 'Strategy & Audience Research', 'desc' => 'Map buyer lifecycle stages, key conversion triggers, and brand communication tone.'],
        ['num' => '02', 'title' => 'List Building & Segmentation', 'desc' => 'Organize opt-in subscribers by purchase history, interest tags, and engagement activity.'],
        ['num' => '03', 'title' => 'Template Design & Copywriting', 'desc' => 'Craft mobile-friendly responsive email layouts paired with crisp subject lines and clear CTAs.'],
        ['num' => '04', 'title' => 'Campaign Setup & Automation', 'desc' => 'Configure drip workflows, cart triggers, SPF/DKIM deliverability, and UTM tracking.'],
        ['num' => '05', 'title' => 'Testing & Launch', 'desc' => 'Verify rendering across iOS, Gmail, and desktop clients before releasing campaigns to live lists.'],
        ['num' => '06', 'title' => 'Reporting & Optimization', 'desc' => 'Review open rates, click-throughs, conversions, and list hygiene to lift retention every cycle.'],
    ];
@endphp
<x-layouts.app
    title="Email Marketing — Sphinix Marketing | Automated Flows & Retention"
    description="Promotional campaigns, automated drip sequences, abandoned cart recovery, newsletters, and transactional email setup by Sphinix Marketing."
    active-nav="services">

    <x-services.hero
        service-num="07"
        service-name="Email Marketing"
        headline="Reach the right people"
        accent-word="with emails that convert."
        description="Reach the right people at the right time with targeted, automated email campaigns that nurture leads, retain customers, and drive consistent revenue."
        cta-label="Build Email Flows"
        tools-summary="Mailchimp · Brevo · HubSpot · Klaviyo · Zoho Mail"
        image="images/svc_07_email.jpg"
        image-alt="Automated email drip sequences and customer retention workflow illustration" />

    <!-- Scope Index -->
    <section class="py-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">Retention &amp; Lifecycle</span>
                    <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]">
                        Eight email &amp; automation workflows.
                    </h2>
                </div>
                <p class="font-body text-[15px] text-[#52525B] max-w-md">
                    Turn first-time inquiries and store buyers into repeat customers without buying the same click twice.
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

    <!-- ROI Highlight & Platforms -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div data-reveal class="lg:col-span-5 bg-[#A83300] text-white p-8 md:p-10 flex flex-col gap-3">
                <span class="font-mono text-[11.5px] uppercase tracking-[0.08em] text-white/80">Industry Benchmark</span>
                <p class="font-display font-extrabold text-[40px] sm:text-[48px] leading-none tabular-nums">$36 : $1</p>
                <p class="font-body text-[15.5px] leading-[1.6] text-white/90">
                    Email marketing delivers an average ROI of $36 for every $1 spent when backed by clean segmentation and automated lifecycle flows.
                </p>
            </div>

            <div class="lg:col-span-7 flex flex-col gap-5">
                <h2 data-reveal class="font-headline text-headline-lg text-light-on-surface">
                    Built natively into your CRM and store stack.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    We build targeted, automated email campaigns across leading platforms—handling template coding, segmentation, warm-up, and ongoing optimization.
                </p>
                <div class="flex flex-wrap gap-2 pt-1">
                    @foreach ($tools as $tool)
                        <span class="px-3.5 py-2 bg-white border border-[#D4D0C8] font-mono text-[12.5px] text-[#18181B]">{{ $tool }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-services.process-band
        heading="The 6-step email marketing process."
        :steps="$steps" />

    <x-services.other-services current-slug="email" />

    <x-section-cta
        variant="warm"
        title="Ready to automate customer retention & drip sequences?"
        description="Talk to our team about welcome flows, cart recovery, and monthly campaign calendars."
        primary-label="Build Email Flows"
        :primary-href="route('contact.show')" />

</x-layouts.app>
