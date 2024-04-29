<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\room;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;

    class ReservationController extends Controller
    {
        public function index()
        {
            return view("reservation");
        }

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

        public function getRooms(Request $request) {
            $rooms = room::all()->unique('type');

            try {
                if ($request->has(['start_date', 'end_date', 'capacity'])) {
                    $start_date = $request->input('start_date');
                    $end_date = $request->input('end_date');
                    $capacity = $request->input('capacity');
 
                    $tmpTableQuery = "
                        CREATE TEMPORARY TABLE tmp_booked_rooms AS
                        SELECT room_type
                        FROM bookings
                        WHERE check_in_date < :tmp_end_date AND check_out_date > :tmp_start_date
                    ";
                    DB::statement($tmpTableQuery, ['tmp_start_date' => $start_date, 'tmp_end_date' => $end_date]);

                    $query = "
                        SELECT rooms.type, rooms.capacity, COUNT(*) - COUNT(tmp_booked_rooms.room_type) AS available_rooms
                        FROM rooms
                        LEFT JOIN tmp_booked_rooms ON rooms.type = tmp_booked_rooms.room_type
                        WHERE rooms.capacity >= :capacity
                        GROUP BY rooms.type, rooms.capacity
                        ORDER BY rooms.rate
                    ";
                            
                    $rooms = DB::select($query, ['capacity' => $capacity]);   
                    Session::put('checkindate', $start_date);
                    Session::put('checkoutdate', $end_date);
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
            return view('reservation', ['rooms' => $rooms]);
        }

        public function updateStepCompleted(Request $request) {

            session(['step_completed' => true]);

            return Redirect::route('checkout'); 
        }

        public function checkout() {
            return view('payment');
        }
    }

?>