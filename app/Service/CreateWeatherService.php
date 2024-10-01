<?php

namespace App\Service;

use App\Models\Weather;
use Illuminate\Support\Facades\Validator;

class CreateWeatherService
{
  public function __construct(private Weather $weather)
  {
    $this->weather = $weather;
  }

  public function create(array $data = []): Weather
  {
    Validator::make($data, [
      'city' => 'required|string|max:255',
      'temp' => 'required|string|max:255',
      'temp_max' => 'nullabl|string|max:255',
      'temp_min' => 'nullabl|string|max:255',
      'weather_main' => 'nullabl|string|max:255',
      'description' => 'nullabl|string|max:255',
      'humidity' => 'nullabl|string|max:255',
      'icon' => 'nullabl|string|max:255',
      'api' => 'nullabl|string|max:255'
    ]);

    return $this->weather->create($data);
  }
}
