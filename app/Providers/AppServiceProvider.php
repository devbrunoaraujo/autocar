<?php

namespace App\Providers;

use App\Contracts\FipeApiInterface;
use App\Services\FipeApiServices;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::listen(function ($query) {
            Log::info("SQL: {$query->sql} | Time: {$query->time}ms");
        });
    }
}
