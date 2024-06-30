<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class MarketingController extends Controller
{
    //Marketing Home Page View
    public function dashboard()
    {   
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('marketing.dashboard',compact('company_profiles'));
        
    }
}
