<?php

namespace App\Http\Controllers\PivotTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class SalesPivotTableController extends Controller
{
    public function showSalesPivot(){
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('backend.dashboard-navbar-item.sales-povit-table.index', compact('company_profiles'));
    }
}
