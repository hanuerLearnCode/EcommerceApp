<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::prefix('/categories')->middleware(\App\Http\Middleware\Authenticate::class)->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::post('/doAdd', [CategoryController::class, 'doAdd'])->name('categories.doAdd');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/doEdit/{id}', [CategoryController::class, 'doEdit'])->name('categories.doEdit');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
});
Route::prefix('/products')->middleware(\App\Http\Middleware\Authenticate::class)->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/add', [ProductController::class, 'add'])->name('products.add');
    Route::post('/doAdd', [ProductController::class, 'doAdd'])->name('products.doAdd');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/doEdit/{id}', [ProductController::class, 'doEdit'])->name('products.doEdit');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
}
);

Route::prefix('/sales')->middleware(\App\Http\Middleware\Authenticate::class)->group(function () {
    Route::get('/', [\App\Http\Controllers\SaleController::class, 'index'])->name('sales.index');
    Route::get('/add', [\App\Http\Controllers\SaleController::class, 'add'])->name('sales.add');
    Route::post('/doAdd', [\App\Http\Controllers\SaleController::class, 'doAdd'])->name('sales.doAdd');
    Route::get('/edit/{id}', [\App\Http\Controllers\SaleController::class, 'edit'])->name('sales.edit');
    Route::post('/doEdit/{id}', [\App\Http\Controllers\SaleController::class, 'doEdit'])->name('sales.doEdit');
    Route::get('/delete/{id}', [\App\Http\Controllers\SaleController::class, 'delete'])->name('sales.delete');
}
);
