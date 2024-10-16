<?php
namespace App\LogicBild\SubAdmin;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class SubAdminService
{
    /**
     * Handle view sub admin dashboard.
    */
    public function viewDashboard()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('sub-admin.dashboard',compact('company_profiles'));
    }
}
