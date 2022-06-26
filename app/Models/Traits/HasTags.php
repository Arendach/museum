<?php

namespace App\Models\Traits;

use App\Models\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/** @mixin Model */
trait HasTags
{
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function updateTags(array $tags): void
    {
        $this->tags()->sync($tags);
    }
}
