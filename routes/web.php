<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Shop\AuthController;
use App\Http\Controllers\Shop\BlogController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\ErrorController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('shop')->name('shop.')->controller(ShopController::class)->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/{id}', 'show')->name('show');
});

Route::prefix('/cart')->name('cart.')->group(function () {
  Route::get('/', [CartController::class, 'index'])->name('index');
});

Route::prefix('blog')->name('blog.')->group(function () {
  Route::get('/', [BlogController::class, 'index'])->name('index');
  Route::get('/{slug}-{id}', [BlogController::class, 'show'])
    ->name('show')
    ->where(['slug' => '.*', 'id' => '[0-9]+']);
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/404', [ErrorController::class, 'notFound'])->name('404');

Route::prefix('admin')->name('admin.')->group(function () {
  Route::redirect('/', '/dashboard');
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

  Route::resource('articles', ArticleController::class)->except(['show']);
  Route::prefix('articles')->name('articles.')->group(function () {
    Route::patch('/{id}/update-status', [ArticleController::class, 'updateStatus'])->name('update-status');
    Route::get('/{id}/show-thumbnail-info', [ArticleController::class, 'showThumbnailInfo'])->name('show-thumnail-info');
  });

  Route::prefix('categories')->name('categories.')->group(function () {
    // Route::prefix('products')->name('products.')->group(function () {});
    Route::resource('articles', ArticleCategoryController::class)->except(['show']);
  });

  Route::resource('products', ProductController::class)->except(['show']);

  Route::prefix('tag')->name('tag.')->group(function () {
    Route::post('/store', [TagController::class, 'store'])->name('store');
  });
});
