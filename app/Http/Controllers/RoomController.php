<?php

namespace App\Http\Controllers;


class RoomController extends Controller
{
    public function showRoomDetails()
    { 
        $contents = file_get_contents(resource_path('texts/roomDetails.txt'));
 
        $lines = explode("\n", $contents);
 
        $roomDetails = [];
        foreach ($lines as $line) {
            $details = explode(',', $line);
            // Check if $details array has at least four elements
            if (count($details) >= 4) {
                $roomDetails[] = [
                    'roomtype' => $details[0],
                    'capacity' => $details[1],
                    'rate' => $details[2],
                    'description' => $details[3],
                ];
            }
        }
 
        return view('roomDetails', ['roomDetails' => $roomDetails]);
    }
}
