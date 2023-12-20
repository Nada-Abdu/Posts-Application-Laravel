<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");;

Route::middleware(['auth'])->group(function () {
    // web user
    Route::middleware(['webUser'])->prefix('user')->group(function () {
        // posts
        Route::resource('/posts', \App\Http\Controllers\UserPostController::class);
    });

    // admin
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});


Auth::routes();
