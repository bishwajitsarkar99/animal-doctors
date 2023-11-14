<?php

namespace App\Http\Controllers\PivotTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class SupplierRecordController extends Controller
{
    public function index(){
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('backend.dashboard-navbar-item.supplier-summary.index', compact('company_profiles'));
    }
}
