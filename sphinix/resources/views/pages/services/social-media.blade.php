@php
    $strengths = [
        ['num' => '01', 'title' => 'Experience', 'desc' => '9+ years managing corporate and retail social profiles across 15+ industries.'],
        ['num' => '02', 'title' => 'Performance Tracking', 'desc' => 'Track post reach, clicks, ad spend, and inbound leads rather than likes alone.'],
        ['num' => '03', 'title' => 'Planned Calendars', 'desc' => 'Monthly schedules covering product posts, offers, and seasonal/festival themes.'],
        ['num' => '04', 'title' => 'In-House Production', 'desc' => 'Video reels, carousels, and motion posts designed and edited at our Bhavnagar studio.'],
    ];
    $channels = ['Instagram', 'Facebook', 'LinkedIn', 'YouTube', 'X (Twitter)', 'WhatsApp', 'Pinterest', 'Other Channels'];
    $deliverables = [
        'Profile Setup & Optimization',
        'Channel Strategy Plan',
        'Monthly Content Calendars',
        'Reels, Motion Posts & Stories',
        'Paid Meta & LinkedIn Ads',
        'Influencer & Group Promotions',
        'Daily Account Management',
        'Monthly Performance Reports',
    ];
    $process = [
        ['num' => '01', 'title' => 'Understanding the Business', 'desc' => 'Review your audience, competitors, offers, and tone before planning content.'],
        ['num' => '02', 'title' => 'Profiles Setup', 'desc' => 'Update bios, covers, highlights, and contact links so profiles look consistent.'],
        ['num' => '03', 'title' => 'Content Calendar', 'desc' => 'Plan weekly posts, product promotions, festival creatives, and reel scripts.'],
        ['num' => '04', 'title' => 'Content Creation', 'desc' => 'Design graphics, film and edit reels at our studio, and write captions.'],
        ['num' => '05', 'title' => 'Posting & Monitoring', 'desc' => 'Publish on schedule, monitor comments and messages, and track active ads.'],
        ['num' => '06', 'title' => 'Reports & Analytics', 'desc' => 'Send monthly performance reports and adjust next month’s content plan.'],
    ];
@endphp
<x-layouts.app
    title="Social Media Marketing — Sphinix Marketing"
    description="Consistent content calendars, viral reels, targeted social campaigns, and community growth across Instagram, Facebook, LinkedIn, YouTube, and X."
    active-nav="services">

    <!-- Warm Split Social Media Hero -->
    <section class="bg-[#F7F6F4] pt-32 pb-16 lg:pt-36 lg:pb-20 px-6 border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <div class="lg:col-span-7 flex flex-col gap-6">
                <nav aria-label="Breadcrumb" class="flex items-center gap-2 font-mono text-[12px] text-[#71717A]">
                    <a href="{{ route('home') }}" class="hover:text-[#A83300]">Home</a>
                    <span>/</span>
                    <a href="{{ route('services.index') }}" class="hover:text-[#A83300]">Services</a>
                    <span>/</span>
                    <span class="text-[#18181B]">Social Media</span>
                </nav>

                <h1 class="font-display font-extrabold text-[34px] sm:text-[44px] lg:text-[50px] leading-[1.06] tracking-[-0.028em] text-[#18181B] text-balance">
                    Social media built around <span class="text-[#E85D2A]">consistent content &amp; ads.</span>
                </h1>

                <p class="font-body text-[17px] leading-[1.6] text-[#52525B] max-w-[52ch]">
                    Monthly content calendars, studio-shot reels, motion posts, paid Meta/LinkedIn campaigns, and daily profile handling.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[15px] transition-colors">
                        <span>Request Social Review</span>
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                    </a>
                    <span class="font-mono text-[12px] text-[#52525B]">Meta Business Partner · LinkedIn Certified Marketing Partner</span>
                </div>
            </div>

            <div class="lg:col-span-5 flex items-center justify-center">
                <img src="{{ asset('images/svc_01_social.jpg') }}" alt="Social media content calendar and reels workflow illustration" class="w-full max-w-[440px] h-auto object-contain" style="mix-blend-mode: multiply; filter: brightness(1.03) contrast(1.03);" loading="eager" decoding="async">
            </div>
        </div>
    </section>

    <!-- 4 Core Strengths -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                    How our social team runs client accounts.
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($strengths as $idx => $item)
                    <div data-reveal style="--stagger: {{ $idx }};" class="p-8 rounded-lg bg-light-surface-container-lowest border border-light-outline-variant flex flex-col gap-3">
                        <h3 class="font-title text-title-md text-light-on-surface">{{ $item['title'] }}</h3>
                        <p class="font-body text-body-md text-light-on-surface-variant">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Deliverables & Platforms -->
    <section class="py-20 px-6 bg-light-surface-container-lowest border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-5 flex flex-col gap-6">
                <h2 class="font-headline text-headline-lg text-light-on-surface">Channels we handle for clients.</h2>
                <div class="grid grid-cols-2 gap-3 pt-2">
                    @foreach ($channels as $channel)
                        <div class="p-4 rounded border border-light-outline-variant bg-light-surface font-label text-label-md text-light-on-surface flex items-center">
                            {{ $channel }}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-7 flex flex-col gap-6">
                <div class="p-8 rounded-xl bg-light-surface border border-light-outline-variant flex flex-col gap-6">
                    <h3 class="font-title text-title-md text-light-on-surface">What’s Included</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach ($deliverables as $deliv)
                            <li class="flex items-center gap-2.5 font-body text-body-md text-light-on-surface">
                                <span class="text-[#A83300] font-bold" aria-hidden="true">•</span>
                                <span>{{ $deliv }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 6-Step Process (Dark Editorial Band) -->
    <section class="py-20 px-6 bg-[#18181B] text-white border-b border-[#27272A]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <h2 class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-white text-balance">
                        The 6-step social media process.
                    </h2>
                </div>
                <p class="font-body text-[14px] text-white/60">Steps adjust depending on client goals and platforms.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-8 border-t border-white/15 pt-8">
                @foreach ($process as $step)
                    <div class="flex flex-col gap-2.5">
                        <h3 class="font-title font-bold text-[19px] text-white">{{ $step['title'] }}</h3>
                        <p class="font-body text-[14.5px] leading-[1.6] text-white/70">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-services.other-services current-slug="social-media" />

    <x-section-cta
        variant="warm"
        title="Need consistent help running your social accounts?"
        description="Book a call to review your current pages, content calendar, and ad setup."
        primary-label="Book Social Consultation"
        :primary-href="route('contact.show')" />

</x-layouts.app>
