<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'      => $this->faker->text(rand(15, 45)),
            'title_ru'   => $this->faker->text(rand(15, 45)),
            'title_en'   => $this->faker->text(rand(15, 45)),
            'people_id'  => People::factory()->create(),
            'created_at' => now()
        ];
    }
}
