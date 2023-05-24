<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;

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


    Route::get('users', [UserController::class, 'index']);
    Route::post('user/create', [UserController::class, 'store'])->name('user.create');
    Route::get('user/{id}', [UserController::class, 'show']);
    Route::put('user/update/{id}', [UserController::class, 'update']);
    Route::delete('user/delete/{id}', [UserController::class, 'destroy']);


    Route::get('phones', [PhoneController::class, 'index']);
    Route::get('userphone', [PhoneController::class, 'show']);


    Route::get('posts', [PostController::class, 'index']);
    Route::post('user/post/create/{id}', [PostController::class, 'store']);
    Route::put('user/{user_id}/post/update/{post_id}', [PostController::class, 'update']);
    Route::get('user/{user_id}/post/{post_id}', [PostController::class, 'show']);
    Route::delete('user/{user_id}/post/{post_id}/delete', [PostController::class, 'destroy']);