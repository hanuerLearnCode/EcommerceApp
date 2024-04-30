<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



Route::prefix('/categories')->middleware(\App\Http\Middleware\Authenticate::class)->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::post('/doAdd', [CategoryController::class, 'doAdd'])->name('categories.doAdd');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/doEdit/{id}', [CategoryController::class, 'doEdit'])->name('categories.doEdit');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
}
);
