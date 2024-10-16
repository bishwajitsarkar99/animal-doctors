<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\LogicBild\SuperAdmin\SuperAdminService;
use App\LogicBild\SettingService\AppSettingService;
use App\LogicBild\SettingService\SettingProvider;
use App\LogicBild\Auth\AuthService;
use App\LogicBild\Admin\AdminService;
use App\LogicBild\SubAdmin\SubAdminService;
use App\LogicBild\CommonUser\CommonUserService;
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
        // singleton for Supplier
        $this->app->singleton('supplier', function ($app) {
            return new Supplier();
        });

        // singleton for AuthService
        $this->app->singleton(AuthService::class, function($app){
            return new AuthService();
        });

        // Singleton for SuperAdminService
        $this->app->singleton(SuperAdminService::class, function($app){
            return new SuperAdminService();
        });

        // singleton for App Setting
        $this->app->singleton(AppSettingService::class, function($app){
            return new AppSettingService();
        });

        // singleton for SettingProvider
        $this->app->singleton(SettingProvider::class, function($app){
            return new SettingProvider();
        });

        // singleton for AdminService
        $this->app->singleton(AdminService::class, function($app){
            return new AdminService();
        });

        // singleton for SubAdminService
        $this->app->singleton(SubAdminService::class, function($app){
            return new SubAdminService();
        });
        // singleton for CommonUserService
        $this->app->singleton(CommonUserService::class, function($app){
            return new CommonUserService();
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
