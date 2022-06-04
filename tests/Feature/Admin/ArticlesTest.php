<?php

namespace Tests\Feature\Admin;

use App\Models\Article;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    public function testGetOne(): void
    {
        $article = Article::with('user', 'tags')->first();

        $this
            ->get(route('api.admin.article', [$article->id]))
            ->assertStatus(200)
            ->assertJsonFragment(['is_active' => $article->is_active])
            ->assertJsonFragment(['is_popular' => $article->is_popular])
            ->assertJsonFragment(['title' => $article->title])
            ->assertJsonFragment(['title_ru' => $article->title_ru])
            ->assertJsonFragment(['title_en' => $article->title_en])
            ->assertJsonFragment(['short_description' => $article->short_description])
            ->assertJsonFragment(['short_description_ru' => $article->short_description_ru])
            ->assertJsonFragment(['short_description_en' => $article->short_description_en])
            ->assertJsonFragment(['description' => $article->description])
            ->assertJsonFragment(['description_ru' => $article->description_ru])
            ->assertJsonFragment(['description_en' => $article->description_en]);
    }

    public function testGetList(): void
    {
        $article = Article::orderByDesc('id')->first();

        $this
            ->get(route('api.admin.articles'))
            ->assertStatus(200)
            ->assertJsonFragment(['title' => $article->t('title')]);
    }

    public function testUpdate(): void
    {
        $article = Article::first();
        $newArticle = Article::factory()->make();

        $this->put(route('api.admin.article.update', [$article->id]), [
            'slug'              => $article->slug,
            'title'             => $newArticle->title,
            'is_active'         => $newArticle->is_active,
            'is_popular'        => $newArticle->is_popular,
            'description'       => $newArticle->description,
            'short_description' => $newArticle->short_description,
        ], ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertStatus(200);

        $this->assertDatabaseHas('articles', [
            'title'             => $newArticle->title,
            'is_active'         => $newArticle->is_active,
            'is_popular'        => $newArticle->is_popular,
            'description'       => $newArticle->description,
            'short_description' => $newArticle->short_description,
        ]);
    }

    public function testCreate(): void
    {
        $article = Article::factory()->make();

        $this->post(route('api.admin.article.create', [
            'title'             => $article->title,
            'title_ru'          => $article->title_ru,
            'title_en'          => $article->title_en,
            'short_description' => $article->short_description,
            'description'       => $article->description,
            'is_active'         => $article->is_active,
            'is_popular'        => $article->is_popular,
        ]))
            ->assertStatus(201);

        $this->assertDatabaseHas('articles', [
            'title'      => $article->title,
            'is_popular' => $article->is_popular,
            'is_active'  => $article->is_active,
            'slug'       => \Str::slug($article->title),
        ]);
    }

    public function testDelete(): void
    {
        $article = Article::factory()->create();

        $this->delete(route('api.admin.article.delete', [$article->id]))
            ->assertStatus(200);

        $this->assertDatabaseMissing('articles', [
            'id' => $article->id
        ]);
    }
}
