<?php

namespace App\Models;

use App\Models\Traits\HasPicture;
use App\Models\Traits\HasSeo;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory,
        HasSeo,
        HasPicture,
        Searchable;

    public $timestamps = true;

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }

    public function weapons(): MorphToMany
    {
        return $this->morphedByMany(Weapon::class, 'taggable');
    }

    public function countries(): MorphToMany
    {
        return $this->morphedByMany(Country::class, 'taggable');
    }

    public function getUrl(): string
    {
        return route('tag', [$this->slug]);
    }
}
