<?php

use App\Http\Controllers\api\guard\DashboardController;
use App\Http\Controllers\api\guard\ParkingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'role:guard'])->prefix('security-guard')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('profile', [DashboardController::class, 'profile']);
    Route::get('parking-bookings', [ParkingController::class, 'parking_bookings']);
});
