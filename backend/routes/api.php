<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Presentation\Controllers\AuthController;
use App\Presentation\Controllers\PostController;

// guest
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// auth protected
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Posts Create
    Route::post('/posts', [PostController::class, 'store']);
});