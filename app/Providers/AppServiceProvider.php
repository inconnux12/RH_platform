<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        View::share('key', 'value');
        Blade::if('admin', function () {
            return auth()->user() && auth()->user()->role==1;
        });
        Blade::if('rsuser', function () {
            return auth()->user() && (auth()->user()->role==1 || auth()->user()->role==2);
        });
        Blade::if('rhuser', function () {
            return auth()->user() && (auth()->user()->role==1 || auth()->user()->role==3);
        });
        Blade::if('emuser', function () {
            return auth()->user();
        });
    }
}
