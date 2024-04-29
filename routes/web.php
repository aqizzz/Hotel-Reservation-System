<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CheckStepCompleted;
use App\Http\Middleware\Authenticate;

Route::get('/roomDetails', 'App\Http\Controllers\RoomController@showRoomDetails')->name('room.details');

Route::get('/', 'App\Http\Controllers\AuthController@index')->name('home');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register.submit');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/reservation', 'App\Http\Controllers\ReservationController@getRooms')->name('reservation');
Route::get('/payment', 'App\Http\Controllers\ReservationController@payment')->name('payment')->middleware(CheckStepCompleted::class);
Route::post('/checkout', 'App\Http\Controllers\ReservationController@checkout')->name('checkout')->middleware(CheckStepCompleted::class);
Route::post('/update-step-completed', 'App\Http\Controllers\ReservationController@updateStepCompleted')->name('update.step.completed');

Route::get('/userProfile','App\Http\Controllers\UserController@index')->name('userProfile')->middleware(Authenticate::class);

Route::get('/check-auth', function () {
    dd(Auth::check());
});

