<?php

namespace Users\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{


    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {

            $moduleName = basename(dirname(__DIR__ ,levels:1));
           // dd(getModuleName($moduleName) . 'routes/api.php');
            
            Route::middleware('api')
                ->prefix('api')
                ->group(getModuleName($moduleName) . 'routes/api.php');

            Route::middleware('web')
                ->group(getModuleName($moduleName) .'routes/web.php');
        });
    }
}
