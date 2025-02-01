<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'description',
    'price',
    'discount',
    'image',
    'total_stock_qty',
    'visibility',
    'product_category_id',
    'product_brand_id',
    'product_supplier_id'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = false;

  public function attributes()
  {
    return $this->hasMany(ProductAttributes::class);
  }

  public function brand()
  {
    return $this->belongsTo(ProductBrands::class, 'product_brand_id');
  }

  // public function category()
  // {
  //   return $this->belongsTo(ProductCategories::class, 'product_category_id');
  // }

  public function images()
  {
    return $this->hasMany(ProductImages::class);
  }

  public function supplier()
  {
    return $this->belongsTo(ProductSuppliers::class, 'product_supplier_id');
  }
}
