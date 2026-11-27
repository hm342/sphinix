<x-admin.layouts.app title="Insights & Notes — Sphinix CMS" heading="Notes & Insights">
    <x-slot:actions>
        <a href="{{ route('admin.insights.create') }}" class="px-4 py-2 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[13.5px] transition-colors">
            + Publish Insight
        </a>
    </x-slot:actions>

    <div class="bg-white border border-[#E4E4E7] rounded-lg overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#E4E4E7] bg-[#FAF9F7] font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">
                    <th class="py-3 px-4">Date</th>
                    <th class="py-3 px-4">Title</th>
                    <th class="py-3 px-4">Category</th>
                    <th class="py-3 px-4">Placement</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E4E4E7] text-[14px]">
                @forelse ($insights as $insight)
                    <tr class="hover:bg-[#FAF9F7]">
                        <td class="py-3 px-4 font-mono text-[12px] text-[#52525B] whitespace-nowrap">{{ $insight->formatted_date }}</td>
                        <td class="py-3 px-4">
                            <p class="font-semibold text-[#18181B]">{{ $insight->title }}</p>
                            <p class="font-mono text-[11.5px] text-[#71717A]">{{ $insight->author_name }} · {{ $insight->read_time }}</p>
                        </td>
                        <td class="py-3 px-4 font-mono text-[12px]">{{ $insight->category_label }}</td>
                        <td class="py-3 px-4">
                            <div class="flex flex-wrap gap-1.5">
                                @if ($insight->is_featured)
                                    <span class="px-2 py-0.5 rounded bg-[#ec7a2d] text-[#18181B] font-mono text-[11px]">Featured Cover</span>
                                @endif
                                @if ($insight->show_on_home)
                                    <span class="px-2 py-0.5 rounded bg-orange-100 text-[#A83300] font-mono text-[11px]">Home Row</span>
                                @endif
                                @if (!$insight->is_published)
                                    <span class="px-2 py-0.5 rounded bg-zinc-200 text-zinc-700 font-mono text-[11px]">Draft</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <a href="{{ route('admin.insights.edit', $insight) }}" class="text-[13px] font-semibold text-[#A83300] hover:underline mr-3">Edit</a>
                            <form action="{{ route('admin.insights.destroy', $insight) }}" method="POST" class="inline" onsubmit="return confirm('Delete this insight?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[13px] text-[#BA1A1A] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-[#52525B]">No insights yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>
