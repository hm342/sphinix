@php
    $stats = [
        ['value' => '9+', 'label' => 'Years in Business'],
        ['value' => '150+', 'label' => 'Clients Worldwide'],
        ['value' => '700+', 'label' => 'Projects Delivered'],
        ['value' => '15+', 'label' => 'Industries Served'],
    ];
    $pillars = [
        ['num' => '01 · In-House Team', 'title' => 'In-House Team', 'desc' => 'Copywriters, designers, video editors, ad buyers, and software developers working together in Bhavnagar.'],
        ['num' => '02 · Workflow', 'title' => 'Systematic Process', 'desc' => 'Every account follows a documented path: audit and research, setup, monthly production calendar, monitoring, and reporting.'],
        ['num' => '03 · Tools & Software', 'title' => 'Standard Tools + Own SaaS', 'desc' => 'Google Analytics, Semrush, Ahrefs, and Adobe Creative Cloud alongside our own products: ChatBox 360 Suite and Social 360 Suite.'],
    ];
@endphp
<x-layouts.app
    title="About Us — Sphinix Marketing | Results Driven Agency"
    description="Founded in 2017 in Bhavnagar, Gujarat. 9+ years of proven excellence, 150+ clients worldwide, 700+ projects delivered across 15+ industries."
    active-nav="about">

    <!-- Unified Full-Section Illustrated About Hero -->
    <section class="relative bg-[#F7F6F4] border-b border-[#E4E4E7] overflow-hidden">
        <div class="relative min-h-[500px] lg:min-h-[580px] flex items-center">
            <img src="{{ asset('images/subpage_hero_agency.jpg') }}" alt="[ADD REAL OFFICE PHOTO: Sphinix Marketing team in Bhavnagar]" class="absolute inset-0 w-full h-full object-cover object-right lg:object-[75%_center]" loading="eager" decoding="async">
            <div class="absolute inset-0 bg-[#F7F6F4]/85 lg:hidden" aria-hidden="true"></div>
            <div class="hidden lg:block absolute inset-0" style="background: linear-gradient(90deg, #F7F6F4 0%, #F7F6F4 36%, rgba(247,246,244,0.92) 48%, rgba(247,246,244,0.52) 64%, rgba(247,246,244,0.08) 84%, rgba(247,246,244,0) 100%);" aria-hidden="true"></div>

            <div class="relative z-10 max-w-7xl mx-auto w-full px-6 pt-32 pb-16 lg:pt-36 lg:pb-20">
                <div class="max-w-2xl flex flex-col items-start gap-5">
                    <h1 class="about-hero-h1 text-[#18181B]">
                        Digital marketing &amp; web builds,<br>
                        <span class="text-[#E85D2A]">since 2017.</span>
                    </h1>
                    <p class="text-[17px] sm:text-[18px] leading-[1.6] text-[#3F3F46] max-w-[46ch]">
                        We started in Bhavnagar in 2017 to give small businesses affordable marketing and websites. Nine years on, we work with 150+ businesses worldwide.
                    </p>
                    <div class="pt-2">
                        <a href="#our-story" class="group inline-flex items-center gap-2 pb-1 border-b border-[#18181B] hover:border-[#A83300] text-[#18181B] hover:text-[#A83300] font-semibold text-[16px] transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                            <span>Explore our story</span>
                            <span class="material-symbols-outlined text-[18px] transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" aria-hidden="true">arrow_outward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative z-10 bg-[#F7F6F4] border-t border-[#E4E4E7]">
            <div class="max-w-7xl mx-auto px-6 py-8 lg:py-9 grid grid-cols-2 lg:grid-cols-4 gap-y-6 lg:divide-x lg:divide-[#E4E4E7]">
                @foreach ($stats as $i => $stat)
                    <div class="flex flex-col gap-1 {{ $i === 0 ? 'lg:pr-8' : ($i === count($stats) - 1 ? 'lg:pl-8' : 'lg:px-8') }}">
                        <span class="text-[32px] sm:text-[38px] font-semibold leading-none tracking-[-0.025em] text-[#18181B] tabular-nums">{{ $stat['value'] }}</span>
                        <span class="text-[14px] text-[#52525B] pt-1">{{ $stat['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Split Story Section -->
    <section id="our-story" class="scroll-mt-[84px] border-b border-light-outline-variant bg-light-surface">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="relative min-h-96 lg:min-h-full overflow-hidden bg-brand-charcoal">
                <img src="{{ asset('images/impact_collaboration.jpg') }}" alt="[ADD REAL TEAM PHOTO: Sphinix Marketing team in Bhavnagar]" class="w-full h-full object-cover object-center opacity-90" loading="lazy" decoding="async">
                <div class="absolute left-6 right-6 bottom-6 bg-brand-charcoal/90 text-light-on-secondary p-6 rounded-lg border border-light-outline-variant/30 flex flex-col gap-2">
                    <p class="font-body text-body-md text-light-on-secondary">Based in Bhavnagar, Gujarat with two offices — Head Office at Parimal Chowk and Creative Studio at Mokhdaji Circle.</p>
                </div>
            </div>

            <div class="flex flex-col justify-center px-6 py-16 lg:px-16 lg:py-24 bg-light-surface-container-lowest">
                <div class="max-w-xl flex flex-col gap-6">
                    <h2 class="font-headline text-headline-lg-mobile lg:text-headline-lg text-light-on-surface text-balance">
                        Built for small businesses, scaled to corporate accounts.
                    </h2>
                    <p class="font-body text-body-lg text-light-on-surface-variant text-pretty">
                        We started in 2017 to give small businesses affordable, effective marketing and websites without enterprise agency pricing.
                    </p>
                    <p class="font-body text-body-md text-light-on-surface-variant text-pretty">
                        Alongside small business owners, we work with corporate companies and media channels across social media, search, paid ads, video, and software. Every campaign is tailored to your scope and goals.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-light-outline-variant">
                        <div class="p-6 rounded-lg bg-light-surface border border-light-outline-variant flex flex-col gap-2">
                            <h3 class="font-title text-title-md text-light-on-surface">How we work</h3>
                            <p class="font-body text-body-sm text-light-on-surface-variant">Direct communication, clear monthly reporting, and all disciplines handled under one roof.</p>
                        </div>

                        <div class="p-6 rounded-lg bg-light-surface border border-light-outline-variant flex flex-col gap-2">
                            <h3 class="font-title text-title-md text-light-on-surface">What we build</h3>
                            <p class="font-body text-body-sm text-light-on-surface-variant">Client campaigns paired with in-house software tools: ChatBox 360 Suite, Aaj Ka Graphic, and Social 360 Suite.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What Sets Us Apart -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-3 max-w-2xl">
                    <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                        How <span class="text-brand-orange">Sphinix Marketing</span> operates.
                    </h2>
                </div>
                <p class="font-body text-body-md text-light-on-surface-variant max-w-md">
                    Strategy, content production, ads, and software development in one place.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($pillars as $pillar)
                    <div class="p-8 rounded-lg bg-light-surface-container-lowest border border-light-outline-variant flex flex-col gap-4 hover:border-light-primary transition-colors duration-state-change">
                        <span class="font-mono text-[12px] font-semibold tracking-[0.08em] uppercase text-[#A83300]">{{ $pillar['num'] }}</span>
                        <h3 class="font-title text-title-lg text-light-on-surface">{{ $pillar['title'] }}</h3>
                        <p class="font-body text-body-md text-light-on-surface-variant">{{ $pillar['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Dual Office & Studio Facilities -->
    <section class="py-20 px-6 bg-light-surface-container-lowest border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                    Two offices in <span class="text-brand-orange">Bhavnagar.</span>
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    Visit either location to meet our strategy, software, or video production teams.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-8 rounded-xl bg-light-surface border border-light-outline-variant flex flex-col justify-between gap-6">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded bg-brand-charcoal text-light-on-secondary font-label text-label-sm uppercase tracking-wider">Head Office</span>
                            <span class="font-mono text-mono-sm text-light-outline">HQ &amp; Operations</span>
                        </div>
                        <h3 class="font-headline text-headline-md text-light-on-surface">Parimal Chowk Office</h3>
                        <p class="font-body text-body-md text-light-on-surface-variant">
                            B-3, Shantiniketan Complex, Parimal Chowk, Waghawadi Road,<br>
                            Bhavnagar - 364001, Gujarat, India.
                        </p>
                        <div class="flex flex-col gap-2 pt-2 border-t border-light-outline-variant font-mono text-mono-sm text-light-on-surface">
                            <span>+91 7048239155</span>
                            <span>info@sphinixmarketing.com</span>
                        </div>
                    </div>
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded bg-light-surface-container-lowest border border-light-outline-variant text-light-on-surface font-label text-label-lg hover:border-light-primary transition-colors">
                        Contact Head Office →
                    </a>
                </div>

                <div class="p-8 rounded-xl bg-light-surface border border-light-outline-variant flex flex-col justify-between gap-6">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded bg-brand-charcoal text-light-on-secondary font-label text-label-sm uppercase tracking-wider">Creative Studio</span>
                            <span class="font-mono text-mono-sm text-light-outline">Production &amp; Media</span>
                        </div>
                        <h3 class="font-headline text-headline-md text-light-on-surface">Mokhdaji Circle Studio</h3>
                        <p class="font-body text-body-md text-light-on-surface-variant">
                            Swastik Complex, Mokhdaji Circle,<br>
                            Bhavnagar, Gujarat, India.
                        </p>
                        <div class="flex flex-col gap-2 pt-2 border-t border-light-outline-variant font-mono text-mono-sm text-light-on-surface">
                            <span>+91 9081711900</span>
                            <span>[ADD VERIFIED STUDIO HOURS]</span>
                        </div>
                    </div>
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded bg-light-surface-container-lowest border border-light-outline-variant text-light-on-surface font-label text-label-lg hover:border-light-primary transition-colors">
                        Visit Creative Studio →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-section-cta
        variant="dark"
        title="Talk to our Bhavnagar team."
        description="Discuss your next marketing campaign, website build, or software demo."
        primary-label="Partner With Us"
        :primary-href="route('contact.show')"
        secondary-label="Explore All Services"
        :secondary-href="route('services.index')" />

</x-layouts.app>
