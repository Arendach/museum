<?php

namespace App\Actions\Tags;

use App\Models\Tag;

class DeleteAction
{
    public function run(Tag $tag): bool
    {
        return $tag->delete();
    }
}
