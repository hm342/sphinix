<x-admin.layouts.app title="Work & Case Studies — Sphinix CMS" heading="Work & Portfolio Case Studies">
    <x-slot:actions>
        <a href="{{ route('admin.work.create') }}" class="px-4 py-2 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[13.5px] transition-colors">
            + Add Case Study
        </a>
    </x-slot:actions>

    <div class="bg-white border border-[#E4E4E7] rounded-lg overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#E4E4E7] bg-[#FAF9F7] font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">
                    <th class="py-3 px-4">Cover</th>
                    <th class="py-3 px-4">Project</th>
                    <th class="py-3 px-4">Categories</th>
                    <th class="py-3 px-4">Slides</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E4E4E7] text-[14px]">
                @forelse ($caseStudies as $cs)
                    <tr class="hover:bg-[#FAF9F7]">
                        <td class="py-3 px-4">
                            @if ($cs->cover_url)
                                <img src="{{ $cs->cover_url }}" alt="{{ $cs->name }}" class="w-12 h-16 object-cover border border-[#E4E4E7]">
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <p class="font-semibold text-[#18181B]">{{ $cs->name }}</p>
                            <p class="font-mono text-[11.5px] text-[#52525B]">/work/{{ $cs->slug }} · {{ $cs->industry }}</p>
                        </td>
                        <td class="py-3 px-4 font-mono text-[12px] text-[#52525B]">{{ $cs->categories }}</td>
                        <td class="py-3 px-4 font-mono text-[12.5px] tabular-nums">{{ $cs->slides_count }} slides</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-0.5 rounded font-mono text-[11px] {{ $cs->is_published ? 'bg-green-100 text-green-900' : 'bg-zinc-200 text-zinc-700' }}">
                                {{ $cs->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <a href="{{ route('admin.work.edit', $cs) }}" class="text-[13px] font-semibold text-[#A83300] hover:underline mr-3">Edit</a>
                            <form action="{{ route('admin.work.destroy', $cs) }}" method="POST" class="inline" onsubmit="return confirm('Delete this case study and all its slides?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[13px] text-[#BA1A1A] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-[#52525B]">No case studies found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>
