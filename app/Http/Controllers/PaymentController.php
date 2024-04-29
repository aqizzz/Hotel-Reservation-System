<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
 
    public function payment(Request $request) {
        try {
            if ($request->has("")) {
                $amount = $request->input('amount');


        
                $paymentSuccess = true;

                if ($paymentSuccess) {
                
                    return Redirect::route('home');
                } else {
                    
                    //return view('payment.failure');
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        } 
    }

}


