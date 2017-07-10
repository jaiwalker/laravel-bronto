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
        $this->publishes([
            __DIR__.'/config/bronto.php' => config_path('bronto.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('BrontoApi', function ($app) {
            $token = config('bronto.Api_token');

            if(empty($token)){
                throw new \Exception("You cannot leave token empty");
            }

            return new Api($token);
        });

    }
}
