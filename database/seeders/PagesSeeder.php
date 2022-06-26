<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    public function run(): void
    {
        if (!Page::where('slug', 'index')->exists()) {

            Page::create([
                'slug'           => 'index',
                'is_active'      => true,
                'title'          => 'Головна сторінка сайту',
                'title_ru'       => 'Главная страница сайта',
                'title_en'       => 'Main page site',
                'description'    => '',
                'description_ru' => '',
                'description_en' => '',
            ]);

        }
    }
}
