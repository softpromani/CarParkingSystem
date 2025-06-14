<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;

Route::prefix('v1')->group(function () {

    Route::post('/guard/login', [AuthController::class, 'guardLogin']);
    Route::post('vehicle-owner/login', [AuthController::class, 'vehicleOwnerLogin']);
     Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('/vehicle-owner/register', [AuthController::class, 'registerVehicleOwner']);


    Route::middleware('auth:sanctum')->group(function () {

        Route::post('guard/logout', [AuthController::class, 'logout']);

        Route::get('/profile', [AuthController::class, 'viewProfile']);
    Route::post('/profile/update', [AuthController::class, 'updateProfile']);

    });
});
