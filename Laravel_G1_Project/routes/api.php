<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FarmerController,AuthenticationController};

use App\Http\Controllers\FarmController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\InstructionController;
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
Route::post('register/sign_up',[AuthenticationController::class, 'sign_up']);
Route::post('register/sign_in',[AuthenticationController::class, 'sign_in']);
Route::post('register/sign_out',[AuthenticationController::class, 'sign_out,']);

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

Route::prefix('plans')->group(function(){
    Route::resource('plan', PlanController::class);
});
Route::prefix('instructions')->group(function(){
    Route::resource('instruction', InstructionController::class);
});



