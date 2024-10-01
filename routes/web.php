<?php

use App\Http\Controllers\WeatherController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::middleware([SetLocale::class])->group(function () {
  Route::get('/', [WeatherController::class, 'index']);
  Route::get('/search', [WeatherController::class, 'searchWeather'])->name('searchWeather');
});
