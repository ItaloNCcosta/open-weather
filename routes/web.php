<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', [WeatherController::class, 'index']);
Route::get('/search-cities', [CityController::class, 'searchCities'])->name('search.cities');
Route::get('/insert-cities', [CityController::class, 'insertCities'])->name('insert.cities');
