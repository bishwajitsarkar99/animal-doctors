<?php
namespace App\LogicBild\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
use App\Models\Branch\Division;
use App\Models\Branch\District;
use App\Models\Branch\ThanaOrUpazila;
use App\Models\Branch\Branches;
use App\Models\Branch\UserBranchAccessPermission;
use App\Models\Branch\BranchCategory;
use App\Models\Branch\AdminBranchAccessPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $page_name = 'Branch Create';
        return view('super-admin.branch.index', compact('company_profiles', 'page_name'));
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
     * Handle create branch Type.
    */
    public function createBranchType(Request $request)
    {
        $validators = validator::make($request->all(),[
            'branch_category_name' => 'required|unique:branch_categories',
        ],[
            'branch_category_name.required' => 'Branch category name is reqired.',
            'branch_category_name.unique' => 'Branch category name has already taken.',
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
            $branch_categories = new BranchCategory;
            $branch_categories->branch_category_name = $request->input('branch_category_name');
            $branch_categories->creator = $auth->id;


            $branch_categories->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Branch category has created successfully.'
            ]);
        }
    }

    /**
     * Handle search branch Type.
    */
    public function searchBranchTypes(Request $request)
    {
        $branch_categories = BranchCategory::orderBy('id', 'desc')->get();
        return response()->json([
            'branch_categories' => $branch_categories,
        ],200);
    }

    /**
     * Handle edit branch Type.
    */
    public function editBranchTypes($id)
    {
        $branch_categories = BranchCategory::where('branch_category_name', $id)->first();
        if($branch_categories){
            return response()->json([
                'status' => 200,
                'messages' => $branch_categories,
            ]);
        }else{

            return response()->json([
                'status' => 404,
                'messages' => 'The branch category is no found.',
            ]);
        }
    }

    /**
     * Handle update branch Type.
    */
    public function updateBranchTypes(Request $request, $id)
    {
        $validators = validator::make($request->all(),[
            'branch_category_name' => 'required|unique:branch_categories',
        ],[
            'branch_category_name.required' => 'Branch category name is reqired.',
            'branch_category_name.unique' => 'Branch category name has already taken.',
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
            $branch_categories = BranchCategory::where('branch_category_name', $id)->first();
            if($branch_categories){
                $branch_categories->branch_category_name = $request->input('branch_category_name');
                $branch_categories->updator = $auth->id;

                $branch_categories->save();
                return response()->json([
                    'status' => 200,
                    'messages' => 'Branch category has updated successfully.'
                ]);
            }else{
                return response()->json([
                    'status' => 404,
                    'messages' => 'Branch category name is no found.'
                ]);
            }
        }
    }

    /**
     * Handle delete branch Type.
    */
    public function deleteBranchTypes($id)
    {
        $branch_categories = BranchCategory::where('branch_category_name', $id)->first();
        $branch_categories->delete();
        return response()->json([
            'status' => 200,
            'messages' => 'The branch category has deleted successfully.'
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
            $branch = new Branches;
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
        $auth = Auth::user();
        $authEmail = $auth->id;

        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if($auth->role == 1){
            // Get Branch Data
            $branch_ids = Branches::whereNotNull('branch_id')->get();
            $user_counts = UserBranchAccessPermission::select('branch_id', DB::raw('COUNT(email_id) as user_count'))
                ->whereIn('branch_id', $branch_ids->pluck('branch_id'))
                ->groupBy('branch_id')
                ->pluck('user_count', 'branch_id');

            $allBranch = Branches::orderBy('id', 'desc')->get();
    
            return response()->json([
                'allBranch' => $allBranch,
                'user_counts' => $user_counts,
            ], 200);

        }elseif($auth->role == 3 && $authEmail){

            $branch_ids = Branches::whereNotNull('branch_id')->get();
            $user_counts = UserBranchAccessPermission::select('branch_id', DB::raw('COUNT(email_id) as user_count'))
                ->whereIn('branch_id', $branch_ids->pluck('branch_id'))
                ->groupBy('branch_id')
                ->pluck('user_count', 'branch_id');

            $allBranch = Branches::where('admin_email_id', $authEmail)
                ->where('admin_approval_status', 1)
                ->get();
            
            return response()->json([
                'allBranch' => $allBranch,
                'user_counts' => $user_counts,
            ], 200);

            if ($allBranch->isEmpty()) {
                return response()->json(['message' => 'No branches found for this admin.'], 404);
            }
        }elseif($auth->role == 2 && $authEmail){

            $branch_ids = Branches::whereNotNull('branch_id')->get();
            $user_counts = UserBranchAccessPermission::select('branch_id', DB::raw('COUNT(email_id) as user_count'))
                ->whereIn('branch_id', $branch_ids->pluck('branch_id'))
                ->groupBy('branch_id')
                ->pluck('user_count', 'branch_id');

            $allBranch = Branches::where('admin_email_id', $authEmail)
                ->where('sub_admin_approval_status', 1)->get();
            
            return response()->json([
                'allBranch' => $allBranch,
                'user_counts' => $user_counts,
            ], 200);

            if ($allBranch->isEmpty()) {
                return response()->json(['message' => 'No branches found for this admin.'], 404);
            }
        }

        return response()->json(['message' => 'Invalid role or unauthorized.'], 403);

    }

    /**
     * Handle edit branch.
    */
    public function editBranchs($id)
    {
        $branch = Branches::with(
            [
                'divisions',
                'districts',
                'thana_or_upazilas',
                'created_users', 
                'updated_users',
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
            $branch = Branches::find($id);
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
        $branchs = Branches::find($id);
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
        $page_name = 'Admin Branch Access';
        return view('super-admin.branch.admin-access-view', compact('page_name'));
    }

    /**
     * Handle admin branch access view.
    */
    public function branchDataFetchs(Request $request)
    {
        $auth = Auth::user();

        if($auth->role ==1){
            $branch_names = Branches::orderBy('id', 'desc')->where('branch_name', '!=', null)->get();
    
            if($branch_names){
                return response()->json([
                    'branch_names' => $branch_names,
                ], 200);
            };
        }
    }

    /**
     * Handle branch user email fetch.
    */
    public function branchFetchUserEmail(Request $request)
    {
        $auth = Auth::user();

        if ($auth->role == 1) {
            $roles = Role::where('status', 1)->pluck('id')->toArray();
            $branch_admin_users = AdminBranchAccessPermission::with('user_emails')
                ->whereIn('user_role_id', $roles)
                ->get();

            if ($branch_admin_users->isNotEmpty()) {
                $data = $branch_admin_users->map(function ($user) {
                    return [
                        'id' => $user->user_emails->id ?? null,
                        'user_email_id' => $user->user_emails->login_email ?? null,
                        'branch_id' => $user->branch_id,
                    ];
                });

                return response()->json([
                    'branch_admin_users' => $data,
                ], 200);
            }
        }

        return response()->json([
            'message' => 'No emails found or unauthorized access.',
        ], 404);
    }

    /**
     * Handle branch name query or search for admin access.
    */
    public function branchSearchNames(Request $request, $id)
    {
        $branch = AdminBranchAccessPermission::with(
            [
                'created_users', 
                'updated_users', 
                'approver_users', 
                'user_roles',
                'user_emails',
            ]
        )->where('user_email_id', $id)->first();
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
    public function branchAdminAcessStore(Request $request)
    {
        $validators = validator::make($request->all(),[
            'id' => 'required',
            'branch_id' => 'required',
            'branch_type' => 'required',
            'branch_name' => 'required',
            'division_name' => 'required',
            'district_name' => 'required',
            'upazila_name' => 'required',
            'town_name' => 'required',
            'location' => 'required',
            'user_role_id' => 'required|exists:roles,id',
            'user_email_id' => 'required|unique:admin_branch_access_permissions',
        ],[
            'id.required' => 'ID is reqired.',
            'branch_id.required' => 'Branch id is reqired.',
            'branch_name.required' => 'Branch name is reqired.',
            'branch_type.required' => 'The branch type is required.',
            'division_name.required' => 'The branch Division is required.',
            'district_name.required' => 'The branch District is required.',
            'upazila_name.required' => 'The branch Upazila is required.',
            'town_name.required' => 'The branch city is required.',
            'location.required' => 'The branch loaction is required.',
            'user_role_id.required' => 'The role is required',
            'user_email_id.required' => 'Branch user email is required',
            'user_email_id.unique' => 'This email has already taken.',
        ]);

        if($validators->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages(),
            ]);
        }else{
            // Retrieve authenticated user
            $auth = Auth::user();
            // Create a new admin access store
            $branch_admin_access = new AdminBranchAccessPermission;
            $branch_admin_access->id = $request->input('id');
            $branch_admin_access->branch_id = $request->input('branch_id');
            $branch_admin_access->branch_name = $request->input('branch_name');
            $branch_admin_access->branch_type = $request->input('branch_type');
            $branch_admin_access->division_name = $request->input('division_name');
            $branch_admin_access->district_name = $request->input('district_name');
            $branch_admin_access->upazila_name = $request->input('upazila_name');
            $branch_admin_access->town_name = $request->input('town_name');
            $branch_admin_access->location = $request->input('location');
            $branch_admin_access->user_role_id = $request->input('user_role_id');
            $branch_admin_access->user_email_id = $request->input('user_email_id');
            $branch_admin_access->created_by = $auth->id;

            $branch_admin_access->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Admin access has created successfully.'
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
            'id' => 'required|integer',
            'branch_id' => 'required|string',
            'user_role_id' => 'required|integer',
            'user_email_id' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ], 400);
        }

        $auth = Auth::user();
        $approvalDate = now();

        $branch = AdminBranchAccessPermission::find($request->id);
        if (!$branch) {
            return response()->json([
                'status' => 404,
                'messages' => 'Branch not found.',
            ], 404);
        }

        // Update branch access details
        $branch->id = $request->id;
        $branch->user_role_id = $request->user_role_id;
        $branch->user_email_id = $request->user_email_id;
        $branch->status = $request->status;

        if ($branch->status == 1) {
            $branch->approver_date = $approvalDate;
            $branch->approver_by = $auth->id;
        } else {
            $branch->approver_date = null;
            $branch->approver_by = null;
        }

        $branch->save();

        // Update User Details in `users` Table
        $user = User::find($request->user_email_id);
        if ($user) {
            $user->branch_id = $request->branch_id;
            $user->branch_type = $request->branch_type;
            $user->branch_name = $request->branch_name;
            $user->division_name = $request->division_name;
            $user->district_name = $request->district_name;
            $user->upazila_name = $request->upazila_name;
            $user->town_name = $request->town_name;
            $user->location = $request->location;
            $user->save();
        }

        return response()->json([
            'status' => 202,
            'messages' => 'The branch access has been updated successfully.',
        ], 202);
    }

    /**
     * Handle user branch permission view.
    */
    public function branchAccessUserPermissionView(Request $request)
    {
        $page_name = 'User Branch Access';
        return view('super-admin.branch.user-permission-view', compact('page_name'));
    }

    /**
     * Handle branch data get for user permission create.
    */
    public function getSpecifyBranch(Request $request)
    {
        // Get authenticated user's email
        $auth = Auth::user();
        $authEmail = $auth->id;

        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if($auth->role ==3 && $authEmail){
            $specify_branch = Branches::where('admin_email_id', $authEmail)
                ->where('admin_approval_status', 1)->get();
    
            return response()->json([
                'specify_branch' => $specify_branch,
            ], 200);
        }
        return response()->json(['message' => 'No branches available for this role'], 403);
    }

    /**
     * Handle branch data get for user permission create.
    */
    public function branchGet(Request $request, $id)
    {
        $branch = Branches::with(
            [
                'divisions', 
                'districts', 
                'thana_or_upazilas',
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
     * Handle user branch permission create.
    */
    public function userBranchPermissionCreate(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'email_id' => 'required|unique:user_branch_access_permissions',
            'role_id' => 'required',
            'branch_id' => 'required',
        ],[
            'email_id.required' => 'Email is required.',
            'email_id.unique' => 'The email has already taken.',
            'role_id.required' => 'Role is required.',
            'branch_id.required' => 'Branch is is required.',
        ]);

        if($validators->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages(),
            ],400);
        }

        $auth = Auth::user();
        $auth_email = $auth->id;

        $user_access = new UserBranchAccessPermission;
        $user_access->branch_id = $request->input('branch_id');
        $user_access->branch_type = $request->input('branch_type');
        $user_access->branch_name = $request->input('branch_name');
        $user_access->division_id = $request->input('division_id');
        $user_access->district_id = $request->input('district_id');
        $user_access->upazila_id = $request->input('upazila_id');
        $user_access->town_name = $request->input('town_name');
        $user_access->location = $request->input('location');
        $user_access->role_id = $request->input('role_id');
        $user_access->email_id = $request->input('email_id');
        $user_access->created_by = $auth->role;
        $user_access->creator_email = $auth_email;

        $user_access->save();

        return response()->json([
            'status' => 200,
            'messages' => 'User access has created successfully.'
        ],200);

    }

    /**
     * Handle user branch fetch role for permission.
    */
    public function userBranchFetchRole(Request $request, $id)
    {
        // Fetch role IDs to exclude
        $auth = Auth::user();
        if(in_array($auth->role, [1, 3]) && $auth->email){
            $excludedRoleIds = UserBranchAccessPermission::where('branch_id', $id)
            ->pluck('role_id')
            ->toArray();

            $emails = UserBranchAccessPermission::select('role_id', DB::raw('COUNT(email_id) as email_count'))
            ->groupBy('role_id')
            ->pluck('email_count', 'role_id');
            // Fetch roles excluding those specified in excludedRoleIds
            $branch_roles = Role::whereIn('id', $excludedRoleIds)->get();
            
            return response()->json([
                'branch_roles' => $branch_roles,
                'emails' => $emails,
            ], 200);
        }
        return response()->json([
            'message' => 'Unauthorized access or invalid role.',
        ], 403);
        
    }

    /**
     * Handle user branch fetch email for permission.
    */
    public function userBranchFetchEmail(Request $request, $id)
    {
        $excludedEmailIds = UserBranchAccessPermission::where('role_id' , $id)
        ->pluck('email_id')
        ->toArray();

        // Fetch roles excluding those specified in excludedRoleIds
        $users = User::whereIn('id', $excludedEmailIds)->get();

        return response()->json([
            'users' => $users,
        ], 200);
    }

    /**
     * Handle user branch permission edit.
    */
    public function userBranchPermissionEdit($id)
    {
        $auth = Auth::user();
        $authEmail = $auth->id;

        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $branch_user_data_query = UserBranchAccessPermission::with([
            'divisions',
            'districts',
            'thana_or_upazilas',
            'user_emails',
            'user_roles',
            'created_users',
            'updated_users',
            'approver_users',
            'creator_emails',
            'updator_emails',
            'approver_emails',
        ])->where('email_id', $id);
    
        if($auth->role == 1 && $authEmail) {
            $branch_user_data = $branch_user_data_query->first();
            if ($branch_user_data) {
                return response()->json([
                    'status' => 200,
                    'messages' => $branch_user_data,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'No data found for the given email.',
                ]);
            }
        }elseif($auth->role == 3 && $authEmail){
            $branch_user_data = $branch_user_data_query->first();
    
            if ($branch_user_data) {
                return response()->json([
                    'status' => 200,
                    'messages' => $branch_user_data,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'No data found for the given email.',
                ]);
            }
        }
    
        return response()->json(['messages' => 'Forbidden: Insufficient permissions'], 403);

    }

    /**
     * Handle user branch change.
    */
    public function userBranchChangeEdit($id)
    {
        $auth = Auth::user();
        $authEmail = $auth->id;

        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $branch_user_data_query = UserBranchAccessPermission::with([
            'divisions',
            'districts',
            'thana_or_upazilas',
            'user_emails',
            'user_roles',
            'created_users',
            'updated_users',
            'approver_users',
            'creator_emails',
            'updator_emails',
            'approver_emails',
        ])->where('email_id', $id);
    
        if($auth->role == 1 && $authEmail) {
            $branch_user_data = $branch_user_data_query->first();
            if ($branch_user_data) {
                return response()->json([
                    'status' => 200,
                    'messages' => $branch_user_data,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'No data found for the given email.',
                ]);
            }
        }elseif($auth->role == 3 && $authEmail){
            $branch_user_data = $branch_user_data_query->first();
    
            if ($branch_user_data) {
                return response()->json([
                    'status' => 200,
                    'messages' => $branch_user_data,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'No data found for the given email.',
                ]);
            }
        }
    
        return response()->json(['messages' => 'Forbidden: Insufficient permissions'], 403);

    }

    /**
     * Handle user branch permission update.
    */
    public function userBranchPermissionChange(Request $request, $id)
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
     * Handle user branch permission.
    */
    public function userBranchAccessPermission(Request $request)
    {

        $auth = Auth::user();
        $approvalDate = now();

        $branch_access = UserBranchAccessPermission::where('email_id', $request->id)->first();
        if (!$branch_access) {
            return response()->json([
                'status' => 404,
                'messages' => 'Branch User not found.',
            ], 404);
        }
        // Super Admin Role With Email According to Send Data
        if($auth->role == 1){
            $branch_access->super_admin_approval_status = $request->super_admin_approval_status;
            $branch_access->status = $request->status;

            if($branch_access->super_admin_approval_status == 1) {
                $branch_access->super_admin_approver_date = $approvalDate;
                $branch_access->approver_by = $auth->role;
                $branch_access->approver_email = $auth->id;
            }

            if($request->status == 1){
                $branch_access->admin_approval_status = 0;
                $branch_access->super_admin_approval_status = 0;
            }
        }
        // Admin Role With Email According to Send Data
        if($auth->role == 3){
            $branch_access->admin_approval_status = $request->admin_approval_status;
    
            if ($branch_access->admin_approval_status == 1) {
                $branch_access->admin_approver_date = $approvalDate;
                $branch_access->approver_by = $auth->role;
                $branch_access->approver_email = $auth->id;
            }
        }

        $branch_access->save();

        // Update User Details in `users` Table
        $user = User::find($request->id);
        if ($user) {
            $user->branch_id = $request->branch_id;
            $user->branch_type = $request->branch_type;
            $user->branch_name = $request->branch_name;
            $user->division_name = $request->division_name;
            $user->district_name = $request->district_name;
            $user->upazila_name = $request->upazila_name;
            $user->town_name = $request->town_name;
            $user->location = $request->location;
            $user->save();
        }

        return response()->json([
            'status' => 202,
            'messages' => 'User branch access has been done.',
        ], 202);
    }

}