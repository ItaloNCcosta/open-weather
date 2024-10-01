<?php

declare(strict_types=1);

namespace App\Adapter\Weather;

use App\Models\Weather;
use App\Service\CreateWeatherService;
use GuzzleHttp\Client;

class OpenWeatherAdapter implements WeatherServiceInterface
{
  protected string $apiUrl;

  public function __construct(
    protected CreateWeatherService $createWeatherService,
    protected string $apiKey = '',
  ) {
    $this->createWeatherService = $createWeatherService;
    $this->apiKey = env('OPEN_WEATHER_API_KEY');
    $this->apiUrl = 'https://api.openweathermap.org/data/2.5/';
  }

  // https://api.openweathermap.org/data/2.5/weather?q={city name},{country code}&appid={API key}
  public function getCurrentWeather(string $search): Weather
  {
    $client = new Client();
    $endpoint = "{$this->apiUrl}weather?q={$search},{pt_br}&units=metric&appid={$this->apiKey}";

    $response = $client->get($endpoint);
    $data = json_decode($response->getBody()->getContents(), true);

    return $this->createWeatherService->create([
      'city' => $data['name'],
      'temp' => $data['main']['temp'],
      'temp_min' => $data['main']['temp_min'],
      'temp_max' => $data['main']['temp_max'],
      'weather_main' => $data['weather'][0]['main'],
      'description' => $data['weather'][0]['description'],
      'humidity' => $data['main']['humidity'],
      'icon' => $data['weather'][0]['icon'],
      'api' => 'Open Weather'
    ]);
  }
}
