<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CovidFlagController;
use App\Http\Controllers\QRCodeController;
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

Route::get('/qrcodes', [QRCodeController::class, 'index']);
Route::post('/qrcodes', [QRCodeController::class, 'store']);
Route::get('/qrcodes/{id}', [QRCodeController::class, 'show']);
Route::put('/qrcodes/{id}', [QRCodeController::class, 'update']);
Route::delete('/qrcodes/{id}', [QRCodeController::class, 'destroy']);

Route::get('/covidflags', [CovidFlagController::class, 'index']);
Route::post('/covidflags', [CovidFlagController::class, 'store']);
Route::get('/covidflags/{id}', [CovidFlagController::class, 'show']);
Route::put('/covidflags/{id}', [CovidFlagController::class, 'update']);
Route::delete('/covidflags/{id}', [CovidFlagController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
