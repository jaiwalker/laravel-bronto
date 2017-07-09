<?php

namespace Jaiwalker\BrontoApi;

use Illuminate\Support\ServiceProvider;

class BrontoServiceProvider extends ServiceProvider
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
        $this->app->bind('BrontoApi', function ($app) {
            //$token = config('bronto.token');
            $token =  "1AFA2B68-F4D7-47F3-8B5D-3ECF0FF09484";

            return new Api($token);
        });

        //config([
        //    'config/bronto.php',
        //]);
    }
}
