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
use App\Models\Email\EmailVerification;
use App\Models\Forntend\ForntEndFooter;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Services\PdfService;
use Illuminate\Support\Facades\Response;

class BranchServiceProvicer
{
    /**
     * ==================================
     * Handle view company branch.
     * ==================================
    */
    public function viewBranchTemplate(Request $request, $slug)
    {
        $auth = Auth::User();
        if (!$auth) {
            return redirect()->route('login'); // or unauthorized view
        }
        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;
        // $permission = false; // default
        if($email && $role_id && $user_branch_id){
            $branch_create_page_authorize = 1; // branch create page authorize

            // $permission = DB::table('permissions')
            // ->where(function ($query) use ($role_id, $email, $user_branch_id) {
            //     $query->where('role', $role_id)
            //         ->orWhere('email', $email)
            //         ->orWhere('user_branch_id', $user_branch_id);
            // })
            // ->where('permission', 1)
            // ->exists();
        }

        $page_name = 'Branch Setting';

        if ($slug) {
            $branch_create_page_authorize = (int) $branch_create_page_authorize;

            if ($branch_create_page_authorize === 1) {
                
                return view('super-admin.branch.index', compact('page_name'));
            }else{
                return view('unauthorize-page.index', compact('page_name'));
            }
        }
        // return view('unauthorize-page.page-session-block', compact('page_name'));
    }

    /**
     * ================================
     * Handle get division name.
     * ================================
    */
    public function fetchDivision(Request $request)
    {
        $division_range = Division::get();

        return response()->json([
            'division_range' => $division_range
        ]);
    }

    /**
     * =============================
     * Handle get district name.
     * =============================
    */
    public function fetchDistrict(Request $request, $selectedDivision)
    {
        $district_range = District::where('division_id', $selectedDivision)->with('division')->get(['id', 'division_id', 'district_name']);
        return response()->json([
            'district_range' => $district_range
        ]);
    }

    /**
     * ==============================
     * Handle get upazila name.
     * ==============================
    */
    public function fetchUpazila(Request $request, $selectedDistrict)
    {
        $upazila_range = ThanaOrUpazila::where('district_id', $selectedDistrict)->with('district')->get(['id', 'district_id', 'thana_or_upazila_name']);
        
        return response()->json([
            'upazila_range' => $upazila_range
        ]);
    }

    /**
     * ===============================
     * Handle create branch Type.
     * ===============================
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
     * ==============================
     * Handle search branch Type.
     * ==============================
    */
    public function searchBranchTypes(Request $request)
    {
        $branch_categories = BranchCategory::orderBy('id', 'desc')->get();
        return response()->json([
            'branch_categories' => $branch_categories,
        ],200);
    }

