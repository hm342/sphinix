<x-layouts.app
    title="Services — Sphinix Marketing | Results Driven Digital Agency"
    description="Eight digital marketing and web services from Sphinix Marketing: social media, SEO, Google Ads, branding, video, e-commerce, email, and custom builds."
    active-nav="services"
    main-class="flex-1 -mt-[84px] bg-[#F7F6F4]">

    <section class="pt-28 pb-12 lg:pt-28 lg:pb-12 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">

            <!-- Left Column: Intro + 8 Expandable Horizontal Service Rows + Bottom CTA -->
            <div class="lg:col-span-6 flex flex-col gap-10">
                <div class="flex flex-col gap-3 max-w-2xl">
                    <h1 class="services-main-h1 text-[#18181B]">
                        Eight services, all in-house.
                    </h1>
                    <p class="text-[17px] sm:text-[18px] leading-[1.6] text-[#52525B] max-w-[52ch]">
                        Strategy, design, video shoots, paid ads, and web development handled directly by our Bhavnagar team.
                    </p>
                </div>

                <!-- 8 Expandable Horizontal Rows -->
                <div id="services-accordion" class="flex flex-col">
                    @foreach ($services as $idx => $svc)
                        @php
                            $isOpen = $idx === 0;
                            $detailHref = isset($svc['detail_route']) ? route($svc['detail_route']) : route($svc['route_name']);
                        @endphp
                        <div id="{{ $svc['id'] }}"
                             data-service-img="{{ asset($svc['img']) }}"
                             data-service-alt="{{ $svc['accordion_alt'] }}"
                             class="service-row {{ $isOpen ? 'is-open' : '' }} border-t border-[#E4E4E7] last:border-b scroll-mt-24">
                            <button type="button"
                                    aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
                                    aria-controls="panel-{{ $svc['id'] }}"
                                    class="service-trigger w-full py-5 sm:py-6 flex items-center justify-between gap-4 text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#A83300] rounded-sm">
                                <span class="flex items-baseline gap-3 sm:gap-5 min-w-0">
                                    <span class="service-num font-mono text-[12px] sm:text-[13px] tabular-nums shrink-0">{{ $svc['num'] }}</span>
                                    <span class="service-title text-[22px] sm:text-[25px] lg:text-[27px] leading-[1.18] tracking-[-0.02em] text-[#18181B]">{{ $svc['title'] }}</span>
                                </span>
                                <span class="service-toggle-icon inline-flex items-center justify-center w-6 h-6 shrink-0" aria-hidden="true">
                                    <span class="material-symbols-outlined text-[22px] font-light">add</span>
                                </span>
                            </button>

                            <div id="panel-{{ $svc['id'] }}" class="service-panel">
                                <div class="service-panel-inner">
                                    <div class="pb-8 pt-1 pl-7 sm:pl-9 pr-2 flex flex-col gap-5 max-w-[60ch]">
                                        <p class="text-[15.5px] leading-[1.65] text-[#444444]">
                                            {{ $svc['full_desc'] }}
                                        </p>
                                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2">
                                            @foreach ($svc['features'] as $feature)
                                                <li class="flex items-start gap-2 font-body text-[14px] leading-[1.5] text-[#27272A]">
                                                    <span class="text-[#A83300] font-bold mt-[1px]" aria-hidden="true">•</span>
                                                    <span>{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="flex flex-wrap items-center justify-between gap-3 pt-1">
                                            <p class="font-body text-[12px] leading-relaxed text-[#52525B]">
                                                {{ $svc['tools'] }}
                                            </p>
                                            <a href="{{ $detailHref }}" class="self-start inline-flex items-center gap-1 font-body font-semibold text-[13.5px] text-[#A83300] hover:text-[#18181B] transition-colors pt-0.5">
                                                <span>{{ $svc['cta_detail'] }}</span>
                                                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">arrow_forward</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Subtle Bottom CTA Row -->
                <div class="pt-3 flex flex-col items-start gap-4">
                    <p class="text-[15px] leading-[1.6] text-[#52525B]">
                        Not sure which services fit your budget? Ask our team.
                    </p>
                    <div class="flex flex-wrap items-center gap-5">
                        <a href="{{ route('contact.show') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#202020] text-white font-body font-semibold text-[14px] whitespace-nowrap transition-colors duration-150">
                            <span>Partner With Us</span>
                            <span class="material-symbols-outlined text-[16px]" aria-hidden="true">arrow_forward</span>
                        </a>
                        <a href="https://wa.me/917048239155?text=Hi%20Sphinix%20team,%20I%20would%20like%20to%20discuss%20your%20services" target="_blank" rel="noopener" class="inline-flex items-center gap-1 font-body font-semibold text-[14px] text-[#A83300] hover:text-[#18181B] whitespace-nowrap transition-colors">
                            <span>Chat on WhatsApp</span>
                            <span class="material-symbols-outlined text-[16px]" aria-hidden="true">arrow_outward</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Fixed Minimal Illustration -->
            <div class="lg:col-span-6 lg:sticky lg:top-24 lg:h-[calc(100vh-6rem)] flex items-center justify-center pt-4 lg:pt-0">
                <img id="services-stage-img" src="{{ asset('images/svc_01_social.jpg') }}" alt="Minimal illustration of social media content calendar and reels workflow" class="w-full max-w-[540px] lg:max-w-full h-auto object-contain" loading="eager" decoding="async">
            </div>

        </div>
    </section>

</x-layouts.app>
