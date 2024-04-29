<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
 
      public function payment(Request $request) {
       
        $amount = $request->input('amount');


 
        $paymentSuccess = true;

        if ($paymentSuccess) {
         
            return view('payment.success', ['amount' => $amount]);
        } else {
            
             //return view('payment.failure');
        }
       
    }
}


