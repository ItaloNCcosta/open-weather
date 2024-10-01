<?php

namespace App\Http\Controllers;

use App\Service\WeatherService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeatherController extends Controller
{
  public function index()
  {
    return view('welcome');
  }

  public function searchWeather(Request $request, WeatherService $service): View
  {
    $data = $service->showCurrentWeather($request->get('search'));

    return view('welcome', ['data' => $data]);
  }
}
