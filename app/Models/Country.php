<?php

namespace App\Models;

use App\Models\Contracts\HasPictureContract;
use App\Models\Traits\HasPicture;
use App\Models\Traits\HasSeo;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Country extends Model implements HasPictureContract
{
    use HasFactory,
        HasPicture,
        HasSeo,
        Searchable;

    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'is_top' => 'boolean',
    ];

    public function weapons(): MorphToMany
    {
        return $this->morphedByMany(Weapon::class, 'model', 'country_relation');
    }

    public function peoples(): HasMany
    {
        return $this->hasMany(People::class);
    }

    public function getUrl(): string
    {
        return route('country', [$this->slug]);
    }
}
