<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Weather
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Middleware processing: ' . $request->query('date'));
        $apiKey = 'XF8HT9UEJRU3PCW8YKX4RZNLN';
        $cityName = "Montreal";
        $startDate = $request->query('date');

        if ($startDate === null) {
            $startDate = Carbon::today()->toDateString(); 
        }

        $endDate = Carbon::parse($startDate)->addDays(6)->toDateString();
        $url = 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/'. $cityName . '/' . $startDate . '/' . $endDate . '?unitGroup=metric&elements=datetime%2Ctempmax%2Ctempmin%2Ctemp%2Cicon&include=days%2Cfcst%2Cobs%2Cremote&key=' . $apiKey . '&contentType=json';

        $response = Http::get($url);

        if ($response->failed()) {
            Log::error('Fail to fetch weather information'. $response->status());
            Session::flash('error', 'Failed to fetch weather information');
        }

        $weatherData = json_decode($response, true);
        $days = $weatherData['days'];

        $request->merge(['weather' => $days]);

        return $next($request);
    }
}
