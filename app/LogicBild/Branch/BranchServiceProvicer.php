<?php
namespace App\LogicBild\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
use App\Models\Branch\Division;
use App\Models\Branch\District;
use App\Models\Branch\ThanaOrUpazila;
use App\Models\Branch\Branch;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

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
        $validators = Validator::make($request->all(),[
            'branch_id' => 'string|required',
            'branch_name' => 'string|required|unique:branches',
            'branch_type' => 'string|required',
            'division_name' => 'string|required',
            'district_name' => 'string|required',
            'upazila_name' => 'string|required',
            'town_name' => 'string|required',
            'location' => 'string|required',
        ],[
            'branch_id.required' => 'Branch id is required.',
            'branch_name.required' => 'Branch name is reqired.',
            'branch_name.unique' => 'The branch name has already taken.',
            'branch_type.required' => 'Branch type is required.',
            'division_name.required' => 'Division name is required.',
            'district_name.required' => 'District name is required.',
            'upazila_name.required' => 'Upazila is required.',
            'town_name.required' => 'Town name is required.',
            'location.required' => 'Loaction is required.',
        ]);

        if($validators->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages(),
            ]);
        }else{
            // Retrieve authenticated user
            $auth = Auth::user();

            // Create a new branch
            $branch = new Branch;
            $branch->branch_id = $request->input('branch_id');
            $branch->branch_name = $request->input('branch_name');
            $branch->branch_type = $request->input('branch_type');
            $branch->division_name = $request->input('division_name');
            $branch->district_name = $request->input('district_name');
            $branch->upazila_name = $request->input('upazila_name');
            $branch->town_name = $request->input('town_name');
            $branch->location = $request->input('location');
            $branch->created_by = $auth->id;


            $branch->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Branch name has created successfully.'
            ]);
        }
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
    public function accessBranchs(Request $request)
    {
        //
    }

    /**
     * Handle branch access permission.
    */
    public function permissionBranchs(Request $request)
    {
        //
    }

}