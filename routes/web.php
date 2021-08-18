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

// Remove route cache

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clear-route-cache', function() {
    $exitCode = Artisan::call('route:cache');
	$exitCode = Artisan::call('config:cache');
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('view:clear');
    return 'All cache has just been removed';
});
#Route::get('/plants/{product}', [App\Http\Controllers\ProductController::class, 'product_details'])->name('product_details');


/*Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');*/

/*Route::get('/plants/alphabetic-sort-by/{query}', [App\Http\Controllers\ProductController::class, 'products'])->name('products.sortbyalphabet');*/

//Route::get('/plants/category/{query2}', [App\Http\Controllers\ProductController::class, 'categoryproducts'])->name('products.category');

Route::get('/plants/alphabetic-sort-by/{query1}', [App\Http\Controllers\ProductController::class, 'sortalphaproducts'])->name('products.alphabeticsort');

Route::get('/plants', [App\Http\Controllers\ProductController::class, 'products'])->name('products');

Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'showContact'])->name('show-contact');
Route::post('/send-contact-message', [App\Http\Controllers\ContactController::class, 'sendMessage'])->name('send-contact-message');



//Route::get('/my-profile', [\App\Http\Controllers\Auth\LoginController::class, 'profile'])->name('my-profile');
//Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Auth::routes();







Route::get('/add_image_count', [App\Http\Controllers\ProductController::class, 'add_image_count'])->name('add_image_count');

Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about-us');

Route::post('/plants', [App\Http\Controllers\ProductController::class, 'products'])->name('products_post');
Route::get('/plants/{product}', [App\Http\Controllers\ProductController::class, 'product_details'])->name('product_details');
Route::get('/get-product-price', [App\Http\Controllers\ProductController::class, 'get_product_price'])->name('get_product_price');



Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'add'])->name('add-to-cart');
Route::get('/delete-cart-item', [App\Http\Controllers\CartController::class, 'delete_cart_item'])->name('delete-cart-item');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('store-cart');

Route::post('/checkout/store', [App\Http\Controllers\OrderController::class, 'store'])->name('checkout-store');
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');

Route::get('/pay-success', [App\Http\Controllers\OrderController::class, 'paySuccess'])->name('pay-success');
Route::get('/pay-failed', [App\Http\Controllers\OrderController::class, 'payFailed'])->name('pay-failed');

Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'orders'])->name('orders')->middleware('auth');
Route::get('/order-details/{orderid}/show', [\App\Http\Controllers\OrderController::class, 'orderDetails'])->name('orders-details')->middleware('auth');

