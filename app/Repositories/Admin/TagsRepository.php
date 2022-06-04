<?php

namespace App\Repositories\Admin;

use App\Models\Tag;
use Illuminate\Support\Collection;
use Request;

class TagsRepository
{
    public function getTags(): Collection
    {
        return Tag::orderBy(
            Request::getOrderField(),
            Request::getOrderDirection(),
        )->get();
    }
}
