<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CountryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'          => $this->faker->country,
            'title_ru'       => $this->faker->country,
            'title_en'       => $this->faker->country,
            'slug'           => Str::slug($this->faker->text(rand(15, 45))),
            'description'    => $this->faker->text(rand(100, 200)),
            'description_ru' => $this->faker->text(rand(100, 200)),
            'description_en' => $this->faker->text(rand(100, 200)),
            'status'         => ['friend', 'enemy', 'neutral'][rand(0, 2)],
            'code'           => $this->faker->countryCode
        ];
    }
}
