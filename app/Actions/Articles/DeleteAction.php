<?php

namespace App\Actions\Articles;

use App\Models\Article;

class DeleteAction
{
    public function run(Article $article): bool
    {
        return $article->delete();
    }
}
