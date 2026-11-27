@props([
    'faqs' => null,
])
@php
    $faqList = collect($faqs ?? []);
@endphp
<section id="products" class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
    <div class="max-w-7xl mx-auto flex flex-col gap-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="flex flex-col gap-3 max-w-2xl">
                <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                    Marketing tools built in-house for <span class="text-brand-orange">everyday business use.</span>
                </h2>
            </div>
            <a href="#contact" class="inline-flex items-center justify-center px-5 py-2.5 rounded border border-light-outline-variant bg-light-surface-container-lowest text-light-on-surface font-label text-label-lg hover:bg-light-surface-container-low transition-colors duration-state-change">
                Request Product Demo
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
            <!-- Product 1: ChatBox 360 Suite -->
            <div data-reveal style="--stagger: 0;" class="lg:col-span-4">
                <article class="h-full bg-light-surface-container-lowest border border-light-outline-variant rounded-lg p-8 flex flex-col justify-between gap-6">
                    <div class="flex flex-col gap-4">
                        <header class="flex flex-col gap-1">
                            <h3 class="font-headline text-headline-md text-light-on-surface">ChatBox 360 Suite</h3>
                            <p class="font-body text-body-md text-light-on-surface-variant">WhatsApp Business API CRM, orders, helpdesk, and chatbot workflows.</p>
                        </header>
                        <ul class="flex flex-col gap-3 border-t border-light-outline-variant pt-4">
                            @foreach (['SmartBot & 24/7 AI Agent', 'Built-in CRM & Follow-up Tracking', 'Order & Appointment Management', 'Shared Team Inbox & Broadcasts'] as $item)
                                <li class="flex items-center gap-2.5 font-body text-body-md text-light-on-surface">
                                    <span class="material-symbols-outlined text-title-md text-brand-orange" aria-hidden="true">check_circle</span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <footer>
                        <a href="{{ route('products.index') }}#chatbox360" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded bg-light-secondary text-light-on-secondary font-label text-label-lg transition-colors duration-state-change hover:bg-light-primary">
                            <span>Explore ChatBox 360</span>
                        </a>
                    </footer>
                </article>
            </div>

            <!-- Product 2: Social 360 Suite -->
            <div data-reveal style="--stagger: 1;" class="lg:col-span-4">
                <article class="h-full bg-light-primary text-light-on-primary rounded-lg p-8 flex flex-col justify-between gap-6">
                    <div class="flex flex-col gap-4">
                        <header class="flex flex-col gap-1">
                            <h3 class="font-headline text-headline-md text-light-on-primary">Social 360 Suite</h3>
                            <p class="font-body text-body-md text-light-on-primary">AI-assisted social media scheduling, publishing, and team analytics.</p>
                        </header>
                        <ul class="flex flex-col gap-3 border-t border-light-on-primary/20 pt-4">
                            @foreach (['AI Studio Content Drafts', 'Multi-Platform Publishing & Bulk Posts', 'Visual Social Media Calendar', 'Team Collaboration & Reports'] as $item)
                                <li class="flex items-center gap-2.5 font-body text-body-md text-light-on-primary">
                                    <span class="material-symbols-outlined text-title-md text-light-on-primary" aria-hidden="true">check_circle</span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <footer>
                        <a href="{{ route('products.index') }}#social360" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded bg-light-surface-container-lowest text-light-on-surface font-label text-label-lg transition-colors duration-state-change hover:bg-light-surface-container-low">
                            <span>Explore Social 360</span>
                        </a>
                    </footer>
                </article>
            </div>

            <!-- FAQs Column -->
            <div data-reveal style="--stagger: 2;" class="lg:col-span-4 flex flex-col gap-6">
                <div class="flex flex-col gap-2">
                    <h3 class="font-headline text-headline-md text-light-on-surface">FAQs</h3>
                    <p class="font-body text-body-md text-light-on-surface-variant">Common questions before starting work together.</p>
                </div>
                <div class="flex flex-col divide-y divide-light-outline-variant border-y border-light-outline-variant">
                    @foreach ($faqList as $faq)
                        <details name="faq-group" class="group py-4" @if($faq->is_open_by_default) open @endif>
                            <summary class="flex items-center justify-between gap-4 cursor-pointer list-none font-label text-label-lg text-light-on-surface">
                                <span>{{ $faq->question }}</span>
                                <span class="material-symbols-outlined text-title-md text-light-on-surface-variant transition-transform duration-state-change group-open:rotate-45" aria-hidden="true">add</span>
                            </summary>
                            <div class="pt-3">
                                <p class="font-body text-body-md text-light-on-surface-variant">{{ $faq->answer }}</p>
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
