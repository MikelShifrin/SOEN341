<?php

namespace App\Providers;

use App\IdentityMap\IdentityMap;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\IdentityMap\IdentityMap',function ($app) {
             return new App\IdentityMap\IdentityMap($app->make('HttpClient'));
        });
    }
}
