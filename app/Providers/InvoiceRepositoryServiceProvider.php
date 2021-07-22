<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InvoiceRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\BaseRepositoryInterface',
            'App\Repositories\InvoiceRepository'
        );
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
