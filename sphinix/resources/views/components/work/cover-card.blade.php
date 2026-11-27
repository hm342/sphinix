@props([
    'project',
    'eager' => false,
    'variant' => 'grid',
])
<a href="{{ route('work.show', $project['slug']) }}"
   aria-label="View {{ $project['name'] }} case study"
   class="{{ $variant === 'carousel' ? 'snap-start shrink-0 w-[68vw] sm:w-[44vw] lg:w-auto bg-white' : 'bg-[#F7F6F4]' }} group block aspect-[3/4] rounded-none overflow-hidden border border-[#E4E4E7] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A] focus-visible:ring-offset-2">
    <img src="{{ asset($project['cover']) }}"
         alt="{{ $project['name'] }} project cover poster"
         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.03]"
         loading="{{ $eager ? 'eager' : 'lazy' }}"
         decoding="async">
</a>
