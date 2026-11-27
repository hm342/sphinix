<x-admin.layouts.app title="FAQs — Sphinix CMS" heading="Frequently Asked Questions">
    <x-slot:actions>
        <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[13.5px] transition-colors">
            + Add FAQ
        </a>
    </x-slot:actions>

    <div class="bg-white border border-[#E4E4E7] rounded-lg overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#E4E4E7] bg-[#FAF9F7] font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">
                    <th class="py-3 px-4">Placement</th>
                    <th class="py-3 px-4">Question</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E4E4E7] text-[14px]">
                @forelse ($faqs as $faq)
                    <tr class="hover:bg-[#FAF9F7]">
                        <td class="py-3 px-4 font-mono text-[12px] uppercase text-[#A83300]">{{ $faq->placement }}</td>
                        <td class="py-3 px-4 font-medium">{{ $faq->question }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-0.5 rounded font-mono text-[11px] {{ $faq->is_active ? 'bg-green-100 text-green-900' : 'bg-zinc-200 text-zinc-700' }}">
                                {{ $faq->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-[13px] font-semibold text-[#A83300] hover:underline mr-3">Edit</a>
                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline" onsubmit="return confirm('Delete this FAQ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[13px] text-[#BA1A1A] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-10 text-center text-[#52525B]">No FAQs yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>
