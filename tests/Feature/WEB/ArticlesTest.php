<?php

namespace Tests\Feature\WEB;

use App\Models\Article;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    public function testShow(): void
    {
        $article = Article::first();

        $this
            ->get(route('article', [$article->slug]))
            ->assertStatus(200)
            ->assertSee($article->t('title'));
    }
}
