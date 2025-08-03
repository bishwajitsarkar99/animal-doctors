<?php
namespace App\LogicBild\Marketing;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class MarketingServiceProvider
{
    /**
     * Handle Marketing View Dashboard
    */
    public function viewDashboard()
    {
        $page_name = 'Dashboard';
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('marketing.dashboard',compact('company_profiles', 'page_name'));
    }
}
