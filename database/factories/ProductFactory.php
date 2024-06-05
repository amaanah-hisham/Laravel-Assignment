<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */

    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence,
            'product_image' => $this->faker->imageUrl(),
            'slug' => $this->faker->slug,
            'sub_category_id' => 1,
            'category_id' => 1,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100, 1000),
            'status' => 'available',
        ];
    }
}
