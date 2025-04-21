<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\auth\RegisterController;
use App\Http\Controllers\admin\BusinessSettingController;
use App\Http\Controllers\admin\DriverController;
use App\Http\Controllers\admin\GuardController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelController;
use Illuminate\Contracts\Concurrency\Driver;
use Illuminate\Support\Facades\Route;
use PgSql\Lob;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
     Route::resource('role', RoleController::class);

});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('profile', ProfileController::class, );
    Route::resource('login', LoginController::class, );
    Route::resource('register',RegisterController::class, );
    Route::resource('user',UserController::class, );
    Route::resource('role',RoleController::class, );
    Route::resource('brand',BrandController::class, );
    Route::resource('model',ModelController::class, );
    Route::resource('driver',DriverController::class, );
    Route::resource('guard',GuardController::class, );
    Route::resource('business-setting',BusinessSettingController::class, );

});
