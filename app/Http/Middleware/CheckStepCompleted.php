<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStepCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('step_completed')) {
            return redirect()->route('reservation');
        }
        return $next($request);
    }
}
