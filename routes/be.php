<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::prefix('/categories')->middleware(\App\Http\Middleware\Authenticate::class)->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    }
);
