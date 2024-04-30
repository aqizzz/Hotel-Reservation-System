<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index() {
        $isLoggedIn = Auth::check();  
        return view('welcome', compact('isLoggedIn'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()->route('home')->with('error', 'Invalid credentials. Please try again.');
        }

        $user = Auth::user();

        return redirect()->route('home', ['user' => $user]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.unique' => 'This username has already been taken. Please choose another username.',
            'email.unique' => 'This email has already been registered. Please use another email.',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        if (session('price')) {
          return Redirect::route('payment');
        }

        return Redirect::route('home');
    }

    public function logout() {
      Auth::logout();
      return Redirect::route('home');
    }
}