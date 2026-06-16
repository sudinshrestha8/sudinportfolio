<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'bio',
        'profile_image',
        'years_of_experience',
        'location',
        'availability_status',
        'resume_pdf',
        'active',
    ];

    protected $casts = [
        'years_of_experience' => 'integer',
        'active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (About $about) {
            if (! $about->active) {
                return;
            }

            $query = static::where('active', true);

            if ($about->exists) {
                $query->where('id', '!=', $about->id);
            }

            $query->update(['active' => false]);
        });
    }
}
