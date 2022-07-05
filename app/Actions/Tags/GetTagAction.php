<?php

namespace App\Actions\Tags;

use App\Repositories\TagsRepository;

class GetTagAction
{
    public function run(string $slug)
    {
        return app(TagsRepository::class)->findTag($slug);
    }
}
