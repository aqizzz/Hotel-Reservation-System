<?php
    namespace App\Http\Controllers;

    use Carbon\Carbon;
    use App\Http\Controllers\Controller;
    use App\Models\room;
    use App\Models\booking;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Auth;

    class ReservationController extends Controller
    {
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
                        SELECT rooms.type, rooms.capacity, rooms.rate, COUNT(*) - COUNT(tmp_booked_rooms.room_type) AS available_rooms
                        FROM rooms
                        LEFT JOIN tmp_booked_rooms ON rooms.type = tmp_booked_rooms.room_type
                        WHERE rooms.capacity >= :capacity
                        GROUP BY rooms.type, rooms.capacity, rooms.rate
                        ORDER BY rooms.rate
                    ";
                            
                    $rooms = DB::select($query, ['capacity' => $capacity]); 

                    // Calculate the difference in days between start_date and end_date
                    $days = Carbon::parse($start_date)->diffInDays(Carbon::parse($end_date));

                    // Add the number of days to each room
                    foreach ($rooms as $room) {
                        $room->days = $days;
                    }

                    Session::put('checkindate', $start_date);
                    Session::put('checkoutdate', $end_date);
                    Session::put('days', $days);
                    Session::forget('autoSavedSql_hotel_reservation.rooms');
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
            return view('reservation', ['rooms' => $rooms, 'weather' => $request->weather]);
        }

        public function updateStepCompleted(Request $request) {
            $roomType = $request->room_type;
            $price = $request->price;

            Session::put('room_type', $roomType);
            Session::put('price', $price);
            Session::put('step_completed', true);

            return Redirect::route('payment'); 
        }

        public function payment() {
            return view('payment');
        }

        public function checkout(Request $request) {
            try {
                $roomType = Session::get('room_type');
                $guestName = $request->input('guestName');
                $guestPhone = $request->input('guestPhone');
                $CheckinDate = Session::get('checkindate');
                $checkoutDate = Session::get('checkoutdate');
                $createdAt = Carbon::now();
                if (Auth::check()) {
                    $user = Auth::user();
                    $userId = $user->id;
                }else{
                    $userId = null;
                }

                $booking = new booking();
                $booking->user_id = $userId;
                $booking->room_type = $roomType;
                $booking->guest_name = $guestName;
                $booking->guest_phone = $guestPhone;
                $booking->check_in_date = $CheckinDate;
                $booking->check_out_date = $checkoutDate;
                $booking->created_at = $createdAt;
                $booking->updated_at = $createdAt;
            
                $booking->save();

                Session::flash('message', 'Payment successful!');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('home');
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
    }

