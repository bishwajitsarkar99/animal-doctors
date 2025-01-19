<?php
namespace App\LogicBild\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Supplier\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Email\EmailVerification;
use App\Models\CompanyProfile;
use App\Models\AuthPages;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SuperAdminService
{
    /**
     * Handle show dashboard page.
    */
    public function dashboardDataLoad()
    {
        $usersCount = [
            'users' => User::where('role', 0)->count(),
            'super_admin' => User::where('role', 1)->count(),
            'sub_admin' => User::where('role', 2)->count(),
            'admin' => User::where('role', 3)->count(),
        ];
        $users = User::latest()->paginate(1);

        $userCountCurentYear = [
            'users' => $this->getUserCounts(0),
            'super_admin' =>  $this->getUserCounts(1),
            'sub_admin' =>  $this->getUserCounts(2),
            'admin' =>  $this->getUserCounts(3),
        ];

        $user = Auth::user();

        // Category
        $categories = Category::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $category_counts = $categories->count();
        // Sub Category
        $subCategories = SubCategory::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $subCategory_counts = $subCategories->count();
        // Brand
        $brands = Brand::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $brand_counts = $brands->count();
        // Product
        $products = Product::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $product_counts = $products->count();
        // Supplier
        $supplier_counts = Supplier::where('type','Supplier')->where('supplier_status',1)->count();
        $vendor_counts = Supplier::where('type','Vendor')->where('supplier_status',1)->count();

        return view('super-admin.dashboard', compact('users', 'user', 'usersCount', 'userCountCurentYear','category_counts','subCategory_counts','brand_counts','product_counts',
        'supplier_counts','vendor_counts'));
    }
    /**
     * Handle year count private function.
    */
    private function getUserCounts($role)  
    {
        
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[$i] = $i;
        }
        $year = date("Y"); 

        foreach (User::getUserCounts($role) as $key => $user) {
            $month = (int)\str_replace("{$year}-", '', $user->month);
            $data[$month] = $user->user_count;
        }
        return  $data ;
    }
    /**
     * Handle the fetch user data event.
    */
    public function getuser(Request $request)
    {
        // sort-field
        $sort_field_id = $request->input('sort_field_id', 'id');
        $sort_field_image = $request->input('sort_field_image', 'image');
        $sort_field_name = $request->input('sort_field_name', 'name');
        $sort_field_email = $request->input('sort_field_email', 'email');
        $sort_field_contract_number = $request->input('sort_field_contract_number', 'contract_number');
        $sort_field_role = $request->input('sort_field_role', 'role');
        $sort_field_status = $request->input('sort_field_status', 'status');

        $sort_field_direction = $request->input('sort_field_direction', 'desc');

        $users = User::where('role', '!=', 1)->with(['roles']);

        if ($query = $request->get('query')) {
            $users->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $query . '%')
                ->orWhere('role', 'LIKE', '%' . $query . '%')
                ->orWhere('id', 'LIKE', '%' . $query . '%');
        }

        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        // sorting field
        $users = $users->orderBy($sort_field_id, $sort_field_direction)
                        ->orderBy($sort_field_image, $sort_field_direction)
                        ->orderBy($sort_field_name, $sort_field_direction)
                        ->orderBy($sort_field_email, $sort_field_direction)
                        ->orderBy($sort_field_contract_number, $sort_field_direction)
                        ->orderBy($sort_field_role, $sort_field_direction)
                        ->orderBy($sort_field_status, $sort_field_direction);

        $users = $users->paginate($perItem)->toArray();

        return response()->json($users, 200);
    }
    /**
     * Handle the edit user event.
    */
    public function editUser($id)
    {
        $users = User::findOrFail($id);
        return response()->json([
            'status' => 200,
            'messages' => $users,
            'data' => $users
        ]);
    }
    /**
     * Handle the update user event.
    */
    public function updateUser(Request $request, User $user)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:120',
            'contract_number' => 'required|numeric|digits:11',
            'email' => 'string|email|required|max:100',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        
        $token = Str::random(32);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contract_number = $request->input('contract_number');
        $user->remember_token = $token;
    
        if ($request->hasFile('image')) {
            $this->handleImageUpload($request, $user);
        }
        $user->save();
        
        return response()->json([
            'status' => 200,
            'messages' => 'User account is updated successfully',
            // 'data' => $user->toArray(),
        ]);
    }
    // image handle
    private function handleImageUpload(Request $request, User $user)
    {
        // Delete the old image if it exists
        if ($user->image && Storage::exists('public/image/user-image/' . $user->image)) {
            Storage::delete('public/image/user-image/' . $user->image);
        }

        // Store the new image
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/image/user-image/', $filename);

        // Update the user's image field
        $user->image = $filename;
    }
    /**
     * Handle the show user event.
    */
    public function showUser($id)
    {
        $users = User::with('emailVerification')->findOrFail($id);

        if ($users) {
            return response()->json([
                'status' => 200,
                'messages' => $users,
                'data' => $users
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'User is not found!',
            ]);
        }
    }
    /**
     * Handle the delete user event.
    */
    public function deleteUser($id)
    {
        $users = User::find($id);
        $users->delete();

        return response()->json([
            'status' => 200,
            'messages' => 'User account is deleted successfully',
        ]);
    }
    /**
     * Handle the user status update event.
    */
    public function update_statu(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = User::findOrFail($id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'User Status Update Successfully',
            'code' => 202,
        ], 202);
    }
    /**
     * Handle the search account-holders data get event.
    */
    public function accounts_holder(Request $request)
    {
        $roles = Role::all();
        $data = EmailVerification::all();

        $search = $request['search'] ?? "";
        if ($search != null) {
            $users = User::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $search . '%')
                ->orWhere('role', 'LIKE', '%' . $search . '%')
                ->orWhere('id', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $users = User::orderBy('id', 'desc')
            ->latest()
            ->paginate(1);
        }

        return view('super-admin.account-holders.account-holders_list', compact('data','roles','users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    /**
     * Handle role promot view event.
    */
    public function rolesIndex(Request $request)
    {
        return view('super-admin.role.role-promot');
    }
    /**
     * Handle role get view event.
    */
    public function rolesGet(Request $request)
    {
        $searchQuery = $request->input('query'); // The search input from the request
        $input_value = $request->input('name'); // The additional filter if provided

        $query = Role::query()->orderBy('id', 'desc');

        // Apply filters
        if ($input_value) {
            $query->where('name', 'LIKE', '%' . $input_value . '%');
        }

        if ($searchQuery) {
            $query->where('name', 'LIKE', '%' . $searchQuery . '%');
        } else {
            // Filter by today's date if no search query is provided
            // $start_day = now()->startOfDay();
            // $end_day = now()->endOfDay();
            // $query->whereBetween('created_at', [$start_day, $end_day]);
            $query = Role::orderBy('id', 'desc');
        }

        $data = $query->get();
        // Total Module Category Count
        $total = Role::count();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No matching current role found, Please Search.......',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'current' => $data->count(),
            'total' => $total,
        ], 200);
    }
    /**
     * Handle role promot create event.
    */
    public function rolecreate(Request $request)
    {
        //return view('super-admin.role.role-promot');
    }
    /**
     * Handle role permission view event.
    */
    public function rolesPermission(Request $request)
    {
        return view('super-admin.role.role-permission');
    }
    /**
     * Handle manage role view event.
    */
    public function manageRoles()
    {
        $users = User::where('status', '=', 0)->orderBy('id', 'desc')->get();
        // $company_profiles = companyProfile::where('id', '=', 1)->get();
        $roles = Role::all();
        return view('super-admin.role.manage-role',compact('users', 'roles'));
    }
    /**
     * Handle update manage role event.
    */
    public function updateRoles(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'role_id' => 'required|string',
        ],[
            'user_id.required' => 'User email is required.',
            'role_id.required' => 'User role is required.',
        ]);
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back()->with('success', 'User role and permission is updated');
    }
    /**
     * Handle email verification page event.
    */
    public function loadEmailVerifications(Request $request)
    {
        $emails = EmailVerification::orderBy('id', 'desc')->get();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Sort field and direction
        $sort_field_id = $request->input('sort_field_id', 'id');
        $sort_field_role = $request->input('sort_field_role', 'role');
        $sort_field_email = $request->input('sort_field_email', 'email');
        $sort_field_email_verified = $request->input('sort_field_email_verified', 'email_verified_session');
        $sort_field_account_create = $request->input('sort_field_account_create', 'account_create_session');
        $sort_field_status = $request->input('sort_field_status', 'status');
        $sort_field_update_email_verified = $request->input('sort_field_update_email_verified', 'created_at');
        $sort_direction = $request->input('sort_direction', 'desc');
        //Filter
        $role = $request->input('role');

        // Initialize query for email verifications
        $email_verifications = EmailVerification::with(['roles'])
            ->whereBetween('updated_at', [$startOfMonth, $endOfMonth]);

        // Apply search query filters
        if ($query = $request->get('query')) {
            $email_verifications->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('email', 'LIKE', '%' . $query . '%')
                    ->orWhere('id', 'LIKE', '%' . $query . '%');
            });
        }

        // Filter
        if ($role) {
            $email_verifications->whereHas('roles', function ($q) use ($role) {
                $q->where('name', 'LIKE', '%' . $role . '%');
            });
        }

        // Set pagination items per page
        $perItem = $request->input('per_item', 10);
        // Apply sorting
        $email_verifications->orderBy($sort_field_id, $sort_direction)
                            ->orderBy($sort_field_role, $sort_direction)
                            ->orderBy($sort_field_email, $sort_direction)
                            ->orderBy($sort_field_email_verified, $sort_direction)
                            ->orderBy($sort_field_account_create, $sort_direction)
                            ->orderBy($sort_field_status, $sort_direction)
                            ->orderBy($sort_field_update_email_verified, $sort_direction);
        // Paginate results
        $email_verifications = $email_verifications->paginate($perItem);

        // Check if the request expects a JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'email_verifications' => $email_verifications->items(),
                'links' => $email_verifications->toArray()['links'],
                'total' => $email_verifications->total(),
            ]);
        }

        // Return view with roles if not an AJAX request
        return view('super-admin.email-verification.index', compact('emails'));
    }
    /**
     * Handle email verification manage event.
    */
    public function emailVerificationManage(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        // $created_at = $status ? Carbon::now() : null;

        $data = EmailVerification::findOrFail($id);

        $data->update([
            'status' => (int)$status,
            'created_at' => now(), 
        ]);

        return response()->json([
            'messages' => 'User Email Verification Status Update Successfully',
            'code' => 202,
        ], 202);
    }
    /**
     * Handle auth page load event.
    */
    public function loadAuthPages(Request $request)
    {
        $auth_lists = AuthPages::all();

        $pages = AuthPages::all();

        if ($request->expectsJson()) {
            return response()->json([
                'pages' => $pages,
            ]);
        }
        return view('super-admin.auth-page.index', compact('auth_lists'));
    }
    /**
     * Handle auth filter page item event.
    */
    public function pageItemFilters(Request $request, $page_id)
    {
        $auth_lists = AuthPages::findOrFail($page_id);

        if ($auth_lists) {
            return response()->json([
                'status' => 200,
                'messages' => 'Page data found.',
                'data' => $auth_lists
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'Page is not found!',
            ]);
        }
    }
    /**
     * Handle auth manage event.
    */
    public function authManagePages(Request $request, $id)
    {
        $authPages = AuthPages::findOrFail($id);

        // Validate request data
        $validatedData = $request->validate([
            'domain_name' => 'required|string',
            'ip_name' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Update fields from the validated data
        $authPages->domain_name = $validatedData['domain_name'];
        $authPages->ip_name = $validatedData['ip_name'];
        $authPages->status = $validatedData['status'];

        // Use the already retrieved $authPages to access page_route
        $authPages->local_host_page_url = $validatedData['ip_name'] . $authPages->page_route;
        $authPages->domain_page_url = $validatedData['domain_name'] . $authPages->page_route;

        $authPages->save(); // Save the changes

        return response()->json([
            'status' => 200,
            'messages' => 'Page Permission is updated successfully',
        ]);
    }
}
