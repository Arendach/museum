<?php

namespace App\Models;

use Str;

class Video extends Model
{
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
