@php
    $chatboxModules = [
        ['icon' => 'contacts', 'title' => 'Built-in CRM', 'desc' => 'Manage inbound leads, segment contacts by tags, and track customer follow-up pipelines automatically.'],
        ['icon' => 'shopping_bag', 'title' => 'Order Management', 'desc' => 'Accept customer orders, display live product catalogs, and dispatch automated shipping tracking via WhatsApp.'],
        ['icon' => 'support_agent', 'title' => 'Helpdesk & Team Inbox', 'desc' => 'Handle all customer queries from one unified multi-agent dashboard with ticket assignment and collision detection.'],
        ['icon' => 'calendar_month', 'title' => 'Appointments & Tasks', 'desc' => 'Book client appointments, send automated calendar reminders, and assign internal follow-up tasks to staff.'],
        ['icon' => 'smart_toy', 'title' => 'SmartBot & 24/7 AI Agent', 'desc' => 'Build custom conversational chatbots that answer customer questions, qualify intent, and capture leads 24/7.'],
        ['icon' => 'hub', 'title' => 'Connector & Integrations', 'desc' => 'Connects with ChatGPT/OpenAI, Shopify, WooCommerce, Razorpay, PayU, Google Sheets, and CRM webhooks. [CONFIRM INTEGRATIONS LIST]'],
    ];
    $aajStats = [
        ['val' => '15k+', 'title' => 'Images & Videos', 'desc' => 'Extensive library of high-definition festival creatives, trending quotes, and animated video posts.'],
        ['val' => '150+', 'title' => 'Business Categories', 'desc' => 'Custom frames tailored for hospitals, jewelry, retail, schools, real estate, restaurants, and SMBs.'],
        ['val' => '1-Tap', 'title' => 'Custom Business Frames', 'desc' => 'Automatically overlay your company logo, phone number, address, and social handles on every creative.'],
        ['val' => 'Free', 'title' => 'Digital Visiting Card', 'desc' => 'Generate shareable digital business cards with clickable call, WhatsApp, and social buttons.'],
    ];
    $socialModules = [
        ['tag' => '01 · AI Studio', 'title' => 'AI Content Studio', 'desc' => 'Draft captions, hashtag sets, and post copy for each social channel.'],
        ['tag' => '02 · Publishing', 'title' => 'Multi-Platform Publishing', 'desc' => 'Simultaneously publish posts, reels, and carousels across Instagram, Facebook, LinkedIn, X, and Pinterest.'],
        ['tag' => '03 · Planning', 'title' => 'Visual Social Calendar', 'desc' => 'Drag-and-drop interactive calendar to plan your weekly and monthly social media campaigns at a glance.'],
        ['tag' => '04 · Teams', 'title' => 'Team Collaboration', 'desc' => 'Role-based approval workflows, client feedback notes, and automated performance analytics exports.'],
    ];
