<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    public const STATUSES = [
        'active' => 'Active',
        'unsubscribed' => 'Unsubscribed',
    ];

    protected $fillable = [
        'email',
        'status',
        'source_page',
        'ip_address',
        'subscribed_at',
    ];

    protected function casts(): array
    {
        return [
            'subscribed_at' => 'datetime',
        ];
    }
}
