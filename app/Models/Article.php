<?php

namespace App\Models;

use App\Models\Contracts\HasPictureContract;
use App\Models\Contracts\HasVideoContract;
use App\Models\Traits\HasVideos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Traits\HasPicture;

class Article extends Model implements HasVideoContract, HasPictureContract
{
    use HasFactory;
    use HasPicture;
    use HasVideos;

    public $timestamps = true;

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

    public function videos(): MorphToMany
    {
        return $this->morphToMany(Video::class, 'related', 'video_relations');
    }

    public function getUrl(): string
    {
        return route('article', [$this->slug]);
    }
}
