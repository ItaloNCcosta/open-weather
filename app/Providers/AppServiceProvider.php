<?php

namespace App\Providers;

use App\Adapter\Weather\OpenWeatherAdapter;
use App\Adapter\Weather\WeatherServiceInterface;
use App\Service\CreateWeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WeatherServiceInterface::class, function ($app) {
            return new OpenWeatherAdapter(
                $app->make(CreateWeatherService::class),
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
