<?php

namespace Admins\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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
    //    dd($moduleName);
        config([File::getRequire(loadConfigs($moduleName,'auth'))]);
        $this->loadRoutesFrom(loadRoutes($moduleName, 'web'));
        //$this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(loadViews($moduleName),$moduleName);
        $this->loadMigrationsFrom(loadMigrations($moduleName));
    }
}
