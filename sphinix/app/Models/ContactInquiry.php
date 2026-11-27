<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    public const STATUSES = [
        'new' => 'New',
        'in_progress' => 'In Progress',
        'resolved' => 'Resolved',
        'archived' => 'Archived',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service',
        'message',
        'status',
        'admin_notes',
        'source_page',
        'ip_address',
        'user_agent',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }
}
