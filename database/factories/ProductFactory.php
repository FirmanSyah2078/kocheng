<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(3, true);
        return [
            'category_id' => Category::factory(),
            'sku' => 'PRD-' . $this->faker->unique()->numberBetween(1000, 9999),
            'name' => $name,
            'slug' => Str::slug($name),
            'describtion' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(5000, 150000),
            'stock' => $this->faker->numberBetween(5, 100),
            'image_url' => str_replace('via.placeholder.com', 'placehold.co', $this->faker->imageUrl(640, 480, 'products', true)),
        ];
    }
}
