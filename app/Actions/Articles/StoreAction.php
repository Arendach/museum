<?php

namespace App\Actions\Articles;

use App\Http\Requests\Admin\Articles\StoreRequest;
use App\Models\Article;

class StoreAction
{
    public function run(StoreRequest $request): Article
    {
        $article = Article::create(
            $request->getData()
        );

        $article->tags()->attach(
            $request->getTags()
        );

        $article->seo()->create();

        return $article;
    }
}
