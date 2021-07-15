<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BannerController;
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
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[Home::class, "index"])->name('home');
Route::get('/new_login',[Home::class, "new_login"])->name('new_login');
Route::get('/partner_login',[Home::class, "partner_login"])->name('partner_login');
Route::post('/partner_register',[Home::class, "partner_register"])->name('partner_register');
Route::get('/partner_details_page/{id}',[Home::class, "partner_details_page"])->name('partner_details_page');
Route::post('/partner_details',[Home::class, "partner_details"])->name('partner_details');
Route::get('product_detail/{id}',[Home::class,"product_detail"])->name('product_detail');
Route::get('area/{id}', [Home::class, 'search_area'])->name('area');
Route::get('/search', [Home::class, 'search']);
Route::post('/add-to-cart/{id}',[Home::class,"add_to_cart"])->name("add_to_cart");
Route::get('/cart',[Home::class,"carts"])->name("carts");
Route::get('/add-to-cart_details/{id}',[Home::class,"add_to_cart_details"])->name("add_to_cart_details");
Route::get('/removeFromCart/{id}',[Home::class,'remove_cart'])->name('removecart');
Route::get('/remove/{id}', [Home::class, 'removeitem'])->name('removeitem');
Route::get('/coupon',[Home::class, "remove_coupon"])->name('coupon.destroy');
Route::post('/cart/apply-coupon', [Home::class,'apply_coupon'])->name('cart.coupon');
Route::get('/checkout', [Home::class, 'checkout'])->name('checkout');
Route::post('/insert_address', [Home::class, 'insert_address'])->name('insert_address');
Route::post('/order',[Home::class,'order'])->name('orderDetail');
Route::get('/place_order/{id}',[Home::class,'place_order'])->name('place_order');
Route::get('/confirm-order',[Home::class,'confirm'])->name('confirm');
Route::get('check-partner/',[Home::class,'check_partner'])->name('check_partner');

Route::get('add-to-cart-session/{id}',[Home::class,'getAddToCart'])->name('addToCartSession');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[Admin::class,'index'])->name('adminDashboard')->middleware('auth');;
    Route::resource('categories', CategoryController::class)->middleware('auth');
    Route::resource('banners', BannerController::class)->middleware('auth');
    Route::resource('products', ProductController::class)->middleware('auth');
    Route::resource('countries', CountryController::class)->middleware('auth');
    Route::resource('states', StateController::class)->middleware('auth');
    Route::resource('districts', DistrictController::class)->middleware('auth');
    Route::resource('areas', AreaController::class)->middleware('auth');
    Route::get('/network',[Admin::class,'network'])->name('network')->middleware('auth');
    // orders
    Route::get('/order-details',[Admin::class,'orders'])->name('order');
    Route::get('/area-order-details',[Admin::class,'area_orders'])->name('area_orders');
    Route::get('/product-order',[Admin::class,'product_order'])->name('product_order');

    Route::get('/cancle-order',[Admin::class,'cancle'])->name('cancle');
    Route::get('/order-confirm',[Admin::class,'order_confirm'])->name('order_confirm');
    Route::get('/out_for_delivery',[Admin::class,'out_for_delivery'])->name('out_for_delivery');
    Route::get('/order_completed',[Admin::class,'order_completed'])->name('order_completed');
    Route::get('/assign-delivery/{id}',[Admin::class,'assign_delivery_boy'])->name('assign_delivery');
    Route::post('/submit-delivery-boy/{id}',[Admin::class,'submit_delivery_boy'])->name('submit_delivery_boy');
    Route::get('/cancle_order/{id}',[Admin::class,'cancle_order'])->name('cancle_order');
    Route::get('/show_orders/{id}',[Admin::class,'show_orders'])->name('show_orders');
});

Route::prefix('partner')->group(function(){
    Route::get('/partner',[PartnerController::class,'index'])->name('partnerDashboard')->middleware('auth');
    Route::get('/ecommerce',[PartnerController::class,'ecommerce'])->name('ecommerce')->middleware('auth');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
