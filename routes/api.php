<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:login');


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/life', [AuthController::class, 'lifetimeToken']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('permission:users.view');
        Route::post('/', [UserController::class, 'store'])->middleware('permission:users.create');
        //Route::get('/{user}', [UserController::class, 'show'])->middleware('permission:users.show');
        //Route::put('/{user}', [UserController::class, 'update'])->middleware('permission:users.update');
        //Route::delete('/{user}', [UserController::class, 'destroy'])->middleware('permission:users.destroy');
    });
});
