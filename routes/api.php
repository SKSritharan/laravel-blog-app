<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Retrieve all posts (no authentication required)
Route::get('/posts', [App\Http\Controllers\Api\PostController::class, 'index']);

// Retrieve a single post (no authentication required)
Route::get('/posts/{post}', [App\Http\Controllers\Api\PostController::class, 'show']);

