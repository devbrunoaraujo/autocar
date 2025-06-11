<?php

namespace App\Providers;

use App\Models\SiteConfig;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer(['livewire.banner', 'livewire.footer', 'livewire.navbar'], function($view){
            $config = SiteConfig::first();
            $view->with('siteConfig', $config);
        });
    }
}
