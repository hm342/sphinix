@props([
    'settings' => [],
])
<section class="bg-light-surface border-b border-light-outline-variant">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <!-- Left Image + Dual Stat Cards -->
        <div class="relative min-h-96 overflow-hidden bg-brand-charcoal">
            <img src="{{ asset('images/impact_collaboration.jpg') }}" alt="Sphinix Marketing team reviewing client campaigns in Bhavnagar" class="w-full h-full object-cover object-center" loading="lazy" decoding="async">
            <div data-reveal style="--stagger: 1;" class="absolute left-4 sm:left-16 right-4 bottom-3 sm:bottom-4 grid grid-cols-1 sm:grid-cols-2 items-stretch">
                <div class="bg-light-primary/95 text-light-on-primary p-6 sm:p-8 flex flex-col justify-center gap-3">
                    <div class="flex items-center gap-3">
                        <span class="font-display font-bold text-display-lg tabular-nums">{{ $settings['projects_count_label'] ?? '700+' }}</span>
                    </div>
                    <p class="font-body text-body-md text-light-on-primary">Projects delivered across {{ $settings['industries_count_label'] ?? '15+' }} industries.</p>
                </div>
                <div class="bg-brand-charcoal/90 backdrop-blur-sm border-t sm:border-t-0 sm:border-l border-white/10 text-light-on-secondary p-6 sm:p-8 flex flex-col justify-center">
                    <p class="font-body text-body-md text-light-on-secondary">Affordable marketing and web builds for small businesses since 2017.</p>
                </div>
            </div>
        </div>

        <!-- Right Story & Verified Pillars -->
        <div data-reveal style="--stagger: 2;" class="flex flex-col justify-center px-6 py-16 lg:px-16 lg:py-24">
            <div class="max-w-xl flex flex-col gap-6">
                <h2 class="font-headline text-headline-lg-mobile lg:text-headline-lg text-light-on-surface text-balance">
                    Digital marketing and web builds since 2017.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant text-pretty">
                    We started in 2017 with a practical goal: give small businesses affordable digital marketing and websites that actually generate leads. Today we work with both small companies and corporate teams.
                </p>

                <div class="flex flex-col divide-y divide-light-outline-variant border-y border-light-outline-variant pt-1">
                    <div class="py-3.5 flex items-center justify-between gap-4">
                        <span class="font-label text-label-lg text-light-on-surface">In-House Team</span>
                        <span class="font-body text-[13px] text-light-on-surface-variant">Bhavnagar Head Office &amp; Studio</span>
                    </div>
                    <div class="py-3.5 flex items-center justify-between gap-4">
                        <span class="font-label text-label-lg text-light-on-surface">Client Base</span>
                        <span class="font-body text-[13px] text-light-on-surface-variant">{{ $settings['clients_count_label'] ?? '150+' }} Clients Worldwide</span>
                    </div>
                    <div class="py-3.5 flex items-center justify-between gap-4">
                        <span class="font-label text-label-lg text-light-on-surface">In-House Software</span>
                        <span class="font-body text-[13px] text-light-on-surface-variant">ChatBox 360 · Social 360 · Aaj Ka Graphic</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
