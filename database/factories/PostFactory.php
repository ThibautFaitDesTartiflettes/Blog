<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function Termwind\render;

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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5, true),
            'content' => $this->faker->paragraph(5, true),
            'image' => 'https://via.placeholder.com/1000'
        ];
    }
}
