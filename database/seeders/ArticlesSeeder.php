<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    public function run(): void
    {
        if (Article::count()) {
            return;
        }

        Article::factory(10)->create();
    }
}
