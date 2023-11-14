<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.dashboard',compact('company_profiles'));
    }
}