    /**
     * ================================
     * Handle edit branch Type.
     * ================================
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
     * =================================
     * Handle update branch Type.
     * =================================
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
     * ====================================
     * Handle delete branch Type.
     * ====================================
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
     * =====================================
     * Handle create branch.
     * =====================================
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

            if(!$auth){
                return redirect()->route('login');
            }

            $role_id = $auth->role;
            $email = $auth->login_email;
            $user_branch_id = $auth->branch_id;

            if($email && $role_id){
                $data_create_permission = 1; // data create permission
            }

            if($data_create_permission === 1){
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
                    'messages' => 'New branch has added successfully.'
                ]);
            }else{

                return response()->json([
                    'status' => 403,
                    'messages' => 'You have no data create permission.'
                ]);
            }

        }
    }

    /**
     * =================================
     * Handle search branch.
     * =================================
    */
    public function searchBranchs(Request $request)
    {
        $auth = Auth::user();
        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;
        //$permission = false; // default
        if($role_id && $email && $user_branch_id){
            $data_table_permission = 1; // Branch data table permission
            // $permission = DB::table('permissions')
            // ->where(function ($query) use ($role_id, $email, $user_branch_id) {
            //     $query->where('role', $role_id)
            //         ->orWhere('email', $email)
            //         ->orWhere('user_branch_id', $user_branch_id);
            // })
            // ->where('permission', 1)
            // ->exists();
        }

        if($data_table_permission === 1){

            if($user_branch_id && $role_id){

                if($role_id === 1){
                    $branch_id = DB::table('branches')->pluck('branch_id')->toArray();
                }else{
                    $branch_id = [$user_branch_id];
                }
                
                // Sorting Data
                $sort_field = $request->input('sort_field', 'id');
                $sort_direction = $request->input('sort_direction', 'desc');

                // Search
                $query = $request->get('query');
                // Filter
                $branchType = $request->input('branch_type');

                $getBranches = Branches::select('id', 'branch_type', 'branch_id', 'branch_name', 'division_id', 'district_id', 'upazila_id', 'town_name', 'location',  'created_by',  'updated_by', 'created_at', 'updated_at')
                ->whereIn('branch_id', $branch_id)->with(['divisions', 'districts', 'thana_or_upazilas']);

                // Apply Searching
                $getBranches->when($query, function($q) use($query){
                    $q->where(function($subQuery) use($query){
                        $subQuery->where('branch_name', 'LIKE', $query. '%')
                                ->orWhere('branch_id', 'LIKE', $query. '%');
                    });
                });

                // Apply Filtering
                if($branchType){
                    $getBranches->where('branch_type', $branchType);
                }

                // Apply Sorting
                $getBranches = $getBranches->orderBy($sort_field, $sort_direction);

                // Paginate branch table data using query, not collection
                $perItem = max((int) $request->input('per_item', 10), 1);

                $paginateData = $getBranches->paginate($perItem);

                // Dropdown Search Menu
                $allBranch = Branches::whereIn('branch_id', $branch_id)->orderBy('id', 'desc')->get();
                $totalBranch = $allBranch->count();
                // Branch Category Data
                $totalBranchCategories = BranchCategory::count();
                //dd($totalBranch);
        
                return response()->json([
                    'data' => $paginateData->items(),
                    'links' => $paginateData->toArray()['links'] ?? [],
                    'total' => $paginateData->total(),
                    'per_page' => $perItem,
                    'per_item_num' => $paginateData->count(),
                    'allBranch' => $allBranch,
                    'totalBranch' => $totalBranch,
                    'totalBranchCategories' => $totalBranchCategories
                ], 200);
            }

        }else{
            return response()->json([
                'status' => 422,
                'message' => 'You have no data table permission.'
            ]);
        }

    }

