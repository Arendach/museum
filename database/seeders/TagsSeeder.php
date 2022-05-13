<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run(): void
    {
        if (Tag::count()) {
            return;
        }

        Tag::create([
            'title'    => 'Війна',
            'title_ru' => 'Война',
            'title_en' => 'War'
        ]);

        Tag::create([
            'title'    => 'Відео',
            'title_ru' => 'Видео',
            'title_en' => 'Video'
        ]);

        Tag::create([
            'title'    => 'Фото',
            'title_ru' => 'Фото',
            'title_en' => 'Photo'
        ]);

        $this->relationArticles();
    }

    private function relationArticles(): void
    {
        $articles = Article::all();

        Tag::all()->each(function (Tag $tag) use ($articles) {
            $articles->each(function (Article $article) use ($tag) {
                if (rand(0, 1)){
                    return;
                }

                $tag->articles()->attach($article);
            });
        });
    }
}
