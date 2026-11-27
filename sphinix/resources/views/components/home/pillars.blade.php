@php
    $pillars = [
        ['title' => 'In-House Team', 'desc' => 'Strategists, designers, video editors, and developers working in Bhavnagar.'],
        ['title' => 'Clear Process', 'desc' => 'Step-by-step setup from account audit to launch and monthly adjustments.'],
        ['title' => 'Marketing Tools', 'desc' => 'Standard SEO and ad tools paired with our ChatBox 360 and Social 360 software.'],
        ['title' => 'Direct Reporting', 'desc' => 'Plain monthly numbers covering traffic, ad spend, leads, and WhatsApp replies.'],
    ];
@endphp
<section class="bg-light-surface-container-lowest border-b border-light-outline-variant">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-light-outline-variant">
        @foreach ($pillars as $idx => $pillar)
            <div data-reveal style="--stagger: {{ $idx }};" class="p-8 lg:py-10 flex flex-col gap-2.5">
                <h2 class="font-display font-bold text-[18px] leading-[1.3] tracking-[-0.015em] text-[#18181B]">{{ $pillar['title'] }}</h2>
                <p class="text-[14.5px] leading-[1.6] text-[#52525B] max-w-[30ch]">{{ $pillar['desc'] }}</p>
            </div>
        @endforeach
    </div>
</section>
