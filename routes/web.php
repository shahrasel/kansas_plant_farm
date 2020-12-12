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
/*Route::get('/products/category/{category}', [App\Http\Controllers\ProductController::class, 'products'])
    ->where('category','.*')->name('products.category');*/

/*Route::get('/products/category/{category}', function($category)
{
    //return $category;

})->where('category', '[A-Za-z]+');*/


/*Route::get('/products/category/{category}',
    [ProductController::class, 'products'],
    ['name' => $category]
);*/








Route::post('/products', [App\Http\Controllers\ProductController::class, 'products'])->name('products_post');
Route::get('/product-details/{id}', [App\Http\Controllers\ProductController::class, 'product_details'])->name('product_details');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
