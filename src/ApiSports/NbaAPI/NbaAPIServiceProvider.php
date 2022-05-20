<?php

namespace ApiSports\NbaAPI;

use Illuminate\Support\ServiceProvider;

class NbaAPIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $configPath = __DIR__ . '/../../config';

        $this->mergeConfigFrom("{$configPath}/config.php", 'nba-api');

        $this->publishes([
            "{$configPath}/config.php" => config_path('nba-api.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton('nba-api', function () {
            return new NbaAPI();
        });
    }
}