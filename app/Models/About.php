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
    ];

    protected function casts(): array
    {
        return [
            'years_of_experience' => 'integer',
        ];
    }
}
