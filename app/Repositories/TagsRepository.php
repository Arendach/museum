<?php

namespace App\Repositories;

use App\Models\Tag;
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
}
