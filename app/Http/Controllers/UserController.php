<?php

namespace App\Http\Controllers;

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
            $bookings = Booking::where('user_id', $userId)->get();
            
            // Return view, send back user and booking data
            return view('userProfile', ['user' => $user, 'bookings' => $bookings]);
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
        return redirect(route('userProfile'))->with('successMsg','Booking delete Successfully');
    }
}
