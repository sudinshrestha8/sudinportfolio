<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'name',
        'tagline',
        'subtitle',
        'cta_label',
        'cta_url',
        'background_style',
        'profile_photo',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Hero $hero) {
            if (! $hero->active) {
                return;
            }

            $query = static::where('active', true);

            if ($hero->exists) {
                $query->where('id', '!=', $hero->id);
            }

            $query->update(['active' => false]);
        });
    }
}
