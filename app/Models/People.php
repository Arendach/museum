<?php

namespace App\Models;

use App\Models\Traits\PictureTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class People extends Model
{
    use HasFactory;
    use PictureTrait;

    protected $table = 'peoples';

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function getUrl(): string
    {
        return route('people', [$this->id]);
    }
}
