<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'role',
        'company',
        'quote',
        'avatar',
        'rating',
        'visible',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'visible' => 'boolean',
        ];
    }
}
