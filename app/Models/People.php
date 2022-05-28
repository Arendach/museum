<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class People extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'peoples';

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
