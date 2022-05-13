<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class TagsRepository
{
    public function getTags(): LengthAwarePaginator
    {
        return Tag::paginate(10);
    }
}
