<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    return view('pages.shop.index');
  }

  public function show($id)
  {
    return response()->view('pages.shop.show');
  }
}
