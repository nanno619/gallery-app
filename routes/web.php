<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::redirect('/home', '/photos');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('/admin/users', 'admin.users.index');
    Route::view('/admin/users/edit', 'admin.users.edit');
    // Route::view('/photos', 'photos.index');
    // Route::view('/photos/edit', 'photos.edit');

    Route::resource('/photos', PhotoController::class);
    Route::resource('/admin/users', UserController::class);
});
