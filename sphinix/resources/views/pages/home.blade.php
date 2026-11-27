<x-layouts.app
    title="Sphinix Marketing — Results-Driven Digital Agency"
    description="Bhavnagar-based digital marketing agency and software studio (ChatBox 360, Social 360) working with 150+ businesses since 2017."
    active-nav="home"
    wrapper-class="min-h-[1024px] flex flex-col">

    <x-home.hero :settings="$settings" />
    <x-home.pillars />
    <x-home.about-impact :settings="$settings" />
    <x-home.services-marquee :services="$services" />
    <x-home.clients-marquee :row1="$marqueeRow1" :row2="$marqueeRow2" :clients-count="$settings['clients_count_label'] ?? '150+'" />
    <x-home.video-showcase :video-url="$settings['agency_reel_url'] ?? ''" />
    <x-home.products-faq :faqs="$homeFaqs" />
    <x-home.industries />
    <x-home.testimonials :testimonials="$testimonials" />
    <x-home.insights-journal :featured="$featuredInsight" :entries="$homeInsights" />

    <!-- Dark Closing CTA Section -->
    <section id="contact" class="py-20 lg:py-24 px-6 bg-[#18181B] text-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-end justify-between gap-10">
            <div class="flex flex-col gap-4 max-w-xl">
                <h2 class="font-display font-bold text-[34px] sm:text-[42px] leading-[1.08] tracking-[-0.025em] text-white">
                    <span class="text-[#E85D2A]">Questions?</span><br>Get in touch.
                </h2>
                <p class="font-body text-[16.5px] leading-[1.6] text-white/75">
                    Tell us what you need — social media, SEO, Google Ads, a website, or WhatsApp automation.
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-[#A83300] hover:bg-white hover:text-[#18181B] text-white font-semibold text-[15px] transition-colors">
                        <span>Partner With Us</span>
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                    </a>
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '917048239155' }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-[6px] border border-white/25 text-white font-semibold text-[15px] hover:bg-white/10 transition-colors">
                        <span>WhatsApp Team</span>
                    </a>
                </div>
            </div>

            <div class="border-t md:border-t-0 md:border-l border-white/15 pt-6 md:pt-0 md:pl-10 flex flex-col gap-4 w-full md:w-96">
                <h3 class="font-title font-bold text-[18px] text-white">Direct Inquiries</h3>
                <div class="flex flex-col gap-1">
                    <span class="font-mono text-[11.5px] uppercase tracking-[0.06em] text-white/50">Email</span>
                    <a href="mailto:{{ $settings['primary_email'] ?? 'info@sphinixmarketing.com' }}" class="font-body text-[15px] text-white/90 hover:text-[#FF9F7A] transition-colors">{{ $settings['primary_email'] ?? 'info@sphinixmarketing.com' }}</a>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="font-mono text-[11.5px] uppercase tracking-[0.06em] text-white/50">Phone</span>
                    <span class="font-mono text-[14px] text-white/90 tabular-nums">{{ $settings['primary_phone'] ?? '+91 7048239155' }} / {{ $settings['studio_phone'] ?? '+91 9081711900' }}</span>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
