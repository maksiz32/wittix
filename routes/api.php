<?php

use App\Http\Controllers\Auth\ProjectAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [ProjectAuthController::class, 'login']);
Route::post('/register', [ProjectAuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('users', [UserController::class, 'index']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
});
