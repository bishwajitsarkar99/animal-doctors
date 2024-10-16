<?php
namespace App\LogicBild\CommonUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class CommonUserService
{
    /**
     * Handle view common user dashboard.
    */
    public function viewDashboard()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('user.dashboard',compact('company_profiles'));
    }
    /**
     * Handle user auth account.
    */
    public function user()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('user.update-account.index',compact('company_profiles'));
    }
}
