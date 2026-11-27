<x-layouts.app
    title="Page Not Found — Sphinix Marketing"
    description="The page you are looking for cannot be found on Sphinix Marketing."
    active-nav="none"
    main-class="flex-1 -mt-[84px] hero-canvas relative flex items-center justify-center pt-32 pb-20 px-6 overflow-x-clip">

    <div class="max-w-3xl mx-auto flex flex-col items-center text-center gap-8">
        <span class="font-display font-extrabold text-display-xl text-brand-orange leading-none select-none">404</span>

        <div class="flex flex-col gap-3">
            <h1 class="font-display font-extrabold tracking-[-0.025em] text-display-lg-mobile lg:text-display-lg text-light-on-surface">
                Page Not Found
            </h1>
            <p class="font-body text-body-lg text-light-on-surface-variant max-w-xl">
                The page you are looking for doesn't exist, has been removed, or had its URL changed. Let's get you back on track.
            </p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded bg-light-primary text-light-on-primary font-label text-label-lg hover:bg-brand-charcoal transition-colors">
                <span>Return to Homepage</span>
                <span class="material-symbols-outlined text-title-md">home</span>
            </a>
            <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded border border-light-outline-variant bg-light-surface-container-lowest text-light-on-surface font-label text-label-lg hover:bg-light-surface-container-low transition-colors">
                Explore Services
            </a>
            <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded border border-light-outline-variant bg-light-surface-container-lowest text-light-on-surface font-label text-label-lg hover:bg-light-surface-container-low transition-colors">
                Contact Us
            </a>
        </div>

        <div class="pt-8 grid grid-cols-1 sm:grid-cols-3 gap-x-8 gap-y-4 w-full border-t border-[#D4D0C8] text-left">
            <a href="{{ route('products.index') }}#chatbox360" class="py-4 border-b border-[#D4D0C8] group flex flex-col gap-1.5">
                <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">01 · WhatsApp API</span>
                <span class="font-title font-semibold text-[16px] text-[#18181B] group-hover:text-[#E85D2A] transition-colors">ChatBox 360 Suite →</span>
                <span class="font-body text-[13.5px] text-[#52525B]">Automate lead capture and team conversations on WhatsApp.</span>
            </a>

            <a href="{{ route('services.seo') }}" class="py-4 border-b border-[#D4D0C8] group flex flex-col gap-1.5">
                <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">02 · Organic Growth</span>
                <span class="font-title font-semibold text-[16px] text-[#18181B] group-hover:text-[#E85D2A] transition-colors">SEO Services →</span>
                <span class="font-body text-[13.5px] text-[#52525B]">Technical audits, ranking growth, and backlink authority.</span>
            </a>

            <a href="{{ route('work.index') }}" class="py-4 border-b border-[#D4D0C8] group flex flex-col gap-1.5">
                <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">03 · Portfolio</span>
                <span class="font-title font-semibold text-[16px] text-[#18181B] group-hover:text-[#E85D2A] transition-colors">Our Work →</span>
                <span class="font-body text-[13.5px] text-[#52525B]">Client list and case studies across 15+ industries.</span>
            </a>
        </div>
    </div>

</x-layouts.app>
