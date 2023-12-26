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

Route::middleware(['auth', 'webUser'])->group(function () {
    // dashboard
    Route::resource('/user', \App\Http\Controllers\UserController::class);

    // dashboard
    Route::resource('/dashboard', \App\Http\Controllers\DashboardController::class);

    // posts
    Route::resource('/posts', \App\Http\Controllers\PostController::class);

    // comments
    Route::resource('/comments', \App\Http\Controllers\CommentController::class);
});


Auth::routes();
