<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'       => $this->faker->text(rand(15, 45)),
            'name_ru'    => $this->faker->text(rand(15, 45)),
            'name_en'    => $this->faker->text(rand(15, 45)),
            'country_id' => Country::factory()->create()
        ];
    }
}
