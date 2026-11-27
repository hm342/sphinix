@props([
    'title' => 'Admin — Sphinix Marketing',
    'heading' => 'Dashboard',
])
@php
    $navItems = [
        ['route' => 'admin.dashboard', 'match' => 'admin.dashboard', 'icon' => 'dashboard', 'label' => 'Overview'],
        ['route' => 'admin.logos.index', 'match' => 'admin.logos.*', 'icon' => 'business', 'label' => 'Company Logos'],
        ['route' => 'admin.work.index', 'match' => 'admin.work.*', 'icon' => 'work', 'label' => 'Work & Case Studies'],
        ['route' => 'admin.insights.index', 'match' => 'admin.insights.*', 'icon' => 'article', 'label' => 'Insights & Notes'],
        ['route' => 'admin.inquiries.index', 'match' => 'admin.inquiries.*', 'icon' => 'inbox', 'label' => 'Contact Inquiries', 'badge' => $newInquiriesCount ?? 0],
        ['route' => 'admin.subscribers.index', 'match' => 'admin.subscribers.*', 'icon' => 'mail', 'label' => 'Newsletter'],
        ['route' => 'admin.services.index', 'match' => 'admin.services.*', 'icon' => 'design_services', 'label' => 'Services'],
        ['route' => 'admin.testimonials.index', 'match' => 'admin.testimonials.*', 'icon' => 'format_quote', 'label' => 'Testimonials'],
        ['route' => 'admin.faqs.index', 'match' => 'admin.faqs.*', 'icon' => 'help', 'label' => 'FAQs'],
        ['route' => 'admin.settings.edit', 'match' => 'admin.settings.*', 'icon' => 'tune', 'label' => 'Agency Settings'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link id="site-favicon" rel="icon" type="image/webp" href="{{ asset('images/sphinix_logo.webp') }}">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700;800&amp;family=Manrope:wght@400;500;600;700&amp;family=IBM+Plex+Mono:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=block" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F7F6F4] text-[#18181B] font-body antialiased min-h-screen">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <aside class="lg:w-64 shrink-0 bg-[#18181B] text-white flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-[#27272A]">
            <div>
                <div class="px-5 py-5 border-b border-white/10 flex items-center justify-between gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#ec7a2d]"></span>
                        <span class="font-display font-bold text-[17px] tracking-tight text-white">Sphinix CMS</span>
                    </a>
                    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="font-mono text-[11px] uppercase tracking-[0.06em] text-white/65 hover:text-[#ec7a2d] transition-colors">
                        View Site ↗
                    </a>
                </div>

                <nav class="p-3 flex lg:flex-col gap-1 overflow-x-auto" aria-label="Admin Navigation">
                    @foreach ($navItems as $item)
                        @php $active = request()->routeIs($item['match']); @endphp
                        <a href="{{ route($item['route']) }}"
                           class="flex items-center justify-between gap-2.5 px-3 py-2.5 rounded-[6px] text-[13.5px] font-medium whitespace-nowrap transition-colors {{ $active ? 'bg-[#ec7a2d] text-[#18181B] font-semibold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <span class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">{{ $item['icon'] }}</span>
                                <span>{{ $item['label'] }}</span>
                            </span>
                            @if (!empty($item['badge']))
                                <span class="px-1.5 py-0.5 rounded text-[11px] font-mono tabular-nums {{ $active ? 'bg-[#18181B] text-white' : 'bg-[#A83300] text-white' }}">
                                    {{ $item['badge'] }}
                                </span>
                            @endif
                        </a>
                    @endforeach
                </nav>
            </div>

            <div class="p-4 border-t border-white/10 flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <p class="text-[13px] font-semibold text-white truncate">{{ auth()->user()?->name }}</p>
                    <p class="font-mono text-[11px] text-white/55 truncate">{{ auth()->user()?->email }}</p>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded border border-white/20 text-[12px] font-medium text-white/85 hover:bg-white/10 transition-colors">
                        Sign out
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            <header class="bg-white border-b border-[#E4E4E7] px-6 py-4 flex flex-wrap items-center justify-between gap-4">
                <h1 class="font-display font-bold text-[22px] sm:text-[25px] tracking-[-0.02em] text-[#18181B]">
                    {{ $heading }}
                </h1>
                @isset($actions)
                    <div class="flex items-center gap-3">
                        {{ $actions }}
                    </div>
                @endisset
            </header>

            <main class="flex-1 p-6 max-w-6xl w-full mx-auto flex flex-col gap-6">
                @if (session('status'))
                    <div role="status" class="px-4 py-3 rounded-[6px] bg-green-50 border border-green-200 text-green-900 text-[14px] font-medium">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div role="alert" class="px-4 py-3 rounded-[6px] bg-red-50 border border-red-200 text-red-900 text-[14px]">
                        <p class="font-semibold mb-1">Please fix the following errors:</p>
                        <ul class="list-disc pl-5 space-y-0.5 text-[13px]">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
