<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'                => $this->faker->text(rand(15, 45)),
            'title_ru'             => $this->faker->text(rand(15, 45)),
            'title_en'             => $this->faker->text(rand(15, 45)),
            'short_description'    => $this->faker->text(),
            'short_description_ru' => $this->faker->text(),
            'short_description_en' => $this->faker->text(),
            'description'          => $this->faker->text(),
            'description_ru'       => $this->faker->text(),
            'description_en'       => $this->faker->text(),
            'is_active'            => !rand(0, 1),
            'is_popular'           => !rand(0, 1),
            'created_at'           => now(),
            'updated_at'           => now(),
            'user_id'              => 1,
            'slug'                 => Str::slug($this->faker->text(rand(15, 45))),
        ];
    }
}
