<?php

use App\Http\Controllers\Api\BookStoreController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use Illuminate\Support\Facades\Route;

Route::apiResource('bookstore', BookStoreController::class)->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class)->middleware('auth:sanctum');
});
