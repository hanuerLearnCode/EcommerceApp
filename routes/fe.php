<?php

use Illuminate\Support\Facades\Route;


Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'showProductDetails'])->name('product.details');
