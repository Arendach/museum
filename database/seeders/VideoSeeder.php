<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        if (!Video::where('title', 'Javelin нищить руснявий танк')->exists()) {

            Video::create([
                'title'           => 'Javelin нищить руснявий танк',
                'title_ru'        => '',
                'title_en'        => '',
                'description'     => 'Відео зняте в степах України приблизно 27 березня.',
                'description_ru'  => '',
                'description_en'  => '',
                'type'            => 'youtube',
                'path'            => 'A33ZVOdxxwI',
                'source'          => 'https://www.youtube.com/channel/UCN7pTz_T5PIX2078XDvPyKA',
                'source_title'    => 'zonenews tv',
                'source_title_ru' => 'zonenews tv',
                'source_title_en' => 'zonenews tv',
            ]);

        }

        if (!Video::where('title', 'Робота Байрактара в Україні')->exists()) {

            Video::create([
                'title'           => 'Робота Байрактара в Україні',
                'title_ru'        => '',
                'title_en'        => '',
                'description'     => 'Дане відео зняте 27 лютого операторами безпілотника Bayraktar TB2.',
                'description_ru'  => '',
                'description_en'  => '',
                'type'            => 'youtube',
                'path'            => 'OLisZ6zN76E',
                'source'          => 'https://www.youtube.com/channel/UC8BgJwYGZ4gEvMZwcXmz5pQ',
                'source_title'    => 'Вся правда',
                'source_title_ru' => 'Вся правда',
                'source_title_en' => 'Вся правда',
            ]);

        }
    }
}
