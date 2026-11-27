@props([
    'currentSlug' => '',
])
@php
    $allServices = \App\Models\Service::active()->get()->filter(static fn ($s) => $s->slug !== $currentSlug)->values();
@endphp
@if ($allServices->isNotEmpty())
<section class="py-16 px-6 bg-[#F7F6F4] border-b border-[#E4E4E7]">
    <div class="max-w-7xl mx-auto flex flex-col gap-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <h2 data-reveal class="font-display font-bold text-[24px] sm:text-[28px] tracking-[-0.02em] text-[#18181B]">
                Explore other disciplines
            </h2>
            <a href="{{ route('services.index') }}" class="font-mono text-[12.5px] font-semibold text-[#A83300] hover:underline">
                All 8 Services →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($allServices->take(4) as $idx => $svc)
                <a href="{{ $svc->public_href }}"
                   data-reveal
                   style="--stagger: {{ $idx }};"
                   class="group p-5 bg-white border border-[#E4E4E7] hover:border-[#ec7a2d] flex flex-col justify-between gap-3 transition-colors">
                    <div class="flex flex-col gap-1.5">
                        <span class="font-mono text-[11.5px] font-semibold text-[#A83300]">{{ $svc->eyebrow }}</span>
                        <h3 class="font-display font-bold text-[17px] text-[#18181B] group-hover:text-[#A83300] transition-colors">{{ $svc->title }}</h3>
                        <p class="font-body text-[13px] leading-[1.5] text-[#52525B] line-clamp-2">{{ $svc->short_desc }}</p>
                    </div>
                    <span class="font-mono text-[12px] font-semibold text-[#18181B] inline-flex items-center gap-1">
                        <span>Explore</span>
                        <span class="material-symbols-outlined text-[15px] transition-transform group-hover:translate-x-1" aria-hidden="true">arrow_forward</span>
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
