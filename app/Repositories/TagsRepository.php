<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TagsRepository
{
    public function getTags(): LengthAwarePaginator
    {
        return Tag::paginate(10);
    }

    public function getAllTags(): Collection
    {
        return Tag::all();
    }

    public function findTag(string $slug): Builder|Model|Tag|null
    {
        return Tag::with('articles')
            ->where('slug', $slug)
            ->first();
    }
}
