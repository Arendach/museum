<?php

namespace App\Actions\Tags;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class GetVideosAction
{
    public function run(Tag $tag): LengthAwarePaginator
    {
        return $tag->videos()->paginate(10);
    }
}
