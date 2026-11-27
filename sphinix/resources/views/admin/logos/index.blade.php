<x-admin.layouts.app title="Company Logos — Sphinix CMS" heading="Company Logos (150+ Businesses Carousel)">
    <x-slot:actions>
        <a href="{{ route('admin.logos.create') }}" class="px-4 py-2 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[13.5px] transition-colors">
            + Add Company Logo
        </a>
    </x-slot:actions>

    <p class="text-[14px] text-[#52525B]">
        Attach a logo image (PNG, WebP, JPG, or SVG) to any client below. Every active logo marked <strong>Show in Marquee</strong> automatically appears in the <em>“Worked with 150+ businesses.”</em> carousel on the home page.
    </p>

    <div class="bg-white border border-[#E4E4E7] rounded-lg overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#E4E4E7] bg-[#FAF9F7] font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">
                    <th class="py-3 px-4">Preview</th>
                    <th class="py-3 px-4">Company</th>
                    <th class="py-3 px-4">Carousel Row</th>
                    <th class="py-3 px-4">Placement</th>
                    <th class="py-3 px-4">Case Study</th>
                    <th class="py-3 px-4">Order</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E4E4E7] text-[14px]">
                @forelse ($logos as $logo)
                    <tr class="hover:bg-[#FAF9F7]">
                        <td class="py-3 px-4">
                            <div class="w-28 h-12 rounded border border-[#E4E4E7] bg-white flex items-center justify-center px-2 overflow-hidden">
                                @if ($logo->logo_url)
                                    <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}" class="max-h-9 w-auto object-contain">
                                @else
                                    <span class="font-mono text-[11px] text-[#71717A]">Text Only</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <p class="font-semibold text-[#18181B]">{{ $logo->name }}</p>
                            <p class="text-[12px] text-[#52525B]">{{ $logo->subtitle }}</p>
                        </td>
                        <td class="py-3 px-4 font-mono text-[12px]">
                            {{ $logo->carousel_row === 1 ? 'Row 1 (LTR)' : 'Row 2 (RTL)' }}
                        </td>
                        <td class="py-3 px-4 text-[12.5px]">
                            <div class="flex flex-wrap gap-1.5">
                                @if (!$logo->is_active)
                                    <span class="px-2 py-0.5 rounded bg-zinc-200 text-zinc-700 font-mono text-[11px]">Hidden</span>
                                @else
                                    @if ($logo->show_in_marquee)
                                        <span class="px-2 py-0.5 rounded bg-orange-100 text-[#A83300] font-mono text-[11px]">Marquee</span>
                                    @endif
                                    @if ($logo->show_in_directory)
                                        <span class="px-2 py-0.5 rounded bg-zinc-100 text-[#18181B] font-mono text-[11px]">Directory</span>
                                    @endif
                                @endif
                            </div>
                        </td>
                        <td class="py-3 px-4 font-mono text-[12px] text-[#52525B]">
                            {{ $logo->case_study_slug ?: '—' }}
                        </td>
                        <td class="py-3 px-4 font-mono text-[12.5px] tabular-nums">
                            {{ $logo->sort_order }}
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <a href="{{ route('admin.logos.edit', $logo) }}" class="text-[13px] font-semibold text-[#A83300] hover:underline mr-3">Edit</a>
                            <form action="{{ route('admin.logos.destroy', $logo) }}" method="POST" class="inline" onsubmit="return confirm('Delete this client logo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[13px] text-[#BA1A1A] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-10 text-center text-[#52525B]">No company logos added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>
