@props([
    'services' => [],
])
<section id="services" class="py-16 lg:py-20 px-6 bg-light-surface-container-lowest border-b border-light-outline-variant overflow-x-clip" aria-label="Our Services">
    <div class="max-w-7xl mx-auto flex flex-col gap-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h2 class="font-display font-bold text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                    Eight core disciplines, <span class="text-brand-orange">one unified team.</span>
                </h2>
            </div>

            <a href="{{ route('services.index') }}" class="font-body font-semibold text-[14px] text-[#A83300] hover:underline whitespace-nowrap shrink-0">
                All services →
            </a>
        </div>

        <!-- Seamless Continuous Loop Track (pauses on hover/focus) -->
        <div class="services-marquee-mask client-marquee-mask overflow-hidden py-1 -my-1">
            <div id="services-track" class="services-marquee-track flex w-max">
                @for ($copy = 0; $copy < 2; $copy++)
                    <div class="flex items-stretch gap-5 pr-5 shrink-0" @if($copy === 1) aria-hidden="true" @endif>
                        @foreach ($services as $svc)
                            <a href="{{ $svc->public_href }}"
                               @if($copy === 1) tabindex="-1" @endif
                               class="service-carousel-card group w-[270px] sm:w-[290px] lg:w-[305px] shrink-0 bg-white border-2 border-[#C8C3B8] rounded-none overflow-hidden flex flex-col justify-between focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                                <div class="h-[150px] sm:h-[160px] w-full overflow-hidden bg-[#F4F2EE]">
                                    <img src="{{ $svc->image_url }}"
                                         alt="{{ $copy === 0 ? ($svc->alt ?: $svc->title) : '' }}"
                                         class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.04]"
                                         loading="lazy"
                                         decoding="async">
                                </div>
                                <div class="p-4 sm:p-5 flex flex-col justify-between gap-3.5 flex-1">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full shrink-0" style="background-color: {{ $svc->dot_color }};" aria-hidden="true"></span>
                                            <span class="font-mono text-[10.5px] font-medium tracking-[0.05em] text-[#52525B] uppercase">{{ $svc->eyebrow }}</span>
                                        </div>
                                        <h3 class="font-display font-bold text-[18.5px] leading-[1.22] tracking-[-0.02em] text-[#18181B]">{{ $svc->card_title }}</h3>
                                        <p class="font-body text-[13.5px] leading-[1.52] text-[#52525B]">{{ $svc->short_desc }}</p>
                                        <div class="pt-0.5 flex flex-wrap gap-1.5">
                                            @foreach ($svc->chips ?? [] as $chip)
                                                <span class="px-2 py-0.5 rounded-none bg-[#F4F2EE] text-[#3F3F46] font-body font-medium text-[11.5px]">{{ $chip }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="pt-0.5">
                                        <div class="service-carousel-action w-full px-3.5 py-2.5 rounded-none bg-[#ec7a2d] flex items-center justify-between transition-colors duration-200">
                                            <span class="service-carousel-cta font-body font-semibold text-[13px] text-[#18181B]">{{ $svc->cta_card }}</span>
                                            <span class="service-carousel-arrow material-symbols-outlined text-[16px] text-[#18181B]" aria-hidden="true">arrow_forward</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>
