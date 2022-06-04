<?php

namespace App\Actions\Articles;

use App\Http\Requests\Admin\Articles\UpdateRequest;
use App\Models\Article;

class UpdateAction
{
    public function run(Article $article, UpdateRequest $request): bool
    {
        $article->update($request->getData());

        $article->tags()->sync($request->getTags());

        return true;
    }
}
