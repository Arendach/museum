<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    private $data = [
        [
            'title'          => 'Україна',
            'title_ru'       => 'Украина',
            'title_en'       => 'Ukraine',
            'description'    => 'Скоро буде...',
            'description_ru' => 'Скоро буде...',
            'description_en' => 'Скоро буде...',
            'status'         => 'friend',
            'code'           => 'ua',
            'slug'           => 'ukraine'
        ],
        [
            'title'          => 'Росія',
            'title_ru'       => 'Россия',
            'title_en'       => 'Russia',
            'description'    => 'Скоро буде...',
            'description_ru' => 'Скоро буде...',
            'description_en' => 'Скоро буде...',
            'status'         => 'enemy',
            'code'           => 'ru',
            'slug'           => 'russia'
        ],
        [
            'title'          => 'Білорусь',
            'title_ru'       => 'Белорусь',
            'title_en'       => 'Belarus',
            'description'    => 'Скоро буде...',
            'description_ru' => 'Скоро буде...',
            'description_en' => 'Скоро буде...',
            'status'         => 'enemy',
            'code'           => 'by',
            'slug'           => 'belarus'
        ],
    ];

    public function run(): void
    {
        if (Country::count()) {
            return;
        }

        foreach ($this->data as $country) {
            Country::create($country);
        }
    }
}
