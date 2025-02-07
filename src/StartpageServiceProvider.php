<?php

namespace LearnKit\Startpage;

use Illuminate\Support\ServiceProvider;

class StartpageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'startpage');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->mergeConfigFrom(__DIR__ . '/../config/startpage.php', 'startpage');

        $this->app->singleton(StartpageManager::class, fn (): StartpageManager => new StartpageManager());

        $this->publishes([
            __DIR__ . '/../config/startpage.php' => config_path('startpage.php'),
        ], 'startpage-config');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../dist/app.css' => public_path('vendor/filament-startpage/app.css'),
        ], 'startpage-assets');
    }
}