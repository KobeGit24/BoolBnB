<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree;

class AppServiceProvider extends ServiceProvider
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
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3pw8dbdrxkmh4xdg',
            'publicKey' => 'js8wnyfs8nst8hs2',
            'privateKey' => '45e0330486e5c7833a5ba1fb180e5fe4'
        ]);
    }
}
