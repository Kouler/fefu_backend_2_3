<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
            'description' => $this->faker->text(15),
            'text' => $this->faker->text(100),
            'is_published' => $this->faker->boolean(70),
            'published_at' => $this->faker->dateTimeBetween($startDate = '-60 days', $timezone = null, $endDate = '+14 days')
        ];
    }
}
