<?php

namespace App\Models;

use App\Models\Traits\PictureTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Country extends Model
{
    use HasFactory;
    use PictureTrait;

    protected $guarded = [];
    public $timestamps = false;

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
