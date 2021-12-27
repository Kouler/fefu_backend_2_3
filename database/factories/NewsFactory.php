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
            //'slug' => $this->faker->unique()->safeEmail(),
            //'email_verified_at' => now(),
            'description' => $this->faker->text(15),
            'text' => $this->faker->text(100),
            'is_published' => $this->faker->boolean(70),
            'published_at' => $this->faker->dateTimeBetween($startDate = '-60 years', $endDate = 'now', $timezone = null),
//        $table->id();
//        $table->string('title');
//        $table->string('slug')->unique();
//        $table->string('description')->nullable();
//        $table->text('text');
//        $table->boolean('is_published');
//        $table->dateTime('published_at');
//
//        $table->timestamps();
        ];
    }
}
