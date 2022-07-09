<?php

namespace App\Models;

use App\Models\Traits\HasPicture;
use App\Models\Traits\HasSeo;
use App\Models\Traits\HasVideos;

class Page extends Model
{
    use HasSeo,
        HasPicture,
        HasVideos;

    protected $table = 'pages';
    public $timestamps = true;

    public function getUrl(): string
    {
        return route('page', [$this->slug]);
    }
}
