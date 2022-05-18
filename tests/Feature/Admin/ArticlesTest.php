<?php

namespace Tests\Feature\Admin;

use App\Models\Article;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    public function testGetArticle(): void
    {
        $article = Article::first();

        $this
            ->get(route('api.admin.article', [$article->id]))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $article->title]);
    }

    public function testGetArticles(): void
    {
        $article = Article::orderByDesc('id')->first();

        $this
            ->get(route('api.admin.articles'))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $article->t('title')]);
    }
}
