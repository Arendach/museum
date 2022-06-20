<?php

namespace App\Models\Traits;

use App\Models\Model;
use App\Models\Video;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/** @mixin Model */
trait HasVideos
{
    public function videos(): MorphToMany
    {
        return $this->morphToMany(Video::class, 'related', 'video_relations');
    }
}
