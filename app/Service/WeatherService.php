<?php

declare(strict_types=1);

namespace App\Service;

use App\Adapter\Weather\WeatherServiceInterface;
use App\Models\Weather;

class WeatherService
{
  public function __construct(
    protected WeatherServiceInterface $WeatherServiceInterface
  ) {
    $this->WeatherServiceInterface = $WeatherServiceInterface;
  }

  public function showCurrentWeather(string $search): Weather
  {
    // $weather = $this->get($search);

    // if ($weather) {
    //   return $weather;
    // }

    return $this->WeatherServiceInterface->getCurrentWeather($search);
  }

  private function get(string $search): Weather|null
  {
    return Weather::where('city', $search)
      ->where('created_at', '>=', now()->subMinutes(10))
      ->first();
  }
}
