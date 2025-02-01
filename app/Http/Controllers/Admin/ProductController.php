<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributes;
use App\Models\ProductBrands;
use App\Models\ProductImages;
use App\Models\ProductSuppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $products = new Product();

    $search = $request->query('s');
    if (!empty($search)) {
      $products = $products->where('name', 'LIKE', "%{$search}%");
    }

    $category_id = $request->query('category_id');
    if (!empty($category_id)) {
      $products = $products->where('product_category_id', $category_id);
    }

    $brand_id = $request->query('brand_id');
    if (!empty($brand_id)) {
      $products = $products->where('product_brand_id', $brand_id);
    }

    $start_price = $request->query('start_price');
    if (!empty($start_price)) {
      $products = $products->where('price', '>=', $start_price);
    }

    $end_price = $request->query('end_price');
    if (!empty($end_price)) {
      $products = $products->where('price', '<=', $end_price);
    }

    $products = $products->paginate(10)->withQueryString();

    $product_categories = Category::where('type', 'product')->get(['id', 'name']);
    $product_brands = ProductBrands::all(['id', 'name']);

    return view('admin.products.index', [
      'products' => $products,
      'product_categories' => $product_categories,
      'product_brands' => $product_brands,
    ]);
  }

  public function create()
  {
    $categories = Category::where('type', 'product')->get(['id', 'name']);
    $suppliers = ProductSuppliers::all();
    $brands = ProductBrands::all();

    return view('admin.products.create', [
      'categories' => $categories,
      'suppliers' => $suppliers,
      'brands' => $brands
    ]);
  }

  public function store(StoreProductRequest $request)
  {
    if ($request->fails()) {
      return response()->json(['error' => array_map(fn($error) => $error[0], $request->errors()->toArray())], 422);
    }

    $validated = $request->validated();

    $product = ProductService::createProduct($validated);

    // Xử lý thêm ảnh vào sản phẩm
    if ($request->has('productImages') && $request->productImages != null) {
      $productImageObjs = [];
      $setImageHidden = explode(',', $validated['setImageHidden']) ?? [];
      $productImages = $validated['productImages'];
      $productImagesLen = count($productImages);
      for ($i = 0; $i < $productImagesLen; $i++) {
        $path = Storage::putFile(
          "public/products/{$product->id}",
          $productImages[$i]
        );
        $productImageObjs[] = new ProductImages([
          'product_id' => $product->id,
          'image' => basename($path),
          'description' => '',
          'display_order' => $i + 1,
          'is_hidden' => $setImageHidden[$i],
        ]);
      }

      $product->image = $productImageObjs[$validated['productThumbnail']]->image;
      $product->save();

      $product->images()->saveMany($productImageObjs);
    }

    // Thêm các thuộc tính vào sản phẩm
    if ($request->has('productAttributes') && $request->productImages != null) {
      $productAttributes = $validated['productAttributes'];
      $productAttributeObjs = [];
      for ($i = 0; $i < count($productAttributes); $i++) {
        $attribute = json_decode($productAttributes[$i]); // convert string json to object
        $productAttributeObjs[] = new ProductAttributes([
          'product_id' => $product->id,
          'option' => $attribute->option,
          'value' => $attribute->value,
          'stock_qty' => $attribute->stock,
          'display_order' => $i + 1,
        ]);
      }

      $product->attributes()->saveMany($productAttributeObjs);
    }


    return response()->json([
      'message' => 'Product added successfully!',
      'product' => $product,
    ], 201);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id)
  {
    $categories = Category::where('type', 'product')->get(['id', 'name']);
    $suppliers = ProductSuppliers::all();
    $brands = ProductBrands::all();
    $images = ProductImages::all();
    $product = Product::with('category')
      ->with('supplier')
      ->with('brand')
      ->with('images')
      ->find($id);
    return view('admin.pages.products.edit', [
      'product' => $product,
      'categories' => $categories,
      'suppliers' => $suppliers,
      'brands' => $brands,
      'images' => $images,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    if (Product::find($id)) {
      Storage::deleteDirectory("public/products/{$id}");
      Product::destroy($id);
    }
    return response()->redirectToRoute('admin.products.index');
  }
}
