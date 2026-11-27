<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaseStudy extends Model
{
    public const CATEGORY_LABELS = [
        'iot' => 'Tech & Product',
        'healthcare' => 'Healthcare & Services',
        'ecommerce' => 'Retail & E-Commerce',
        'industrial' => 'Manufacturing & Trade',
        'jewelry' => 'Jewelry & Lifestyle',
    ];

    protected $fillable = [
        'slug',
        'name',
        'categories',
        'industry',
        'services_delivered',
        'description',
        'summary',
        'cover_image',
        'client_logo_path',
        'video_url',
        'video_poster_path',
        'has_dot_mark',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'has_dot_mark' => 'boolean',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function slides(): HasMany
    {
        return $this->hasMany(CaseStudySlide::class)->orderBy('sort_order')->orderBy('id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->orderBy('sort_order')->orderBy('id');
    }

    public function getCoverUrlAttribute(): ?string
    {
        return Media::url($this->cover_image);
    }

    public function getClientLogoUrlAttribute(): ?string
    {
        return Media::url($this->client_logo_path);
    }

    public function getVideoPosterUrlAttribute(): ?string
    {
        return Media::url($this->video_poster_path);
    }

    public function getVideoSourceUrlAttribute(): ?string
    {
        return Media::url($this->video_url);
    }
}
