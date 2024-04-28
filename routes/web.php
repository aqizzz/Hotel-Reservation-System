<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/room-details', 'App\Http\Controllers\ReservationController@showRoomDetails')->name('room.details');
Route::get('/reservation', 'App\Http\Controllers\ReservationController@index')->name('reservation');

Route::get('/', 'App\Http\Controllers\CustomerController@index')->name('home');



Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register.submit');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/check-auth', function () {
    dd(Auth::check());
});