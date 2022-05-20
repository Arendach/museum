<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Seeder;

class PeoplesSeeder extends Seeder
{
    private array $peoples = [
        [
            'name'    => 'Бандера Степан Андрійович',
            'name_ru' => 'Бандера Степан Андреевич',
            'name_en' => 'Bandera Stepan Andreevich'
        ],
        [
            'name'    => 'Шухевич Роман Йосипович',
            'name_ru' => 'Шухевич Роман Иосифович',
            'name_en' => 'Shukhevich Roman Yosipovich'
        ]
    ];


    public function run(): void
    {
        foreach ($this->peoples as $people) {
            People::firstOrCreate($people);
        }
    }
}
