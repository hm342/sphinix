@props([
    'title' => 'Admin — Sphinix Marketing',
    'heading' => 'Dashboard',
])
@php
    $navGroups = [
        [
            'label' => null,
            'items' => [
                ['route' => 'admin.dashboard', 'match' => 'admin.dashboard', 'icon' => 'dashboard', 'label' => 'Overview'],
            ],
        ],
        [
            'label' => 'Content',
            'items' => [
                ['route' => 'admin.logos.index', 'match' => 'admin.logos.*', 'icon' => 'business', 'label' => 'Company logos'],
                ['route' => 'admin.work.index', 'match' => 'admin.work.*', 'icon' => 'work', 'label' => 'Case studies'],
                ['route' => 'admin.insights.index', 'match' => 'admin.insights.*', 'icon' => 'article', 'label' => 'Insights'],
                ['route' => 'admin.services.index', 'match' => 'admin.services.*', 'icon' => 'design_services', 'label' => 'Services'],
                ['route' => 'admin.testimonials.index', 'match' => 'admin.testimonials.*', 'icon' => 'format_quote', 'label' => 'Testimonials'],
                ['route' => 'admin.faqs.index', 'match' => 'admin.faqs.*', 'icon' => 'help', 'label' => 'FAQs'],
            ],
        ],
        [
            'label' => 'Audience',
            'items' => [
                ['route' => 'admin.inquiries.index', 'match' => 'admin.inquiries.*', 'icon' => 'inbox', 'label' => 'Inquiries', 'badge' => $newInquiriesCount ?? 0],
                ['route' => 'admin.subscribers.index', 'match' => 'admin.subscribers.*', 'icon' => 'mail', 'label' => 'Newsletter'],
            ],
        ],
        [
            'label' => 'System',
            'items' => [
                ['route' => 'admin.settings.edit', 'match' => 'admin.settings.*', 'icon' => 'tune', 'label' => 'Agency settings'],
            ],
        ],
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
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;600;700&amp;family=Manrope:wght@400;500;600&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=block" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fafafa] text-[#171717] font-body antialiased min-h-screen">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <aside class="lg:w-[248px] shrink-0 bg-[#0f0f10] text-[#ededed] flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-white/[0.08]">
            <div>
                <div class="h-[60px] px-4 border-b border-white/[0.08] flex items-center justify-between gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="font-display font-semibold text-[16px] tracking-[-0.015em] text-[#ededed]">
                        Sphinix
                    </a>
                    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="text-[12px] text-[#a1a1a6] hover:text-[#ededed] transition-colors">
                        View site ↗
                    </a>
                </div>

                <nav class="p-3 flex lg:flex-col gap-1 overflow-x-auto" aria-label="Admin Navigation">
                    @foreach ($navGroups as $group)
                        @if ($group['label'])
                            <span class="hidden lg:block px-2.5 pt-5 pb-1.5 text-[12px] font-medium text-[#85858b]">
                                {{ $group['label'] }}
                            </span>
                        @endif
                        <div class="flex lg:flex-col gap-0.5">
                            @foreach ($group['items'] as $item)
                                @php $active = request()->routeIs($item['match']); @endphp
                                <a href="{{ route($item['route']) }}"
                                   class="relative flex items-center justify-between gap-2 h-9 px-2.5 rounded-[8px] text-[13.5px] whitespace-nowrap transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A] {{ $active ? 'bg-[#232325] text-[#ededed] font-medium shadow-[inset_0_1px_0_rgba(255,255,255,0.08)]' : 'text-[#a1a1a6] hover:bg-[#19191b] hover:text-[#ededed]' }}">
                                    @if ($active)
                                        <span class="hidden lg:block absolute left-0 top-1.5 bottom-1.5 w-[2px] bg-[#E85D2A]" aria-hidden="true"></span>
                                    @endif
                                    <span class="flex items-center gap-2.5">
                                        <span class="w-4 flex items-center justify-center material-symbols-outlined text-[16px] {{ $active ? 'text-[#E85D2A]' : 'text-[#85858b]' }}" aria-hidden="true">{{ $item['icon'] }}</span>
                                        <span>{{ $item['label'] }}</span>
                                    </span>
                                    @if (!empty($item['badge']))
                                        <span class="font-mono text-[11px] tabular-nums text-[#E85D2A]">
                                            {{ $item['badge'] }}
                                        </span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </nav>
            </div>

            <div class="p-4 border-t border-white/[0.08] flex items-center justify-between gap-2">
                <div class="min-w-0">
                    <p class="text-[13px] font-medium text-[#ededed] truncate">{{ auth()->user()?->name }}</p>
                    <p class="font-mono text-[11px] text-[#85858b] truncate">{{ auth()->user()?->email }}</p>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="h-8 px-2.5 rounded-[6px] border border-white/[0.12] text-[12px] font-medium text-[#a1a1a6] hover:text-[#ededed] hover:bg-[#19191b] transition-colors">
                        Sign out
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            <header class="bg-white border-b border-black/[0.08] px-6 lg:px-8 min-h-[60px] py-3 flex flex-wrap items-center justify-between gap-4">
                <h1 class="font-display font-semibold text-[20px] sm:text-[22px] tracking-[-0.02em] text-[#171717]">
                    {{ $heading }}
                </h1>
                @isset($actions)
                    <div class="flex items-center gap-2.5">
                        {{ $actions }}
                    </div>
                @endisset
            </header>

            <main class="flex-1 p-6 lg:p-8 max-w-[1440px] w-full mx-auto flex flex-col gap-6">
                @if (session('status'))
                    <div role="status" class="px-4 py-3 rounded-[8px] bg-[#ffffff] border border-[#16a34a]/30 text-[#16a34a] text-[14px] font-medium">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div role="alert" class="px-4 py-3 rounded-[8px] bg-[#ffffff] border border-[#dc2626]/30 text-[#dc2626] text-[14px]">
                        <p class="font-medium mb-1">Please fix the following errors</p>
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
