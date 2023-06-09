<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\ScapeRoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api','prefix' => 'v1/auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);  
});

Route::group(['prefix' => 'v1'], function ($router) {
    Route::get('/escape-rooms', [ScapeRoomController::class, 'list']);
    Route::get('/escape-rooms/{id}', [ScapeRoomController::class, 'findById']);
    Route::get('/escape-rooms/{id}/time-slots', [ScapeRoomController::class, 'AvailableSpecificRoom']);
    Route::group(['middleware' => 'auth:api'], function ($router) {
        Route::post('/bookings', [BookingController::class, 'store']);
        Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
        Route::get('/bookings', [BookingController::class, 'list']);
    });
});
