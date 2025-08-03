<?php
namespace App\LogicBild\Admin;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class AdminService
{
    /**
     * Handle admin dashboard.
    */
    public function viewDashboard()
    {
        $page_name = 'Dashboard';
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.dashboard',compact('company_profiles', 'page_name'));
    }
}
