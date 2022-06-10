<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WeaponFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'          => $this->faker->title(),
            'title_ru'       => $this->faker->title(),
            'title_en'       => $this->faker->title(),
            'description'    => $this->faker->text(rand(180, 200)),
            'description_ru' => $this->faker->text(rand(180, 200)),
            'description_en' => $this->faker->text(rand(180, 200)),
            'slug'           => Str::slug($this->faker->text(rand(15, 45))),
            'date'           => '2022-06-11'
        ];
    }
}
