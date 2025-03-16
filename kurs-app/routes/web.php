<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    $apiKey = 'f22fcc1cb4f56bda58224c17';

    try {
        $response = Http::timeout(10)->get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD");

        if ($response->failed()) {
            throw new \Exception('Failed to fetch exchange rates');
        }

        $rates = $response->json();
    } catch (\Exception $e) {
        Log::error('Error fetching exchange rates: ' . $e->getMessage());
        $rates = ['conversion_rates' => ['Error' => 'Failed to fetch data']];
    }

    return view('index', compact('rates'));
});

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', function () {
//     $apiKey = 'f22fcc1cb4f56bda58224c17';
//     $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD");
//     $rates = $response->json();

//     return view('index', compact('rates'));
// });


