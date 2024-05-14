<?php

use Illuminate\Support\Facades\Route;

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

// welcome page
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home.index');
    })->name('dashboard');
});

Route::get('/redirect', [\App\Http\Controllers\HomeController::class, "redirect"])->name('home.redirect');

require_once __DIR__ . '/be.php';
require_once __DIR__ . '/fe.php';
