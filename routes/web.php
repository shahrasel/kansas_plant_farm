<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/products/category/{query}', [App\Http\Controllers\ProductController::class, 'products'])->where('category', 'query')->name('products.category');





Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'products'])->name('products');









Route::post('/products', [App\Http\Controllers\ProductController::class, 'products'])->name('products_post');
Route::get('/product-details/{id}', [App\Http\Controllers\ProductController::class, 'product_details'])->name('product_details');


Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'add'])->name('add-to-cart');
Route::get('/delete-cart-item', [App\Http\Controllers\CartController::class, 'delete_cart_item'])->name('delete-cart-item');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('store-cart');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
