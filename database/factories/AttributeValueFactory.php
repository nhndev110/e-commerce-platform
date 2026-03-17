<?php

namespace Database\Factories;

use App\Models\AttributeGroup;
use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttributeValues>
 */
class AttributeValueFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var class-string<\Illuminate\Database\Eloquent\Model>
   */
  protected $model = AttributeValue::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'group_id' => AttributeGroup::factory(),
      'value_name' => fake()->word,
      'image' => fake()->imageUrl(200, 200),
      'quantity' => fake()->numberBetween(1, 100),
    ];
  }
}
