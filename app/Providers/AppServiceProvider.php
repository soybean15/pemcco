<?php

namespace App\Providers;

use App\View\Components\Alerts;
use App\View\Components\Header;
use App\View\Components\Stat;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        //components
        Blade::component('header',Header::class);
        Blade::component('alerts',alias: Alerts::class);
        Blade::component(class: 'stat',alias: Stat::class);

    }
}
