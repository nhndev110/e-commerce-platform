<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
      'title' => 'required|string|max:100|min:5',
      'description' => 'required|string|max:500',
      'thumbnail' => 'required|image|mimes:png,jpg,webp,svg,jpeg|max:2048',
      'slug' => 'required|max:150|string',
      'status' => 'required|numeric',
      'content' => 'required|string',
      'tags' => 'required',
      'categoryId' => 'required|numeric|gt:0|exists:categories,id'
    ];
  }
}
