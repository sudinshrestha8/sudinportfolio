<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_title',
        'meta_description',
        'favicon',
        'accent_color',
        'google_analytics_id',
        'maintenance_mode',
    ];

    protected function casts(): array
    {
        return [
            'maintenance_mode' => 'boolean',
        ];
    }

    public static function instance(): static
    {
        return static::firstOrCreate([], [
            'site_title' => 'My Portfolio',
            'accent_color' => '#6366f1',
        ]);
    }
}
