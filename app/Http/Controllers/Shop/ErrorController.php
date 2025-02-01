<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
  public function notFound()
  {
    return response()->view('pages.errors.404');
  }
}
