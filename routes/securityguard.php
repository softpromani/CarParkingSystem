<?php

use App\Http\Controllers\api\guard\DashboardController;
use App\Http\Controllers\api\guard\ParkingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'role:guard'])->prefix('security-guard')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('profile', [DashboardController::class, 'profile']);
    Route::get('parking-bookings', [ParkingController::class, 'parking_bookings']);
    Route::post('pay-invoice',[ParkingController::class, 'pay_invoice']);
    Route::post('book-parking',[ParkingController::class, 'book_parking']);
});
