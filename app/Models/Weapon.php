<?php

namespace App\Models;

use App\Models\Contracts\HasPictureContract;
use App\Models\Contracts\HasVideoContract;
use App\Models\Traits\HasVideos;
use App\Models\Traits\HasPicture;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Weapon extends Model implements HasVideoContract, HasPictureContract
{
    use HasPicture;
    use HasVideos;

    public function countries(): BelongsToMany
    {
        return $this->morphToMany(Country::class, 'model', 'country_relation');
    }

    public function getUrl(): string
    {
        return route('weapon', [$this->slug]);
    }
}
