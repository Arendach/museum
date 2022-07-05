<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeSearch(Builder $builder, string $term): void
    {
        $builder
            ->where('title', 'like', "%$term%")
            ->orWhere('title_ru', 'like', "%$term%")
            ->orWhere('title_en', 'like', "%$term%")
            ->orderBy('created_at');
    }
}
