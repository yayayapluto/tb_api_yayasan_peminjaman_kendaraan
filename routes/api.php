<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Views\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix("v1")->group(function () {
    Route::apiResource("users", UserController::class);
    Route::get("users/search/{query}", [UserController::class, 'search']);

    Route::apiResource("vehicles", VehicleController::class);
    Route::get("vehicles/search/{query}", [VehicleController::class, 'search']);

    Route::apiResource("bookings", BookingController::class);

    Route::prefix("dashboard")->group(function () {
        Route::get("bookings/status", [DashboardController::class, 'status']);
        Route::get("bookings/total-by-period/{period}", [DashboardController::class, 'totalByPeriod']);
        Route::get("bookings/farthest", [DashboardController::class, 'farthest']);
        Route::get("bookings/drivers/most-used", [DashboardController::class, 'mostUsedDriver']);
        Route::get("bookings/vehicles/most-used", [DashboardController::class, 'mostUsedVehicle']);
        Route::get("bookings/users/most-often", [DashboardController::class, 'mostOftenUser']);
    });

    Route::apiResource("notifications", NotificationController::class);
});
