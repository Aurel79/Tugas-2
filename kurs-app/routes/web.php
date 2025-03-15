<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    $apiKey = 'f22fcc1cb4f56bda58224c17';
    $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD");
    $rates = $response->json();

    return view('index', compact('rates'));
});


