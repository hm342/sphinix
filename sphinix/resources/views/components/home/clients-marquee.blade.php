@props([
    'row1' => null,
    'row2' => null,
    'clientsCount' => '150+',
])
@php
    $row1Collection = collect($row1 ?? []);
    $row2Collection = collect($row2 ?? []);

    $padTrack = static function ($items) {
        if ($items->isEmpty()) {
            return collect();
        }
        $filled = collect();
        while ($filled->count() < 8) {
            foreach ($items as $item) {
                $filled->push($item);
            }
        }
        return $filled;
    };

    $row1Items = $padTrack($row1Collection);
    $row2Items = $padTrack($row2Collection);
@endphp
<section id="client-family" class="py-20 px-6 bg-light-surface border-b border-light-outline-variant overflow-x-clip">
    <div class="max-w-7xl mx-auto flex flex-col gap-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                    Worked with <span class="text-brand-orange tabular-nums">{{ $clientsCount }}</span> businesses.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    Over 9+ years, Sphinix Marketing has worked with businesses across 15+ industries on websites, social media, search, and paid ads.
                </p>
            </div>

            <div class="flex items-center gap-4 shrink-0">
                <span class="px-3.5 py-1.5 rounded bg-light-surface-container-lowest border border-light-outline-variant font-mono text-mono-sm text-light-on-surface tabular-nums">{{ $clientsCount }} Clients</span>
                <a href="{{ route('work.index') }}" class="font-body font-semibold text-[14px] text-[#A83300] hover:underline whitespace-nowrap">
                    Explore portfolio →
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-8 py-2">
            @if ($row1Items->isNotEmpty())
                <!-- Row 1: Left to Right Carousel -->
                <div class="client-marquee-mask overflow-hidden">
                    <div id="client-track-1" class="client-marquee-ltr flex w-max">
                        @for ($copy = 0; $copy < 2; $copy++)
                            <div class="flex items-center gap-12 sm:gap-16 pr-12 sm:pr-16 shrink-0" @if($copy === 1) aria-hidden="true" @endif>
                                @foreach ($row1Items as $item)
                                    @include('components.home.partials.client-logo-card', ['item' => $item, 'isDuplicate' => $copy === 1])
                                @endforeach
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

            @if ($row2Items->isNotEmpty())
                <!-- Row 2: Right to Left Carousel -->
                <div class="client-marquee-mask overflow-hidden">
                    <div id="client-track-2" class="client-marquee-rtl flex w-max">
                        @for ($copy = 0; $copy < 2; $copy++)
                            <div class="flex items-center gap-12 sm:gap-16 pr-12 sm:pr-16 shrink-0" @if($copy === 1) aria-hidden="true" @endif>
                                @foreach ($row2Items as $item)
                                    @include('components.home.partials.client-logo-card', ['item' => $item, 'isDuplicate' => $copy === 1])
                                @endforeach
                            </div>
                        @endfor
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
