<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $name = fake()->words(3, true);
    return [
      'name' => $name,
      'slug' => Str::slug($name),
      'description' => fake()->sentence(),
      'type' => fake()->randomElement(['product', 'article']),
    ];
  }
}
