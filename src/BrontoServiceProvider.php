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
            $token = config('bronto.token');

            if(is_null($token)){
                throw new \Exception("You cannot leave token empty");
            }

            return new Api($token);
        });

        config([
            'config/bronto.php',
        ]);
    }
}
