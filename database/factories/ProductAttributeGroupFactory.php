<?php

namespace Database\Factories;

use App\Models\AttributeGroup;
use App\Models\Product;
use App\Models\ProductAttributeGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductAttributeGroupFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var class-string<\Illuminate\Database\Eloquent\Model>
   */
  protected $model = ProductAttributeGroup::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'product_id' => Product::factory(),
      'group_id' => AttributeGroup::factory(),
    ];
  }
}
