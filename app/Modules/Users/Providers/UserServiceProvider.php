<?php

namespace Users\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $moduleName = basename(dirname(__DIR__ ,levels:1));
        $this->loadRoutesFrom(loadRoutes($moduleName, 'web'));
        $this->loadViewsFrom(loadViews($moduleName),$moduleName);
        $this->loadMigrationsFrom(loadMigrations($moduleName));
    }
}
