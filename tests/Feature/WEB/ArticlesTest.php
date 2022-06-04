<?php

namespace Tests\Feature\WEB;

use App\Models\Article;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    public function testShow(): void
    {
        $article = Article::factory()->create(['is_active' => true]);

        $this
            ->get(route('article', [$article->slug]))
            ->assertStatus(200)
            ->assertSee($article->t('title'));
    }
}
