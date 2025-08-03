<?php
namespace App\LogicBild\Accounts;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class AccountsServiceProvider
{
    /**
     * Handle view accounts dashboard event. 
    */
    public function viewDashboard()
    {
        $page_name = 'Dashboard';
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('accounts.accounts-home-page',compact('company_profiles', 'page_name'));
    }
}
