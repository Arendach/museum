<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(PeoplesSeeder::class);
        $this->call(QuotesSeeder::class);
        $this->call(WeaponSeeder::class);
    }
}
