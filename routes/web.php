<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\BasisController::class, 'index'])->name('index');
// auth routes;
Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');
// return homecontroller;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');

// Products routes
Route::group(['prefix'=> 'products'], function(){
    Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
    Route::get('/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
    Route::get('/{id}/cart', [App\Http\Controllers\ProductsController::class, 'cart'])->name('products.cart');
});

Route::group(['prefix'=>'checkout'], function(){
    Route::get('/', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/add/{id}', [App\Http\Controllers\CheckoutController::class, 'add'])->name('checkout.add');
    Route::get('/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/cancel', [App\Http\Controllers\CheckoutController::class, 'cancel'])->name('checkout.cancel');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/extensions.php';