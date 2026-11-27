<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ClientLogo extends Model
{
    protected $fillable = [
        'name',
        'subtitle',
        'logo_path',
        'industry',
        'website_url',
        'case_study_slug',
        'carousel_row',
        'show_in_marquee',
        'show_in_directory',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'carousel_row' => 'integer',
            'show_in_marquee' => 'boolean',
            'show_in_directory' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    public function getLogoUrlAttribute(): ?string
    {
        return Media::url($this->logo_path);
    }
}
