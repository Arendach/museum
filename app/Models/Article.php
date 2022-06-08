<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_active'  => 'boolean',
        'is_popular' => 'boolean',
    ];

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUrl(): string
    {
        return route('article', [$this->slug]);
    }

    public function getPicture(): ?string
    {
        return asset($this->picture?->path ?: 'img/blog/list-img-1.jpg');
    }

    public function picture(): MorphOne
    {
        return $this->morphOne(Picture::class, 'model')->where('is_main', true);
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'model')->where('is_main', false);
    }
}
