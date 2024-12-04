<?php
namespace App\LogicBild\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
use App\Models\Branch\Division;
use App\Models\Branch\District;
use App\Models\Branch\ThanaOrUpazila;
use Illuminate\Support\Facades\Cache;

class BranchServiceProvicer
{
    // ========================= Company Branch ================================
    // =========================================================================

    /**
     * Handle view company branch.
    */
    public function viewBranchTemplate(Request $request)
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('super-admin.branch.index', compact('company_profiles'));
    }

    /**
     * Handle get division name.
    */
    public function fetchDivision(Request $request)
    {
        $division_range = Division::get();

        return response()->json([
            'division_range' => $division_range
        ]);
    }

    /**
     * Handle get district name.
    */
    public function fetchDistrict(Request $request, $selectedDivision)
    {
        $district_range = District::where(function($query) use ($selectedDivision) {
            $query->where('division_name', $selectedDivision);
        })->get(['division_name', 'district_name']);
    
        return response()->json([
            'district_range' => $district_range
        ]);
    }

    /**
     * Handle get upazila name.
    */
    public function fetchUpazila(Request $request, $selectedDistrict)
    {
        $upazila_range = ThanaOrUpazila::where(function($query) use ($selectedDistrict) {
            $query->where('district_name', $selectedDistrict);
        })->get(['district_name', 'thana_or_upazila_name']);
        
        return response()->json([
            'upazila_range' => $upazila_range
        ]);
    }

    /**
     * Handle create branch.
    */
    public function createBranch(Request $request)
    {
        //
    }

    /**
     * Handle search branch.
    */
    public function searchBranchs(Request $request)
    {
        //
    }

    /**
     * Handle edit branch.
    */
    public function editBranchs(Request $request , $id)
    {
        //
    }

    /**
     * Handle update branch.
    */
    public function updateBranchs(Request $request , $id)
    {
        //
    }

    /**
     * Handle delete branch.
    */
    public function deleteBranchs(Request $request , $id)
    {
        //
    }

    /**
     * Handle branch access.
    */
    public function statusBranchs(Request $request)
    {
        //
    }

    /**
     * Handle branch access permission.
    */
    public function accessBranchs(Request $request)
    {
        //
    }

}