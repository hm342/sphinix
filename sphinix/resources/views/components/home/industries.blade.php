@php
    $industries = [
        'Healthcare & Hospitals',
        'Retail & E-commerce',
        'Manufacturing & Export',
        'Real Estate',
        'Jewelry & Lifestyle',
        'Education & Coaching',
        'Marine & Industrial',
        'Professional Services',
        'Hospitality & Travel',
        'Startups & SMBs',
        'Scrap & Recycling',
        'FMCG & Food',
    ];
@endphp
<section id="industries" class="py-20 lg:py-24 px-6 bg-[#F7F6F4] border-b border-[#D4D0C8]">
    <div class="max-w-7xl mx-auto flex flex-col gap-10 lg:gap-12">
        <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[38px] lg:text-[42px] leading-[1.1] tracking-[-0.025em] text-[#18181B]">
            Industries <span class="text-[#E85D2A]">we work with</span>
        </h2>

        <ul class="grid grid-cols-1 md:grid-cols-3 gap-x-10 lg:gap-x-14 border-t border-[#D4D0C8]">
            @foreach ($industries as $idx => $industry)
                <li tabindex="0" data-reveal style="--stagger: {{ $idx % 6 }};" class="industry-item min-h-[48px] py-4 sm:py-5 border-b border-[#D4D0C8] flex items-center justify-between gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A] rounded-sm">
                    <span class="industry-name font-body font-medium text-[18px] sm:text-[19px] text-[#18181B]">{{ $industry }}</span>
                    <span class="industry-arrow font-mono text-[16px] text-[#71717A] shrink-0" aria-hidden="true">→</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
