<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            $bookings = Booking::where('user_id', $userId)->get();
            
            return view('userProfile', ['user' => $user, 'bookings' => $bookings]);
        } else {
            return redirect(route('home'));
        }
    }

    public function update(Request $request)
    {
        $userId = Auth::id(); 
    
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $userId,
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
        ], [
            'name.unique' => 'This username has already been taken. Please choose another username.',
            'email.unique' => 'This email has already been registered. Please use another email.',
        ]);
    
        $user = User::findOrFail($userId); // Find the user to update
    
        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect(route('userProfile'))->with('successMsg','User Updated Successfully');
    }

    public function getUser()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);
            
            // Get the date two days from today
            $twoDaysLater = Carbon::today()->addDays(2);
            
            // Query bookings where check_in_day is greater than two days from today
            $bookings = Booking::where('user_id', $userId)
                                ->where('check_in_day', '>', $twoDaysLater)
                                ->get();
            
            // Query bookings that do not meet the condition (check_in_day less than or equal to two days from today)
            $history = Booking::where('user_id', $userId)
                              ->where('check_in_day', '<=', $twoDaysLater)
                              ->get();
            
            // Return the view, passing user and booking data to the view
            return view('userProfile', ['user' => $user, 'bookings' => $bookings, 'history' => $history]);
        } else {
            return redirect(route('home'));
        }
    }

    public function updateGuest(Request $request, $id)
    {
        $booking = booking::find($id);

        $booking->guest_name = $request->input('guest_name');
        $booking->guest_phone = $request->input('guest_phone');

        $booking->save();

        return redirect(route('userProfile'))->with('successMsg','Guest Updated Successfully');
    }

    public function delete($id){
        booking::find($id)->delete();
        return redirect(route('userProfile'))->with('successMsg','Booking canceled Successfully');
    }
}
