<?php
namespace App\LogicBild\PivotTable;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;
use App\Models\Supplier\Supplier;

class PivotTableServiceProvider
{
    // ========================= Order Pivot Table =============================
    // =========================================================================
    /**
     * Handle Order Pivot Table View
    */
    public function viewOrderPivotTable()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $page_name = 'Order Pivot Table';
        return view('backend.dashboard-navbar-item.orders-pivot-table.index', compact('company_profiles','page_name'));
    }

    // ========================= Expenses Pivot Table ==========================
    // =========================================================================
    /**
     * Handle Expenses Pivot Table View
    */
    public function viewExpensesPivotTable()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $page_name = 'Expenses Pivot Table';
        return view('backend.dashboard-navbar-item.expenses-povit-table.index', compact('company_profiles','page_name'));
    }

    // ========================= Sales Pivot Table =============================
    // =========================================================================
    /**
     * Handle Sales Pivot Table View
    */
    public function viewSalesPivotTable()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $page_name = 'Sales Pivot Table';
        return view('backend.dashboard-navbar-item.sales-povit-table.index', compact('company_profiles','page_name'));
    }

    // ========================= Supplier Pivot Table ==============================
    // =========================================================================
    /**
     * Handle Supplier Pivot Table View
    */
    public function viewSupplierSummary()
    {
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

        $page_name = 'Supplier Pivot Table';

        return view('backend.dashboard-navbar-item.supplier-summary.index', compact('company_profiles','total_supplier_counts','active_supplier_counts',
        'inactive_supplier_counts','total_vendor_counts','active_vendor_counts','inactive_vendor_counts', 'page_name'));
    }
    
}
