<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\controller as Basecontroller;


abstract class Controller extends Basecontroller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;  
}
