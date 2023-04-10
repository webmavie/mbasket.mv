<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/{slug}', 'product')->name('product');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/add/{id}', 'addToCart')->name('cart.add');
    Route::post('/cart/remove/{id}', 'removeFromCart')->name('cart.remove');
    Route::post('/cart/update/{id}', 'updateCart')->name('cart.update');
});
