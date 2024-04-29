<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('userProfile');
    }

    public function update() {
        return redirect(route('userProfile'))->wiht('successMsg','User Updated Successfully');
    }
}
