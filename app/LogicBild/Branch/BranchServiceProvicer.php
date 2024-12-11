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
        $district_range = District::where('division_id', $selectedDivision)->with('division')->get(['id', 'division_id', 'district_name']);
        return response()->json([
            'district_range' => $district_range
        ]);
    }

    /**
     * Handle get upazila name.
    */
    public function fetchUpazila(Request $request, $selectedDistrict)
    {
        $upazila_range = ThanaOrUpazila::where('district_id', $selectedDistrict)->with('district')->get(['id', 'district_id', 'thana_or_upazila_name']);
        
        return response()->json([
            'upazila_range' => $upazila_range
        ]);
    }

    /**
     * Handle create branch.
    */
    public function createBranch(Request $request)
    {
        $validators = validator::make($request->all(),[
            'branch_name' => 'required|unique:branches',
            'branch_type' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'town_name' => 'required',
            'location' => 'required',
        ],[
            'branch_name.required' => 'Branch name is reqired.',
            'branch_name.unique' => 'The branch name has already taken.',
            'branch_type.required' => 'The branch type is required.',
            'division_id.required' => 'The branch Division is required.',
            'district_id.required' => 'The branch District is required.',
            'upazila_id.required' => 'The branch Upazila is required.',
            'town_name.required' => 'The branch city is required.',
            'location.required' => 'The branch loaction is required.',
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
            $branch->division_id = $request->input('division_id');
            $branch->district_id = $request->input('district_id');
            $branch->upazila_id = $request->input('upazila_id');
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
        // Get Branch Data
        $allBranch = Branch::orderBy('id', 'desc')->get();

        return response()->json([
            'allBranch' => $allBranch,
        ], 200);

    }

    /**
     * Handle edit branch.
    */
    public function editBranchs($id)
    {
        $branch = Branch::with(['created_users', 'updated_users', 'approver_users'])->find($id);
        if($branch){
            return response()->json([
                'status' => 200,
                'messages' => $branch,
            ]);
        }else{

            return response()->json([
                'status' => 404,
                'messages' => 'The branch is no found.',
            ]);
        }
    }

    /**
     * Handle update branch.
    */
    public function updateBranchs(Request $request , $id)
    {
        $validators = validator::make($request->all(),[
            'branch_name' => 'required',
            'branch_type' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'town_name' => 'required',
            'location' => 'required',
        ],[
            'branch_name.required' => 'Branch name is reqired.',
            'branch_type.required' => 'The branch type is required.',
            'division_id.required' => 'The branch Division is required.',
            'district_id.required' => 'The branch District is required.',
            'upazila_id.required' => 'The branch Upazila is required.',
            'town_name.required' => 'The branch city is required.',
            'location.required' => 'The branch loaction is required.',
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
            $branch = Branch::find($id);
            if($branch){
                $branch->branch_id = $request->input('branch_id');
                $branch->branch_name = $request->input('branch_name');
                $branch->branch_type = $request->input('branch_type');
                $branch->division_id = $request->input('division_id');
                $branch->district_id = $request->input('district_id');
                $branch->upazila_id = $request->input('upazila_id');
                $branch->town_name = $request->input('town_name');
                $branch->location = $request->input('location');
                $branch->updated_by = $auth->id;
    
    
                $branch->save();
                return response()->json([
                    'status' => 200,
                    'messages' => 'Branch name has updated successfully.'
                ]);
            }else{
                return response()->json([
                    'status' => 404,
                    'messages' => 'Branch name is no found.'
                ]);
            }
        }
    }

    /**
     * Handle delete branch.
    */
    public function deleteBranchs($id)
    {
        $branchs = Branch::find($id);
        $branchs->delete();
        return response()->json([
            'status' => 200,
            'messages' => 'The branch has deleted successfully.'
        ]);
    }

    /**
     * Handle admin branch access view.
    */
    public function branchAdminAccessView()
    {
        return view('super-admin.branch.admin-access-view');
    }

    /**
     * Handle admin branch access view.
    */
    public function branchDataFetchs(Request $request)
    {
        $branch_names = Branch::orderBy('id', 'desc')->where('branch_name', '!=', null)->get();

        if($branch_names){
            return response()->json([
                'branch_names' => $branch_names,
            ], 200);
        };
    }

    /**
     * Handle branch name query or search for admin access.
    */
    public function branchSearchNames(Request $request, $id)
    {
        $branch = Branch::with(
            [
                'created_users', 
                'updated_users', 
                'approver_users', 
                'divisions', 
                'districts', 
                'thana_or_upazilas',
                'admin_email_users',
                'sub_admin_email_users',
                'admin_roles',
                'sub_admin_roles',
            ]
        )->find($id);
        if($branch){
            return response()->json([
                'status' => 200,
                'messages' => $branch,
            ]);
        }else{

            return response()->json([
                'status' => 404,
                'messages' => 'The branch is no found.',
            ]);
        }
    }

    /**
     * Handle admin branch access.
    */
    public function accessBranchAdmin(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',
            'admin_role_id' => 'nullable|exists:roles,id',
            'sub_admin_role_id' => 'nullable|exists:roles,id',
            'admin_email_id' => 'nullable|exists:users,id',
            'sub_admin_email_id' => 'nullable|exists:users,id',
        ], [
            'branch_id.required' => 'Branch name is required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ], 400);
        }

        $auth = Auth::user();
        $approvalDate = now();

        $branch = Branch::find($request->id);
        if (!$branch) {
            return response()->json([
                'status' => 404,
                'messages' => 'Branch not found.',
            ], 404);
        }

        $branch->branch_id = $request->branch_id;
        $branch->admin_role_id = $request->admin_role_id;
        $branch->sub_admin_role_id = $request->sub_admin_role_id;
        $branch->admin_email_id = $request->admin_email_id;
        $branch->sub_admin_email_id = $request->sub_admin_email_id;
        $branch->admin_approval_status = $request->admin_approval_status;
        $branch->sub_admin_approval_status = $request->sub_admin_approval_status;

        if ($branch->admin_approval_status == 1) {
            $branch->admin_approver_date = $approvalDate;
            $branch->approver_by = $auth->id;
        } else {
            $branch->admin_approver_date = null;
            $branch->approver_by = null;
        }

        if ($branch->sub_admin_approval_status == 1) {
            $branch->sub_admin_approver_date = $approvalDate;
            $branch->approver_by = $auth->id;
        } else {
            $branch->sub_admin_approver_date = null;
            $branch->approver_by = null;
        }

        $branch->save();

        return response()->json([
            'status' => 202,
            'messages' => 'The branch access has been done.',
        ], 202);
    }

    /**
     * Handle user branch permission view.
    */
    public function branchAccessUserPermissionView(Request $request)
    {
        return view('super-admin.branch.user-permission-view');
    }

    /**
     * Handle user branch permission create.
    */
    public function userBranchPermissionCreate(Request $request)
    {
        //
    }

    /**
     * Handle user branch permission edit.
    */
    public function userBranchPermissionEdit($id)
    {
        //
    }

    /**
     * Handle user branch permission update.
    */
    public function userBranchPermissionUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Handle user branch permission delete.
    */
    public function userBranchPermissionDelete($id)
    {
        //
    }

    /**
     * Handle user branch permission delete.
    */
    public function userBranchAccessPermission(Request $request)
    {
        //
    }

}