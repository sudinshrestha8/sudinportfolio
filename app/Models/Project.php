<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'tech_stack',
        'live_url',
        'github_url',
        'thumbnail',
        'featured',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'featured' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
