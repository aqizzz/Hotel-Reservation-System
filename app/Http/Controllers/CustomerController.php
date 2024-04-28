<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $isLoggedIn = Auth::check();  
        return view('welcome', compact('isLoggedIn'));
    }
}