Route::get('/my-profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('my-profile')->middleware('auth');
Route::post('/user-update', [\App\Http\Controllers\UserController::class, 'update'])->name('user-update')->middleware('auth');

/*Route::post('/add-to-wishlist/{user_id}/{product_id}', [App\Http\Controllers\WishlistController::class, 'store'])->name('add-to-wishlist')->middleware('auth');*/
Route::post('/add-to-wishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('add-to-wishlist')->middleware('auth');

Route::get('/garden-ideas', [App\Http\Controllers\GardenThemeController::class, 'frontGardenIdeas'])->name('front-garden-ideas');

Route::get('/upcoming-events', [App\Http\Controllers\EventController::class, 'upcomingEvents'])->name('upcoming-events');

############################ PAYPAL ############################
Route::post('/payment-confirmation', [\App\Http\Controllers\OrderController::class, 'paymentConfirmation'])->name('payment-confirmation');
############################ PAYPAL ############################


############################ FILE EXPORT / IMPORT ############################
Route::get('file-import-export', [\App\Http\Controllers\ProductController::class, 'fileImportExport'])->middleware('adminauth');
Route::post('file-import', [\App\Http\Controllers\ProductController::class, 'fileImport'])->name('file-import')->middleware('adminauth');
Route::get('file-export', [\App\Http\Controllers\ProductController::class, 'fileExport'])->name('file-export')->middleware('adminauth');
############################ FILE EXPORT / IMPORT ############################


############################ ADMIN PANEL ############################
Route::get('/admin', [\App\Http\Controllers\UserController::class, 'adminLogin'])->name('admin-login-form');
Route::post('/admin', [\App\Http\Controllers\UserController::class, 'adminLogin'])->name('admin-login-form-post');
Route::post('/admin/logout', [\App\Http\Controllers\UserController::class, 'adminLogout'])->name('adminLogout')->middleware('adminauth');
Route::get('/admin/dashboard', [\App\Http\Controllers\UserController::class, 'adminDashboard'])->name('admin-dashboard')->middleware('adminauth');
Route::get('/admin/my-profile', [\App\Http\Controllers\UserController::class, 'adminMyProfile'])->name('admin-my-profile')->middleware('adminauth');
Route::post('/admin/my-profile', [\App\Http\Controllers\UserController::class, 'adminMyProfile'])->name('admin-my-profile-update')->middleware('adminauth');


################## PRODUCT ####################
Route::get('/admin/products', [\App\Http\Controllers\ProductController::class, 'adminProducts'])->name('admin-products')->middleware('adminauth');
Route::get('/admin/edit-product-image/{id}', [\App\Http\Controllers\ProductController::class, 'adminProductsImage'])->name('admin-products-image')->middleware('adminauth');
Route::any('/admin/product-image-processor/{id}', [\App\Http\Controllers\ProductController::class, 'adminProductsImageProcessor'])->name('admin-product-image-processor')->middleware('adminauth');
Route::post('/admin/add-product', [\App\Http\Controllers\ProductController::class, 'adminAddProducts'])->name('add-product')->middleware('adminauth');
Route::get('/admin/edit-product/{product}', [\App\Http\Controllers\ProductController::class, 'adminEditProducts'])->name('edit-product')->middleware('adminauth');
Route::put('/admin/update-product', [\App\Http\Controllers\ProductController::class, 'adminUpdateProducts'])->name('update-product')->middleware('adminauth');


################## CONTRACTOR ####################
Route::get('/admin/contractors', [\App\Http\Controllers\UserController::class, 'adminContractors'])->name('admin-contractors')->middleware('adminauth');
Route::get('/admin/add-contractor', [\App\Http\Controllers\UserController::class, 'addAdminContractor'])->name('admin-add-contractor')->middleware('adminauth');
Route::post('/admin/add-contractor', [\App\Http\Controllers\UserController::class, 'addAdminContractor'])->name('admin-add-contractor-post')->middleware('adminauth');


################## SALES AGENT ####################
Route::get('/admin/sales', [\App\Http\Controllers\UserController::class, 'adminSales'])->name('admin-sales')->middleware('adminauth');
Route::get('/admin/add-sales', [\App\Http\Controllers\UserController::class, 'addAdminSales'])->name('admin-add-sales')->middleware('adminauth');
Route::post('/admin/add-sales', [\App\Http\Controllers\UserController::class, 'addAdminSales'])->name('admin-add-sale-post')->middleware('adminauth');



################## CUSTOMER ####################
Route::get('/admin/customers', [\App\Http\Controllers\UserController::class, 'adminCustomers'])->name('admin-customers')->middleware('adminauth');


################## ORDER ####################
Route::get('/admin/orders', [\App\Http\Controllers\OrderController::class, 'adminOrders'])->name('admin-orders')->middleware('adminauth');
Route::any('/admin/orderdetails/{id}', [\App\Http\Controllers\OrderController::class, 'adminOrderDetails'])->name('admin-order-details')->middleware('adminauth');
Route::any('/admin/orderprint/{id}', [\App\Http\Controllers\OrderController::class, 'about-us'])->name('admin-order-print')->middleware('adminauth');


################## GARDEN THEME ####################
Route::get('/admin/garden-themes', [\App\Http\Controllers\GardenThemeController::class, 'adminIndex'])->name('admin-index')->middleware('adminauth');
Route::post('/admin/garden-themes', [\App\Http\Controllers\GardenThemeController::class, 'adminStore'])->name('admin-store')->middleware('adminauth');
Route::get('/admin/garden-themes/create', [\App\Http\Controllers\GardenThemeController::class, 'adminCreate'])->name('add-create')->middleware('adminauth');
Route::get('/admin/garden-themes/{gardenTheme}/edit', [\App\Http\Controllers\GardenThemeController::class, 'adminEdit'])->name('admin-edit')->middleware('adminauth');
Route::put('/admin/garden-themes/{gardenTheme}', [\App\Http\Controllers\GardenThemeController::class, 'adminUpdate'])->name('admin-update')->middleware('adminauth');
Route::delete('/admin/garden-themes/{gardenTheme}', [\App\Http\Controllers\GardenThemeController::class, 'adminUpdate'])->name('update')->middleware('adminauth');
Route::any('/admin/edit-garden-theme-image/{id}', [\App\Http\Controllers\GardenThemeController::class, 'adminEditGardenTheme'])->name('admin-garden-theme-image')->middleware('adminauth');
Route::any('/admin/garden-theme-image-processor/{id}', [\App\Http\Controllers\GardenThemeController::class, 'adminGardenThemeImageProcessor'])->name('garden-theme-image-processor')->middleware('adminauth');

Route::get('/admin/garden-themes/{gardenTheme}/delete', [\App\Http\Controllers\GardenThemeController::class, 'destroy'])->name('admin-garden-theme-delete')->middleware('adminauth');


Route::any('/admin/aboutus-image-processor/{id}', [\App\Http\Controllers\SettingsController::class, 'adminAboutusImageProcessor'])->name('aboutus-image-processor')->middleware('adminauth');


################## EVENT ####################
Route::get('/admin/events',[\App\Http\Controllers\EventController::class, 'index'])->name('admin-event-index')->middleware('adminauth');
Route::get('/admin/events/create',[\App\Http\Controllers\EventController::class, 'create'])->name('admin-event-create')->middleware('adminauth');
Route::post('/admin/events',[\App\Http\Controllers\EventController::class, 'store'])->name('admin-event-store')->middleware('adminauth');
Route::get('/admin/events/{event}',[\App\Http\Controllers\EventController::class, 'show'])->name('admin-event-show')->middleware('adminauth');
Route::get('/admin/events/{event}/edit',[\App\Http\Controllers\EventController::class, 'edit'])->name('admin-event-edit')->middleware('adminauth');
Route::put('/admin/events/{event}',[\App\Http\Controllers\EventController::class, 'update'])->name('admin-event-update')->middleware('adminauth');
/*Route::delete('/admin/events/{event}',[\App\Http\Controllers\EventController::class, 'delete'])->name('admin-event-delete')->middleware('adminauth');*/
Route::get('/admin/events/{event}/delete', [\App\Http\Controllers\EventController::class, 'destroy'])->name('admin-event-delete')->middleware('adminauth');


################## Home Billboard ####################
Route::get('/admin/billboards',[\App\Http\Controllers\BillboardController::class, 'index'])->name('admin-billboard-index')->middleware('adminauth');
Route::get('/admin/billboards/create',[\App\Http\Controllers\BillboardController::class, 'create'])->name('admin-billboard-create')->middleware('adminauth');
Route::post('/admin/billboards',[\App\Http\Controllers\BillboardController::class, 'store'])->name('admin-billboard-store')->middleware('adminauth');
Route::get('/admin/billboards/{billboard}',[\App\Http\Controllers\BillboardController::class, 'show'])->name('admin-billboard-show')->middleware('adminauth');
Route::get('/admin/billboards/{billboard}/edit',[\App\Http\Controllers\BillboardController::class, 'edit'])->name('admin-billboard-edit')->middleware('adminauth');
Route::put('/admin/billboards/{billboard}',[\App\Http\Controllers\BillboardController::class, 'update'])->name('admin-billboard-update')->middleware('adminauth');
/*Route::delete('/admin/billboards/{billboard}',[\App\Http\Controllers\BillboardController::class, 'delete'])->name('admin-billboard-delete')->middleware('adminauth');*/
Route::get('/admin/billboards/{billboard}/delete', [\App\Http\Controllers\BillboardController::class, 'destroy'])->name('admin-billboard-delete')->middleware('adminauth');

/*Route::get('/admin/settings', [\App\Http\Controllers\SettingsController::class, 'destroy'])->name('admin-billboard-delete')->middleware('adminauth');*/


Route::get('/admin/settings/{setting}/edit', [\App\Http\Controllers\SettingsController::class, 'edit'])->name('admin-settings-edit')->middleware('adminauth');
Route::put('/admin/settings/{setting}',[\App\Http\Controllers\SettingsController::class, 'update'])->name('admin-settings-update')->middleware('adminauth');


############################ ADMIN PANEL ############################




