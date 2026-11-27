<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'num',
        'nav_title',
        'nav_desc',
        'nav_icon',
        'eyebrow',
        'dot_color',
        'title',
        'card_title',
        'short_desc',
        'full_desc',
        'chips',
        'features',
        'tools',
        'cta_card',
        'cta_detail',
        'route_name',
        'anchor',
        'detail_route',
        'image_path',
        'alt',
        'accordion_alt',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'chips' => 'array',
            'features' => 'array',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    public function getImageUrlAttribute(): ?string
    {
        return Media::url($this->image_path);
    }

    public function getPublicHrefAttribute(): string
    {
        $route = $this->route_name ?: 'services.index';
        $url = route($route);

        return $this->anchor ? $url.'#'.$this->anchor : $url;
    }

    public function getDetailHrefAttribute(): string
    {
        return route($this->detail_route ?: ($this->route_name ?: 'services.index'));
    }
}