@endphp
<x-layouts.app
    title="Software Products — ChatBox 360 Suite, Aaj Ka Graphic, Social 360 | Sphinix Marketing"
    description="Proprietary SaaS and automation tools built by Sphinix Marketing: ChatBox 360 Suite WhatsApp Business API, Aaj Ka Graphic festival post maker, and Social 360 Suite."
    active-nav="products">

    <section class="bg-[#F7F6F4] pt-32 pb-14 lg:pt-36 lg:pb-16 px-6 border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-end">
                <h1 class="lg:col-span-7 font-display font-extrabold text-[36px] sm:text-[46px] lg:text-[52px] leading-[1.06] tracking-[-0.028em] text-[#18181B] text-balance">
                    Software built for <span class="text-[#E85D2A]">Indian businesses.</span>
                </h1>
                <p class="lg:col-span-5 font-body text-[16.5px] leading-[1.6] text-[#52525B] max-w-[44ch]">
                    Three tools built alongside our client work: WhatsApp Business automation, daily festival creatives, and social media scheduling.
                </p>
            </div>

            <div class="pt-4 flex flex-wrap gap-3">
                <a href="#chatbox360" class="px-5 py-2 rounded-full border border-[#D4D0C8] bg-white font-label text-label-md text-[#18181B] hover:border-[#A83300] hover:text-[#A83300] transition-colors">
                    ChatBox 360 Suite (WhatsApp API)
                </a>
                <a href="#aajkagraphic" class="px-5 py-2 rounded-full border border-[#D4D0C8] bg-white font-label text-label-md text-[#18181B] hover:border-[#A83300] hover:text-[#A83300] transition-colors">
                    Aaj Ka Graphic (Post Maker)
                </a>
                <a href="#social360" class="px-5 py-2 rounded-full border border-[#D4D0C8] bg-white font-label text-label-md text-[#18181B] hover:border-[#A83300] hover:text-[#A83300] transition-colors">
                    Social 360 Suite (AI Platform)
                </a>
            </div>
        </div>
    </section>

    <!-- Product 1: ChatBox 360 Suite -->
    <section id="chatbox360" class="py-20 px-6 bg-light-surface border-b border-light-outline-variant scroll-mt-[84px]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-5 flex flex-col gap-6">
                    <div class="flex items-center gap-3">
                        <span class="w-12 h-12 rounded bg-light-surface-container-lowest border border-light-outline-variant flex items-center justify-center text-brand-orange">
                            <span class="material-symbols-outlined text-title-lg">chat</span>
                        </span>
                        <div>
                            <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface">ChatBox 360 Suite</h2>
                        </div>
                    </div>

                    <p class="font-body text-body-lg text-light-on-surface-variant">
                        WhatsApp Business API workspace with official onboarding. [CONFIRM META BUSINESS PARTNER BADGE &amp; NO-BAN WORDING]
                    </p>

                    <div class="p-6 rounded-lg bg-light-surface-container-lowest border border-light-outline-variant flex flex-col gap-3">
                        <span class="font-label text-label-sm text-light-outline uppercase">Key Highlights</span>
                        <div class="grid grid-cols-2 gap-2 font-body text-body-sm text-light-on-surface">
                            @foreach (['Opt-In Compliance [CONFIRM NO-BAN WORDING]', 'Broadcast Campaigns [CONFIRM TIER LIMITS]', 'Official WhatsApp Verification', 'Shared Team Inbox', 'Android & iOS App', 'End-to-End Secure'] as $hl)
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-brand-orange text-label-md">check</span> {{ $hl }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="https://www.chatbox360suite.com" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded bg-light-primary text-light-on-primary font-label text-label-lg hover:bg-brand-charcoal transition-colors">
                            <span>Experience ChatBox 360</span>
                            <span class="material-symbols-outlined text-title-sm">open_in_new</span>
                        </a>
                        <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded border border-light-outline-variant bg-light-surface-container-lowest text-light-on-surface font-label text-label-lg hover:bg-light-surface-container-low transition-colors">
                            Book Live Demo
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($chatboxModules as $mod)
                        <div class="p-6 rounded-xl bg-light-surface-container-lowest border border-light-outline-variant flex flex-col gap-2">
                            <div class="flex items-center gap-2 text-brand-orange">
                                <span class="material-symbols-outlined text-title-md">{{ $mod['icon'] }}</span>
                                <h3 class="font-title text-title-md text-light-on-surface">{{ $mod['title'] }}</h3>
                            </div>
                            <p class="font-body text-body-sm text-light-on-surface-variant">{{ $mod['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Product 2: Aaj Ka Graphic -->
    <section id="aajkagraphic" class="py-20 px-6 bg-light-surface-container-lowest border-b border-light-outline-variant scroll-mt-[84px]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 flex flex-col gap-6">
                <div class="flex items-center gap-3">
                    <span class="w-12 h-12 rounded bg-light-surface border border-light-outline-variant flex items-center justify-center text-brand-orange">
                        <span class="material-symbols-outlined text-title-lg">image</span>
                    </span>
                    <div>
                        <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface">Aaj Ka Graphic</h2>
                    </div>
                </div>

                <p class="font-body text-body-lg text-light-on-surface-variant">
                    Ready-to-brand festival graphics and short videos for Indian holidays and business updates. [CONFIRM UNLIMITED PLAN TERMS]
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="https://www.aajkagraphic.com" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded bg-brand-charcoal text-light-on-secondary font-label text-label-lg hover:bg-light-primary transition-colors">
                        <span>Visit Aaj Ka Graphic</span>
                        <span class="material-symbols-outlined text-title-sm">open_in_new</span>
                    </a>
                    <span class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded bg-light-surface border border-light-outline-variant font-label text-label-md text-light-on-surface">
                        <span class="material-symbols-outlined text-brand-orange">android</span>
                        Get on Google Play
                    </span>
                </div>
            </div>

            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($aajStats as $stat)
                    <div class="p-6 rounded-xl bg-light-surface border border-light-outline-variant flex flex-col gap-2">
                        <span class="font-display font-extrabold text-display-lg text-brand-orange">{{ $stat['val'] }}</span>
                        <h3 class="font-title text-title-md text-light-on-surface">{{ $stat['title'] }}</h3>
                        <p class="font-body text-body-sm text-light-on-surface-variant">{{ $stat['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Product 3: Social 360 Suite -->
    <section id="social360" class="py-20 px-6 bg-[#18181B] text-white border-b border-[#27272A] scroll-mt-[84px]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-5 flex flex-col gap-6">
                <div class="flex flex-col gap-2">
                    <h2 class="font-display font-bold text-[32px] sm:text-[38px] leading-[1.1] tracking-[-0.025em] text-white">Social 360 Suite</h2>
                </div>

                <p class="font-body text-[16.5px] leading-[1.65] text-white/75">
                    Social media scheduling, bulk publishing, shared content calendars, and account reporting in one cloud workspace.
                </p>

                <div class="pt-2">
                    <a href="https://www.social360suite.in" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-[#A83300] hover:bg-white hover:text-[#18181B] text-white font-semibold text-[15px] transition-colors">
                        <span>Experience Social 360 Suite</span>
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">open_in_new</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-2 border-t border-white/15">
                @foreach ($socialModules as $mod)
                    <div class="py-6 border-b border-white/15 flex flex-col gap-2">
                        <span class="font-mono text-[12px] font-semibold text-[#E85D2A]">{{ $mod['tag'] }}</span>
                        <h3 class="font-title font-bold text-[18px] text-white">{{ $mod['title'] }}</h3>
                        <p class="font-body text-[14.5px] leading-[1.6] text-white/70">{{ $mod['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-section-cta
        variant="warm"
        title="Book a walkthrough of any product."
        description="Our software engineers and product strategists will walk you through ChatBox 360 Suite or Social 360 live."
        primary-label="Schedule Product Demo"
        :primary-href="route('contact.show')" />

</x-layouts.app>
