<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('api.logout');

    Route::resource('status', \App\Http\Controllers\Api\StatusController::class);
    Route::resource('notification', \App\Http\Controllers\Api\NotificationController::class);
    Route::resource('transaction', \App\Http\Controllers\Api\TransactionController::class);
    Route::resource('user', \App\Http\Controllers\Api\UserController::class);
});
