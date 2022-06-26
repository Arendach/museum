<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'          => $this->faker->text(rand(15, 45)),
            'title_ru'       => $this->faker->text(rand(15, 45)),
            'title_en'       => $this->faker->text(rand(15, 45)),
            'keywords'       => $this->faker->text(),
            'keywords_ru'    => $this->faker->text(),
            'keywords_en'    => $this->faker->text(),
            'description'    => $this->faker->text(),
            'description_ru' => $this->faker->text(),
            'description_en' => $this->faker->text(),
            'h1'             => $this->faker->text(),
            'h1_ru'          => $this->faker->text(),
            'h1_en'          => $this->faker->text(),
            'is_follow'      => !rand(0, 1),
            'is_index'       => !rand(0, 1),
        ];
    }
}
