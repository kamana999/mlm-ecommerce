<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\AreaController;
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

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[Admin::class,'index'])->name('adminDashboard')->middleware('auth');;
    Route::resource('categories', CategoryController::class)->except(['show'])->middleware('auth');
    Route::resource('products', ProductController::class)->except(['show'])->middleware('auth');
    Route::resource('countries', CountryController::class)->middleware('auth');
    Route::resource('states', StateController::class)->middleware('auth');
    Route::resource('districts', DistrictController::class)->middleware('auth');
    Route::resource('areas', AreaController::class)->middleware('auth');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
