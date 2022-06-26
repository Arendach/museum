<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seo extends Model
{
    use HasFactory;

    protected $table = 'seo';

    protected $casts = [
        'is_index' => 'boolean',
        'is_follow' => 'boolean',
    ];
}
