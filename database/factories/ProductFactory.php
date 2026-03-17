<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $name = fake()->sentence();
    $slug = Str::slug($name) . "-" . time();
    $thumbnail_random = fake()->numberBetween(10, 100);
    $thumbnail = "https://picsum.photos/id/{$thumbnail_random}/200/200";
    return [
      'name' => $name,
      'slug' => $slug,
      'description' => fake()->paragraph(20),
      'price' => fake()->randomFloat(2, 20, 100),
      'thumbnail' => $thumbnail,
      'visibility' => fake()->randomElement([-1, 0, 1]),
      'total_stock_qty' => fake()->randomNumber(4, true),
      'category_id' => Category::factory(),
      'brand_id' => Brand::factory(),
    ];
  }
}
