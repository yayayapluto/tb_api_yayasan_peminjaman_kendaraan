<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix("v1")->group(function () {
    Route::apiResource("users", UserController::class);
    Route::get("users/search/{query}", [UserController::class, 'search']);
});
