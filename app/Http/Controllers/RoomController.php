<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{public function showRoomDetails()
    {
       
        $contents = Storage::get('roomDetails.txt');

       
        $lines = explode("\n", $contents);

       
        $roomDetails = [];
        foreach ($lines as $line) {
            $details = explode(',', $line); 
            $roomDetails[] = [
                'roomtype' => $details[0],
                'capacity' => $details[1],
                'rate' => $details[2],
            ];
        }

       
        return view('roomDetails', ['roomDetails' => $roomDetails]);
    }
}