<x-admin.layouts.app title="Dashboard — Sphinix CMS" heading="Dashboard Overview">
    <x-slot:actions>
        <a href="{{ route('admin.logos.create') }}" class="px-4 py-2 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[13.5px] transition-colors">
            + Attach Client Logo
        </a>
        <a href="{{ route('admin.insights.create') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white hover:border-[#18181B] text-[#18181B] font-semibold text-[13.5px] transition-colors">
            + New Insight
        </a>
    </x-slot:actions>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.logos.index') }}" class="p-5 bg-white border border-[#E4E4E7] rounded-lg hover:border-[#ec7a2d] transition-colors flex flex-col gap-1">
            <span class="font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">Company Logos</span>
            <span class="font-display font-bold text-[30px] text-[#18181B] tabular-nums">{{ $stats['client_logos'] }}</span>
            <span class="text-[12.5px] text-[#71717A]">{{ $stats['client_logos_with_file'] }} with logo files</span>
        </a>

        <a href="{{ route('admin.work.index') }}" class="p-5 bg-white border border-[#E4E4E7] rounded-lg hover:border-[#ec7a2d] transition-colors flex flex-col gap-1">
            <span class="font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">Case Studies</span>
            <span class="font-display font-bold text-[30px] text-[#18181B] tabular-nums">{{ $stats['case_studies'] }}</span>
            <span class="text-[12.5px] text-[#71717A]">Published portfolio work</span>
        </a>

        <a href="{{ route('admin.insights.index') }}" class="p-5 bg-white border border-[#E4E4E7] rounded-lg hover:border-[#ec7a2d] transition-colors flex flex-col gap-1">
            <span class="font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">Insights &amp; Notes</span>
            <span class="font-display font-bold text-[30px] text-[#18181B] tabular-nums">{{ $stats['insights'] }}</span>
            <span class="text-[12.5px] text-[#71717A]">Live articles on site</span>
        </a>

        <a href="{{ route('admin.inquiries.index') }}" class="p-5 bg-white border border-[#E4E4E7] rounded-lg hover:border-[#ec7a2d] transition-colors flex flex-col gap-1">
            <span class="font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">New Inquiries</span>
            <span class="font-display font-bold text-[30px] text-[#A83300] tabular-nums">{{ $stats['inquiries_new'] }}</span>
            <span class="text-[12.5px] text-[#71717A]">{{ $stats['inquiries_total'] }} total · {{ $stats['subscribers'] }} subscribers</span>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <section class="lg:col-span-7 bg-white border border-[#E4E4E7] rounded-lg overflow-hidden">
            <div class="px-5 py-4 border-b border-[#E4E4E7] flex items-center justify-between">
                <h2 class="font-display font-bold text-[17px]">Recent Contact Inquiries</h2>
                <a href="{{ route('admin.inquiries.index') }}" class="text-[13px] font-semibold text-[#A83300] hover:underline">View all →</a>
            </div>
            <div class="divide-y divide-[#E4E4E7]">
                @forelse ($recentInquiries as $inq)
                    <a href="{{ route('admin.inquiries.show', $inq) }}" class="px-5 py-3.5 flex items-center justify-between gap-4 hover:bg-[#FAF9F7] transition-colors">
                        <div class="min-w-0">
                            <p class="font-semibold text-[14px] text-[#18181B] truncate">{{ $inq->name }} — {{ $inq->service }}</p>
                            <p class="font-mono text-[12px] text-[#52525B] truncate">{{ $inq->email }} · {{ $inq->phone }}</p>
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-mono uppercase {{ $inq->status === 'new' ? 'bg-[#ec7a2d]/20 text-[#A83300]' : 'bg-[#F2F0EC] text-[#52525B]' }}">
                            {{ $inq->status }}
                        </span>
                    </a>
                @empty
                    <p class="px-5 py-8 text-center text-[14px] text-[#52525B]">No contact inquiries submitted yet.</p>
                @endforelse
            </div>
        </section>

        <section class="lg:col-span-5 bg-white border border-[#E4E4E7] rounded-lg overflow-hidden">
            <div class="px-5 py-4 border-b border-[#E4E4E7] flex items-center justify-between">
                <h2 class="font-display font-bold text-[17px]">Recent Insights</h2>
                <a href="{{ route('admin.insights.index') }}" class="text-[13px] font-semibold text-[#A83300] hover:underline">Manage →</a>
            </div>
            <div class="divide-y divide-[#E4E4E7]">
                @forelse ($recentInsights as $insight)
                    <a href="{{ route('admin.insights.edit', $insight) }}" class="px-5 py-3.5 flex items-start justify-between gap-3 hover:bg-[#FAF9F7] transition-colors">
                        <div class="min-w-0">
                            <p class="font-semibold text-[14px] text-[#18181B] line-clamp-1">{{ $insight->title }}</p>
                            <p class="font-mono text-[11.5px] text-[#52525B]">{{ $insight->category_label }} · {{ $insight->formatted_date }}</p>
                        </div>
                        @if ($insight->is_featured)
                            <span class="px-2 py-0.5 bg-[#ec7a2d] text-[#18181B] font-mono text-[10.5px] uppercase shrink-0">Featured</span>
                        @endif
                    </a>
                @empty
                    <p class="px-5 py-8 text-center text-[14px] text-[#52525B]">No insights published yet.</p>
                @endforelse
            </div>
        </section>
    </div>
</x-admin.layouts.app>
