@props([
    'settings' => [],
])
<section class="hero-canvas relative pt-[84px] border-b border-light-outline-variant overflow-x-clip">
    <div class="grid grid-cols-1 lg:grid-cols-2 lg:min-h-[clamp(520px,70vh,620px)]">

        <!-- Left Column: Candid Agency Photography + Connected Statistic Overlay Panels -->
        <div class="relative flex flex-col lg:block bg-[#EAE3D8]">
            <div class="relative w-full h-[300px] sm:h-[420px] lg:h-full lg:min-h-[520px] overflow-hidden bg-[#EAE3D8]">
                <img src="{{ asset('images/hero_agency_team.jpg') }}" alt="Sphinix Marketing strategist working at a sunlit agency desk" class="hero-pose-img w-full h-full object-cover object-[50%_22%]" loading="eager" decoding="async">
                <div class="pointer-events-none hidden sm:block absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-[#202020]/20 to-transparent" aria-hidden="true"></div>
            </div>

            <div class="sm:absolute sm:left-10 lg:left-14 sm:right-4 sm:bottom-4 grid grid-cols-1 sm:grid-cols-2 z-10">
                <div class="hero-pose-stat-1 bg-[#A83300]/95 text-white px-6 py-8 sm:px-8 sm:py-10 sm:min-h-[172px] flex flex-col justify-center gap-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full border border-white/60 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white shrink-0" viewBox="0 0 32 32" fill="none" aria-hidden="true">
                                <path d="M16 3L21 8L16 13L11 8L16 3Z" stroke="currentColor" stroke-width="1.75"/>
                                <path d="M16 19L21 24L16 29L11 24L16 19Z" stroke="currentColor" stroke-width="1.75"/>
                                <path d="M8 11L13 16L8 21L3 16L8 11Z" stroke="currentColor" stroke-width="1.75"/>
                                <path d="M24 11L29 16L24 21L19 16L24 11Z" stroke="currentColor" stroke-width="1.75"/>
                            </svg>
                        </div>
                        <span class="hero-stat-value tabular-nums">{{ $settings['years_label'] ?? '9+' }} Yrs</span>
                    </div>
                    <p class="text-[14px] leading-[1.45] text-white/95">Active in digital marketing since 2017.</p>
                </div>
                <div class="hero-pose-stat-2 bg-[#1C1C1E]/90 backdrop-blur-md text-white px-6 py-8 sm:px-8 sm:py-10 sm:min-h-[172px] flex flex-col justify-center">
                    <p class="text-[14.5px] leading-[1.6] text-white/90">
                        Partnering with <strong class="font-semibold text-white">{{ $settings['clients_count_label'] ?? '150+' }} growing brands</strong> across {{ $settings['industries_count_label'] ?? '15+' }} industries to deliver {{ $settings['projects_count_label'] ?? '700+' }} projects.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Column: Editorial Story & Actions -->
        <div class="flex flex-col justify-center px-6 py-12 sm:px-12 lg:px-14 xl:px-20 lg:py-16">
            <div class="max-w-[520px] flex flex-col items-start">
                <h1 class="hero-pose-1 hero-headline text-[#202020] mb-5">
                    Turning attention into
                    <span class="block text-[#E85C27]">measurable growth.</span>
                </h1>
                <p class="hero-pose-2 text-[16.5px] leading-[1.65] text-[#444444] max-w-[44ch] mb-8">
                    We run social media, SEO, Google Ads, video production, websites, and WhatsApp automation from one in-house team.
                </p>
                <div class="hero-pose-3 flex flex-wrap items-center gap-6">
                    <a href="#contact" class="btn-anticipate inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-[#A83300] hover:bg-[#202020] text-white font-semibold text-[15px] transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                        <span>Start a Project</span>
                        <span class="btn-arrow material-symbols-outlined text-[17px]" aria-hidden="true">arrow_forward</span>
                    </a>
                    <a href="#agency-reel" class="group inline-flex items-center gap-3 font-semibold text-[15px] text-[#202020] hover:text-[#A83300] transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27] rounded-full pr-2">
                        <span class="w-11 h-11 rounded-full border border-[#202020]/25 group-hover:border-[#A83300] group-hover:bg-[#E85C27] group-hover:text-white flex items-center justify-center transition-all duration-150 text-[#202020]">
                            <span class="material-symbols-outlined text-[19px] ml-0.5" style="font-variation-settings: 'FILL' 1;" aria-hidden="true">play_arrow</span>
                        </span>
                        <span>Watch Agency Reel</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
