<?php

namespace App\Http\Controllers\DeliveryTeam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class DeliveryTeamController extends Controller
{
    //Delivery Team Home Page View
    public function dashboard()
    {   
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('delivery-team.dashboard',compact('company_profiles'));
        
    }
}
