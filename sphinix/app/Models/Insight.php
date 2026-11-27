<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    public const CATEGORIES = [
        'ads' => 'Paid Ads',
        'seo' => 'SEO & Organic',
        'strategy' => 'Strategy & Systems',
    ];

    protected $fillable = [
        'slug',
        'title',
        'category',
        'category_label',
        'excerpt',
        'body',
        'cover_image',
        'cover_alt',
        'author_name',
        'read_time',
        'published_at',
        'cta_label',
        'external_url',
        'is_featured',
        'show_on_home',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'is_featured' => 'boolean',
            'show_on_home' => 'boolean',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->orderByDesc('id');
    }

    public function getCoverUrlAttribute(): ?string
    {
        $fallback = match ($this->category) {
            'ads' => 'images/insight_paid_ads.jpg',
            'seo' => 'images/insight_seo.jpg',
            default => 'images/insight_strategy.jpg',
        };

        return Media::url($this->cover_image, $fallback);
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->published_at
            ? $this->published_at->format('M j, Y')
            : $this->created_at?->format('M j, Y') ?? '';
    }

    public function getTargetUrlAttribute(): string
    {
        return $this->external_url ?: route('insights.show', $this->slug);
    }
}
