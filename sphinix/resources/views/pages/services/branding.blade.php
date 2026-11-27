@php
    $deliverables = [
        ['num' => '01', 'title' => 'Logo Design', 'desc' => 'Distinctive, scalable wordmarks and brand symbols designed to stay sharp from mobile icons to outdoor signage.'],
        ['num' => '02', 'title' => 'Brand Identity & Guidelines', 'desc' => 'Color codes, typography hierarchies, spacing rules, and tone guides that keep every vendor aligned.'],
        ['num' => '03', 'title' => 'Social Media Graphics', 'desc' => 'Cohesive post templates, campaign announcement grids, and story kits ready for fast daily publishing.'],
        ['num' => '04', 'title' => 'Marketing Collateral Design', 'desc' => 'Letterheads, visiting cards, standees, event backdrops, and print-ready sales kits.'],
        ['num' => '05', 'title' => 'Packaging Design', 'desc' => 'Shelf-ready boxes, pouches, and product labels combining regulatory clarity with strong shelf presence.'],
        ['num' => '06', 'title' => 'Brochure & Catalogue Design', 'desc' => 'Structured multi-page product catalogues and sales brochures crafted for retail and B2B distribution.'],
        ['num' => '07', 'title' => 'Infographic Design', 'desc' => 'Clear visual breakdowns that simplify complex processes, specs, and comparisons for fast scanning.'],
        ['num' => '08', 'title' => 'Pitch Deck & Presentation Design', 'desc' => 'Clean executive decks for investor pitches, dealer onboarding, and corporate sales calls.'],
    ];
    $swatches = [
        ['hex' => '#EB9131', 'label' => 'Amber Accent'],
        ['hex' => '#E65526', 'label' => 'Flame Orange'],
        ['hex' => '#A42220', 'label' => 'Crimson Red'],
        ['hex' => '#000000', 'label' => 'Carbon Black'],
    ];
    $tools = ['Adobe Photoshop', 'Adobe Illustrator', 'Adobe InDesign', 'Adobe Firefly', 'Canva', 'Figma', 'ChatGPT', '& More Technologies'];
    $steps = [
        ['num' => '01', 'title' => 'Brand Discovery & Research', 'desc' => 'Audit competitors, buyer expectations, positioning, and existing brand touchpoints.'],
        ['num' => '02', 'title' => 'Concept & Mood Board', 'desc' => 'Establish visual direction, typographic tone, color system, and mark explorations.'],
        ['num' => '03', 'title' => 'Design & Iterations', 'desc' => 'Refine the selected identity across packaging, print collateral, and digital formats.'],
        ['num' => '04', 'title' => 'Final Delivery', 'desc' => 'Hand over print-ready PDFs, vector source files, web exports, and brand usage guidelines.'],
    ];
@endphp
<x-layouts.app
    title="Branding & Design — Sphinix Marketing | Identity, Packaging & Collateral"
    description="Logo design, brand identity & guidelines, packaging design, brochures, pitch decks, and social media graphics by Sphinix Marketing."
    active-nav="services">

    <x-services.hero
        service-num="04"
        service-name="Branding & Design"
        headline="Visual identities that"
        accent-word="speak before you do."
        description="We craft visual identities that speak before you do. Turning your brand into a powerful first impression that lasts."
        cta-label="Discuss Brand Identity"
        tools-summary="Photoshop · Illustrator · InDesign · Figma · Canva"
        image="images/svc_04_branding.jpg"
        image-alt="Logo design, brand guidelines, and packaging identity system illustration" />

    <!-- Deliverables Index -->
    <section class="py-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">Identity &amp; Print Systems</span>
                    <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]">
                        Eight design disciplines under one studio.
                    </h2>
                </div>
                <p class="font-body text-[15px] text-[#52525B] max-w-md">
                    A strong brand identity builds instant recognition and trust across print packaging and digital channels.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 lg:gap-x-16 border-t border-[#D4D0C8]">
                @foreach ($deliverables as $idx => $item)
                    <div data-reveal style="--stagger: {{ $idx % 4 }};" class="py-7 border-b border-[#D4D0C8] flex flex-col gap-2">
                        <span class="font-mono text-[12px] font-semibold text-[#A83300]">{{ $item['num'] }}</span>
                        <h3 class="font-title font-bold text-[21px] text-[#18181B]">{{ $item['title'] }}</h3>
                        <p class="font-body text-[15px] leading-[1.6] text-[#52525B]">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Brand System Specimen + Tools -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 flex flex-col gap-6">
                <h2 data-reveal class="font-headline text-headline-lg text-light-on-surface">
                    Strategically aligned with your business goals and audience.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    Our design team creates visuals that are not just beautiful, but structured with repeatable color systems, typography specifications, and print-ready production files.
                </p>

                <div class="flex flex-wrap gap-2 pt-2">
                    @foreach ($tools as $tool)
                        <span class="px-3 py-1.5 bg-white border border-[#D4D0C8] font-mono text-[12px] text-[#18181B]">{{ $tool }}</span>
                    @endforeach
                </div>
            </div>

            <!-- Interactive-Feel Brand Spec Sheet from PDF Page 8 -->
            <div data-reveal class="lg:col-span-6 bg-white border border-[#D4D0C8] p-8 flex flex-col gap-6">
                <div class="flex items-center justify-between border-b border-[#E4E4E7] pb-3">
                    <span class="font-mono text-[11px] uppercase tracking-[0.08em] text-[#52525B]">Identity Specification Example</span>
                    <span class="font-mono text-[11px] text-[#A83300]">Sphinix Palette &amp; Type</span>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach ($swatches as $sw)
                        <div class="flex flex-col gap-2">
                            <div class="h-16 w-full border border-black/10" style="background-color: {{ $sw['hex'] }};"></div>
                            <span class="font-mono text-[11.5px] font-semibold text-[#18181B]">{{ $sw['hex'] }}</span>
                            <span class="font-body text-[11.5px] text-[#52525B]">{{ $sw['label'] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="pt-4 border-t border-[#E4E4E7] flex flex-wrap items-baseline justify-between gap-4">
                    <div>
                        <p class="font-display font-bold text-[22px] text-[#18181B]">Poppins Latin Bold</p>
                        <p class="font-body font-normal text-[16px] text-[#52525B]">Poppins Light — Body &amp; Supporting Copy</p>
                    </div>
                    <span class="font-mono text-[11.5px] text-[#71717A]">Print + Digital Spec</span>
                </div>
            </div>
        </div>
    </section>

    <x-services.process-band
        heading="The 4-step branding & design process."
        :steps="$steps" />

    <x-services.other-services current-slug="branding" />

    <x-section-cta
        variant="warm"
        title="Ready to upgrade your brand identity or packaging?"
        description="Talk to our designers about logos, brand guidelines, catalogues, or pitch decks."
        primary-label="Discuss Brand Identity"
        :primary-href="route('contact.show')" />

</x-layouts.app>
