<?php

use App\Http\Controllers\api\AuthController;
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
        Route::resource('vehicle', VehicleController::class);
        Route::prefix('parking')->as('parking.')->controller(ParkingController::class)->group(function () {
            Route::get('list', 'list')->name('list');
            Route::get('slots/{parkingId}', 'slots')->name('slots');
        });
    });
});
