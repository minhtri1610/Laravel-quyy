<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RegistationController;
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

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthorController::class, 'register']);
    Route::post('login', [AuthorController::class, 'login']);
    Route::post('register/user', [RegistationController::class, 'registerUser']);

    Route::middleware('auth:api')->group(function () {
        Route::get('user', [UserController::class, 'index']);
        Route::post('logout', [UserController::class, 'logout']);

        // Admin routes
        Route::prefix('admin')->middleware('check.admin')->group(function () {
            Route::get('dashboard', [AdminController::class, 'dashboard']);
        });

        // User routes
        Route::prefix('user')->middleware('check.user')->group(function () {
            Route::get('profile', [UserController::class, 'profile']);
        });
    });
});



