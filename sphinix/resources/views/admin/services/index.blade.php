<x-admin.layouts.app title="Services — Sphinix CMS" heading="Services">
    <x-slot:actions>
        <a href="{{ route('admin.services.create') }}" class="px-4 py-2 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[13.5px] transition-colors">
            + Add Service
        </a>
    </x-slot:actions>

    <div class="bg-white border border-[#E4E4E7] rounded-lg overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#E4E4E7] bg-[#FAF9F7] font-mono text-[11px] uppercase tracking-[0.06em] text-[#52525B]">
                    <th class="py-3 px-4">#</th>
                    <th class="py-3 px-4">Service</th>
                    <th class="py-3 px-4">Nav Title</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E4E4E7] text-[14px]">
                @forelse ($services as $service)
                    <tr class="hover:bg-[#FAF9F7]">
                        <td class="py-3 px-4 font-mono text-[12px] text-[#A83300]">{{ $service->num }}</td>
                        <td class="py-3 px-4">
                            <p class="font-semibold">{{ $service->title }}</p>
                            <p class="font-mono text-[11.5px] text-[#52525B]">{{ $service->eyebrow }}</p>
                        </td>
                        <td class="py-3 px-4 text-[13.5px] text-[#52525B]">{{ $service->nav_title }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-0.5 rounded font-mono text-[11px] {{ $service->is_active ? 'bg-green-100 text-green-900' : 'bg-zinc-200 text-zinc-700' }}">
                                {{ $service->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-[13px] font-semibold text-[#A83300] hover:underline mr-3">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[13px] text-[#BA1A1A] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-[#52525B]">No services configured.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>
