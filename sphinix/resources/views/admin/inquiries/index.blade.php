<x-admin.layouts.app title="Contact Inquiries — Sphinix CMS" heading="Contact Inquiries">
    <form method="GET" action="{{ route('admin.inquiries.index') }}" class="flex flex-wrap items-center gap-3">
        <select name="status" class="h-10 px-3 rounded border border-[#D4D0C8] bg-white text-[13.5px]">
            <option value="all" @selected($activeStatus === 'all')>All Statuses</option>
            @foreach ($statuses as $key => $label)
                <option value="{{ $key }}" @selected($activeStatus === $key)>{{ $label }}</option>
            @endforeach
        </select>
        <input type="search" name="q" value="{{ $search }}" placeholder="Search name, email, phone, service..."
               class="h-10 px-3.5 rounded border border-[#D4D0C8] bg-white text-[14px] w-72 max-w-full">
        <button type="submit" class="h-10 px-4 rounded bg-[#18181B] text-white text-[13.5px] font-semibold">Filter</button>
    </form>

    <div class="bg-white border border-[#E4E4E7] rounded-lg overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#E4E4E7] bg-[#FAF9F7] font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">
                    <th class="py-3 px-4">Date</th>
                    <th class="py-3 px-4">Contact</th>
                    <th class="py-3 px-4">Service</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E4E4E7] text-[14px]">
                @forelse ($inquiries as $inq)
                    <tr class="hover:bg-[#FAF9F7]">
                        <td class="py-3 px-4 font-mono text-[12px] text-[#52525B] whitespace-nowrap">{{ $inq->created_at?->format('M j, Y H:i') }}</td>
                        <td class="py-3 px-4">
                            <p class="font-semibold text-[#18181B]">{{ $inq->name }}</p>
                            <p class="font-mono text-[12px] text-[#52525B]">{{ $inq->email }} · {{ $inq->phone }}</p>
                        </td>
                        <td class="py-3 px-4 text-[13.5px]">{{ $inq->service }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2.5 py-0.5 rounded-full font-mono text-[11px] uppercase {{ $inq->status === 'new' ? 'bg-[#ec7a2d]/20 text-[#A83300]' : 'bg-[#F2F0EC] text-[#52525B]' }}">
                                {{ $statuses[$inq->status] ?? $inq->status }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <a href="{{ route('admin.inquiries.show', $inq) }}" class="text-[13px] font-semibold text-[#A83300] hover:underline mr-3">Open</a>
                            <form action="{{ route('admin.inquiries.destroy', $inq) }}" method="POST" class="inline" onsubmit="return confirm('Delete this inquiry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[13px] text-[#BA1A1A] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-[#52525B]">No inquiries found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $inquiries->links() }}</div>
</x-admin.layouts.app>
