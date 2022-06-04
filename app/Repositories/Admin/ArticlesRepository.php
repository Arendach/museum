<?php

namespace App\Repositories\Admin;

use Request;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticlesRepository
{
    public function getArticles(): LengthAwarePaginator
    {
        return Article::with('tags', 'user')
            ->orderBy(
                Request::getOrderField(),
                Request::getOrderDirection()
            )
            ->paginate(
                Request::getPaginationLimit()
            );
    }

    public function getArticle(int $id): Article|Model|null
    {
        return Article::with('tags', 'user')
            ->where('id', $id)
            ->where('is_active', true)
            ->first();
    }

    public function findArticle(string $slug): Article|Model|null
    {
        return Article::with('tags', 'user')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();
    }
}
