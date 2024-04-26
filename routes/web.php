<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/test-db-connection', function () {
    try {
        $result = DB::select('SELECT 1');
        return response()->json(['success' => true, 'message' => 'Database connection successful']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to connect to database: ' . $e->getMessage()]);
    }
});

Route::get('/room-details', 'App\Http\Controllers\ReservationController@showRoomDetails')->name('room.details');
Route::get('/reservation', 'App\Http\Controllers\ReservationController@index')->name('reservation');

Route::get('/', function () {
    return view('welcome');
});
