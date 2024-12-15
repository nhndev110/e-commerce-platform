<?php

namespace App\Http\Services;

use App\Models\Product;

class ProductService
{
  public static function createProduct(array $validated)
  {
    return Product::create([
      'name' => $validated['productName'],
      'description' => $validated['productDescription'] ?? "",
      'price' => $validated['productPrice'],
      'discount' => $validated['productDiscount'],
      'visibility' => $validated['productVisibility'],
      'product_category_id' => $validated['category'],
      'product_brand_id' => $validated['brand'],
      'product_supplier_id' => $validated['supplier'],
    ]);
  }
}
