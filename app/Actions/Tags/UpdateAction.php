<?php

namespace App\Actions\Tags;

use App\Http\Requests\Admin\Tags\UpdateRequest;
use App\Models\Tag;

class UpdateAction
{
    public function run(Tag $tag, UpdateRequest $request): bool
    {
        $tag->update($request->getData());

        $tag->updateSeo($request->getSeo());

        return true;
    }
}
