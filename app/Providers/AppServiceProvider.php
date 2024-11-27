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
use App\LogicBild\PivotTable\PivotTableServiceProvider;
use App\LogicBild\Post\PostServiceProvider;
use App\LogicBild\SettingService\SupplierSettingServiceProvider;
use App\LogicBild\SettingService\PostSettingServiceProvider;
use App\LogicBild\Supplier\SupplierServiceProvider;
use App\LogicBild\Stock\StockServiceProvider;
use App\LogicBild\Permission\InventoryPermissionServiceProvider;
use App\LogicBild\UserActivity\UserActivityServiceProvider;
use App\LogicBild\Forntend\Footer\FooterServiceProvider;
use App\LogicBild\Email\EmailServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\MailSetting;
use Illuminate\Support\Facades\Config;

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
        // singleton for PivotTableServiceProvider
        $this->app->singleton(PivotTableServiceProvider::class, function($app){
            return new PivotTableServiceProvider();
        });
        // singleton for PostServiceProvider
        $this->app->singleton(PostServiceProvider::class, function($app){
            return new PostServiceProvider();
        });
        // singleton for SupplierSettingServiceProvider
        $this->app->singleton(SupplierSettingServiceProvider::class, function($app){
            return new SupplierSettingServiceProvider();
        });
        // singleton for PostSettingServiceProvider
        $this->app->singleton(PostSettingServiceProvider::class, function($app){
            return new PostSettingServiceProvider();
        });
        // singleton for SupplierServiceProvider
        $this->app->singleton(SupplierServiceProvider::class, function($app){
            return new SupplierServiceProvider();
        });
        // singleton for StockServiceProvider
        $this->app->singleton(StockServiceProvider::class, function($app){
            return new StockServiceProvider();
        });
        // singleton for InventoryPermissionServiceProvider
        $this->app->singleton(InventoryPermissionServiceProvider::class, function($app){
            return new InventoryPermissionServiceProvider();
        });
        // singleton for UserActivityServiceProvider
        $this->app->singleton(UserActivityServiceProvider::class, function($app){
            return new UserActivityServiceProvider();
        });
        // singleton for FooterServiceProvider
        $this->app->singleton(FooterServiceProvider::class, function($app){
            return new FooterServiceProvider();
        });
        // singleton for EmailServiceProvider
        $this->app->singleton(EmailServiceProvider::class, function($app){
            return new EmailServiceProvider();
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

        $mailsetting = MailSetting::first();
        if($mailsetting){
            $data = [
                'driver' => $mailsetting->	mail_transport,
                'host' => $mailsetting->mail_host,
                'port' => $mailsetting->mail_port,
                'encryption' => $mailsetting->mail_encryption,
                'username' => $mailsetting->mail_username,
                'password' => $mailsetting->mail_password,
                'from' => [
                    'address' => $mailsetting->mail_from,
                    'name' => env('APP_NAME'),
                ]
            ];

            config::set('mail',$data);
        }

    }
}
