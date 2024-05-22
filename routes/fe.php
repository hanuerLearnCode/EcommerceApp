<?php

use Illuminate\Support\Facades\Route;

Route::get('/all-products', [\App\Http\Controllers\ProductController::class, 'showAllProducts'])->name('products.all');
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'showProductDetails'])->name('product.details');

Route::prefix('/checkout')->middleware('auth')->group(function () {

    Route::get('/order', [\App\Http\Controllers\OrderController::class, 'list'])->name('order.list');

    Route::get('/make-order/{id}', [\App\Http\Controllers\OrderController::class, 'buy'])->name('buy');
    Route::post('/complete/{id}', [\App\Http\Controllers\OrderController::class, 'completeCheckout'])->name('order.checkout');

    Route::get('/make-order', [\App\Http\Controllers\OrderController::class, 'makeOrder'])->name('makeOrder');

    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'showCart'])->name('showCart');
    Route::post('/add-to-cart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/delete-from-cart/{id}', [\App\Http\Controllers\CartController::class, 'deleteFromCart'])->name('cart.delete');
    Route::get('/increase/{id}', [\App\Http\Controllers\CartController::class, 'increase'])->name('cart.increase');
    Route::get('/decrease/{id}', [\App\Http\Controllers\CartController::class, 'decrease'])->name('cart.decrease');
});

// sending emails
Route::prefix('/mail')->middleware('auth')->group(function () {

//    Route::get('/send-mail', )

});
