<?php

use Illuminate\Support\Facades\Route;


Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'showProductDetails'])->name('product.details');

Route::prefix('/checkout')->middleware('auth')->group(function () {
    Route::get('/buy', function () {
        return "checking out ...";
    })->name('buy');

    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'showCart'])->name('showCart');
    Route::post('/add-to-cart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/delete-from-cart/{id}', [\App\Http\Controllers\CartController::class, 'deleteFromCart'])->name('cart.delete');
    Route::get('/increase/{id}', [\App\Http\Controllers\CartController::class, 'increase'])->name('cart.increase');
    Route::get('/decrease/{id}', [\App\Http\Controllers\CartController::class, 'decrease'])->name('cart.decrease');
});
