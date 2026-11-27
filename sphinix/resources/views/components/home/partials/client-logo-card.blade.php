@php
    $href = $item->case_study_slug
        ? route('work.show', $item->case_study_slug)
        : ($item->website_url ?: null);
    $isExternal = ! $item->case_study_slug && ! empty($item->website_url);
    $logoUrl = $item->logo_url;
    $itemClasses = 'inline-flex items-center justify-center shrink-0 px-2 py-2 opacity-85 hover:opacity-100 transition-opacity duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85C27] rounded';
@endphp

@if ($href)
    <a href="{{ $href }}"
       @if($isExternal) target="_blank" rel="noopener" @endif
       @if($isDuplicate) tabindex="-1" @endif
       aria-label="{{ $item->name }}"
       class="{{ $itemClasses }}">
        @if ($logoUrl)
            <img src="{{ $logoUrl }}"
                 alt="{{ $isDuplicate ? '' : $item->name }}"
                 class="h-10 sm:h-12 w-auto max-w-[180px] sm:max-w-[210px] object-contain"
                 loading="lazy"
                 decoding="async">
        @else
            <span class="font-display font-bold text-[22px] tracking-tight text-[#18181B] whitespace-nowrap">{{ $item->name }}</span>
        @endif
    </a>
@else
    <div class="inline-flex items-center justify-center shrink-0 px-2 py-2 opacity-85">
        @if ($logoUrl)
            <img src="{{ $logoUrl }}"
                 alt="{{ $isDuplicate ? '' : $item->name }}"
                 class="h-10 sm:h-12 w-auto max-w-[180px] sm:max-w-[210px] object-contain"
                 loading="lazy"
                 decoding="async">
        @else
            <span class="font-display font-bold text-[22px] tracking-tight text-[#18181B] whitespace-nowrap">{{ $item->name }}</span>
        @endif
    </div>
@endif
