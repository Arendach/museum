<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'    => $this->faker->title(),
            'title_ru' => $this->faker->title(),
            'title_en' => $this->faker->title()
        ];
    }
}
