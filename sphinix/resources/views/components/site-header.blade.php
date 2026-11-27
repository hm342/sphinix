@props([
    'activeNav' => 'none',
    'solid' => false,
    'megaServices' => null,
    'siteSettings' => [],
])
@php
    $servicesMenu = collect($megaServices ?? []);
    $desktopClass = static fn (string $key): string => $activeNav === $key
        ? 'nav-link px-3.5 py-1.5 rounded-full font-body font-semibold text-[14px] text-[#A83300] hover:text-[#202020] transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]'
        : 'nav-link px-3.5 py-1.5 rounded-full font-body font-medium text-[14px] text-[#202020] hover:text-[#A83300] transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]';
    $mobileClass = static fn (string $key): string => $activeNav === $key
        ? 'flex items-center justify-between py-3 border-b border-light-outline-variant font-semibold text-[15px] text-[#A83300] hover:text-[#202020] transition-colors'
        : 'flex items-center justify-between py-3 border-b border-light-outline-variant font-medium text-[15px] text-[#202020] hover:text-[#A83300] transition-colors';
@endphp
<header id="site-header" class="sticky top-0 z-50 h-[84px] {{ $solid ? 'header-solid' : '' }}">
    <div class="max-w-[1360px] mx-auto px-5 sm:px-8 lg:px-10 h-[84px] flex items-center justify-between gap-4">

        <!-- Wordmark Logo -->
        <a href="{{ route('home') }}" class="flex items-center shrink-0 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27] rounded-md" aria-label="Sphinix Marketing Home">
            <img src="{{ asset('images/sphinix_logo.webp') }}" alt="Sphinix Marketing" class="h-9 sm:h-10 w-auto object-contain" loading="eager" decoding="async">
        </a>

        <!-- Centered Translucent Beige Capsule Navigation -->
        <nav id="nav-pill" aria-label="Primary Navigation" class="hidden lg:flex items-center gap-0.5 px-2 py-1 rounded-full backdrop-blur-sm">
            <a href="{{ route('home') }}" class="{{ $desktopClass('home') }}" @if($activeNav === 'home') aria-current="page" @endif>
                Home
            </a>

            <!-- Services with Accessible Mega Menu -->
            <div class="relative" id="services-nav-item">
                <button type="button" id="services-nav-btn" aria-haspopup="true" aria-expanded="false" class="{{ $activeNav === 'services' ? 'nav-link px-3.5 py-1.5 rounded-full font-body font-semibold text-[14px] text-[#A83300] hover:text-[#202020] transition-colors duration-150 flex items-center gap-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]' : 'nav-link px-3.5 py-1.5 rounded-full font-body font-medium text-[14px] text-[#202020] hover:text-[#A83300] transition-colors duration-150 flex items-center gap-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]' }}">
                    Services
                    <span id="services-chevron" class="material-symbols-outlined text-[16px] text-[#52525B] transition-transform duration-150" aria-hidden="true">keyboard_arrow_down</span>
                </button>

                <!-- Mega Menu Panel -->
                <div id="services-mega" class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-[540px] bg-white border border-light-outline-variant rounded-xl shadow-lg shadow-black/8 opacity-0 invisible translate-y-1 transition-all duration-200 ease-out pointer-events-none">
                    <div class="p-4 grid grid-cols-2 gap-1">
                        @foreach ($servicesMenu as $svc)
                            <a href="{{ $svc->public_href }}" class="mega-item flex items-start gap-3 p-2.5 rounded-lg hover:bg-[#FFF8F1] transition-colors duration-150 group/item">
                                <span class="material-symbols-outlined text-[20px] text-[#E85C27] mt-0.5 shrink-0" aria-hidden="true">{{ $svc->nav_icon }}</span>
                                <span class="flex flex-col gap-0.5">
                                    <span class="font-body font-semibold text-[14px] text-[#202020] group-hover/item:text-[#A83300] transition-colors duration-150">{{ $svc->nav_title }}</span>
                                    <span class="font-body text-[12px] text-[#444444] leading-snug">{{ $svc->nav_desc }}</span>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <div class="border-t border-light-outline-variant px-4 py-2.5 flex items-center justify-between bg-[#FAF8F5] rounded-b-xl">
                        <span class="font-body text-[12px] text-[#52525B]">{{ $siteSettings['clients_count_label'] ?? '150+' }} clients across {{ $siteSettings['industries_count_label'] ?? '15+' }} industries</span>
                        <a href="{{ route('services.index') }}" class="font-body font-semibold text-[13px] text-[#A83300] hover:text-[#202020] flex items-center gap-1 transition-colors duration-150">
                            View all services
                            <span class="material-symbols-outlined text-[15px]" aria-hidden="true">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ route('work.index') }}" class="{{ $desktopClass('work') }}" @if($activeNav === 'work') aria-current="page" @endif>
                Work
            </a>
            <a href="{{ route('about') }}" class="{{ $desktopClass('about') }}" @if($activeNav === 'about') aria-current="page" @endif>
                About
            </a>
            <a href="{{ route('insights.index') }}" class="{{ $desktopClass('insights') }}" @if($activeNav === 'insights') aria-current="page" @endif>
                Insights
            </a>
            <a href="{{ route('contact.show') }}" class="{{ $desktopClass('contact') }}" @if($activeNav === 'contact') aria-current="page" @endif>
                Contact
            </a>
        </nav>

        <!-- Right CTA Actions -->
        <div class="flex items-center gap-4 shrink-0">
            <a href="{{ route('contact.show') }}" class="hidden md:inline-flex items-center font-body font-semibold text-[14px] text-[#A83300] hover:text-[#202020] transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27] rounded">
                Book a Call
            </a>
            <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-[6px] bg-[#A83300] hover:bg-[#202020] text-white font-body font-semibold text-[14px] transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                Partner With Us
            </a>
            <button id="mobile-menu-btn" type="button" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu" class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-[6px] border border-[#DFD4C3] bg-white/80 text-[#202020] hover:bg-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27]">
                <span id="mobile-menu-icon" class="material-symbols-outlined text-[20px]">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <nav id="mobile-menu" class="hidden lg:hidden border-t border-light-outline-variant bg-white shadow-lg" aria-label="Mobile Navigation">
        <div class="px-5 py-4 flex flex-col font-body">
            <a href="{{ route('home') }}" class="{{ $mobileClass('home') }}" @if($activeNav === 'home') aria-current="page" @endif>Home</a>
            <div>
                <button type="button" id="mobile-services-btn" class="w-full flex items-center justify-between py-3 font-medium text-[15px] text-[#202020]">
                    Services
                    <span id="mobile-services-chevron" class="material-symbols-outlined text-[18px] text-[#52525B] transition-transform duration-150">keyboard_arrow_down</span>
                </button>
                <div id="mobile-services-panel" class="hidden flex-col pl-4 py-2 gap-0.5">
                    @foreach ($servicesMenu as $svc)
                        <a href="{{ $svc->public_href }}" class="py-2 font-medium text-[14px] text-[#444444] hover:text-[#A83300] transition-colors">
                            {{ $svc->nav_title === 'Social Media' ? 'Social Media Marketing' : $svc->nav_title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('work.index') }}" class="{{ $mobileClass('work') }}" @if($activeNav === 'work') aria-current="page" @endif>Work</a>
            <a href="{{ route('about') }}" class="{{ $mobileClass('about') }}" @if($activeNav === 'about') aria-current="page" @endif>About</a>
            <a href="{{ route('insights.index') }}" class="{{ $mobileClass('insights') }}" @if($activeNav === 'insights') aria-current="page" @endif>Insights</a>
            <a href="{{ route('contact.show') }}" class="{{ $mobileClass('contact') }}" @if($activeNav === 'contact') aria-current="page" @endif>Contact</a>
            <div class="pt-4 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <a href="{{ route('contact.show') }}" class="w-full text-center py-2.5 rounded-[6px] border border-[#A83300] font-semibold text-[14px] text-[#A83300] hover:bg-[#FFF8F1] transition-colors">Book a Call</a>
                <a href="{{ route('contact.show') }}" class="w-full text-center py-2.5 rounded-[6px] bg-[#A83300] text-white font-semibold text-[14px] hover:bg-[#202020] transition-colors">Partner With Us</a>
            </div>
        </div>
    </nav>
</header>
