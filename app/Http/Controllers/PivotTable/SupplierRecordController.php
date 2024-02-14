<?php

namespace App\Http\Controllers\PivotTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Supplier\Supplier;
use Illuminate\Support\Facades\Cache;

class SupplierRecordController extends Controller
{
    public function index(){
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        // Supplier Chart Data
        $total_supplier_counts = Supplier::where('type','Supplier')->count();
        $active_supplier_counts = Supplier::where('type','Supplier')->where('supplier_status',1)->count();
        $inactive_supplier_counts = Supplier::where('type','Supplier')->where('supplier_status',0)->count();
        // Vendor Chart Data
        $total_vendor_counts = Supplier::where('type','Vendor')->count();
        $active_vendor_counts = Supplier::where('type','Vendor')->where('supplier_status',1)->count();
        $inactive_vendor_counts = Supplier::where('type','Vendor')->where('supplier_status',0)->count();

        return view('backend.dashboard-navbar-item.supplier-summary.index', compact('company_profiles','total_supplier_counts','active_supplier_counts',
        'inactive_supplier_counts','total_vendor_counts','active_vendor_counts','inactive_vendor_counts'));
    }
}
