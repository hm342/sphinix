@props([
    'testimonials' => null,
])
@php
    $items = collect($testimonials ?? []);
    $first = $items->first();
    $payload = $items->map(static fn ($t) => [
        'quote' => $t->quote,
        'author' => $t->author_name,
        'role' => $t->author_role,
    ])->values();
@endphp
@if ($items->isNotEmpty())
<section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
    <div id="testimonial-carousel"
         data-testimonials='@json($payload)'
         class="max-w-5xl mx-auto bg-light-surface-container-lowest border border-light-outline-variant rounded-xl p-8 md:p-14 flex flex-col items-center text-center gap-8"
         aria-roledescription="carousel"
         aria-label="Client testimonials">
        <div class="flex flex-col items-center gap-3">
            <h2 class="font-display text-display-lg-mobile lg:text-display-lg text-light-on-surface text-balance">
                What clients say <span class="text-brand-orange">about working with us.</span>
            </h2>
        </div>

        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap items-center justify-center gap-2" role="tablist" aria-label="Client review themes">
            @foreach ($items as $idx => $item)
                <button type="button"
                        role="tab"
                        aria-selected="{{ $idx === 0 ? 'true' : 'false' }}"
                        data-tab="{{ $idx }}"
                        class="testimonial-tab px-4 py-1.5 rounded font-label text-label-md {{ $idx === 0 ? 'bg-light-primary text-light-on-primary' : 'bg-light-surface-container-low text-light-on-surface-variant hover:text-light-on-surface' }} transition-colors duration-state-change">
                    {{ $item->tab_label }}
                </button>
            @endforeach
        </div>

        <!-- Active Review Highlight -->
        <div class="w-full flex items-center justify-between gap-6">
            <button id="prev-testimonial" type="button" aria-label="Previous testimonial" class="hidden sm:inline-flex items-center justify-center w-10 h-10 rounded-full border border-light-outline-variant bg-light-surface-container-lowest text-light-on-surface hover:bg-light-secondary hover:text-light-on-secondary transition-colors duration-state-change shrink-0">
                <span class="material-symbols-outlined text-title-md" aria-hidden="true">arrow_back</span>
            </button>

            <div id="testimonial-stage" aria-live="off" class="max-w-2xl mx-auto min-h-[148px] sm:min-h-[124px] flex flex-col items-center justify-center gap-4">
                <p id="testimonial-quote" class="font-body text-body-lg text-light-on-surface text-pretty">
                    {{ $first->quote }}
                </p>
                <div class="flex flex-col items-center gap-1">
                    <span id="testimonial-author" class="font-title text-title-md text-light-on-surface">{{ $first->author_name }}</span>
                    <span id="testimonial-role" class="font-label text-label-md text-light-on-surface-variant">{{ $first->author_role }}</span>
                </div>
            </div>

            <button id="next-testimonial" type="button" aria-label="Next testimonial" class="hidden sm:inline-flex items-center justify-center w-10 h-10 rounded-full border border-light-outline-variant bg-light-surface-container-lowest text-light-on-surface hover:bg-light-secondary hover:text-light-on-secondary transition-colors duration-state-change shrink-0">
                <span class="material-symbols-outlined text-title-md" aria-hidden="true">arrow_forward</span>
            </button>
        </div>

        <div class="flex items-center justify-center">
            <div class="flex items-center gap-1.5">
                @foreach ($items as $idx => $item)
                    <button type="button" data-tab-dot="{{ $idx }}" aria-label="Slide {{ $idx + 1 }}" class="testimonial-dot w-6 h-1.5 rounded-full {{ $idx === 0 ? 'bg-light-primary' : 'bg-light-outline-variant' }} transition-colors duration-state-change"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
