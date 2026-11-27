@props([
    'heading',
    'steps' => [],
    'note' => null,
    'variant' => 'dark',
])
@php
    $isDark = $variant === 'dark';
    $colsClass = count($steps) === 4
        ? 'sm:grid-cols-2 lg:grid-cols-4'
        : (count($steps) === 6 ? 'sm:grid-cols-2 lg:grid-cols-3' : 'sm:grid-cols-2 lg:grid-cols-5');
@endphp
<section class="{{ $isDark ? 'py-20 px-6 bg-[#18181B] text-white border-b border-[#27272A]' : 'py-20 px-6 bg-light-surface-container-lowest border-b border-light-outline-variant' }}">
    <div class="max-w-7xl mx-auto flex flex-col gap-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] {{ $isDark ? 'text-white' : 'text-[#18181B]' }} text-balance">
                {{ $heading }}
            </h2>
            @if ($note)
                <p class="font-body text-[13.5px] {{ $isDark ? 'text-white/65' : 'text-[#52525B]' }} max-w-[44ch]">
                    {{ $note }}
                </p>
            @endif
        </div>

        <div class="grid grid-cols-1 {{ $colsClass }} gap-x-8 gap-y-8 border-t {{ $isDark ? 'border-white/15' : 'border-[#D4D0C8]' }} pt-8">
            @foreach ($steps as $idx => $step)
                <div data-reveal style="--stagger: {{ $idx }};" class="flex flex-col gap-2.5">
                    <span class="font-mono text-[13px] font-semibold text-[#E85D2A] tabular-nums">{{ $step['num'] }}</span>
                    <h3 class="font-title font-bold text-[19px] {{ $isDark ? 'text-white' : 'text-[#18181B]' }}">{{ $step['title'] }}</h3>
                    <p class="font-body text-[14.5px] leading-[1.6] {{ $isDark ? 'text-white/75' : 'text-[#52525B]' }}">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
