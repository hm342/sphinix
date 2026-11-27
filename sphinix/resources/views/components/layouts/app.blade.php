@props([
    'title' => 'Sphinix Marketing — Results-Driven Digital Agency',
    'description' => 'Bhavnagar-based digital marketing agency and software studio (ChatBox 360, Social 360) working with 150+ businesses since 2017.',
    'activeNav' => 'none',
    'headerSolid' => false,
    'mainClass' => 'flex-1 -mt-[84px]',
    'wrapperClass' => 'min-h-screen flex flex-col',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link id="site-favicon" rel="icon" type="image/webp" href="{{ asset('images/sphinix_logo.webp') }}">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700;800;900&amp;family=Manrope:wght@400;500;600;700&amp;family=IBM+Plex+Mono:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=block" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light-surface text-light-on-surface font-body antialiased">
    <div class="{{ $wrapperClass }}">
        <x-site-header :active-nav="$activeNav" :solid="$headerSolid" />

        <main class="{{ $mainClass }}">
            {{ $slot }}
        </main>

        <x-site-footer :active-nav="$activeNav" />
    </div>
</body>
</html>
