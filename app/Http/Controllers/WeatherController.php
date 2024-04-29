<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        // 检查是否提供了城市名称
        $cityName = $request->input('cityName');

        // 检查是否提供了 API 密钥
        $apiKey = config('services.openweathermap.key');

        if (!$cityName || !$apiKey) {
            return response()->json(['error' => 'City name and API key are required'], 400);
        }

        // 构建 API 请求 URL
        $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $cityName . '&appid=' . $apiKey;

        // 发起 API 请求
        $response = Http::get($url);

        // 检查是否成功获取天气信息
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch weather data'], $response->status());
        }

        // 返回天气信息
        return $response->json();
    }
}
