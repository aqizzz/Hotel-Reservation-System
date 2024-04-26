<?php

use Illuminate\Support\Facades\Route;

Route::get('/room-details', 'ReservationController@showRoomDetails')->name('room.details');


// Route::get('/roomDetails', function () {
//     return view('welcome');
// });
