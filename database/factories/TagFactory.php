<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'          => $this->faker->title(),
            'title_ru'       => $this->faker->title(),
            'title_en'       => $this->faker->title(),
            'slug'           => Str::slug($this->faker->text(rand(15, 45))),
            'created_at'     => now(),
            'updated_at'     => now(),
            'is_top'         => $this->faker->boolean,
            'is_active'      => $this->faker->boolean,
            'description'    => $this->faker->text(rand(100, 255)),
            'description_ru' => $this->faker->text(rand(100, 255)),
            'description_en' => $this->faker->text(rand(100, 255)),
            'seo'            => Seo::factory()->create(),
            'picture'        => Picture::factory()->create(),
        ];
    }
}
