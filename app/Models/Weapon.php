<?php

namespace App\Models;

use App\Models\Traits\PictureTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Weapon extends Model
{
    use PictureTrait;

    public function countries(): BelongsToMany
    {
        return $this->morphToMany(Country::class, 'model', 'country_relation');
    }

    public function videos(): MorphToMany
    {
        return $this->morphToMany(Video::class, 'related', 'video_relations');
    }

    public function getUrl(): string
    {
        return route('weapon', [$this->slug]);
    }
}
