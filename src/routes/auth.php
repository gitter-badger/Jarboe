<?php

use Illuminate\Support\Facades\Route;
use Yaro\Jarboe\Facades\Jarboe;
use Yaro\Jarboe\Http\Controllers\AuthController;
use Yaro\Jarboe\Http\Controllers\DashboardController;

Route::group(Jarboe::routeGroupOptions(true), function () {
    Route::get('/', [AuthController::class, 'root']);
    Route::get('login', [AuthController::class, 'showLogin']);
    Route::post('login', [AuthController::class, 'login']);

    if (config('jarboe.admin_panel.registration_enabled')) {
        Route::get('register', [AuthController::class, 'showRegister']);
        Route::post('register', [AuthController::class, 'register']);
    }
});

Route::group(Jarboe::routeGroupOptions(), function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get(config('jarboe.admin_panel.dashboard'), [DashboardController::class, 'dashboard']);
});
