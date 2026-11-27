@props([
    'variant' => 'warm',
    'title',
    'description' => null,
    'primaryLabel' => 'Partner With Us',
    'primaryHref' => null,
    'secondaryLabel' => null,
    'secondaryHref' => null,
])
@php
    $primaryHref = $primaryHref ?? route('contact.show');
    $isDark = $variant === 'dark';
@endphp
<section class="{{ $isDark ? 'py-20 px-6 bg-brand-charcoal text-light-on-secondary' : 'py-20 px-6 bg-[#FFF8F1] border-b border-[#E4E4E7]' }}">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-8">
        <div class="flex flex-col gap-3 max-w-xl">
            <h2 class="{{ $isDark ? 'font-display text-display-lg-mobile lg:text-display-lg text-light-on-secondary' : 'font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]' }}">
                {{ $title }}
            </h2>
            @if ($description)
                <p class="{{ $isDark ? 'font-body text-body-lg text-light-on-secondary/80' : 'font-body text-[16px] leading-[1.6] text-[#52525B]' }}">
                    {{ $description }}
                </p>
            @endif
        </div>

        <div data-reveal class="flex flex-wrap items-center gap-4 shrink-0">
            <a href="{{ $primaryHref }}" class="btn-anticipate inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-[#A83300] {{ $isDark ? 'hover:bg-white hover:text-[#18181B]' : 'hover:bg-[#18181B]' }} text-white font-semibold text-[15px] transition-colors">
                <span>{{ $primaryLabel }}</span>
                <span class="btn-arrow material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
            </a>

            @if ($secondaryLabel && $secondaryHref)
                <a href="{{ $secondaryHref }}" class="{{ $isDark ? 'inline-flex items-center justify-center gap-2 px-6 py-3 rounded border border-light-outline-variant/40 text-light-on-secondary font-label text-label-lg hover:bg-light-surface-container-low/10 transition-colors' : 'inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] border border-[#D4D0C8] bg-white text-[#18181B] font-semibold text-[15px] hover:border-[#A83300] transition-colors' }}">
                    {{ $secondaryLabel }}
                </a>
            @endif
        </div>
    </div>
</section>
