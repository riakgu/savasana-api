<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/login', 'login');
    Route::get('/auth/me', 'me')->middleware('auth:sanctum');
    Route::post('/auth/logout', 'logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(CustomerController::class)->group(function () {
        Route::post('/customers', 'store');
        Route::get('/customers/{customer}', 'show');
        Route::patch('/customers/{customer}', 'update');
        Route::get('/customers', 'index');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::post('/clients', 'store');
        Route::get('/clients/{client}', 'show');
        Route::patch('/clients/{client}', 'update');
        Route::get('/clients', 'index');
    });

    Route::controller(ServiceController::class)->group(function () {
        Route::post('/services', 'store');
        Route::get('/services/{service}', 'show');
        Route::patch('/services/{service}', 'update');
        Route::get('/services', 'index');
    });
});
