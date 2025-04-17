<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\auth\RegisterController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use PgSql\Lob;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('profile', ProfileController::class, );
    Route::resource('login', LoginController::class, );
    Route::resource('register',RegisterController::class, );
    Route::resource('user',UserController::class, );

});
