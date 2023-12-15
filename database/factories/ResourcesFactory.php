<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resources>
 */
class ResourcesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tittle' => $this->faker->sentence,
            'category_id' => Category::factory(), 
            'link' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'creator_id' => User::factory(),
        ];
    }
}
