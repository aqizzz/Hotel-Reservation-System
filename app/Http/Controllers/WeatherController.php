<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $apiKey = 'c9adcb73dd1bd4837e7a13886563e462';
        $cityName = "yakutsk";
        $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . 
                $cityName . 
                '&appid=' . 
                $apiKey;

        $response = Http::get($url);

        if ($response->failed()) {
            $errorMessage = 'Error API returned status code ' . $response->status();
            return view('weather', ['errorMessage' => $errorMessage]);
        }

        $weatherData = $response->json();
        $temp = $weatherData['main']['temp'] - 273.15;
        $description = $weatherData['weather'][0]['description'];

        return view('/layouts/weather', [
            'cityName' => $cityName,
            'temp' => $temp,
            'description' => $description
        ]);
        
    }
}
