<?php

use App\Http\Controllers\guard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'role:guard'])->prefix('security-guard')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});
