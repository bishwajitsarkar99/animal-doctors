<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class AccountsController extends Controller
{
    //Accounts Dashboard View
    public function dashboard()
    {   
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('accounts.dashboard',compact('company_profiles'));
        
    }
}
