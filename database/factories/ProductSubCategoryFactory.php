<?php

namespace Database\Factories;

use App\Http\Controllers\ProductTestSubCategoryController;
use App\Models\Product;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSubCategory>
 */
class ProductSubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'category_id' => ProductSubCategory::factory(), // Create a subcategory if none exists
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'status' => 'available', // or any default status
        ];
    }
}
