<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\admin\faqController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\GuardController;
use App\Http\Controllers\admin\CoupanController;
use App\Http\Controllers\admin\GodEyeController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\admin\WalletController;
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\admin\ParkingController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\ThirdPartyController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\AdminSettingController;
use App\Http\Controllers\admin\BusinessPageController;
use App\Http\Controllers\admin\auth\RegisterController;
use App\Http\Controllers\admin\BusinessSettingController;
use App\Http\Controllers\admin\ParkingFacilityController;

Route::get('/', function () {
    return view('home');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('role', RoleController::class);

});

Route::prefix('admin')->middleware('auth')->as('admin.')->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('god-eye', GodEyeController::class);
    Route::resource('profile', ProfileController::class);
    // Route::resource('login', LoginController::class);
    Route::resource('register', RegisterController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('/role-has-permission', [PermissionController::class, 'rolePermission'])->name('rolePermission');
    Route::post('/fetch-permission', [PermissionController::class, 'fetchPermission'])->name('fetchPermission');
    Route::post('/assign-permission', [PermissionController::class, 'assignPermission'])->name('assignPermission');
    Route::resource('brand', BrandController::class);
    Route::resource('model', ModelController::class);
    Route::resource('guard', GuardController::class);
    Route::resource('business-setting', BusinessSettingController::class);
     Route::get('third-party-api/{slug?}',[ThirdPartyController::class, 'thirdPartyApi'])->name('thirdPartyApi');
    Route::post('third-party-api-post',[ThirdPartyController::class, 'thirdPartyApiPost'])->name('thirdPartyApiPost');
    Route::resource('admin-setting', AdminSettingController::class);
    Route::resource('parking-facility', ParkingFacilityController::class);
    Route::get('parking/slot/{parkingId}', [ParkingController::class, 'parkingSlot'])->name('parking.slot');
    Route::post('parking/slot/save', [ParkingController::class, 'parkingSlotSave'])->name('parking.slot-save');
    Route::resource('parking', ParkingController::class);
    Route::resource('business-page', BusinessPageController::class);
    Route::resource('social-media', SocialMediaController::class);
    Route::resource('coupan', CoupanController::class);
    Route::resource('faq', faqController::class);
    Route::resource('wallet', WalletController::class);
    Route::resource('enquiry', EnquiryController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('order-status', StatusController::class);
    Route::post('change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
});
