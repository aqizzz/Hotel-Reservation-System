<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class ReservationController extends Controller
    {
        public function showRoomDetails()
        {
          

            // Open the text file for reading
            $file = fopen('../../../storage/rooms/roomDetails.txt', 'r');
           // C:\xampp\htdocs\temp\assignments\finalProject\Hotel reservation system\Hote_Reservation_System\storage\rooms\roomDetails.txt
           
            $roomDetails = [];
            // Read and parse each line of the file
            while (!feof($file)) {
                $line = fgets($file);
                $details = explode(',', $line); 
                // Extract room details
                $roomNumber = $details[0];
                $capacity = $details[1];
                $rate = $details[2];

                // Store room details in an array
                $roomDetails[] = [
                    'room_number' => $roomNumber,
                    'capacity' => $capacity,
                    'rate' => $rate,
                ];
            }

            // Close the file
            fclose($file);

            // Return parsed room details
            return view('room-details', ['roomDetails' => $roomDetails]);
        }

    }

    

?>