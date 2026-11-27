<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Sign In — Sphinix Marketing</title>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700;800&amp;family=Manrope:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F7F6F4] text-[#18181B] font-body antialiased min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white border border-[#E4E4E7] rounded-xl p-8 flex flex-col gap-6">
        <div class="flex flex-col gap-2">
            <div class="flex items-center justify-between">
                <span class="font-mono text-[11px] uppercase tracking-[0.08em] text-[#A83300] font-semibold">Sphinix Backend</span>
                <a href="{{ route('home') }}" class="font-mono text-[11px] text-[#52525B] hover:text-[#18181B]">← Website</a>
            </div>
            <h1 class="font-display font-extrabold text-[28px] tracking-[-0.025em] text-[#18181B]">
                Sign in to CMS
            </h1>
            <p class="text-[14px] text-[#52525B]">
                Manage company carousel logos, case studies, insights, testimonials, and client inquiries.
            </p>
        </div>

        @if ($errors->any())
            <div role="alert" class="p-3.5 rounded bg-red-50 border border-red-200 text-red-900 text-[13.5px]">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <div class="flex flex-col gap-1.5">
                <label for="email" class="font-label text-[12.5px] font-semibold text-[#18181B]">Admin Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                       class="h-11 px-3.5 rounded-[6px] border border-[#D4D0C8] bg-[#F7F6F4] text-[14.5px] focus:outline-none focus:ring-2 focus:ring-[#E85C27]">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="password" class="font-label text-[12.5px] font-semibold text-[#18181B]">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="h-11 px-3.5 rounded-[6px] border border-[#D4D0C8] bg-[#F7F6F4] text-[14.5px] focus:outline-none focus:ring-2 focus:ring-[#E85C27]">
            </div>

            <label class="inline-flex items-center gap-2 text-[13.5px] text-[#52525B]">
                <input type="checkbox" name="remember" value="1" class="rounded border-[#D4D0C8] text-[#A83300] focus:ring-[#E85C27]">
                <span>Keep me signed in</span>
            </label>

            <button type="submit" class="mt-2 h-11 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14.5px] transition-colors">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
