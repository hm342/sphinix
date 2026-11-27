<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class SiteSetting extends Model
{
    public const CACHE_KEY = 'sphinix.site_settings';

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    /**
     * @return array<string, string>
     */
    public static function allMap(): array
    {
        try {
            if (! Schema::hasTable('site_settings')) {
                return self::defaults();
            }

            $stored = Cache::rememberForever(self::CACHE_KEY, static function (): array {
                return self::query()->pluck('value', 'key')->all();
            });

            return array_merge(self::defaults(), array_filter($stored, static fn ($v) => $v !== null));
        } catch (\Throwable) {
            return self::defaults();
        }
    }

    public static function getValue(string $key, ?string $default = null): ?string
    {
        $map = self::allMap();

        return $map[$key] ?? $default;
    }

    public static function setMany(array $pairs, string $group = 'general'): void
    {
        foreach ($pairs as $key => $value) {
            self::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => $group]
            );
        }

        Cache::forget(self::CACHE_KEY);
    }

    /**
     * @return array<string, string>
     */
    public static function defaults(): array
    {
        return [
            'years_label' => '9+',
            'clients_count_label' => '150+',
            'projects_count_label' => '700+',
            'industries_count_label' => '15+',
            'primary_email' => 'info@sphinixmarketing.com',
            'primary_phone' => '+91 7048239155',
            'studio_phone' => '+91 9081711900',
            'whatsapp_number' => '917048239155',
            'head_office_address' => 'B-3, Shantiniketan Complex, Parimal Chowk, Waghawadi Road, Bhavnagar - 364001, Gujarat, India',
            'studio_address' => 'Swastik Complex, Mokhdaji Circle, Bhavnagar, Gujarat, India',
            'studio_hours' => 'Mon - Sat · 10:00 AM - 7:00 PM IST',
            'agency_reel_url' => '',
        ];
    }
}
