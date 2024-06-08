<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\vehicle;
use App\Models\travel;

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
        View::composer('layouts.master', function ($view) {
            $expiredvehicles = vehicle::where('validite_date', '<', now())->get();
            $view->with('expiredvehicles', $expiredvehicles);
        });
        View::composer('layouts.master', function ($view) {
            $arrivedtravels = travel::where('date_arrivee', '<', now())->get();
            $view->with('arrivedtravels', $arrivedtravels);
        });
    }
}
