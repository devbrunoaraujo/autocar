<?php

namespace App\Providers;

use App\Contracts\FipeApiInterface;
use App\Services\FipeApiServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FipeApiInterface::class, FipeApiServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
