<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      RoleSeeder::class,
      UserSeeder::class,
      CategorySeeder::class,
      BrandSeeder::class,
      ProductSeeder::class,
      AttributeGroupSeeder::class,
      AttributeValueSeeder::class,
      ProductAttributeGroupSeeder::class,
    ]);
  }
}
