@props([
    'serviceNum',
    'serviceName',
    'headline',
    'accentWord',
    'description',
    'ctaLabel' => 'Start a Project',
    'toolsSummary' => '',
    'partnerBadges' => [],
    'image',
    'imageAlt',
])
<section class="bg-[#F7F6F4] pt-32 pb-16 lg:pt-36 lg:pb-20 px-6 border-b border-[#E4E4E7]">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
        <div class="lg:col-span-7 flex flex-col gap-6">
            <nav aria-label="Breadcrumb" class="hero-pose-1 flex items-center gap-2 font-mono text-[12px] text-[#71717A]">
                <a href="{{ route('home') }}" class="hover:text-[#A83300]">Home</a>
                <span>/</span>
                <a href="{{ route('services.index') }}" class="hover:text-[#A83300]">Services</a>
                <span>/</span>
                <span class="text-[#18181B]">{{ $serviceName }}</span>
            </nav>

            <h1 class="hero-pose-1 font-display font-extrabold text-[34px] sm:text-[44px] lg:text-[50px] leading-[1.06] tracking-[-0.028em] text-[#18181B] text-balance">
                {{ $headline }} <span class="text-[#E85D2A]">{{ $accentWord }}</span>
            </h1>

            <p class="hero-pose-2 font-body text-[17px] leading-[1.65] text-[#3F3F46] max-w-[54ch]">
                {{ $description }}
            </p>

            @if (count($partnerBadges) > 0)
                <div class="hero-pose-2 flex flex-wrap items-center gap-2.5">
                    @foreach ($partnerBadges as $badge)
                        <span class="inline-flex items-center px-3 py-1 bg-white border border-[#D4D0C8] font-mono text-[11.5px] font-semibold text-[#18181B]">
                            {{ $badge }}
                        </span>
                    @endforeach
                </div>
            @endif

            <div class="hero-pose-3 flex flex-wrap items-center gap-5 pt-2">
                <a href="{{ route('contact.show') }}" class="btn-anticipate inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[15px] transition-colors">
                    <span>{{ $ctaLabel }}</span>
                    <span class="btn-arrow material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                </a>
                @if ($toolsSummary)
                    <span class="font-mono text-[12px] text-[#52525B]">{{ $toolsSummary }}</span>
                @endif
            </div>
        </div>

        <div class="hero-pose-img lg:col-span-5 flex items-center justify-center">
            <img src="{{ asset($image) }}"
                 alt="{{ $imageAlt }}"
                 class="w-full max-w-[440px] h-auto object-contain"
                 style="mix-blend-mode: multiply; filter: brightness(1.03) contrast(1.03);"
                 loading="eager"
                 decoding="async">
        </div>
    </div>
</section>
