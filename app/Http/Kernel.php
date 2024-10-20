<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\Language::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        //custom auth middlewares
        'isSuperAdmin' => \App\Http\Middleware\SuperAdminAuthentication::class,
        'isSubAdmin' => \App\Http\Middleware\SubAdminAuthentication::class,
        'isAdmin' => \App\Http\Middleware\AdminAuthentication::class,
        'isAccounts' => \App\Http\Middleware\AccountsAuthentication::class,
        'isMarketing' => \App\Http\Middleware\MarketingAuthentication::class,
        'isDeliveryTeam' => \App\Http\Middleware\DeliveryTeamAuthentication::class,
        'isUser' => \App\Http\Middleware\UserAuthentication::class,
        'prevent_back_histroy' => \App\Http\Middleware\preventBackHistory::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'rolePermission' => \App\Http\Middleware\RolePermission::class,
        'inventoryPermission' => \App\Http\Middleware\InventoryPermission::class,
        'inventoryDataExport' => \App\Http\Middleware\InventoryDataExport::class,
        'supplierCreate' => \App\Http\Middleware\Supplier\SupplierCreate::class,
        'supplierUpdate' => \App\Http\Middleware\Supplier\supplierUpdate::class,
        'supplierDelete' => \App\Http\Middleware\Supplier\supplierDelete::class,
        'supplierView' => \App\Http\Middleware\Supplier\supplierView::class,
        'supplierMySqlData' => \App\Http\Middleware\Supplier\supplierMySqlData::class,
        'loginPage' => \App\Http\Middleware\Pages\LoginPage::class,
        'adminLoginPage' => \App\Http\Middleware\Pages\AdminLoginPage::class,
        'accountsLoginPage' => \App\Http\Middleware\Pages\AccountsLoginPage::class,
        'commonUserLoginPage' => \App\Http\Middleware\Pages\CommonUserLoginPage::class,
        'registerPage' => \App\Http\Middleware\Pages\RegisterPage::class,
        'emailVerificationPage' => \App\Http\Middleware\Pages\EmailVerification::class,
        'forgetPage' => \App\Http\Middleware\Pages\ForgetPage::class,
        'resetPage' => \App\Http\Middleware\Pages\ResetPage::class,
    ];
}
