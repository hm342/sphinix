@php
    $capabilities = [
        ['num' => '01', 'title' => 'Responsive Web Design', 'desc' => 'Fast, accessible, mobile-first business websites engineered to represent your brand cleanly on every screen size.'],
        ['num' => '02', 'title' => 'Mobile App Development', 'desc' => 'Cross-platform and native Android & iOS applications built for customer bookings, catalogs, and operations.'],
        ['num' => '03', 'title' => 'eCommerce Development', 'desc' => 'Custom Shopify and WooCommerce storefronts with clean checkout flows, payment gateways, and catalog search.'],
        ['num' => '04', 'title' => 'Software Development', 'desc' => 'In-house business dashboards, CRM portals, inventory tools, and SaaS platforms built around real team workflows.'],
        ['num' => '05', 'title' => 'Front-End & Back-End Development', 'desc' => 'Modern UI interfaces paired with structured databases, secure APIs, and reliable server deployment.'],
        ['num' => '06', 'title' => 'Custom Development', 'desc' => 'Tailored integrations linking your website, WhatsApp Business API (ChatBox 360), payment gateways, and ERP systems.'],
        ['num' => '07', 'title' => 'Game Development', 'desc' => 'Interactive branded mini-games and engaging gamified customer experiences built for mobile and web.'],
    ];
    $technologies = ['WordPress', 'Angular', 'Java', 'Bootstrap', 'Node.js', 'Firebase', 'Shopify', 'Flutter', 'PHP', 'React', 'AWS', '& More Technologies'];
    $steps = [
        ['num' => '01', 'title' => 'Planning & Analysis', 'desc' => 'Scope user flows, data structures, integration endpoints, and milestone timelines upfront.'],
        ['num' => '02', 'title' => 'Designing & Content Creation', 'desc' => 'Establish clean wireframes, UI components, typography, and structured page copy.'],
        ['num' => '03', 'title' => 'Development & Testing', 'desc' => 'Build clean front-end and back-end code with responsive, cross-browser, and security QA checks.'],
        ['num' => '04', 'title' => 'Deployment & Maintenance', 'desc' => 'Launch on production cloud hosting with backups, monitoring, and ongoing technical support.'],
    ];
@endphp
<x-layouts.app
    title="Web & App Development — Sphinix Marketing | Websites, Apps & Software"
    description="Responsive web design, mobile app development, e-commerce builds, custom software, and full-stack engineering by Sphinix Marketing."
    active-nav="services">

    <x-services.hero
        service-num="08"
        service-name="Web & App Development"
        headline="Websites, apps & software"
        accent-word="engineered to scale."
        description="Our client-centric approach, technical expertise, and commitment to excellence set us apart. Choose Sphinix Marketing for a seamless and impactful development solution that drives your business forward."
        cta-label="Start a Build"
        tools-summary="React · Node.js · PHP · Flutter · Shopify · WordPress · AWS"
        image="images/svc_08_dev.jpg"
        image-alt="Responsive website, mobile app, and custom software engineering illustration" />

    <!-- Engineering Capabilities -->
    <section class="py-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">Web &amp; Product Engineering</span>
                    <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]">
                        Seven development capabilities in-house.
                    </h2>
                </div>
                <p class="font-body text-[15px] text-[#52525B] max-w-md">
                    Built by the same engineering team behind Sphinix’s own SaaS products—ChatBox 360 Suite and Social 360 Suite.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 lg:gap-x-16 border-t border-[#D4D0C8]">
                @foreach ($capabilities as $idx => $item)
                    <div data-reveal style="--stagger: {{ $idx % 4 }};" class="py-7 border-b border-[#D4D0C8] flex flex-col gap-2">
                        <h3 class="font-title font-bold text-[21px] text-[#18181B]">{{ $item['title'] }}</h3>
                        <p class="font-body text-[15px] leading-[1.6] text-[#52525B]">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 flex flex-col gap-4">
                <h2 data-reveal class="font-headline text-headline-lg text-light-on-surface">
                    Technologies that we build with.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    We select the right stack for your maintainability and growth goals—whether a fast marketing site, Shopify storefront, Flutter mobile app, or custom Laravel/Node platform.
                </p>
            </div>

            <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-4 gap-3">
                @foreach ($technologies as $idx => $tech)
                    <div data-reveal style="--stagger: {{ $idx % 4 }};" class="p-4 bg-white border border-light-outline-variant font-mono text-[13px] font-medium text-[#18181B] flex items-center">
                        <span>{{ $tech }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-services.process-band
        heading="The 4-step development workflow."
        :steps="$steps"
        note="(Note: Development process may vary depending on the specific goals, industry, and requirements.)" />

    <x-services.other-services current-slug="dev" />

    <x-section-cta
        variant="warm"
        title="Planning a website, mobile app, or custom software build?"
        description="Tell our engineers what you need and we will outline architecture, timeline, and budget."
        primary-label="Start a Build"
        :primary-href="route('contact.show')" />

</x-layouts.app>
