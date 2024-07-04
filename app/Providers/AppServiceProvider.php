<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ViaCepService;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ViaCepService::class, function ($app) {
            return new ViaCepService(new Client());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
