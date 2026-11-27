<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'placement',
        'question',
        'answer',
        'is_open_by_default',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_open_by_default' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActiveFor(Builder $query, string $placement): Builder
    {
        return $query->where('placement', $placement)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}
