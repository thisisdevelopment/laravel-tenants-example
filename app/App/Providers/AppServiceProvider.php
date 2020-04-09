<?php

namespace App\Providers;

use App\Customer;
use App\User;
use Illuminate\Support\ServiceProvider;
use ThisIsDevelopment\LaravelTenants\TenantsProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        TenantsProvider::setup(Customer::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
