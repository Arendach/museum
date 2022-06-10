<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    public function run(): void
    {
        if (Weapon::count()) {
            return;
        }

        Weapon::create([
            'title' => 'Стугна-П',
            'slug'  => 'stugna-p',
            'date'  => '2005',
        ]);

        Weapon::create([
            'title' => 'FGM-148 Javelin',
            'slug'  => 'javelin',
            'date'  => '1996',
        ]);

        Weapon::create([
            'title' => 'АК-47',
            'slug'  => 'ak-47',
            'date'  => '1947',
        ]);
    }
}
