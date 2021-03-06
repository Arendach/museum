<?php

namespace App\Models;

use App\Models\Traits\HasSeo;
use App\Models\Traits\HasTags;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Str;

class Video extends Model
{
    use HasFactory,
        HasSeo,
        Searchable,
        HasTags;

    public $timestamps = true;

    public function getUrl(): string
    {
        return route('video', [
            'name' => Str::slug($this->title),
            'id'   => $this->id
        ]);
    }

    public function getPath(): string
    {
        return asset($this->path);
    }

    public function getSourceUrl(): string
    {
        return $this->source ?: route('pages.not-found-source');
    }

    public function getSourceTitle(): string
    {
        return $this->source
            ? ($this->t('source_title') ?: $this->source)
            : translate('Невідоме');
    }
}
