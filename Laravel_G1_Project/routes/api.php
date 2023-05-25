<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FarmerController,AuthenticationController};

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