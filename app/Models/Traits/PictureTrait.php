<?php

namespace App\Models\Traits;

use App\Models\Model;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/** @mixin Model */
trait PictureTrait
{
    public function picture(): MorphOne
    {
        return $this->morphOne(Picture::class, 'model')->where('is_main', true);
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'model')->where('is_main', false);
    }

    public function getPicture(): ?string
    {
        return asset($this->picture?->path ?: 'img/blog/list-img-1.jpg');
    }
}
