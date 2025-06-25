<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\GeneralController;
use App\Http\Controllers\api\vehicleOwner\BookingController;
use App\Http\Controllers\api\vehicleOwner\ParkingController;
use App\Http\Controllers\api\vehicleOwner\ProfileController;
use App\Http\Controllers\api\vehicleOwner\VehicleController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    require __DIR__ . '/securityguard.php';

    Route::prefix('auth')->as('auth.')->controller(AuthCOntroller::class)->group(function () {
        Route::post('guard-login', 'guardLogin')->name('guard-login');
        Route::post('vehicle-owner-login', 'vehicleOwnerLogin')->name('vehicle-owner-login');
        Route::post('verify-otp', 'verifyOtp')->name('verify-otp')->name('verify-otp');
        Route::post('/vehicle-owner-register', 'registerVehicleOwner')->name('vehicle-ownser-register');
        Route::post('logout', 'logout')->middleware('auth:sanctum')->name('logout');
    });

    Route::middleware(['auth:sanctum', 'role:vehicle_owner'])->prefix('vehicle-owner')->as('vehicle-owner.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'getProfile']);
        Route::post('/profile/update', [ProfileController::class, 'updateProfile']);
        Route::resource('vehicle', VehicleController::class)->except(['index', 'create']);
        Route::prefix('parking')->as('parking.')->controller(ParkingController::class)->group(function () {
            Route::get('list', 'list')->name('list');
            Route::post('slots', 'slots')->name('slots');
            Route::post('park-in', [ParkingController::class, 'park_in'])->name('park-in');
            Route::post('park-out', [ParkingController::class, 'park_out'])->name('park-out');
            Route::post('pay', [BookingController::class, 'pay'])->name('pay');
        });
        Route::resource('parking-booking', BookingController::class);
    });

    // general data fetch
    Route::middleware('auth:sanctum')->prefix('general')->as('general.')->controller(GeneralController::class)->group(function () {
        Route::get('brand/{search?}', 'getBrand');
        Route::get('brand-model/{search?}', 'getBrandModel');
    });
});
