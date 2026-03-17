<?php

namespace Database\Seeders;

use App\Models\ProductAttributeGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeGroupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ProductAttributeGroup::factory()->count(50)->create();
  }
}
