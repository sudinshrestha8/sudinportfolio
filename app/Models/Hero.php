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
    ];
}
