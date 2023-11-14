<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;
class SubAdminController extends Controller
{
    //
    public function dashboard()
    {   
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('sub-admin.dashboard',compact('company_profiles'));
        
    }
}
