<?php

namespace App\Models;

use App\Models\Contracts\HasPictureContract;
use App\Models\Traits\HasPicture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class People extends Model implements HasPictureContract
{
    use HasFactory;
    use HasPicture;

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
