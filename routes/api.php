<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
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
        Route::put('/{uuid}', [UserController::class, 'update'])->middleware('permission:users.update');
        Route::delete('/{uuid}', [UserController::class, 'delete'])->middleware('permission:users.delete');
        Route::put('/{uuid}/restore', [UserController::class, 'restore'])->middleware('permission:users.restore');
    });

    Route::prefix('teachers')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->middleware('permission:teachers.view');
        Route::post('/', [TeacherController::class, 'store'])->middleware('permission:teachers.create');
        Route::put('/{uuid}', [TeacherController::class, 'update'])->middleware('permission:teachers.update');
        Route::delete('/{uuid}', [TeacherController::class, 'delete'])->middleware('permission:teachers.delete');
        Route::put('/{uuid}/restore', [TeacherController::class, 'restore'])->middleware('permission:teachers.restore');
    });
});
