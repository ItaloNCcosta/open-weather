<?php

namespace App\Adapter\Weather;

use App\Models\Weather;

interface WeatherServiceInterface
{
  public function getCurrentWeather(string $city): Weather;
}
