<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppConnectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Services\AppManagerInterface::class, function ($app) {
            return new \App\Services\AppManager($app);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
