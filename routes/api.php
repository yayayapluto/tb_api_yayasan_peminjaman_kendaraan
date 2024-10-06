<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
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

    Route::apiResource("notifications", NotificationController::class);
});
