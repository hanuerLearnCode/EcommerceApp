<?php

use Illuminate\Support\Facades\Route;


Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'showProductDetails'])->name('product.details');

Route::prefix('/checkout')->middleware('auth')->group(function () {
    Route::get('/buy', function () {
        return "checking out ...";
    })->name('buy');

    Route::post('/add-to-cart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
});
