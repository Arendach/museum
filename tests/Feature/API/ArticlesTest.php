<?php

namespace Tests\Feature\API;

use App\Models\Article;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    public function testGetArticle(): void
    {
        $article = Article::factory()->create(['is_active' => true]);

        $this
            ->get(route('api.article', [$article->id]))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $article->t('title')]);
    }

    public function testGetArticles(): void
    {
        $article = Article::orderByDesc('id')->where('is_active', true)->first();

        $this
            ->get(route('api.articles'))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $article->t('title')]);
    }
}
