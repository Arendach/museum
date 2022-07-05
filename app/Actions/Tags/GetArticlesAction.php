<?php

namespace App\Actions\Tags;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class GetArticlesAction
{
    public function run(Tag $tag): LengthAwarePaginator
    {
        return $tag
            ->articles()
            ->with(['user', 'picture'])
            ->paginate(10);
    }
}
