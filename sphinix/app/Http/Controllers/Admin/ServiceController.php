<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Support\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('admin.services.index', [
            'services' => Service::query()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        $nextOrder = (Service::query()->max('sort_order') ?? 0) + 1;

        return view('admin.services.form', [
            'service' => new Service([
                'num' => str_pad((string) $nextOrder, 2, '0', STR_PAD_LEFT),
                'nav_icon' => 'campaign',
                'dot_color' => '#E85D2A',
                'route_name' => 'services.index',
                'cta_card' => 'Explore service',
                'cta_detail' => 'Explore Service',
                'chips' => [],
                'features' => [],
                'is_active' => true,
                'sort_order' => $nextOrder,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = Media::storeUploaded($request->file('image'), 'services');
        }

        Service::query()->create($data);

        return redirect()->route('admin.services.index')
            ->with('status', 'Service created.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.form', [
            'service' => $service,
        ]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $this->validated($request, $service->id);

        if ($request->hasFile('image')) {
            Media::deleteIfStored($service->image_path);
            $data['image_path'] = Media::storeUploaded($request->file('image'), 'services');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('status', "Updated service \"{$service->title}\".");
    }

    public function destroy(Service $service): RedirectResponse
    {
        Media::deleteIfStored($service->image_path);
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('status', 'Service deleted.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $slugInput = $request->input('slug') ?: Str::slug((string) $request->input('card_title'));
        $request->merge(['slug' => Str::slug($slugInput)]);

        $validated = $request->validate([
            'num' => ['required', 'string', 'max:10'],
            'slug' => ['required', 'string', 'max:80', 'regex:/^[a-z0-9-]+$/', Rule::unique('services', 'slug')->ignore($ignoreId)],
            'nav_title' => ['required', 'string', 'max:80'],
            'nav_desc' => ['required', 'string', 'max:160'],
            'nav_icon' => ['required', 'string', 'max:60'],
            'eyebrow' => ['required', 'string', 'max:120'],
            'dot_color' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:140'],
            'card_title' => ['required', 'string', 'max:80'],
            'short_desc' => ['required', 'string', 'max:500'],
            'full_desc' => ['required', 'string', 'max:1000'],
            'chips_text' => ['nullable', 'string', 'max:300'],
            'features_text' => ['nullable', 'string', 'max:1000'],
            'tools' => ['nullable', 'string', 'max:255'],
            'cta_card' => ['required', 'string', 'max:80'],
            'cta_detail' => ['required', 'string', 'max:80'],
            'route_name' => ['required', 'string', Rule::in(['services.index', 'services.seo', 'services.social'])],
            'anchor' => ['nullable', 'string', 'max:80'],
            'detail_route' => ['nullable', 'string', Rule::in(['', 'contact.show', 'services.index', 'services.seo', 'services.social'])],
            'alt' => ['nullable', 'string', 'max:255'],
            'accordion_alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'image' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);

        $validated['chips'] = array_values(array_filter(array_map('trim', explode(',', (string) ($validated['chips_text'] ?? '')))));
        $validated['features'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) ($validated['features_text'] ?? '')) ?: [])));
        $validated['detail_route'] = ($validated['detail_route'] ?? '') !== '' ? $validated['detail_route'] : null;
        $validated['anchor'] = ($validated['anchor'] ?? '') !== '' ? $validated['anchor'] : null;
        $validated['is_active'] = $request->boolean('is_active');

        unset($validated['chips_text'], $validated['features_text'], $validated['image']);

        return $validated;
    }
}
