<x-admin.layouts.app title="Inquiry Details — Sphinix CMS" :heading="'Inquiry from ' . $inquiry->name">
    <x-slot:actions>
        <a href="{{ route('admin.inquiries.index') }}" class="px-4 py-2 rounded-[6px] border border-[#D4D0C8] bg-white text-[13.5px] font-semibold">← Back to Inquiries</a>
    </x-slot:actions>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-7 bg-white border border-[#E4E4E7] rounded-lg p-6 flex flex-col gap-5">
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-[14px]">
                <div>
                    <dt class="font-mono text-[11px] uppercase text-[#71717A]">Full Name</dt>
                    <dd class="font-semibold mt-0.5">{{ $inquiry->name }}</dd>
                </div>
                <div>
                    <dt class="font-mono text-[11px] uppercase text-[#71717A]">Primary Service</dt>
                    <dd class="font-semibold text-[#A83300] mt-0.5">{{ $inquiry->service }}</dd>
                </div>
                <div>
                    <dt class="font-mono text-[11px] uppercase text-[#71717A]">Email</dt>
                    <dd class="mt-0.5"><a href="mailto:{{ $inquiry->email }}" class="hover:underline">{{ $inquiry->email }}</a></dd>
                </div>
                <div>
                    <dt class="font-mono text-[11px] uppercase text-[#71717A]">Phone</dt>
                    <dd class="font-mono mt-0.5"><a href="tel:{{ $inquiry->phone }}" class="hover:underline">{{ $inquiry->phone }}</a></dd>
                </div>
            </dl>

            <div class="pt-4 border-t border-[#E4E4E7] flex flex-col gap-2">
                <span class="font-mono text-[11px] uppercase text-[#71717A]">Project Details</span>
                <p class="text-[15px] leading-[1.65] whitespace-pre-line text-[#18181B]">
                    {{ $inquiry->message ?: 'No project message provided.' }}
                </p>
            </div>

            <div class="pt-4 border-t border-[#E4E4E7] font-mono text-[11.5px] text-[#71717A] flex flex-wrap gap-4">
                <span>Submitted: {{ $inquiry->created_at?->format('M j, Y H:i') }}</span>
                @if ($inquiry->ip_address)
                    <span>IP: {{ $inquiry->ip_address }}</span>
                @endif
            </div>
        </div>

        <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST" class="lg:col-span-5 bg-white border border-[#E4E4E7] rounded-lg p-6 flex flex-col gap-4">
            @csrf
            @method('PATCH')
            <h2 class="font-display font-bold text-[17px]">Manage Lead</h2>

            <div class="flex flex-col gap-1.5">
                <label for="status" class="font-semibold text-[13px]">Status</label>
                <select id="status" name="status" class="h-10 px-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">
                    @foreach ($statuses as $key => $label)
                        <option value="{{ $key }}" @selected(old('status', $inquiry->status) === $key)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="admin_notes" class="font-semibold text-[13px]">Internal Notes</label>
                <textarea id="admin_notes" name="admin_notes" rows="5" class="p-3 rounded border border-[#D4D0C8] bg-[#F7F6F4] text-[14px]">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
            </div>

            <button type="submit" class="px-5 py-2.5 rounded-[6px] bg-[#A83300] hover:bg-[#18181B] text-white font-semibold text-[14px] transition-colors">
                Update Inquiry
            </button>
        </form>
    </div>
</x-admin.layouts.app>
