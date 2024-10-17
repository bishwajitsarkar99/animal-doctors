<?php
namespace App\LogicBild\DeliveryTeam;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class DeliveryTeamServiceProvider
{
    /**
     *  Handle Delivery Team View Dashboard
    */
    public function viewDashboard()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('delivery-team.dashboard',compact('company_profiles'));
    }
}
