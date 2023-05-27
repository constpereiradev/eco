<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/register', function(){
    return view('register');
});


Route::controller(AccountController::class)->group(function () {

    Route::get('/register', 'register')->name('register');
    Route::post('/auth', 'authenticate')->name('auth');
    Route::get('/login', 'login')->name('login');
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/home', 'home')->name('home');
    Route::post('/createUser', 'createUser')->name('create.user');

}); 

Route::controller(PostController::class)->group(function () {

    Route::post('user/post/create/{id}', 'create')->name('post.create');
    Route::delete('user/{user_id}/post/{post_id}/delete', 'delete')->name('post.delete');

}); 

