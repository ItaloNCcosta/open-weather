<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Service\WeatherService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeatherController extends Controller
{
  public function index(Request $request, WeatherService $service): View
  {
    $data = [];

    if ($search = $request->input('search')) {
      $data = $service->showCurrentWeather($search);
    }

    return view('welcome', ['data' => $data]);
  }
}
