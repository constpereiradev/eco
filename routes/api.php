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

Route::controller(UserController::class)->group(function () {

    Route::get('users', 'index');
    Route::post('user/create', 'store');
    Route::get('user/{id}', 'show');
    Route::put('user/update/{id}', 'update');
    Route::delete('user/delete/{id}', 'destroy');
});

Route::controller(PhoneController::class)->group(function () {

    Route::get('phones', 'index');
    Route::get('userphone', 'show');
});

Route::controller(PostController::class)->group(function () {

    Route::get('posts', 'index');
    Route::post('user/post/create/{id}', 'store')->name('post.store');
    Route::put('user/{user_id}/post/update/{post_id}', 'update');
    Route::get('user/{user_id}/post/{post_id}', 'show');
    Route::delete('user/{user_id}/post/{post_id}/delete', 'destroy');

}); 