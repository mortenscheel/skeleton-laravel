<?php

declare(strict_types=1);

namespace Scheel\PackageName;

use Illuminate\Support\ServiceProvider;

final class PackageNameServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->mergeConfigFrom(__DIR__.'/../config/package-name.php', 'package-name');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/package-name.php' => config_path('package-name.php'),
            ], 'config');
            $this->publishesMigrations([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'migrations');
            // $this->publishes([
            //     __DIR__.'/../resources/views' => resource_path('views/scheel/package-name'),
            // ], 'views');
        }

        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'package-name');
    }
}
