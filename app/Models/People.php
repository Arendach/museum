<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class People extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'peoples';

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
