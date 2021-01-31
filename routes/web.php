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

//Route::get('/my-profile', [\App\Http\Controllers\Auth\LoginController::class, 'profile'])->name('my-profile');
//Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'products'])->name('products');









Route::post('/products', [App\Http\Controllers\ProductController::class, 'products'])->name('products_post');
Route::get('/product-details/{id}', [App\Http\Controllers\ProductController::class, 'product_details'])->name('product_details');


Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'add'])->name('add-to-cart');
Route::get('/delete-cart-item', [App\Http\Controllers\CartController::class, 'delete_cart_item'])->name('delete-cart-item');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('store-cart');

Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');

Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/orders', [\App\Http\Controllers\UserController::class, 'orders'])->name('orders')->middleware('auth');

Route::get('/my-profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('my-profile')->middleware('auth');
Route::post('/user-update', [\App\Http\Controllers\UserController::class, 'update'])->name('user-update')->middleware('auth');

/*Route::post('/add-to-wishlist/{user_id}/{product_id}', [App\Http\Controllers\WishlistController::class, 'store'])->name('add-to-wishlist')->middleware('auth');*/
Route::post('/add-to-wishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('add-to-wishlist')->middleware('auth');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', [\App\Http\Controllers\UserController::class, 'adminLogin'])->name('admin-login-form');
Route::post('/admin', [\App\Http\Controllers\UserController::class, 'adminLogin'])->name('admin-login-form-post');
Route::post('/admin/logout', [\App\Http\Controllers\UserController::class, 'adminLogout'])->name('adminLogout');

Route::get('/admin/dashboard', [\App\Http\Controllers\UserController::class, 'adminDashboard'])->name('admin-dashboard');
Route::get('/admin/my-profile', [\App\Http\Controllers\UserController::class, 'adminMyProfile'])->name('admin-my-profile');
Route::post('/admin/my-profile', [\App\Http\Controllers\UserController::class, 'adminMyProfile'])->name('admin-my-profile-update');

Route::get('/admin/contractors', [\App\Http\Controllers\UserController::class, 'adminContractors'])->name('admin-contractors');
Route::get('/admin/add-contractor', [\App\Http\Controllers\UserController::class, 'addAdminContractor'])->name('admin-add-contractor');
Route::post('/admin/add-contractor', [\App\Http\Controllers\UserController::class, 'addAdminContractor'])->name('admin-add-contractor-post');

Route::get('/admin/customers', [\App\Http\Controllers\UserController::class, 'adminCustomers'])->name('admin-customers');