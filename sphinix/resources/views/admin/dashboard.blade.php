@php
    $chartMax = max(1, collect($inquirySeries)->max('count'));
    $chartWidth = 640;
    $chartHeight = 220;
    $padLeft = 36;
    $padRight = 16;
    $padTop = 18;
    $padBottom = 34;
    $plotW = $chartWidth - $padLeft - $padRight;
    $plotH = $chartHeight - $padTop - $padBottom;
    $barCount = max(1, count($inquirySeries));
    $slotW = $plotW / $barCount;
    $barW = min(38, max(20, $slotW * 0.52));
@endphp
<x-admin.layouts.app title="Dashboard — Sphinix Marketing" heading="Overview · {{ $stats['period_label'] }}">
    <x-slot:actions>
        <a href="{{ route('admin.logos.create') }}" class="h-9 px-4 inline-flex items-center rounded-[8px] bg-[#A83300] hover:bg-[#171717] text-white font-medium text-[13.5px] transition-colors">
            Attach client logo
        </a>
        <a href="{{ route('admin.insights.create') }}" class="h-9 px-4 inline-flex items-center rounded-[8px] border border-black/[0.1] bg-white hover:bg-[#f4f4f5] text-[#171717] font-medium text-[13.5px] transition-colors">
            New insight
        </a>
    </x-slot:actions>

    <!-- 4-Card KPI Strip (Numbers Only, Tabular Figures, One Highlighted Lead Metric) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.inquiries.index') }}" class="p-5 bg-white border border-black/[0.08] border-t-2 border-t-[#A83300] rounded-[12px] hover:border-black/[0.18] transition-colors flex flex-col justify-between gap-3">
            <span class="text-[13px] font-medium text-[#525252]">New inquiries</span>
            <span class="font-display font-medium text-[30px] leading-none text-[#171717] tabular-nums">{{ $stats['inquiries_new'] }}</span>
            <span class="font-mono text-[12px] text-[#737373] tabular-nums">{{ $stats['inquiries_30d'] }} in last 30 days · {{ $stats['inquiries_total'] }} total</span>
        </a>

        <a href="{{ route('admin.logos.index') }}" class="p-5 bg-white border border-black/[0.08] rounded-[12px] hover:border-black/[0.18] transition-colors flex flex-col justify-between gap-3">
            <span class="text-[13px] font-medium text-[#525252]">Company logos</span>
            <span class="font-display font-medium text-[30px] leading-none text-[#171717] tabular-nums">{{ $stats['client_logos'] }}</span>
            <span class="font-mono text-[12px] text-[#737373] tabular-nums">{{ $stats['client_logos_with_file'] }} attached files in carousel</span>
        </a>

        <a href="{{ route('admin.insights.index') }}" class="p-5 bg-white border border-black/[0.08] rounded-[12px] hover:border-black/[0.18] transition-colors flex flex-col justify-between gap-3">
            <span class="text-[13px] font-medium text-[#525252]">Published insights</span>
            <span class="font-display font-medium text-[30px] leading-none text-[#171717] tabular-nums">{{ $stats['insights'] }}</span>
            <span class="font-mono text-[12px] text-[#737373] tabular-nums">{{ $stats['insights_home'] }} pinned to home index</span>
        </a>

        <a href="{{ route('admin.subscribers.index') }}" class="p-5 bg-white border border-black/[0.08] rounded-[12px] hover:border-black/[0.18] transition-colors flex flex-col justify-between gap-3">
            <span class="text-[13px] font-medium text-[#525252]">Newsletter subscribers</span>
            <span class="font-display font-medium text-[30px] leading-none text-[#171717] tabular-nums">{{ $stats['subscribers'] }}</span>
            <span class="font-mono text-[12px] text-[#737373] tabular-nums">{{ $stats['case_studies'] }} live case studies</span>
        </a>
    </div>

    <!-- Asymmetric Data Moment: Primary 7-Day Inquiry Chart + Catalog Inventory Breakdown -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
        <section class="lg:col-span-8 bg-white border border-black/[0.08] rounded-[12px] p-5 flex flex-col gap-4">
            <div class="flex flex-wrap items-baseline justify-between gap-2">
                <div>
                    <h2 class="font-display font-medium text-[16px] text-[#171717]">Inquiry volume</h2>
                    <p class="text-[13px] text-[#737373]">Submissions over the last 7 days</p>
                </div>
                <span class="font-mono text-[12px] text-[#525252] tabular-nums">{{ collect($inquirySeries)->sum('count') }} this week</span>
            </div>

            <div class="w-full overflow-x-auto">
                <svg viewBox="0 0 {{ $chartWidth }} {{ $chartHeight }}" class="w-full h-[220px] min-w-[420px]" role="img" aria-label="7-day contact inquiry volume bar chart">
                    @for ($g = 0; $g <= 3; $g++)
                        @php
                            $gy = $padTop + ($plotH / 3) * $g;
                            $tickVal = (int) round($chartMax - ($chartMax / 3) * $g);
                        @endphp
                        <line x1="{{ $padLeft }}" y1="{{ $gy }}" x2="{{ $chartWidth - $padRight }}" y2="{{ $gy }}" stroke="rgba(0,0,0,0.07)" stroke-width="1" />
                        <text x="{{ $padLeft - 8 }}" y="{{ $gy + 4 }}" text-anchor="end" fill="#737373" font-family="IBM Plex Mono, monospace" font-size="11">{{ $tickVal }}</text>
                    @endfor

                    @foreach ($inquirySeries as $idx => $bar)
                        @php
                            $barH = $bar['count'] > 0 ? max(6, ($bar['count'] / $chartMax) * $plotH) : 3;
                            $bx = $padLeft + ($idx * $slotW) + (($slotW - $barW) / 2);
                            $by = $padTop + $plotH - $barH;
                            $fill = $bar['is_today'] ? '#A83300' : '#d4d4d8';
                        @endphp
                        <rect x="{{ $bx }}" y="{{ $by }}" width="{{ $barW }}" height="{{ $barH }}" rx="4" fill="{{ $fill }}" />
                        @if ($bar['count'] > 0)
                            <text x="{{ $bx + $barW / 2 }}" y="{{ $by - 6 }}" text-anchor="middle" fill="#171717" font-family="IBM Plex Mono, monospace" font-size="11">{{ $bar['count'] }}</text>
                        @endif
                        <text x="{{ $bx + $barW / 2 }}" y="{{ $chartHeight - 10 }}" text-anchor="middle" fill="{{ $bar['is_today'] ? '#171717' : '#737373' }}" font-family="IBM Plex Mono, monospace" font-size="11">{{ $bar['date'] }}</text>
                    @endforeach
                </svg>
            </div>
        </section>

        <section class="lg:col-span-4 bg-white border border-black/[0.08] rounded-[12px] p-5 flex flex-col justify-between gap-4">
            <div class="flex items-baseline justify-between">
                <h2 class="font-display font-medium text-[16px] text-[#171717]">Published catalog</h2>
                <span class="font-mono text-[12px] text-[#737373]">Live count</span>
            </div>

            <div class="flex flex-col gap-3.5">
                @foreach ($inventory as $idx => $row)
                    @php $pct = min(100, (int) round(($row['count'] / $maxInventory) * 100)); @endphp
                    <a href="{{ route($row['route']) }}" class="group flex flex-col gap-1.5">
                        <div class="flex items-center justify-between text-[13px]">
                            <span class="text-[#525252] group-hover:text-[#171717] transition-colors">{{ $row['label'] }}</span>
                            <span class="font-mono text-[#171717] tabular-nums">{{ $row['count'] }}</span>
                        </div>
                        <div class="h-1.5 w-full rounded-[4px] bg-[#f4f4f5] overflow-hidden">
                            <div class="h-full rounded-[4px] {{ $idx === 0 ? 'bg-[#A83300]' : 'bg-[#a1a1aa]' }}" style="width: {{ $pct }}%;"></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Actionable Queues -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
        <section class="lg:col-span-7 bg-white border border-black/[0.08] rounded-[12px] overflow-hidden">
            <div class="px-5 py-4 border-b border-black/[0.08] flex items-center justify-between">
                <h2 class="font-display font-medium text-[16px] text-[#171717]">Recent contact inquiries</h2>
                <a href="{{ route('admin.inquiries.index') }}" class="text-[13px] font-medium text-[#A83300] hover:underline">View all</a>
            </div>
            <div class="divide-y divide-black/[0.06]">
                @forelse ($recentInquiries as $inq)
                    <a href="{{ route('admin.inquiries.show', $inq) }}" class="px-5 py-3 flex items-center justify-between gap-4 hover:bg-[#f4f4f5] transition-colors">
                        <div class="min-w-0">
                            <p class="font-medium text-[14px] text-[#171717] truncate">{{ $inq->name }} · {{ $inq->service }}</p>
                            <p class="font-mono text-[12px] text-[#737373] truncate">{{ $inq->email }} · {{ $inq->phone }}</p>
                        </div>
                        <div class="flex items-center gap-3 shrink-0">
                            <span class="inline-flex items-center gap-1.5 font-mono text-[12px] {{ $inq->status === 'new' ? 'text-[#A83300] font-medium' : 'text-[#525252]' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $inq->status === 'new' ? 'bg-[#A83300]' : 'bg-[#a1a1aa]' }}" aria-hidden="true"></span>
                                {{ ucfirst(str_replace('_', ' ', $inq->status)) }}
                            </span>
                            <span class="font-mono text-[11.5px] text-[#737373] tabular-nums hidden sm:inline">{{ $inq->created_at?->format('M j') }}</span>
                        </div>
                    </a>
                @empty
                    <p class="px-5 py-8 text-center text-[14px] text-[#737373]">No contact inquiries submitted yet</p>
                @endforelse
            </div>
        </section>

        <section class="lg:col-span-5 bg-white border border-black/[0.08] rounded-[12px] overflow-hidden">
            <div class="px-5 py-4 border-b border-black/[0.08] flex items-center justify-between">
                <h2 class="font-display font-medium text-[16px] text-[#171717]">Recent insights</h2>
                <a href="{{ route('admin.insights.index') }}" class="text-[13px] font-medium text-[#A83300] hover:underline">Manage</a>
            </div>
            <div class="divide-y divide-black/[0.06]">
                @forelse ($recentInsights as $insight)
                    <a href="{{ route('admin.insights.edit', $insight) }}" class="px-5 py-3 flex items-start justify-between gap-3 hover:bg-[#f4f4f5] transition-colors">
                        <div class="min-w-0">
                            <p class="font-medium text-[14px] text-[#171717] line-clamp-1">{{ $insight->title }}</p>
                            <p class="font-mono text-[12px] text-[#737373] tabular-nums">{{ $insight->category_label }} · {{ $insight->formatted_date }}</p>
                        </div>
                        @if ($insight->is_featured)
                            <span class="font-mono text-[11.5px] font-medium text-[#A83300] shrink-0">Featured</span>
                        @endif
                    </a>
                @empty
                    <p class="px-5 py-8 text-center text-[14px] text-[#737373]">No insights published yet</p>
                @endforelse
            </div>
        </section>
    </div>
</x-admin.layouts.app>
