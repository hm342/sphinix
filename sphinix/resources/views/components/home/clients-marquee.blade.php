@php
    $row1 = [
        ['name' => 'aabo.', 'dot' => true, 'sub' => 'Client Partner', 'slug' => 'aabo'],
        ['name' => 'Saurashtra Group', 'dot' => false, 'sub' => 'Client Partner', 'slug' => null],
        ['name' => 'Oilenza', 'dot' => false, 'sub' => 'Client Partner', 'slug' => null],
        ['name' => 'HCP', 'dot' => false, 'sub' => 'Client Partner', 'slug' => null, 'bold' => true],
        ['name' => 'Janmoti', 'dot' => false, 'sub' => 'Client Partner', 'slug' => null],
        ['name' => 'FunBun', 'dot' => false, 'sub' => 'Client Partner', 'slug' => null],
        ['name' => 'Kothari Agencies', 'dot' => false, 'sub' => 'Client Partner', 'slug' => null],
        ['name' => 'Swarn Mandir', 'dot' => false, 'sub' => 'Client Partner', 'slug' => null],
    ];
    $row2 = [
        ['name' => 'Riyom Jewels', 'sub' => 'Jewelry'],
        ['name' => 'Pishi Holidays', 'sub' => 'Travel'],
        ['name' => 'Satyam Travel', 'sub' => 'Travel'],
        ['name' => 'Fruitamins', 'sub' => 'Client Partner'],
        ['name' => 'WeConnect Care', 'sub' => 'Client Partner'],
        ['name' => 'Veer Jewellers & Nikki', 'sub' => 'Client Partners'],
        ['name' => 'NHOC & Ganga', 'sub' => 'Client Partners'],
        ['name' => 'Elite Discoveries', 'sub' => '+100 More Clients'],
    ];
@endphp
<section id="client-family" class="py-20 px-6 bg-light-surface border-b border-light-outline-variant overflow-x-clip">
    <div class="max-w-7xl mx-auto flex flex-col gap-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                    Worked with <span class="text-brand-orange tabular-nums">150+</span> businesses.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    Over 9+ years, Sphinix Marketing has worked with businesses across 15+ industries on websites, social media, search, and paid ads.
                </p>
            </div>

            <div class="flex items-center gap-4 shrink-0">
                <span class="px-3.5 py-1.5 rounded bg-light-surface-container-lowest border border-light-outline-variant font-mono text-mono-sm text-light-on-surface tabular-nums">150+ Clients</span>
                <a href="{{ route('work.index') }}" class="font-body font-semibold text-[14px] text-[#A83300] hover:underline whitespace-nowrap">
                    Explore portfolio →
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-5">
            <!-- Row 1: Left to Right Carousel -->
            <div class="client-marquee-mask overflow-hidden">
                <div id="client-track-1" class="client-marquee-ltr flex w-max">
                    @for ($copy = 0; $copy < 2; $copy++)
                        <div class="flex items-stretch gap-4 pr-4 shrink-0" @if($copy === 1) aria-hidden="true" @endif>
                            @foreach ($row1 as $item)
                                @if ($item['slug'])
                                    <a href="{{ route('work.show', $item['slug']) }}" @if($copy === 1) tabindex="-1" @endif class="w-[240px] sm:w-[280px] h-28 bg-light-surface-container-lowest border border-light-outline-variant rounded-lg px-6 flex flex-col items-center justify-center gap-1 hover:border-[#A83300] transition-colors duration-150 shrink-0">
                                        <span class="font-body font-bold text-[22px] tracking-tight text-[#202020]">aabo<span class="text-[#E85C27]">.</span></span>
                                        <span class="font-body text-[12px] text-[#52525B]">{{ $item['sub'] }}</span>
                                    </a>
                                @else
                                    <div class="w-[240px] sm:w-[280px] h-28 bg-light-surface-container-lowest border border-light-outline-variant rounded-lg px-6 flex flex-col items-center justify-center gap-1 shrink-0">
                                        <span class="font-body {{ ($item['bold'] ?? false) ? 'font-bold text-[20px]' : 'font-semibold text-[18px]' }} tracking-tight text-[#202020]">{{ $item['name'] }}</span>
                                        <span class="font-body text-[12px] text-[#52525B]">{{ $item['sub'] }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Row 2: Right to Left Carousel -->
            <div class="client-marquee-mask overflow-hidden">
                <div id="client-track-2" class="client-marquee-rtl flex w-max">
                    @for ($copy = 0; $copy < 2; $copy++)
                        <div class="flex items-stretch gap-4 pr-4 shrink-0" @if($copy === 1) aria-hidden="true" @endif>
                            @foreach ($row2 as $item)
                                <div class="w-[240px] sm:w-[280px] h-28 bg-light-surface-container-lowest border border-light-outline-variant rounded-lg px-6 flex flex-col items-center justify-center gap-1 shrink-0">
                                    <span class="font-body font-semibold text-[18px] tracking-tight text-[#202020]">{{ $item['name'] }}</span>
                                    <span class="font-body text-[12px] text-[#52525B]">{{ $item['sub'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
