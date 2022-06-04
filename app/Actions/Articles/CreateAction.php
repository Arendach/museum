<?php

namespace App\Actions\Articles;

use App\Http\Requests\Admin\Articles\CreateRequest;
use App\Models\Article;

class CreateAction
{
    public function run(CreateRequest $request): Article
    {
        $article = Article::create(
            $request->getData()
        );

        $article->tags()->attach(
            $request->getTags()
        );

        return $article;
    }
}
