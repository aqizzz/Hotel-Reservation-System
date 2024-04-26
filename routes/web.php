<?php

use Illuminate\Support\Facades\Route;

Route::get('/room-details', 'App\Http\Controllers\ReservationController@showRoomDetails')->name('room.details');
Route::get('/reservation', 'App\Http\Controllers\ReservationController@index')->name('reservation');

Route::get('/', function () {
    return view('welcome');
});
