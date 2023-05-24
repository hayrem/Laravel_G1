<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DroneController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('farmers')->group(function(){
    Route::resource('farmers', FarmerController::class);
});

Route::prefix('farms')->group(function(){
    Route::resource('farms', FarmController::class);
});

Route::prefix('provinces')->group(function(){
    Route::resource('province', ProvinceController::class);
});

Route::prefix('locations')->group(function(){
    Route::resource('location', LocationController::class);
});

Route::prefix('drones')->group(function(){
    Route::resource('drone', DroneController::class);
});