    /**
     * =================================
     * Handle edit branch.
     * =================================
    */
    public function editBranchs($id)
    {
        $auth = Auth::User();
        if (!$auth) {
            return redirect()->route('login'); // or unauthorized view
        }
        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;

        if($email && $role_id){
            $data_table_permission = 1; // log dashboard page authorize
        }

        if($user_branch_id && $role_id){

            if ($role_id === 1) {
                $branch_id = DB::table('branches')->pluck('branch_id')->toArray(); // Get all branch IDs as array
            } else {
                $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
            }

            $branch = Branches::with(
                [
                    'divisions',
                    'districts',
                    'thana_or_upazilas',
                    'created_users', 
                    'updated_users',
                ]
            )->whereIn('branch_id', $branch_id)->find($id);

            if($data_table_permission === 1){

                if($branch){

                    return response()->json([
                        'status' => 200,
                        'messages' => $branch,
                    ]);
                }else{
        
                    return response()->json([
                        'status' => 404,
                        'messages' => 'Select company branch name.',
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 400,
                    'messages' => 'You have no data table permission.',
                ]);
            }
        } 
    }

    /**
     * ==============================
     * Handle update branch.
     * ==============================
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

            if (!$auth) {
                return redirect()->route('login'); // or unauthorized view
            }

            $role_id = $auth->role;
            $email = $auth->login_email;
            $user_branch_id = $auth->branch_id;

            if($email && $role_id){
                $data_update_permission = 1; // data update permission
            }

            if($user_branch_id && $role_id){

                if ($role_id === 1) {
                    $branch_id = DB::table('branches')->pluck('branch_id')->toArray(); // Get all branch IDs as array
                } else {
                    $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
                }

                // Create a new branch
                $branch = Branches::whereIn('branch_id', $branch_id)->find($id);
                
                if($data_update_permission === 1){

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
                            'messages' => 'Branch has updated successfully.'
                        ]);

                    }else{
                        return response()->json([
                            'status' => 404,
                            'messages' => 'Branch name is no found.'
                        ]);
                    }
                }else{
                    return response()->json([
                        'status' => 403,
                        'messages' => 'You have no data update permission.'
                    ]);
                }
            }
        }
    }

    /**
     * =====================================
     * Handle delete branch.
     * =====================================
    */
    public function deleteBranchs($id)
    {
        $auth = Auth::user();
        if(!$auth){
            return redirect()->route('login'); // unauthorize user
        }

        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;

        if($role_id && $email){
            $delete_permission = 1; // delete permission
        }

        if($role_id && $user_branch_id){

            if($role_id === 1){
                $branch_id = DB::table('branches')->pluck('branch_id')->toArray();
            }else{
                $branch_id = [$user_branch_id];
            }

            $branchs = Branches::whereIn('branch_id', $branch_id)->find($id);
            
            if($delete_permission === 1){
                $branchs->delete();
                
                return response()->json([
                    'status' => 200,
                    'messages' => 'The branch has deleted successfully.'
                ]);
            }else{

                return response()->json([
                    'status' => 403,
                    'messages' => 'You have no data delete permission.'
                ]);
            }
        }

    }

    /** =================================
     *  Handle PDF Download
     *  =================================
    */
    public function pdfDownloadBranchData(Request $request, PdfService $pdfService)
    {
        $auth = Auth::user();
        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;

        if($role_id && $email && $user_branch_id){
            $pdf_permission = 1;
            // $permission = DB::table('permissions')
            // ->where(function ($query) use ($role_id, $email, $user_branch_id) {
            //     $query->where('role', $role_id)
            //         ->orWhere('email', $email)
            //         ->orWhere('user_branch_id', $user_branch_id);
            // })
            // ->where('permission', 1)
            // ->exists();
        }
        if($pdf_permission === 1){

            if($user_branch_id && $role_id){
    
                $branch_id = DB::table('branches')->pluck('branch_id')->toArray();
                
                // Search
                $query = $request->get('query');
                // Filter
                $branch_type = $request->input('branch_type');
    
                $getBranches = Branches::select('id', 'branch_type', 'branch_id', 'branch_name', 'division_id', 'district_id', 'upazila_id', 'town_name', 'location',  'created_by',  'updated_by', 'created_at', 'updated_at')
                ->whereIn('branch_id', $branch_id)->with(['divisions', 'districts', 'thana_or_upazilas']);
    
                // Apply Searching
                $getBranches->when($query, function($q) use($query){
                    $q->where(function($subQuery) use($query){
                        $subQuery->where('branch_name', 'LIKE', $query. '%')
                                ->orWhere('branch_id', 'LIKE', $query. '%');
                    });
                });
    
                // Apply Filtering
                if($branch_type){
                    $getBranches->where('branch_type', $branch_type);
                }
                $branches = $getBranches->get();
                // Load additional info
                $companyinformations = ForntEndFooter::get();
                $imagePath = public_path('image/log/print-page-logo.png');
                $imageData = base64_encode(file_get_contents($imagePath)); 
        
                // Check if there's no branch data — use fallback PDF view
                if ($branches->isEmpty()) {
                    $html = view('pdf-download.empty-branch', [
                        'message' => 'no branch data found.',
                        'companyinformations' => $companyinformations,
                        'imageData' => $imageData,
                    ])->render();
        
                    $pdf = $pdfService->generatePdf($html);
        
                    return response($pdf, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="Branch-Download-'. date('d-M-Y') .'.pdf"');
                }
        
                // Render the PDF
                $html = view('pdf-download.branch-pdf', [
                    'branches' => $branches,
                    'companyinformations' => $companyinformations,
                    'imageData' => $imageData,
                ])->render();
        
                $pdf = $pdfService->generatePdf($html);
        
                return response($pdf, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="Branch-Download-'. date('d-M-Y') .'.pdf"');
    
            }
        }else{
            return response()->json([
                'status' => 422,
                'message' => 'You have no pdf data permission.'
            ]); 
        }
    }

    /** =================================
     *  Handle Excel Download
     *  =================================
    */
    public function exportExcelDownloadBranchData(Request $request)
    {
        $auth = Auth::user();
        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $role_id = $auth->role;
        $email = $auth->login_email;
        $name = $auth->name;
        $user_branch_id = $auth->branch_id;

        if($role_id && $email && $user_branch_id){
            $excel_permission = 1;
            // $permission = DB::table('permissions')
            // ->where(function ($query) use ($role_id, $email, $user_branch_id) {
            //     $query->where('role', $role_id)
            //         ->orWhere('email', $email)
            //         ->orWhere('user_branch_id', $user_branch_id);
            // })
            // ->where('permission', 1)
            // ->exists();
        }

        if($excel_permission === 1){

            if($user_branch_id && $role_id){

                $branch_id = DB::table('branches')->pluck('branch_id')->toArray();
                
                // Search
                $query = $request->get('query');
                // Filter
                $branch_type = $request->input('branch_type');
    
                $getBranches = Branches::select('id', 'branch_type', 'branch_id', 'branch_name', 'division_id', 'district_id', 'upazila_id', 'town_name', 'location',  'created_by',  'updated_by', 'created_at', 'updated_at')
                ->whereIn('branch_id', $branch_id)->with(['divisions', 'districts', 'thana_or_upazilas']);
    
                // Apply Searching
                $getBranches->when($query, function($q) use($query){
                    $q->where(function($subQuery) use($query){
                        $subQuery->where('branch_name', 'LIKE', $query. '%')
                                ->orWhere('branch_id', 'LIKE', $query. '%');
                    });
                });
    
                // Apply Filtering
                if($branch_type){
                    $getBranches->where('branch_type', $branch_type);
                }
                $branches = $getBranches->get();

                $companyinformations = ForntEndFooter::get();
                $imagePath = public_path('image/log/comp-logo.png');
                $imageData = base64_encode(file_get_contents($imagePath));
                
                $formattedDate = now('Asia/Dhaka')->format('d-M-Y');
                $headers = [
                    'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
                    'Content-Disposition' => 'attachment; filename=branch_export-' . $formattedDate . '.xls',
                ];
        
                if ($branches->isEmpty()) {
                    $errorMessage = '⚠ no branch data found.';
                    
                    $content = "\xEF\xBB\xBF"; // UTF-8 BOM
                    $content .= view('exports-data.empty_branch_excel_message', compact(
                        'companyinformations', 'imageData', 'email', 'name',
                        'errorMessage'
                    ))->render();
        
                    return Response::make($content, 200, $headers);
                }
        
                $content = "\xEF\xBB\xBF"; // UTF-8 BOM
                $content .= view('exports-data.branch_excel_format', compact(
                    'branches',
                    'companyinformations', 'imageData', 'email', 'name'
                ))->render();
        
                return Response::make($content, 200, $headers);
            }
        }else{
            return response()->json([
                'status' => 422,
                'message' => 'You have no excel data permission.'
            ]); 
        }

    }

    /** =================================
     *  Handle Excel CSV Format Download
     *  =================================
    */
    public function exportExcelCsvDownloadBranchData(Request $request)
    {
        $auth = Auth::user();
        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $role_id = $auth->role;
        $email = $auth->login_email;
        $name = $auth->name;
        $user_branch_id = $auth->branch_id;

        if($role_id && $email && $user_branch_id){
            $excel_csv_permission = 1;
            // $permission = DB::table('permissions')
            // ->where(function ($query) use ($role_id, $email, $user_branch_id) {
            //     $query->where('role', $role_id)
            //         ->orWhere('email', $email)
            //         ->orWhere('user_branch_id', $user_branch_id);
            // })
            // ->where('permission', 1)
            // ->exists();
        }

        if($excel_csv_permission === 1){

            if($user_branch_id && $role_id){

                $branch_id = DB::table('branches')->pluck('branch_id')->toArray();
                
                // Search
                $query = $request->get('query');
                // Filter
                $branch_type = $request->input('branch_type');
    
                $getBranches = Branches::select('id', 'branch_type', 'branch_id', 'branch_name', 'division_id', 'district_id', 'upazila_id', 'town_name', 'location',  'created_by',  'updated_by', 'created_at', 'updated_at')
                ->whereIn('branch_id', $branch_id)->with(['divisions', 'districts', 'thana_or_upazilas']);
    
                // Apply Searching
                $getBranches->when($query, function($q) use($query){
                    $q->where(function($subQuery) use($query){
                        $subQuery->where('branch_name', 'LIKE', $query. '%')
                                ->orWhere('branch_id', 'LIKE', $query. '%');
                    });
                });
    
                // Apply Filtering
                if($branch_type){
                    $getBranches->where('branch_type', $branch_type);
                }

                $branches = $getBranches->get();

                $companyinformations = ForntEndFooter::first();
        
                // If no data found, return CSV with error message
                if ($branches->isEmpty()) {
                    $handle = fopen('php://temp', 'w');
                    fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF)); // UTF-8 BOM
        
                    date_default_timezone_set('Asia/Dhaka');
                    $currentDate = date('d-M-Y');
                    $currentTime = date('h:i:s A');
        
                    fputcsv($handle, [$companyinformations->company_name ?? 'N/A']);
                    fputcsv($handle, ['Address :', $companyinformations->company_address ?? 'N/A']);
                    fputcsv($handle, ['Branch Data Download :', "$currentDate $currentTime\t[ User : $email ]"]);
                    fputcsv($handle, []); // Empty line
        
                    fputcsv($handle, []); // Empty line
        
                    fputcsv($handle, ['', 'Branch Export - No Data Found']);
                    fputcsv($handle, []);
        
                    // Page Footer Part
                    fputcsv($handle, []); // Empty line
                    fputcsv($handle, []); // Empty line
                    fputcsv($handle, []); // Empty line
        
                    fputcsv($handle, ['', 'Prepared by ' . ( $name ), '', 'Reference by', '', 'Authorized by', '', '']);
        
                    fputcsv($handle, []); // Empty line
        
                    fputcsv($handle, [
                        '', '',
                        'Email: ' . ($companyinformations->email ?? 'N/A'),
                        'Facebook: ' . ($companyinformations->facebook_address ?? 'N/A'),
                        'LinkedIn: ' . ($companyinformations->linkedin ?? 'N/A'),
                        '', '', '', '', ''
                    ]);
        
                    fputcsv($handle, [
                        '', '', '',
                        'Contact: ' . ($companyinformations->contract_number_one ?? 'N/A'),
                        "\t" . ($companyinformations->contract_number_two ?? 'N/A'),
                        '', '', '', '', ''
                    ]);
        
                    fputcsv($handle, [
                        '', '', '',
                        'Hotline: ' . ($companyinformations->hot_number ?? 'N/A'),
                        '', '', '', '', '', ''
                    ]);
        
                    rewind($handle);
                    $csvContent = stream_get_contents($handle);
                    fclose($handle);
        
                    $filename = 'branch_export-' . now('Asia/Dhaka')->format('d-M-Y') . '.csv';
        
                    return response($csvContent, 200, [
                        'Content-Type' => 'text/csv; charset=UTF-8',
                        'Content-Disposition' => "attachment; filename=\"$filename\"",
                    ]);
                }
        
                // Create CSV in memory
                $handle = fopen('php://temp', 'w');
                fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF)); // UTF-8 BOM for Excel
        
                // 1️⃣ Company Info Section
                $timezone = date_default_timezone_get();
                date_default_timezone_set('Asia/Dhaka');
                $currentDate = date('d l M Y') . " || ";
                $currentTime = date('h:i:s A');
                
                fputcsv($handle, [$companyinformations->company_name ?? 'N/A']);
                fputcsv($handle, ['Address :', $companyinformations->company_address ?? 'N/A']);
                fputcsv($handle, ['Branch Data Download :', "$currentDate $currentTime", "[ User : $email ]"]);
                fputcsv($handle, []); // Empty line
        
                // 3️⃣ Branch Data Table Header
                fputcsv($handle, [
                    'SN.', 'Branch Type', 'Branch ID', 'Branch Name',
                    'Division', 'District', 'Upazila', 'City', 'Location'
                ]);
        
                // 4️⃣ Branch Data Rows
                foreach ($branches as $index => $item) {
                    fputcsv($handle, [
                        $index + 1,
                        $item->branch_type,
                        $item->branch_id,
                        $item->branch_name,
                        optional($item->divisions)->division_name ?? 'N/A',
                        optional($item->districts)->district_name ?? 'N/A',
                        optional($item->thana_or_upazilas)->thana_or_upazila_name ?? 'N/A',
                        $item->town_name,
                        $item->location,
                    ]);
                }
        
                // Page Footer Part
                fputcsv($handle, []); // Empty line
                fputcsv($handle, []); // Empty line
                fputcsv($handle, []); // Empty line
        
                fputcsv($handle, ['', 'Prepared by ' . ( $name ), '', 'Reference by', '', 'Authorized by', '', '']);
        
                fputcsv($handle, []); // Empty line
        
                // Finalize file
                rewind($handle);
                $csvContent = stream_get_contents($handle);
                fclose($handle);
        
                // Download filename and headers
                $filename = 'Branch_Export-' . now('Asia/Dhaka')->format('d-M-Y') . '.csv';
        
                return response($csvContent, 200, [
                    'Content-Type' => 'text/csv; charset=UTF-8',
                    'Content-Disposition' => "attachment; filename=\"$filename\"",
                ]);
            }
        }

    }



    // ==============================================================================
    /**
     * =======================================
     * Handle admin branch access view.
     * =======================================
    */
    public function branchAdminAccessView(Request $request, $slug)
    {
        $auth = Auth::User();
        if (!$auth) {
            return redirect()->route('login'); // or unauthorized view
        }
        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;
        // $permission = false; // default
        if($email && $role_id && $user_branch_id){
            $page_authorize = 1; // branch create page authorize

            // $permission = DB::table('permissions')
            // ->where(function ($query) use ($role_id, $email, $user_branch_id) {
            //     $query->where('role', $role_id)
            //         ->orWhere('email', $email)
            //         ->orWhere('user_branch_id', $user_branch_id);
            // })
            // ->where('permission', 1)
            // ->exists();
        }

        $page_name = 'Admin Branch Access';

        if ($slug) {
            $page_authorize = (int) $page_authorize;

            if ($page_authorize === 1) {
                return view('super-admin.branch.admin-access-view', compact('page_name'));
            }else{
                return view('unauthorize-page.index', compact('page_name'));
            }
        }
        // return view('unauthorize-page.page-session-block', compact('page_name'));
    }

    /**
     * =======================================
     * Handle admin branch access view.
     * =======================================
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
     * =========================================
     * Handle admin branch access view.
     * =========================================
    */
    public function userBranchDataFetchs(Request $request)
    {
        $auth = Auth::user();

        if($auth->role ==1){

            $user_access_branches = UserBranchAccessPermission::whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('user_branch_access_permissions')
                    ->whereNotNull('branch_name')
                    ->groupBy('branch_name');
            })
            ->orderBy('id', 'desc')
            ->get([
                'id', 
                'branch_id', 
                'branch_type',
                'branch_name', 
                'division_id', 
                'district_id', 
                'upazila_id', 
                'town_name', 
                'location', 
                'created_by', 
                'creator_email', 
                'updated_by', 
                'updator_email', 
                'role_id', 
                'email_id', 
                'admin_approval_status', 
                'super_admin_approval_status', 
                'change_status', 
                'status', 
                'approver_by',
                'approver_email',
                'admin_approver_date',
                'super_admin_approver_date',
                'created_at',
                'updated_at',
            ]);
    
            if($user_access_branches){
                return response()->json([
                    'user_access_branches' => $user_access_branches,
                ], 200);
            };
        }
    }

    /**
     * ========================================
     * Handle admin branch fetch view.
     * ========================================
    */
    public function adminBranchChangesFetch(Request $request)
    {
        $auth = Auth::user();

        if($auth->role ==1){

            $admin_branch_changes = AdminBranchAccessPermission::whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('admin_branch_access_permissions')
                    ->whereNotNull('branch_name')
                    ->groupBy('branch_name');
            })
            ->orderBy('id', 'desc')
            ->get([
                'id',
                'branch_id', 
                'branch_type',
                'branch_name',
                'division_name',
                'district_name',
                'upazila_name',
                'town_name',
                'location',
                'user_role_id',
                'user_email_id',
                'created_by',
                'updated_by',
                'approver_by',
                'status',
                'approver_date',
                'created_at',
                'updated_at',
            ]);
    
            if($admin_branch_changes){
                return response()->json([
                    'admin_branch_changes' => $admin_branch_changes,
                ], 200);
            };
        }
    }

    /**
     * ==========================================
     * Handle admin branch change view.
     * ==========================================
    */
    public function adminBranchChanges(Request $request, $id)
    {
        $auth = Auth::user();

        $branch_access = AdminBranchAccessPermission::where('user_email_id', $id)->first();
        if (!$branch_access) {
            return response()->json([
                'status' => 404,
                'messages' => 'Branch Admin not found.',
            ], 404);
        }

        // Update permission for Super Admin (role = 1) or Admin (role = 3)
        if (in_array($auth->role, [1])) {
            $branch_access->branch_id = $request->branch_id;
            $branch_access->branch_type = $request->branch_type;
            $branch_access->branch_name = $request->branch_name;
            $branch_access->division_name = $request->division_name;
            $branch_access->district_name = $request->district_name;
            $branch_access->upazila_name = $request->upazila_name;
            $branch_access->town_name = $request->town_name;
            $branch_access->location = $request->location;
            $branch_access->user_role_id = $request->user_role_id;
            $branch_access->user_email_id = $request->user_email_id;
            $branch_access->updated_by = $auth->id;
            $branch_access->save();
        }

        // Update User Details in `users` Table
        $user = User::find($id);
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
            'status' => 200,
            'messages' => 'Admin branch has been changed successfully.',
        ], 200);
    }

    /**
     * ========================================
     * Handle admin branch delete.
     * ========================================
    */
    public function adminBranchsDelete(Request $request, $id)
    {
        $auth = Auth::user();
        // Fetch branch access record correctly
        $branch_access = AdminBranchAccessPermission::where('user_email_id', $id)->first();
        if (!$branch_access) {
            return response()->json([
                'status' => 404,
                'messages' => 'Branch User not found.',
            ], 404);
        }
    
        // Fetch user correctly
        $user = User::where('id', $id)->first();
        if (!$user) {
            return response()->json([
                'status' => 404,
                'messages' => 'User not found.',
            ], 404);
        }
    
        // Update User Details
        $user->branch_id = $request->branch_id ?? null;
        $user->branch_type = $request->branch_type ?? null;
        $user->branch_name = $request->branch_name ?? null;
        $user->division_name = $request->division_name ?? null;
        $user->district_name = $request->district_name ?? null;
        $user->upazila_name = $request->upazila_name ?? null;
        $user->town_name = $request->town_name ?? null;
        $user->location = $request->location ?? null;
        $user->save();
    
        // Allow Super Admin (1) or Admin (3) to delete
        if (in_array($auth->role, [1])) {
            $branch_access->delete();
        }
    
        return response()->json([
            'status' => 200,
            'messages' => 'The admin branch has been deleted successfully.'
        ], 200);
    }

    /**
     * ==========================================
     * Handle branch user email fetch.
     * ==========================================
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
     * ============================================================
     * Handle branch name query or search for admin access.
     * ============================================================
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
                'messages' => 'Select User Email.',
            ]);
        }
    }

    /**
     * ========================================
     * Handle admin branch access.
     * ========================================
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
     * =========================================
     * Handle admin branch access.
     * =========================================
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
        $approvalDate = Carbon::now('Asia/Dhaka')->format('Y-m-d H:i:s');
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

        // EmailVerification Branch Update
        $emailVerification = EmailVerification::where('user_id', $request->id)->first();
        if($emailVerification) {
            $emailVerification->branch_id = $auth->branch_id;
            $emailVerification->save();
        }

        return response()->json([
            'status' => 202,
            'messages' => 'The branch access has been updated successfully.',
        ], 202);
    }

    /**
     * ================================================
     * Handle Route ID Generate user branch access.
     * ================================================
    */
    public function redirectWithRandomUserBranchAccessId()
    {
        $idRange = 30; // Random 30-character string
        $random = Str::random($idRange);
        session(['valid_branch_random' => $random]);

        $page_authorize = 1; // or 0 based on logic

        return redirect()->route('branch_access_permission.view', [
            'random' => $random,
            'page_authorize' => $page_authorize
        ]);
    }



    // =====================================================================
    /**
     * ========================================
     * Handle user branch permission view.
     * ========================================
    */
    public function branchAccessUserPermissionView(Request $request, $slug)
    {
        $auth = Auth::User();
        if (!$auth) {
            return redirect()->route('login'); // or unauthorized view
        }
        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;
        // $permission = false; // default
        if($email && $role_id && $user_branch_id){
            $page_authorize = 1; // branch create page authorize

            // $permission = DB::table('permissions')
            // ->where(function ($query) use ($role_id, $email, $user_branch_id) {
            //     $query->where('role', $role_id)
            //         ->orWhere('email', $email)
            //         ->orWhere('user_branch_id', $user_branch_id);
            // })
            // ->where('permission', 1)
            // ->exists();
        }

        $page_name = 'User Branch Access';

        if ($slug) {
            $page_authorize = (int) $page_authorize;

            if ($page_authorize === 1) {
                return view('super-admin.branch.user-permission-view', compact('page_name'));
            }else{
                return view('unauthorize-page.index', compact('page_name'));
            }
        }
        /// return view('unauthorize-page.page-session-block', compact('page_name'));
    }

    /**
     * ======================================================
     * Handle branch data get for user permission create.
     * ======================================================
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
     * ====================================================
     * Handle branch data get for user permission create.
     * ====================================================
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
                'messages' => 'Select Branch Name.',
            ]);
        }
    }

    /**
     * ===========================================
     * Handle user branch permission create.
     * ===========================================
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
     * ====================================================
     * Handle user branch fetch role for permission.
     * ====================================================
    */
    public function userBranchFetchRole(Request $request, $id)
    {
        // Fetch role IDs to exclude
        $auth = Auth::user();
        if(in_array($auth->role, [1, 3]) && $auth->email){
            $excludedRoleIds = UserBranchAccessPermission::where('branch_id', $id)
            ->pluck('role_id')
            ->toArray();
            
            $emails = UserBranchAccessPermission::where('branch_id', $id)
            ->select('role_id', DB::raw('COUNT(email_id) as email_count'))
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
     * =====================================================
     * Handle user branch fetch email for permission.
     * =====================================================
    */
    public function userBranchFetchEmail(Request $request, $id)
    {
        $excludedEmailIds = UserBranchAccessPermission::where('role_id' , $id)
        ->pluck('email_id');
        // Fetch roles excluding those specified in excludedRoleIds
        $users = User::whereIn('id', $excludedEmailIds)->get();
        return response()->json([
            'users' => $users,
        ], 200);
    }

    /**
     * ============================================
     * Handle user branch permission edit.
     * ============================================
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
     * ==================================
     * Handle user branch change.
     * ==================================
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
     * ============================================
     * Handle user branch permission update.
     * ============================================
    */
    public function userBranchPermissionChange(Request $request, $id)
    {
        $auth = Auth::user();

        $branch_access = UserBranchAccessPermission::where('email_id', $id)->first();
        if (!$branch_access) {
            return response()->json([
                'status' => 404,
                'messages' => 'Branch User not found.',
            ], 404);
        }

        // Update permission for Super Admin (role = 1) or Admin (role = 3)
        if (in_array($auth->role, [1, 3])) {
            $branch_access->branch_id = $request->branch_id;
            $branch_access->branch_type = $request->branch_type;
            $branch_access->branch_name = $request->branch_name;
            $branch_access->division_id = $request->division_id;
            $branch_access->district_id = $request->district_id;
            $branch_access->upazila_id = $request->upazila_id;
            $branch_access->town_name = $request->town_name;
            $branch_access->location = $request->location;
            $branch_access->change_status = $request->change_status ?? 1;
            $branch_access->updated_by = $auth->role;
            $branch_access->updator_email = $auth->id;
            $branch_access->save();
        }

         // Get Division Name
        $division_name = Division::where('id', $request->division_id)->value('division_name');
        // Get District Name
        $district_name = District::where('id', $request->district_id)->value('district_name');
        // Get Upazila Name
        $upazila_name = ThanaOrUpazila::where('id', $request->upazila_id)->value('thana_or_upazila_name');

        // Update User Details in `users` Table
        $user = User::find($id);
        if ($user) {
            $user->branch_id = $request->branch_id;
            $user->branch_type = $request->branch_type;
            $user->branch_name = $request->branch_name;
            $user->division_name = $division_name;
            $user->district_name = $district_name;
            $user->upazila_name = $upazila_name;
            $user->town_name = $request->town_name;
            $user->location = $request->location;
            $user->save();
        }

        return response()->json([
            'status' => 200,
            'messages' => 'User branch has been changed successfully.',
        ], 200);
    }

    /**
     * =========================================
     * Handle user branch permission delete.
     * =========================================
    */
    public function userBranchPermissionDelete(Request $request, $id)
    {
        $auth = Auth::user();
        // Fetch branch access record correctly
        $branch_access = UserBranchAccessPermission::where('email_id', $id)->first();
        if (!$branch_access) {
            return response()->json([
                'status' => 404,
                'messages' => 'Branch User not found.',
            ], 404);
        }
    
        // Fetch user correctly
        $user = User::where('id', $id)->first();
        if (!$user) {
            return response()->json([
                'status' => 404,
                'messages' => 'User not found.',
            ], 404);
        }
    
        // Update User Details
        $user->branch_id = $request->branch_id ?? null;
        $user->branch_type = $request->branch_type ?? null;
        $user->branch_name = $request->branch_name ?? null;
        $user->division_name = $request->division_name ?? null;
        $user->district_name = $request->district_name ?? null;
        $user->upazila_name = $request->upazila_name ?? null;
        $user->town_name = $request->town_name ?? null;
        $user->location = $request->location ?? null;
        $user->save();
    
        // Allow Super Admin (1) or Admin (3) to delete
        if (in_array($auth->role, [1, 3])) {
            $branch_access->delete();
        }
    
        return response()->json([
            'status' => 200,
            'messages' => 'The user branch has been deleted successfully.'
        ], 200);
    }

    /**
     * =========================================
     * Handle user branch permission.
     * =========================================
    */
    public function userBranchAccessPermission(Request $request)
    {

        $auth = Auth::user();
        $approvalDate = Carbon::now('Asia/Dhaka')->format('Y-m-d H:i:s');

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

        // EmailVerification Branch Update
        $emailVerification = EmailVerification::where('user_id', $request->id)->first();
        if($emailVerification) {
            $emailVerification->branch_id = $auth->branch_id;
            $emailVerification->save();
        }

        return response()->json([
            'status' => 202,
            'messages' => 'User branch access has been done.',
        ], 202);
    }

}