<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticlesRepository
{
    public function getArticles(): LengthAwarePaginator
    {
        return Article::with('tags', 'user')
            ->where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(request()->getPaginationLimit());
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
