<?php

namespace App\Models;

use App\Models\Traits\PictureTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Weapon extends Model
{
    use PictureTrait;

    public function countries(): BelongsToMany
    {
        return $this->morphToMany(Country::class, 'model', 'country_relation');
    }

    public function getUrl(): string
    {
        return route('weapon', [$this->slug]);
    }
}
