<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4), // Generate titles with an average of 4 words
            'description' => $this->faker->paragraph(2), // Generate descriptions with 2 paragraphs
            'created_at' => $this->faker->dateTimeThisYear(), // Create posts with timestamps from this year
            'updated_at' => $this->faker->dateTimeThisYear(), // Update timestamps within the same year
        ];
    }
}
