<?php

namespace App\Models;

use App\Models\Contracts\HasPictureContract;
use App\Models\Traits\HasPicture;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class People extends Model implements HasPictureContract
{
    use HasFactory,
        HasPicture,
        Searchable;

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

    public function scopeSearch(Builder $builder, string $term): void
    {
        $builder->where('name', 'like', "%$term%")
            ->orWhere('name_ru', 'like', "%$term%")
            ->orWhere('name_en', 'like', "%$term%");
    }
}
