<x-admin.layouts.app title="Newsletter Subscribers — Sphinix CMS" heading="Newsletter Subscribers">
    <x-slot:actions>
        <a href="{{ route('admin.subscribers.export') }}" class="px-4 py-2 rounded-[6px] bg-[#18181B] hover:bg-[#A83300] text-white font-semibold text-[13.5px] transition-colors">
            Export CSV
        </a>
    </x-slot:actions>

    <form method="GET" action="{{ route('admin.subscribers.index') }}" class="flex flex-wrap items-center gap-3">
        <select name="status" class="h-10 px-3 rounded border border-[#D4D0C8] bg-white text-[13.5px]">
            <option value="all" @selected($activeStatus === 'all')>All</option>
            @foreach ($statuses as $key => $label)
                <option value="{{ $key }}" @selected($activeStatus === $key)>{{ $label }}</option>
            @endforeach
        </select>
        <input type="search" name="q" value="{{ $search }}" placeholder="Search email..." class="h-10 px-3.5 rounded border border-[#D4D0C8] bg-white text-[14px] w-72 max-w-full">
        <button type="submit" class="h-10 px-4 rounded bg-[#18181B] text-white text-[13.5px] font-semibold">Filter</button>
    </form>

    <div class="bg-white border border-[#E4E4E7] rounded-lg overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#E4E4E7] bg-[#FAF9F7] font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Subscribed</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E4E4E7] text-[14px]">
                @forelse ($subscribers as $sub)
                    <tr class="hover:bg-[#FAF9F7]">
                        <td class="py-3 px-4 font-medium">{{ $sub->email }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-0.5 rounded font-mono text-[11px] {{ $sub->status === 'active' ? 'bg-green-100 text-green-900' : 'bg-zinc-200 text-zinc-700' }}">
                                {{ $sub->status }}
                            </span>
                        </td>
                        <td class="py-3 px-4 font-mono text-[12px] text-[#52525B]">{{ $sub->subscribed_at?->format('M j, Y H:i') ?? $sub->created_at?->format('M j, Y H:i') }}</td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <form action="{{ route('admin.subscribers.toggle', $sub) }}" method="POST" class="inline mr-3">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-[13px] font-semibold text-[#A83300] hover:underline">
                                    {{ $sub->status === 'active' ? 'Unsubscribe' : 'Reactivate' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.subscribers.destroy', $sub) }}" method="POST" class="inline" onsubmit="return confirm('Delete subscriber?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[13px] text-[#BA1A1A] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-10 text-center text-[#52525B]">No subscribers yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $subscribers->links() }}</div>
</x-admin.layouts.app>
