<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\LogicBild\SuperAdmin\SuperAdminService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('supplier', function ($app) {
            return new Supplier();
        });

        // Singleton for SuperAdminService
        $this->app->singleton(SuperAdminService::class, function($app){
            return new SuperAdminService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
    }
}
