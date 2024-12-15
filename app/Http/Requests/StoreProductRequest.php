<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'productName' => 'required|max:255',
      'productPrice' => 'required',
      'productDiscount' => 'required|digits_between:0,100',
      'productThumbnail' => 'numeric|nullable',
      'productVisibility' => 'required|digits_between:-1,1',
      'category' => 'exists:product_categories,id',
      'brand' => 'exists:product_brands,id',
      'supplier' => 'required|exists:product_suppliers,id',
      'productImages' => 'array|nullable',
      'productImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048|nullable',
      'setImageHidden' => 'string|nullable',
      'productAttributes' => 'array|nullable',
      'productAttributes.*' => 'json|nullable',
    ];
  }
}
