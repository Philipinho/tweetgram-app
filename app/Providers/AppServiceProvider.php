<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

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

        // Spatie Flash
        Flash::levels([
            'success' => 'c-alert--success',
            'warning' => 'c-alert--warning',
            'error' => 'c-alert--danger',
            'info' => 'c-alert--info',
        ]);
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
