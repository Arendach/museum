<?php

namespace App\Models;

use App\Models\Contracts\HasPictureContract;
use App\Models\Contracts\HasVideoContract;
use App\Models\Traits\HasSeo;
use App\Models\Traits\HasTags;
use App\Models\Traits\HasVideos;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Traits\HasPicture;

class Article extends Model implements HasVideoContract, HasPictureContract
{
    use HasFactory,
        HasPicture,
        HasVideos,
        HasSeo,
        HasTags,
        Searchable;

    public $timestamps = true;

    protected $casts = [
        'is_active'  => 'boolean',
        'is_popular' => 'boolean',
    ];

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

    public function breadcrumbs(): array
    {
        return [[$this->t('title')]];
    }
}
