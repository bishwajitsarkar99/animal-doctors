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
use App\LogicBild\Accounts\AccountsServiceProvider;
use App\LogicBild\DeliveryTeam\DeliveryTeamServiceProvider;
use App\LogicBild\Marketing\MarketingServiceProvider;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;
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
        // singleton for AccountsServiceProvider
        $this->app->singleton(AccountsServiceProvider::class, function($app){
            return new AccountsServiceProvider();
        });
        // singleton for DeliveryTeamServiceProvider
        $this->app->singleton(DeliveryTeamServiceProvider::class, function($app){
            return new DeliveryTeamServiceProvider();
        });
        // singleton for MarketingServiceProvider
        $this->app->singleton(MarketingServiceProvider::class, function($app){
            return new MarketingServiceProvider();
        });
        // singleton for ProductIteamsServiceProvider
        $this->app->singleton(ProductIteamsServiceProvider::class, function($app){
            return new ProductIteamsServiceProvider();
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
