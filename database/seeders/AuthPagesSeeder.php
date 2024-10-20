<?php

namespace Database\Seeders;
use App\Models\AuthPages;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AuthPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the domain name from the .env file or fallback to the server IP address
        $domain = config('app.url'); // This gets the app URL from the environment configuration
        $serverIp = $_SERVER['SERVER_ADDR'] ?? '127.0.0.1:8000'; // Fallback IP for CLI
        
        // Construct URLs with the server IP
        $loginRoute = '/';
        $adminLoginRoute = '/admin-login';
        $accountsLoginRoute = '/accounts-login';
        $commonLoginRoute = '/common-user-login';
        $registerRoute = '/register';
        $forgetRoute = '/forget-password';
        $resetPasswordRoute = '/reset-password';
        $emailVerificationRoute = '/email-verification';

        // Construct Page Name
        $loginPage = 'Login Page';
        $adminLoginPage = 'Admin Login Page';
        $accountsloginPage = 'Accounts Login Page';
        $commonLoginPage = 'Common Login Page';
        $registerPage = 'Register Page';
        $forgetPage = 'Forget Password Page';
        $resetPage = 'Reset Password Page';
        $emailVerificationPage = 'Email Verification Page';

        // Array of pages to insert
        $pages = [
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $loginPage, 'page_route' => $loginRoute,'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $adminLoginPage, 'page_route' => $adminLoginRoute,'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $accountsloginPage, 'page_route' => $accountsLoginRoute,'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $commonLoginPage, 'page_route' => $commonLoginRoute,'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $registerPage, 'page_route' => $registerRoute, 'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $forgetPage, 'page_route' => $forgetRoute, 'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $resetPage, 'page_route' => $resetPasswordRoute, 'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['domain_name' => $domain,'ip_name' => $serverIp,'page_name' => $emailVerificationPage, 'page_route' => $emailVerificationRoute, 'local_host_page_url' => null, 'domain_page_url' => null, 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        
        // Insert pages into the database
        AuthPages::insert($pages);
    }
}
