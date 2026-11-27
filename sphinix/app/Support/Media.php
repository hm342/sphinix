<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class Media
{
    /**
     * Resolve a stored media path or public asset path to a browser URL.
     */
    public static function url(?string $path, ?string $fallback = null): ?string
    {
        $candidate = $path ?: $fallback;
        if (! $candidate) {
            return null;
        }

        if (Str::startsWith($candidate, ['http://', 'https://', '//', 'data:'])) {
            return $candidate;
        }

        $normalized = ltrim($candidate, '/');

        if (Str::startsWith($normalized, 'images/') || file_exists(public_path($normalized))) {
            return asset($normalized);
        }

        return asset('storage/'.$normalized);
    }

    /**
     * Store an uploaded image/logo on the public disk (sanitizing SVG uploads).
     */
    public static function storeUploaded(UploadedFile $file, string $directory): string
    {
        $ext = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: 'png');

        if ($ext === 'svg') {
            $raw = file_get_contents($file->getRealPath()) ?: '';
            $sanitized = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $raw) ?? $raw;
            $sanitized = preg_replace('/\son[a-z]+\s*=\s*(["\']).*?\1/is', '', $sanitized) ?? $sanitized;
            $sanitized = preg_replace('/javascript\s*:/i', '', $sanitized) ?? $sanitized;

            $relativePath = trim($directory, '/').'/'.Str::ulid().'.svg';
            Storage::disk('public')->put($relativePath, $sanitized);

            return $relativePath;
        }

        return $file->store(trim($directory, '/'), 'public');
    }

    /**
     * Delete a previously uploaded file from the public disk (never deletes bundled public/images assets).
     */
    public static function deleteIfStored(?string $path): void
    {
        if (! $path) {
            return;
        }

        $normalized = ltrim($path, '/');

        if (Str::startsWith($normalized, ['http://', 'https://', 'images/'])) {
            return;
        }

        Storage::disk('public')->delete($normalized);
    }
}
