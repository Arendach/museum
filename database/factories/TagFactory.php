<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'    => $this->faker->title(),
            'title_ru' => $this->faker->title(),
            'title_en' => $this->faker->title(),
            'slug'     => Str::slug($this->faker->text(rand(15, 45)))
        ];
    }
}
