<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
                'roomNumber' => $details[0],
                'capacity' => $details[1],
                'rate' => $details[2],
            ];
        }

       
        return view('roomDetails', ['roomDetails' => $roomDetails]);
    }
}