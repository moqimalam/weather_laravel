<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weather(Request $request){
    $weatherResponse = [];

    if ($request->isMethod('post')) {
        $city = $request->input('city'); 

        $response = Http::withHeaders([
            'x-rapidapi-host' => 'open-weather13.p.rapidapi.com',
            'x-rapidapi-key' => '1d28afaa4dmshd3d41a181306ba7p1bd29fjsn23a5ecf7987a',
        ])->get("https://open-weather13.p.rapidapi.com/city/{$city}/EN");

        if ($response->successful()) {
            $weatherResponse = $response->json();
        } else {
            // Handle the error response
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to fetch weather data.']);
        }
    }

    return view('index', ["data" => $weatherResponse]);
}

}
