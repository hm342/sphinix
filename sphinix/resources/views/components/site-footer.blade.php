@props([
    'activeNav' => 'none',
    'siteSettings' => [],
])
@php
    $footerLinks = [
        ['key' => 'about', 'label' => 'About', 'href' => route('about')],
        ['key' => 'services', 'label' => 'Services', 'href' => route('services.index')],
        ['key' => 'products', 'label' => 'Products', 'href' => route('products.index')],
        ['key' => 'work', 'label' => 'Work', 'href' => route('work.index')],
        ['key' => 'insights', 'label' => 'Insights', 'href' => route('insights.index')],
        ['key' => 'contact', 'label' => 'Contact', 'href' => route('contact.show')],
    ];
@endphp
<footer class="bg-light-surface-container-lowest border-t border-light-outline-variant py-16 px-6">
    <div class="max-w-7xl mx-auto flex flex-col gap-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="flex flex-col gap-3">
                <span class="font-title text-title-md text-light-on-surface">Head Office</span>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    {{ $siteSettings['head_office_address'] ?? 'B-3, Shantiniketan Complex, Parimal Chowk, Waghawadi Road, Bhavnagar - 364001, Gujarat, India' }}
                </p>
                <span class="font-mono text-mono-sm text-light-on-surface tabular-nums">{{ $siteSettings['primary_phone'] ?? '+91 7048239155' }}</span>
            </div>

            <div class="flex flex-col gap-3">
                <span class="font-title text-title-md text-light-on-surface">Creative Studio</span>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    {{ $siteSettings['studio_address'] ?? 'Swastik Complex, Mokhdaji Circle, Bhavnagar, Gujarat, India' }}
                </p>
                <span class="font-mono text-mono-sm text-light-on-surface tabular-nums">{{ $siteSettings['studio_phone'] ?? '+91 9081711900' }}</span>
            </div>

            <div class="flex flex-col gap-3">
                <span class="font-title text-title-md text-light-on-surface">Products &amp; Web</span>
                <ul class="flex flex-col gap-2 font-body text-body-md text-light-on-surface-variant">
                    <li><a href="{{ route('products.index') }}#chatbox360" class="hover:text-light-primary">ChatBox 360 Suite</a></li>
                    <li><a href="{{ route('products.index') }}#social360" class="hover:text-light-primary">Social 360 Suite</a></li>
                    <li><a href="{{ route('products.index') }}#aajkagraphic" class="hover:text-light-primary">Aaj Ka Graphic</a></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-light-primary">All Services</a></li>
                </ul>
            </div>

            <div class="flex flex-col gap-3">
                <span class="font-title text-title-md text-light-on-surface">Stay Updated</span>
                <p class="font-body text-body-md text-light-on-surface-variant">Direct updates and product questions: {{ $siteSettings['primary_email'] ?? 'info@sphinixmarketing.com' }}</p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form flex gap-2" novalidate>
                    @csrf
                    <input type="email" name="email" placeholder="Work email" aria-label="Work email address" class="flex-1 min-w-0 px-3 py-2 rounded border border-light-outline-variant bg-light-surface text-light-on-surface font-body text-body-md focus:outline-none focus:ring-2 focus:ring-light-primary">
                    <button type="submit" class="px-4 py-2 rounded bg-light-secondary text-light-on-secondary font-label text-label-md hover:bg-light-primary transition-colors duration-state-change">
                        Join
                    </button>
                </form>
                <p class="newsletter-status font-body text-[12px] text-[#52525B]" aria-live="polite">
                    @if (session('newsletter_success'))
                        {{ session('newsletter_success') }}
                    @endif
                </p>
            </div>
        </div>

        <div class="pt-8 border-t border-light-outline-variant flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-label text-label-md text-light-outline">© {{ date('Y') }} Sphinix Marketing. Results Driven Agency. All rights reserved.</p>
            <div class="flex flex-wrap items-center gap-6 font-label text-label-md text-light-on-surface-variant">
                @foreach ($footerLinks as $link)
                    <a href="{{ $link['href'] }}" class="{{ $activeNav === $link['key'] ? 'text-light-primary font-semibold' : 'hover:text-light-primary' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
