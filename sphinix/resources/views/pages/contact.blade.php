<x-layouts.app
    title="Contact Us — Sphinix Marketing | Book a Consultation"
    description="Get in touch with Sphinix Marketing in Bhavnagar. Talk to our strategy team or chat directly on WhatsApp."
    active-nav="contact">

    <section class="bg-[#F7F6F4] pt-32 pb-20 lg:pt-36 lg:pb-24 px-6 border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h1 class="font-display font-extrabold text-[36px] sm:text-[46px] lg:text-[52px] leading-[1.06] tracking-[-0.028em] text-[#18181B] text-balance">
                    Talk to <span class="text-[#E85D2A]">our team.</span>
                </h1>
                <p class="font-body text-[16.5px] leading-[1.6] text-[#52525B]">
                    Tell us what you sell, where you are stuck, or which product walkthrough you want to see.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
                <!-- Left Column: Inquiry Form -->
                <div class="lg:col-span-7 bg-[#FFFFFF] border border-[#E4E4E7] rounded-xl p-8 md:p-10 flex flex-col gap-6">
                    <div class="flex flex-col gap-1.5">
                        <h2 class="font-headline font-bold text-[24px] text-[#18181B]">Request a Consultation</h2>
                        <p class="font-body text-[14.5px] text-[#52525B]">Send your details below and our Bhavnagar team will follow up directly.</p>
                    </div>

                    <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="flex flex-col gap-5" novalidate>
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col gap-2">
                                <label for="contact-name" class="font-label text-label-sm text-light-on-surface">Full Name *</label>
                                <input type="text" id="contact-name" name="name" value="{{ old('name') }}" autocomplete="name" required placeholder="Your full name" class="h-11 px-4 rounded border border-light-outline-variant bg-light-surface text-light-on-surface font-body text-body-md focus:outline-none focus:ring-2 focus:ring-[#E85C27]">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="contact-email" class="font-label text-label-sm text-light-on-surface">Work Email *</label>
                                <input type="email" id="contact-email" name="email" value="{{ old('email') }}" autocomplete="email" required placeholder="name@company.com" class="h-11 px-4 rounded border border-light-outline-variant bg-light-surface text-light-on-surface font-body text-body-md focus:outline-none focus:ring-2 focus:ring-[#E85C27]">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col gap-2">
                                <label for="contact-phone" class="font-label text-label-sm text-light-on-surface">Phone Number *</label>
                                <input type="tel" id="contact-phone" name="phone" value="{{ old('phone') }}" autocomplete="tel" required placeholder="+91 98765 43210" class="h-11 px-4 rounded border border-light-outline-variant bg-light-surface text-light-on-surface font-body text-body-md focus:outline-none focus:ring-2 focus:ring-[#E85C27]">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="contact-service" class="font-label text-label-sm text-light-on-surface">Primary Service Needed *</label>
                                <select id="contact-service" name="service" required class="h-11 px-4 rounded border border-light-outline-variant bg-light-surface text-light-on-surface font-body text-body-md focus:outline-none focus:ring-2 focus:ring-[#E85C27]">
                                    <option value="" disabled @selected(!old('service'))>Select a discipline</option>
                                    @foreach ($servicesList as $svc)
                                        <option value="{{ $svc }}" @selected(old('service') === $svc)>{{ $svc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="contact-message" class="font-label text-label-sm text-light-on-surface">Project Details &amp; Business Goals</label>
                            <textarea id="contact-message" name="message" rows="4" placeholder="Tell us about your company, current channels, and growth targets..." class="px-4 py-3 rounded border border-light-outline-variant bg-light-surface text-light-on-surface font-body text-body-md focus:outline-none focus:ring-2 focus:ring-[#E85C27]">{{ old('message') }}</textarea>
                        </div>

                        <div id="form-error" role="alert" class="{{ $errors->any() ? '' : 'hidden' }} p-4 rounded bg-light-error/10 border border-light-error/30 text-light-error font-label text-label-md">
                            {{ $errors->first() ?: 'Please fill in your name, a valid work email, phone number, and primary service.' }}
                        </div>

                        <div id="form-success" role="status" class="{{ session('contact_success') ? '' : 'hidden' }} p-4 rounded bg-success/10 border border-success/30 text-success font-label text-label-md">
                            {{ session('contact_success') }}
                        </div>

                        <button type="submit" class="self-start inline-flex items-center justify-center gap-2 px-7 py-3 rounded-[6px] bg-[#A83300] text-white font-body font-semibold text-[15px] transition-colors hover:bg-[#18181B] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                            <span>Submit Inquiry</span>
                            <span class="material-symbols-outlined text-[18px]" aria-hidden="true">send</span>
                        </button>
                    </form>
                </div>

                <!-- Right Column: Dark WhatsApp Fast-Track + Hairline Dual-Office Directory -->
                <div class="lg:col-span-5 flex flex-col gap-6">
                    <div class="p-8 rounded-xl bg-[#18181B] text-white flex flex-col gap-4">
                        <h3 class="font-headline font-bold text-[24px] text-white">Chat directly on WhatsApp</h3>
                        <p class="font-body text-[14.5px] leading-[1.6] text-white/75">
                            Connect with our strategy team immediately to get quick answers, check availability, or discuss urgent campaigns.
                        </p>
                        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '917048239155' }}?text=Hi%20Sphinix%20team,%20I%20would%20like%20to%20discuss%20a%20digital%20marketing%20project" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[6px] bg-success text-white font-semibold text-[15px] hover:bg-success/90 transition-colors">
                            <span class="material-symbols-outlined text-[18px]" aria-hidden="true">chat</span>
                            <span>Message {{ $settings['primary_phone'] ?? '+91 7048239155' }}</span>
                        </a>
                    </div>

                    <div class="bg-[#FFFFFF] border border-[#E4E4E7] rounded-xl px-8 divide-y divide-[#E4E4E7]">
                        <div class="py-6 flex flex-col gap-2">
                            <h3 class="font-title font-bold text-[19px] text-[#18181B]">Head Office</h3>
                            <p class="font-body text-[14.5px] leading-[1.6] text-[#52525B]">
                                {{ $settings['head_office_address'] ?? 'B-3, Shantiniketan Complex, Parimal Chowk, Waghawadi Road, Bhavnagar - 364001, Gujarat, India.' }}
                            </p>
                            <div class="pt-2 flex flex-wrap gap-x-5 gap-y-1 font-mono text-[12.5px] text-[#18181B]">
                                <a href="tel:{{ preg_replace('/\s+/', '', $settings['primary_phone'] ?? '+917048239155') }}" class="hover:text-[#A83300]">{{ $settings['primary_phone'] ?? '+91 7048239155' }}</a>
                                <a href="mailto:{{ $settings['primary_email'] ?? 'info@sphinixmarketing.com' }}" class="hover:text-[#A83300]">{{ $settings['primary_email'] ?? 'info@sphinixmarketing.com' }}</a>
                            </div>
                        </div>

                        <div class="py-6 flex flex-col gap-2">
                            <h3 class="font-title font-bold text-[19px] text-[#18181B]">Creative Studio</h3>
                            <p class="font-body text-[14.5px] leading-[1.6] text-[#52525B]">
                                {{ $settings['studio_address'] ?? 'Swastik Complex, Mokhdaji Circle, Bhavnagar, Gujarat, India.' }}
                            </p>
                            <div class="pt-2 flex flex-wrap gap-x-5 gap-y-1 font-mono text-[12.5px] text-[#18181B]">
                                <a href="tel:{{ preg_replace('/\s+/', '', $settings['studio_phone'] ?? '+919081711900') }}" class="hover:text-[#A83300]">{{ $settings['studio_phone'] ?? '+91 9081711900' }}</a>
                                <span class="text-[#52525B]">{{ $settings['studio_hours'] ?? 'Mon - Sat · 10:00 AM - 7:00 PM IST' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 px-6 bg-[#F7F6F4] border-b border-[#E4E4E7]">
        <div class="max-w-4xl mx-auto flex flex-col gap-8">
            <div class="flex flex-col gap-2 text-center items-center">
                <h2 class="font-headline text-headline-lg text-light-on-surface">Common questions before we start.</h2>
            </div>

            <div class="flex flex-col divide-y divide-light-outline-variant border-y border-light-outline-variant">
                @foreach ($faqs as $faq)
                    <details name="contact-faq" class="group py-5" @if($faq->is_open_by_default) open @endif>
                        <summary class="flex items-center justify-between gap-4 cursor-pointer list-none font-label text-label-lg text-light-on-surface">
                            <span>{{ $faq->question }}</span>
                            <span class="material-symbols-outlined text-title-md text-light-on-surface-variant transition-transform group-open:rotate-45" aria-hidden="true">add</span>
                        </summary>
                        <div class="pt-3">
                            <p class="font-body text-body-md text-light-on-surface-variant">{{ $faq->answer }}</p>
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>
