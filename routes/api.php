<?php

use App\Http\Controllers\Api\AuthController;
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
