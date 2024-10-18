<?php
namespace App\LogicBild\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\Permission\InventoryAccessPermission;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Medicine\Inventory;
use App\Models\MedicineGroup;
use App\Models\Permission\inventoryPermission;
use App\Models\MedicineDogs;
use App\Models\MedicineOrigin;
use App\Models\MedicineName;
use App\Models\Supplier\Supplier;
use App\Models\Logo\Logodegin;
use App\Models\Forntend\ForntEndFooter;
use App\Models\CompanyProfile;
use App\Models\SubCategory;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Services\LandScapPdfService;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Response;
use PDF;

class InventoryPermissionServiceProvider
{
    // ========================= Inventory Permission ==========================
    // =========================================================================
    /**
     * Handle Inventory Permission View
    */
    public function viewInventoryPermission(Request $request)
    {
        $roles = Role::whereIn('id', [1, 2, 3, 4, 5, 6, 7])->get();
        $dataQuery = InventoryAccessPermission::with('roles', 'users')->orderBy('id', 'desc');
    
        if ($query = $request->get('query')) {
            $dataQuery->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'LIKE', '%' . $query . '%');
            });
        }
        $perItem = $request->input('per_item', 10);
        $data = $dataQuery->paginate($perItem);

        if ($request->expectsJson()) {
            return response()->json([
                'roles' => $roles,
                'data' => $data->items(),
                'links' => $data->links(),
                'total' => $data->total(),
            ]);
        }
        return view('super-admin.user-permission.index');
    }
    /**
     * Handle Get Email In Dropdown Iteam 
    */
    public function getEmails(Request $request ,$selectedRole)
    {
        $users = User::whereHas('roles', function($query) use ($selectedRole) {
            $query->where('id', $selectedRole);
        })->get();
    
        return response()->json([
            'users' => $users
        ]);
    }
    /**
     * Handle Create Inventory Permission
    */
    public function createPermission(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'roles_id' => 'required|exists:roles,id',
            'emails_id' => 'required|unique:inventory_access_permissions,emails_id',
            'permission_status' => 'required|in:0,1',
        ], [
            'roles_id.required' => 'Role is required',
            'roles_id.exists' => 'The selected role does not exist',
            'emails_id.required' => 'Email field is required',

            'emails_id.unique' => 'This email has already taken.',
            'permission_status.required' => 'Permission status field is required',
            'permission_status.in' => 'Permission status must be true (1) or false (0)',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $InventoryAccessPermissions = new InventoryAccessPermission;
            $InventoryAccessPermissions->roles_id = $request->input('roles_id');
            $InventoryAccessPermissions->emails_id = $request->input('emails_id');
            $InventoryAccessPermissions->permission_status = $request->input('permission_status');
            $InventoryAccessPermissions->data_export_status = $request->input('data_export_status');
            $InventoryAccessPermissions->save();
            return response()->json([
                'messages' => 'Inventory access permission has been granted.',
                'code' => 200,
            ]);
        }
    }
    /**
     * Handle Edit Inventory Permission
    */
    public function editPermissions($id)
    {
        $InventoryAccessPermissions = InventoryAccessPermission::find($id);
        if ($InventoryAccessPermissions) {
            return response()->json([
                'status' => 200,
                'messages' => $InventoryAccessPermissions,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'The inventory permission is not found',
            ]);
        }
    }
    /**
     * Handle Update Inventory Permission
    */
    public function updatePermissions(Request $request, $id)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'roles_id' => 'required|exists:roles,id',
            'emails_id' => 'required',
            'permission_status' => 'required|in:0,1',
        ], [
            'roles_id.required' => 'Role is required',
            'roles_id.exists' => 'The selected role does not exist',
            'emails_id.required' => 'Email field is required',
            'permission_status.required' => 'Permission status field is required',
            'permission_status.in' => 'Permission status must be true (1) or false (0)',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $InventoryAccessPermissions = InventoryAccessPermission::find($id);
            if ($InventoryAccessPermissions) {
                $InventoryAccessPermissions->roles_id = $request->input('roles_id');
                $InventoryAccessPermissions->emails_id = $request->input('emails_id');
                $InventoryAccessPermissions->permission_status = $request->input('permission_status');
                $InventoryAccessPermissions->data_export_status = $request->input('data_export_status');
                $InventoryAccessPermissions->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'The inventory access permission has updated.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'The inventory access permission is not found',
                ]);
            }
        }
    }
    /**
     * Handle Delete Inventory Permission
    */
    public function deletePermissions($id)
    {
        $InventoryAccessPermissions = InventoryAccessPermission::find($id);
        $InventoryAccessPermissions->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The inventory access permission is deleted.',
        ]);
    }


    // ========================= Inventory Authorization =======================
    // =========================================================================
    /**
     * Handle Inventory Authorization View
    */
    public function viewInventoryAuthorization(Request $request)
    {
        $Inventory_id_permissions = InventoryPermission::with('roles', 'inventories')
        ->where('permission_status', '=', 1)
        ->orderBy('id', 'asc')
        ->get();

        $roles = Role::whereIn('id', [2, 3, 4, 5])->get(); 

        $inventoriesQuery = Inventory::with(
            'roles', 
            'users',
            'suppliers', 
            'sub_categories', 
            'medicine_groups', 
            'medicine_names', 
            'medicine_origins', 
            'medicine_dogs', 
            'units',
        )
        ->orderBy('inventory_id', 'desc')
        ->latest();

        if ($query = $request->get('query')) {
            $inventoriesQuery->where('inventory_id', 'LIKE', '%' . $query . '%');
        }

        $inventories = $inventoriesQuery->get();

        if ($request->expectsJson()) {

            return response()->json([
                'roles' => $roles,
                'Inventory_id_permissions' => $Inventory_id_permissions,
                'inventories' => $inventories
            ]);
        }
        
        $Inventory_permissions = InventoryPermission::orderBy('id', 'desc')->whereNotNull('permission_status')->latest()->get();
        $Inventory_permission_references = InventoryPermission::where('permission_status', '=', 1)->orderBy('id', 'desc')->get();
         
        return view('super-admin.inventory-authorize.index', compact('roles','Inventory_permission_references','Inventory_permissions')); 
    }
    /**
     * Handle Get User For Role Dropdown
    */
    public function getSelectRoles(Request $request ,$selectedRole)
    {
        $users = User::whereHas('roles', function($query) use ($selectedRole) {
            $query->where('id', $selectedRole);
        })->get();
    
        return response()->json([
            'users' => $users
        ]);
    }
    /**
     * Handle Search Talble Id For Permission Form
    */
    public function searchInventories(Request $request)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $query = $request->query('query');
        $inventories = collect();

        if ($query) {
            $query = trim($query);
            $inventories = Inventory::with('users')
                            ->where('inventory_id', $query)
                            ->orWhere(function($q) use ($query) {
                                $q->where('inv_id', 'LIKE', "%{$query}%")
                                ->orWhere('user_id', 'LIKE', "%{$query}%");
                            })
                            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                            ->get();

            if ($inventories->isEmpty()) {
                return response()->json(['error' => 'No matching inventories found'], 404);
            }
        }
        return response()->json(['inventories' => $inventories]);
    }
    /**
     * Handle Get Inventories Data For Authorize
    */
    public function getInventoriesData(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
    
        $user_id = $request->input('user_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }
    
        // Initialize the query builder
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'medicine_dogs', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 'medicine_origins'
        ])->orderBy('inventory_id', 'desc');
    
        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }
    
        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', $user_id);
        }
    
        if ($inv_id) {
            $query->where('inv_id', 'LIKE', '%' . $inv_id . '%');
        }
    
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }
    
        // Fetch all inventory data
        $inventoryData = $query->get();
    
        // Determine which medicine group IDs exist in the inventory data
        $existingMedicineGroupIds = $inventoryData->pluck('medicine_group')->unique()->filter()->all();
    
        // Filter medicine groups to only include those that exist in the inventory data
        $medicine_groups = MedicineGroup::where('status', '1')
        ->whereIn('id', $existingMedicineGroupIds)
        ->orderBy('id', 'desc')
        ->get();
        
        // Calculate total items and sub_total for each group
        foreach ($medicine_groups as $group) {
            $groupItems = $inventoryData->where('medicine_group', $group->id);
            $group->totalGroup = $groupItems->sum('quantity');
            $group->sub_total = $groupItems->sum('sub_total');
        }
    
        // Clone the query for calculating totals
        $totalPendingQuery = clone $query;
        $totalInvPending = $totalPendingQuery->whereNull('status')->sum('sub_total');
    
        $totalDenyQuery = clone $query;
        $totalInvDeny = $totalDenyQuery->where('status', '0')->sum('sub_total');
    
        $totalJustifyQuery = clone $query;
        $totalInvJustify = $totalJustifyQuery->where('status', '1')->sum('sub_total');
    
        $totalQuantityQuery = clone $query;
        $totalInvQty = $totalQuantityQuery->sum('quantity');
    
        $totalInv = $query->sum('sub_total');
    
        // Get role permissions
        $role_permissions = InventoryPermission::with('roles')
        ->orderBy('id', 'desc')
        ->whereNotNull('permission_status')
        ->latest()
        ->get();
    
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
    
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            'medicine_groups' => $medicine_groups,
            'totalInv' => $totalInv,
            'totalInvQty' => $totalInvQty,
            'totalInvPending' => $totalInvPending,
            'totalInvDeny' => $totalInvDeny,
            'totalInvJustify' => $totalInvJustify,
            'role_permissions' => $role_permissions,
            'months' => $months,
            'years' => array_values($years)
        ], 200);
    }
    /**
     * Handle Inventory Authorization 
    */
    public function inventoriesAuthorize(Request $request)
    {
        $inventory_id = (int)$request->input('inventory_id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Inventory::findOrFail($inventory_id);
        $data->update([
            'status' => (int)$status,
        ]);

        $message = $data->status ? 'The Inventory has been Authorized Successfully.' : 'The Inventory has been Unauthorized.';

        return response()->json([
            'message' => $message,
            'code' => 202,
        ], 202);
    }
    /**
     * Handle Inventoy Token Or Id Store For Inventory Data
    */
    public function inventoriesPermission(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'mail_id' => 'required',
            'inv_permission_id' => 'required|unique:inventory_permissions,inv_permission_id',
            'issue_name' => 'required',
        ], [
            'role_id.required' => 'The Role id is required.',
            'mail_id.required' => 'The user mail is required.',
            'inv_permission_id.unique' => 'The inventory id has already taken.',
            'issue_name.required' => 'The permission issue is required.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $inventoryPermissions = new inventoryPermission;
            $inventoryPermissions->role_id = $request->input('role_id');
            $inventoryPermissions->mail_id = $request->input('mail_id');
            $inventoryPermissions->inv_permission_id = $request->input('inv_permission_id');
            $inventoryPermissions->issue_name = $request->input('issue_name');
            $inventoryPermissions->approved_by = Auth::user()->id;
            $inventoryPermissions->save();
            return response()->json([
                'messages' => 'Inventory permission has been justified',
                'code' => 200,
            ]);
        }
    }
    /**
     * Handle Inventory Permission Table Data Get
    */
    public function inventoriesPermissionGet(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
    
        $role_id = $request->input('role_id');
        $inv_permission_id = $request->input('inv_permission_id');
        $permission_status = $request->input('permission_status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Initialize month and year arrays
        $months = [];
        $years = [];

        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
        
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }
        
        $query = InventoryPermission::with(['roles', 'users', 'inventories'])->orderBy('id', 'desc');
    
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }
    
    
        if ($role_id) {
            $query->where('role_id', $role_id);
        }
    
        if ($inv_permission_id) {
            $query->where('inv_permission_id', 'LIKE', '%' . $inv_permission_id . '%');
        }
        
        if ($permission_status !== null) {
            if ($permission_status === 'null') {
                $query->whereNull('permission_status');
            } else {
                $query->where('permission_status', $permission_status);
            }
        }


        // Calculate totals for different statuses
        $totalPendingQuery = clone $query;
        $totalPending = $totalPendingQuery->whereNull('permission_status')->count();

        $totalDenyQuery = clone $query;
        $totalDeny = $totalDenyQuery->where('permission_status', '0')->count();

        $totalJustifyQuery = clone $query;
        $totalJustify = $totalJustifyQuery->where('permission_status', '1')->count();

        $totalItems = $query->count();
    
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
    
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            'total_pending' => $totalPending,
            'total_deny' => $totalDeny,
            'total_justify' => $totalJustify,
            'total_items' => $totalItems,
            'months' => $months,
            'years' => array_values($years)
        ], 200);
    }
    /**
     * Handle Access Permission For Inventory
    */
    public function inventoriesPermissionStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $permission_status = (bool)$request->input('permission_status');
        $permission_status = !$permission_status;

        $data = InventoryPermission::findOrFail($id);
        $data->update([
            'permission_status' => (int)$permission_status,
        ]);

        return response()->json([
            'messages' => 'The Access Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
    /**
     * Handle Delete Inventory Permission
    */
    public function inventoriesPermissionDelete($id)
    {
        $permission = InventoryPermission::find($id);

        if (!$permission) {
            return response()->json([
                'status' => 404,
                'error' => 'Permission not found',
            ], 404);
        }
        if ($permission->permission_status === null) {
            $permission->delete();

            return response()->json([
                'status' => 200,
                'messages' => 'The inventory pending permission is deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 403,
                'error' => 'Deleting permission not allowed',
            ], 403);
        }
    }
    /**
     * Handle Token Send For Data Update
    */
    public function inventoriesToken(Request $request, $inventory_id)
    {
        // Validation
        $validator = validator::make($request->all(), [
            'inv_id' => 'required',
            'permission_token' => 'required',
            'status_inv' => 'required',
        ], [
            'inv_id.required' => 'Inventory ID is required.',
            'permission_token.required' => 'Token is required.',
            'status_inv.required' => 'Number is required.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $inventories = Inventory::find($inventory_id);
            if ($inventories) {
                $inventories->inv_id = $request->input('inv_id');
                $inventories->permission_token = $request->input('permission_token');
                $inventories->status_inv = $request->input('status_inv');
                $inventories->approved_by = Auth::user()->id;
                $inventories->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'The inventory token has created successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'The inventory token is not found',
                ]);
            }
        }
    }



    // ========================= Inventory Details =============================
    // =========================================================================
    /**
     * Handle Ineventory Details View
    */
    public function viewInventoryDetails(Request $request)
    {
        $suppliers = Supplier::where('supplier_status', 1)->orderBy('id', 'desc')->get();
        $roles = Role::whereIn('id', [2, 3, 4, 5])->get(); 
        $medicine_groups = MedicineGroup::where('status', 1)->orderBy('id', 'desc')->get();
        $medicine_dosages = MedicineDogs::with('medicine_names')->where('status', 1)->orderBy('id', 'desc')->get();
        $medicine_origins = MedicineOrigin::where('status', 1)->orderBy('id', 'desc')->get();
        $medicine_names = MedicineName::where('status', 1)->orderBy('id', 'desc')->get();

        if ($request->expectsJson()) {

            return response()->json([
                'suppliers' => $suppliers,
                'roles' => $roles,
                'medicine_groups' => $medicine_groups,
                'medicine_dosages' => $medicine_dosages,
                'medicine_origins' => $medicine_origins,
                'medicine_names' => $medicine_names,
            ]);
        }
        return view('super-admin.inventory-details.index');
    }
    /**
     * Handle Inventory Details Record View
    */
    public function getInventoriesDetailsRecord(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');
    
        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }
    
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'desc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
    
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
    
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        // Clone the query for calculating totals
        $totalPendingQuery = clone $query;
        $totalInvPending = $totalPendingQuery->whereNull('status')->sum('sub_total');
    
        $totalDenyQuery = clone $query;
        $totalInvDeny = $totalDenyQuery->where('status', '0')->sum('sub_total');
    
        $totalJustifyQuery = clone $query;
        $totalInvJustify = $totalJustifyQuery->where('status', '1')->sum('sub_total');
    
        $totalQuantityQuery = clone $query;
        $totalInvQty = $totalQuantityQuery->sum('quantity');
    
        $totalInv = $query->sum('sub_total');
        
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            'totalInv' => $totalInv,
            'totalInvQty' => $totalInvQty,
            'totalInvPending' => $totalInvPending,
            'totalInvDeny' => $totalInvDeny,
            'totalInvJustify' => $totalInvJustify,
            'months' => $months,
            'years' => array_values($years)

        ], 200);
    }
    /**
     * Handle PDF Download
    */
    public function pdf_inventories(Request $request, LandScapPdfService $landscappdfService)
    {
        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }

        // Fetch inventory based on date range
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
    
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
    
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }


        // Clone the query for calculating totals
        $totalVatQuery = clone $query;
        $totalInvVat = $totalVatQuery->sum('vat_percentage');
    
        $totalTaxQuery = clone $query;
        $totalInvTax = $totalTaxQuery->sum('tax_percentage');
    
        $totalDiscountQuery = clone $query;
        $totalInvDiscount = $totalDiscountQuery->sum('discount_percentage');
    
        $totalQuantityQuery = clone $query;
        $totalInvQty = $totalQuantityQuery->sum('quantity');
        
        $totalAmount = $query->sum('amount');
        $totalInv = $query->sum('sub_total');

        // Table Top header
        $totalPendingQuery = clone $query;
        $totalInvPending = $totalPendingQuery->whereNull('status')->sum('sub_total');
    
        $totalDenyQuery = clone $query;
        $totalInvDeny = $totalDenyQuery->where('status', '0')->sum('sub_total');
    
        $totalJustifyQuery = clone $query;
        $totalInvJustify = $totalJustifyQuery->where('status', '1')->sum('sub_total');

        $netTotal = $totalInvPending + $totalInvDeny + $totalInvJustify;

        $inventories = $query->get();
        $companyinformations = ForntEndFooter::get();
        $companylogo = Logodegin::get();
        // Convert image to base64
        $imagePath = public_path('image/log/comp-logo.png');
        $imageData = base64_encode(file_get_contents($imagePath)); 

        $html = view('pdf-download.inventory-pdf', [
            'inventories' => $inventories,
            'totalInv' => $totalInv,
            'totalInvQty' => $totalInvQty,
            'totalAmount' => $totalAmount,
            'totalInvVat' => $totalInvVat,
            'totalInvTax' => $totalInvTax,
            'totalInvDiscount' => $totalInvDiscount,
            'totalInvPending' => $totalInvPending,
            'totalInvDeny' => $totalInvDeny,
            'totalInvJustify' => $totalInvJustify,
            'netTotal' => $netTotal,
            'months' => $months,
            'years' => $years,
            'companyinformations' => $companyinformations,
            'companylogo' => $companylogo,
            'imageData' => $imageData,
        ])->render();

        $pdf = $landscappdfService->generatePdf($html);

        return response($pdf, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Inventory-Download-'. date('d-M-Y') .'.pdf"');
    }
    /**
     * Handle Data Export To Excel Sheet
    */
    public function excelExport(Request $request)
    {
        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Fetch inventory based on date range
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
    
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
    
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        // Define the headers for the Excel file
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Content-Disposition' => 'attachment; filename=inventory_export-'. date('d-M-Y') .'.xls',
        ];

        // Start building the Excel content
        $content = "\xEF\xBB\xBF"; // UTF-8 BOM
        $content .= '<html>
                        <head>
                            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                        </head>
                        <body>';

        $content .= '<table>
                        <thead>
                            <tr></tr>
                            <tr style="background-color:lightgreen;color:black;">
                                <td></td>
                                <td colspan="4" style="font-size:25px;text-align:left;"><strong>GST Medicine Center</strong></td>
                            </tr>
                            <tr style="background-color:lightgreen;color:black;">
                                <td></td>
                                <td colspan="4" style="font-size:16px;text-align:left;"><strong>Medicine Inventory</strong></td>
                            </tr>
                            <tr style="background-color:lightcyan;">
                                <th style="text-align:left;font-size:15px;">SN.</th>
                                <th style="text-align:left;font-size:15px;">Inventory-ID</th>
                                <th style="text-align:left;font-size:15px;">Create Date</th>
                                <th style="text-align:left;font-size:15px;">Mfg.Date</th>
                                <th style="text-align:left;font-size:15px;">Exp.Date</th>
                                <th style="text-align:left;font-size:15px;">Group</th>
                                <th style="text-align:left;font-size:15px;">Medicine</th>
                                <th style="text-align:left;font-size:15px;">Dosage</th>
                                <th style="text-align:left;font-size:15px;">Units</th>
                                <th style="text-align:left;font-size:15px;">MRP</th>
                                <th style="text-align:left;font-size:15px;">Qty</th>
                                <th style="text-align:left;font-size:15px;">Amount</th>
                                <th style="text-align:left;font-size:15px;">VAT</th>
                                <th style="text-align:left;font-size:15px;">Tax</th>
                                <th style="text-align:left;font-size:15px;">Discount</th>
                                <th style="text-align:left;font-size:15px;">Sub Total</th>
                                <th style="text-align:left;font-size:15px;">Status</th>
                                <th style="text-align:left;font-size:15px;">Supplier-ID</th>
                                <th style="text-align:left;font-size:15px;">Supplier</th>
                            </tr>
                        </thead>
                    <tbody>';

        $inventories = $query->get();

        // Initialize total variables
        $totalQty = 0;
        $totalAmount = 0;
        $totalVAT = 0;
        $totalTax = 0;
        $totalDiscount = 0;
        $totalSubTotal = 0;
        $totalInvPending = 0;
        $totalInvDeny = 0;
        $totalInvJustify = 0;
        $total_inv = 0;
        $totalInvPendingQty = 0;
        $totalInvDenyQty = 0;
        $totalInvJustifyQty = 0;
        $total_inv_qty = 0;
        // Initialize serial number
        $serialNumber = 1;

        // Loop through inventory and add rows to the table
        foreach ($inventories as $export) {
            // Calculate totals
            $totalQty += $export->quantity;
            $totalAmount += $export->amount;
            $totalVAT += $export->vat_percentage;
            $totalTax += $export->tax_percentage;
            $totalDiscount += $export->discount_percentage;
            $totalSubTotal += $export->sub_total;
            $totalInvPending += $export->status === null ? $export->sub_total : 0;
            $totalInvDeny += $export->status == 0 ? $export->sub_total : 0;
            $totalInvJustify += $export->status == 1 ? $export->sub_total : 0;

            $totalUnauthorize = $totalInvDeny - $totalInvPending;
            $total_inv = $totalInvPending + $totalUnauthorize + $totalInvJustify;

            $totalInvPendingQty += $export->status === null ? $export->quantity : 0;
            $totalInvDenyQty += $export->status == 0 ? $export->quantity : 0;
            $totalInvJustifyQty += $export->status == 1 ? $export->quantity : 0;

            $totalUnauthorizeQty = $totalInvDenyQty - $totalInvPendingQty;
            $total_inv_qty = $totalInvPendingQty + $totalUnauthorizeQty + $totalInvJustifyQty;
            // Determine status class, text, color, and background
            if ($export->status === null) {
                $statusClass = 'text-dark';
                $statusText = 'Pending';
                $statusColor = 'color:black;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-gray';
            } elseif ($export->status == 0) {
                $statusClass = 'text-danger';
                $statusText = '❌ Unauthorize';
                $statusColor = 'color:orangered;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-warn';
            } elseif ($export->status == 1) {
                $statusClass = 'text-dark';
                $statusText = '✅ Authorize';
                $statusColor = 'color:darkgreen;background-color: #ecfffd;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-azure';
            }

            $content .= '<tr>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $serialNumber++ . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->inv_id . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->created_at->format('d M Y h:i:sA') . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->manufacture_date->format('d M Y') . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->expiry_date->format('d M Y') . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->medicine_groups->group_name . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->medicine_names->medicine_name . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->medicine_dogs->dosage . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->units->units_name . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->price . ' ৳' . '</td>';
            $content .= '<td style="text-align:center;font-size:14px;">' . $export->quantity . ' qty</td>';
            $content .= '<td style="font-weight:700;font-size:14px;">' . $export->amount . ' ৳' . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->vat_percentage . '%</td>';
            $content .= '<td style="text-align:center;font-size:14px;">' . $export->tax_percentage . '%</td>';
            $content .= '<td style="text-align:center;font-size:14px;">' . $export->discount_percentage . '%</td>';
            $content .= '<td style="font-weight:700;font-size:14px;">' . $export->sub_total . ' ৳' . '</td>';
            $content .= '<td class="' . $statusClass . '" style="' . $statusColor . ' font-weight:700;font-size:14px;"><span class="' . $statusBg . '">' . $statusText . '</span></td>';
            $content .= '<td style="font-size:14px;">' . $export->suppliers->id_name . '</td>';
            $content .= '<td style="font-size:14px;">' . $export->suppliers->name . '</td>';
            $content .= '</tr>';
        }

        // Add the footer section
        $content .= '</tbody>
            <tfoot>
                <tr style="background-color:lightcyan;">
                    <td colspan="10" style="font-size:15px;text-align:center;"><strong>Totals:</strong></td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalQty, 2) . ' qty</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalAmount, 2) . ' ৳</td>
                    <td style="text-align:left;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalVAT, 2) . '%</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalTax, 2) . '%</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalDiscount, 2) . '%</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalSubTotal, 2) . ' ৳</td>
                    <td colspan="3"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="font-size:15px;text-align:center;background-color:lightgreen;"><strong>Without(VAT, Tax and Discount Inventory)</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td  style="font-size:15px;text-align:left;background-color:lightgreen;"><strong>Total Quantity </strong></td>
                    <td  style="font-size:15px;text-align:left;background-color:lightgreen;"><strong>' . number_format($totalQty, 2) . ' qty</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;background-color:lightgreen;"><strong>Total Inventories </strong></td>
                    <td style="font-size:15px;background-color:lightgreen;"><strong>' . number_format($totalAmount, 2) . ' ৳</strong></td>
                </tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="font-size:15px;text-align:center;background-color:yellow;"><strong>With(VAT, Tax and Discount Inventory)</strong></td>
                    <td></td>
                    <td colspan="3" style="font-size:15px;text-align:center;background-color:yellow;"><strong>Status Base On Inventories</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total VAT </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalVAT, 2) . ' %</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Pending</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvPendingQty, 2) . ' qty</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvPending, 2) . ' ৳</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total Tax </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalTax, 2) . ' %</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Authorize</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvJustifyQty, 2) . ' qty</strong> </td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvJustify, 2) . ' ৳</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total Discount </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalDiscount, 2) . ' %</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Unauthorize</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong> ' . number_format($totalUnauthorizeQty, 2) . ' qty</strong> </td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalUnauthorize, 2) . ' ৳</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total Inventories </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalSubTotal, 2) . ' ৳</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($total_inv_qty, 2) . ' qty</strong> </td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($total_inv, 2) . ' ৳</strong></td>
                </tr>
            </tfoot>
        </table></body></html>';

        // Create the response
        $response = Response::make($content, 200, $headers);

        return $response;
    }
    /**
     * Handle Data Export To CSV Format
    */
    public function exportCsvFile(Request $request)
    {
        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Fetch inventory based on date range
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        $inventories = $query->get();

        // Define the headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=inventory_export_'. date('d-M-Y') .'.csv',
        ];

        // Start building the CSV content
        $content = "\xEF\xBB\xBF"; // UTF-8 BOM

        // Create a file handle
        $file = fopen('php://temp', 'w');

        // Write headers to the CSV
        fputcsv($file, [
            'SN.', 
            'INV-ID', 
            'Create Date',
            'Mfg.Date',
            'Exp.Date', 
            'Group',
            'Medicine', 
            'Dosage', 
            'MRP',
            'Units', 
            'Qty', 
            'Amount',
            'VAT', 
            'Tax', 
            'Discount',
            'Sub Total', 
            'Status'
        ]);

        // Initialize total variables
        $totalQty = 0;
        $totalAmount = 0;
        $totalVAT = 0;
        $totalTax = 0;
        $totalDiscount = 0;
        $totalSubTotal = 0;
        $totalInvPending = 0;
        $totalInvDeny = 0;
        $totalInvJustify = 0;
        $total_inv = 0;
        $totalInvPendingQty = 0;
        $totalInvDenyQty = 0;
        $totalInvJustifyQty = 0;
        $total_inv_qty = 0;

        // Initialize serial number
        $serialNumber = 1;

        // Loop through inventory and add rows to the CSV
        foreach ($inventories as $export) {
            // Calculate totals
            $totalQty += $export->quantity;
            $totalAmount += $export->amount;
            $totalVAT += $export->vat_percentage;
            $totalTax += $export->tax_percentage;
            $totalDiscount += $export->discount_percentage;
            $totalSubTotal += $export->sub_total;
            $totalInvPending += $export->status === null ? $export->sub_total : 0;
            $totalInvDeny += $export->status == 0 ? $export->sub_total : 0;
            $totalInvJustify += $export->status == 1 ? $export->sub_total : 0;

            $totalUnauthorize = $totalInvDeny - $totalInvPending;
            $total_inv = $totalInvPending + $totalUnauthorize + $totalInvJustify;

            $totalInvPendingQty += $export->status === null ? $export->quantity : 0;
            $totalInvDenyQty += $export->status == 0 ? $export->quantity : 0;
            $totalInvJustifyQty += $export->status == 1 ? $export->quantity : 0;

            $totalUnauthorizeQty = $totalInvDenyQty - $totalInvPendingQty;
            $total_inv_qty = $totalInvPendingQty + $totalUnauthorizeQty + $totalInvJustifyQty;

            // Determine status class, text, color, and background
            $statusText = '';
            if ($export->status === null) {
                $statusClass = 'text-dark';
                $statusText = 'Pending';
                $statusColor = 'color:black;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-gray';
            } elseif ($export->status == 0) {
                $statusClass = 'text-danger';
                $statusText = '❌ Unauthorize';
                $statusColor = 'color:orangered;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-warn';
            } elseif ($export->status == 1) {
                $statusClass = 'text-dark';
                $statusText = '✅ Authorize';
                $statusColor = 'color:darkgreen;background-color: #ecfffd;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-azure';
            }

            fputcsv($file, [
                $serialNumber++,
                $export->inv_id,
                $export->created_at->format('d M Y h:i:sA'),
                $export->manufacture_date->format('d M Y'),
                $export->expiry_date->format('d M Y'),
                $export->medicine_groups->group_name,
                $export->medicine_names->medicine_name,
                $export->medicine_dogs->dosage,
                $export->units->units_name,
                $export->price . ' ৳',
                $export->quantity . ' qty',
                $export->amount . ' ৳',
                $export->vat_percentage . '%',
                $export->tax_percentage . '%',
                $export->discount_percentage . '%',
                $export->sub_total . ' ৳',
                $statusText
            ]);
        }
        // Add the footer section to the CSV
        fputcsv($file, []);
        fputcsv($file, [
            '', '', '', '', '', '', '', '', '',
            'Totals:',
            number_format($totalQty, 2) . ' qty',
            number_format($totalAmount, 2) . ' ৳',
            number_format($totalVAT, 2) . '%',
            number_format($totalTax, 2) . '%',
            number_format($totalDiscount, 2) . '%',
            number_format($totalSubTotal, 2) . ' ৳', 
            '', 
        ]);
        fputcsv($file, []);
        fputcsv($file, ['', '', 'Without (VAT, Tax and Discount)']);
        fputcsv($file, ['', 'Total Quantity', number_format($totalQty, 2) . ' qty']);
        fputcsv($file, ['', 'Total Inventories', number_format($totalAmount, 2) . ' ৳']);
        fputcsv($file, []);
        fputcsv($file, ['', '', 'With (VAT, Tax and Discount)', '', '', 'Status Base On Inventories']);
        fputcsv($file, [
            '', 'Total VAT', number_format($totalVAT, 2) . ' %', '', 'Pending',
            number_format($totalInvPendingQty, 2) . ' qty',
            number_format($totalInvPending, 2) . ' ৳'
        ]);
        fputcsv($file, [
            '', 'Total Tax', number_format($totalTax, 2) . ' %', '', 'Authorize',
            number_format($totalInvJustifyQty, 2) . ' qty',
            number_format($totalInvJustify, 2) . ' ৳'
        ]);
        fputcsv($file, [
            '', 'Total Discount', number_format($totalDiscount, 2) . ' %', '', 'Unauthorize',
            number_format($totalUnauthorizeQty, 2) . ' qty',
            number_format($totalUnauthorize, 2) . ' ৳'
        ]);
        fputcsv($file, [
            '', 'Total Inventories', number_format($totalSubTotal, 2) . ' ৳', '', 'Total',
            number_format($total_inv_qty, 2) . ' qty',
            number_format($total_inv, 2) . ' ৳'
        ]);

        // Place the file pointer at the beginning of the stream
        rewind($file);

        // Get the content of the file stream
        $content .= stream_get_contents($file);

        // Close the file handle
        fclose($file);

        // Create the response
        $response = Response::make($content, 200, $headers);

        return $response;
    }
    /**
     * Handle Data Print
    */
    public function prints(Request $request)
    {
        // Get filter parameters
        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }

        // Fetch inventory based on filters
        $query = Inventory::with([
            'medicine_names', 
            'medicine_groups', 
            'units', 
            'users', 
            'roles', 
            'suppliers', 
            'sub_categories', 
            'medicine_origins', 
            'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [Carbon::parse($start_date), Carbon::parse($end_date)->endOfDay()]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        $inventories = $query->get();

        $totalInvPendingQty = $totalInvDenyQty = $totalInvJustifyQty = 0;

        foreach ($inventories as $inventory) {
            $totalInvPendingQty += $inventory->status === null ? $inventory->quantity : 0;
            $totalInvDenyQty += $inventory->status == 0 ? $inventory->quantity : 0;
            $totalInvJustifyQty += $inventory->status == 1 ? $inventory->quantity : 0;
        }

        // Table Top header
        $totalPendingQuery = clone $query;
        $totalInvPending = $totalPendingQuery->whereNull('status')->sum('sub_total');
    
        $totalDenyQuery = clone $query;
        $totalInvDeny = $totalDenyQuery->where('status', '0')->sum('sub_total');
    
        $totalJustifyQuery = clone $query;
        $totalInvJustify = $totalJustifyQuery->where('status', '1')->sum('sub_total');

        $netTotal = $totalInvPending + $totalInvDeny + $totalInvJustify;

        $totalUnauthorizeQty = $totalInvDenyQty - $totalInvPendingQty;
        $total_inv_qty = $totalInvPendingQty + $totalUnauthorizeQty + $totalInvJustifyQty;

        $totalQty = $inventories->sum('quantity');
        $totalAmount = $inventories->sum('amount');
        $totalVAT = $inventories->sum('vat_percentage');
        $totalTax = $inventories->sum('tax_percentage');
        $totalDiscount = $inventories->sum('discount_percentage');
        $totalSubTotal = $inventories->sum('sub_total');

        // Convert image to base64
        $imagePath = public_path('image/log/comp-logo.png');
        $imageData = base64_encode(file_get_contents($imagePath)); 
        $companyinformations = ForntEndFooter::get();
        $companylogo = Logodegin::get();

        return view('super-admin.inventory-details.print', compact(
            'inventories', 
            'totalQty', 
            'totalAmount', 
            'totalVAT', 
            'totalTax', 
            'totalDiscount', 
            'totalSubTotal',
            'totalInvPending', 
            'totalInvDeny', 
            'totalInvJustify', 
            'netTotal', 
            'totalInvPendingQty', 
            'totalInvDenyQty', 
            'totalInvJustifyQty', 
            'totalUnauthorizeQty', 
            'total_inv_qty',
            'imageData',
            'companyinformations',
            'companylogo',
            'months',
            'years',
        ));
    }



    // ========================= Medicine Inventory ============================
    // =========================================================================
    /**
     * Handle Medicine Inventory Index Page View
    */
    public function viewMedicineInventories()
    {
        $suppliers = Supplier::where('supplier_status', '=', 1)->get();
        $cateogries = SubCategory::where('status', '=', 1)->get();
        $medicine_groups = MedicineGroup::where('status', '=', 1)->get();
        $units = DB::table('units')->orderBy('units_name', 'ASC')->get();
        $medicine_origins = DB::table('medicine_origins')->orderBy('origin_name', 'ASC')->get();

        //$inventories = Inventory::where('amount', '')->get();

        return view('admin.inventory.medicine-inventory', compact('suppliers', 'cateogries', 'medicine_groups', 'units', 'medicine_origins'));
    }
    /**
     * Handle Medicine Inventory Fetch For Edit Table
    */
    public function get_data(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
    
        // $fiveMinutesAgo = Carbon::now()->subMinutes(5);
        $oneDayAgo = Carbon::now()->subDay();
        $now = Carbon::now();
        $data = Inventory::with([
            'suppliers', 
            'sub_categories', 
            'medicine_groups', 
            'medicine_names', 
            'medicine_origins', 
            'medicine_dogs', 
            'units',
        ])
            ->where('status_inv', '=', 0)
            ->whereBetween('updated_at', [$oneDayAgo, $now])
            ->orderBy('inventory_id', 'desc');
    
        if ($query = $request->get('query')) {
            $data->where(function($q) use ($query) {
                $q->where('id_name', 'LIKE', '%' . $query . '%')
                  ->orWhere('medicine_name', 'LIKE', '%' . $query . '%')
                  ->orWhere('medicine_group', 'LIKE', '%' . $query . '%');
            });
        }
        $perItem = $request->input('per_item', 10);
        $data = $data->paginate($perItem)->toArray();
    
        return response()->json($data, 200);
    }
    /**
     * Handle Medicine Inventory Fetch Unauthorized Data
    */
    public function un_authorized_data(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }
    
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $data = Inventory::with([
                'suppliers', 
                'sub_categories', 
                'medicine_groups', 
                'medicine_names', 
                'medicine_origins', 
                'medicine_dogs', 
                'units'
            ])
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->orderBy('inventory_id', 'desc');
    
        if ($query = $request->get('query')) {
            $data->where(function($q) use ($query) {
                $q->where('id_name', 'LIKE', '%' . $query . '%')
                  ->orWhere('medicine_name', 'LIKE', '%' . $query . '%')
                  ->orWhere('medicine_group', 'LIKE', '%' . $query . '%');
            });
        }
        $perItem = $request->input('per_item', 10);
        $data = $data->paginate($perItem)->toArray();
    
        return response()->json($data, 200);
    }
    /**
     * Handle Create Medicine Inventory Data
    */
    public function createInventories(Request $request)
    {
        // Validation
        $validators = validator::make($request->all(), [
            "data.*.inv_id" => 'required|max:100|unique:inventories',
            "data.*.manufacture_date" => 'required',
            "data.*.expiry_date" => 'required',
            "data.*.supplier_id" => "required",
            "data.*.category_id" => "required",
            "data.*.group_name" => "required",
            "data.*.medicine_name" => "required",
            "data.*.medicine_dosage" => 'required',
            "data.*.origin_name" => "required",
            "data.*.medicine_size" => "required",
            "data.*.unit_price" => 'required',
            "data.*.quantity" => 'required',
            "data.*.amount" => 'required',
            "data.*.sub_total" => 'required',
        ], [
            'data.*.medicine_dosage.required' => 'Medicine Dosage is required.',
            'data.*.sub_total.required' => 'Net amount is required.',
            'data.*.quantity.required' => 'Medicine quantity is required.',
            'data.*.unit_price.required' => 'Medicine unit price is required.',
            'data.*.medicine_size.required' => 'Medicine size is required.',
            'data.*.origin_name.required' => 'Medicine origin is required.',
            'data.*.medicine_name.required' => 'Medicine name is required.',
            'data.*.group_name.required' => 'Medicine group is required.',
            'data.*.category_id.required' => 'Medicine category is required.',
            'data.*.supplier_id.required' => 'Supplier id is mandatory.',
            'data.*.expiry_date.required' => 'Medicine expiry date is required.',
            'data.*.manufacture_date.required' => 'Medicine manufacture date is required.',
            'data.*.inv_id.unique' => 'The inventory id has already taken.',
        ]);
        if ($validators->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages(),
            ]);
        } else {
            // Assuming $request contains the validated data
            foreach ($request->data as $item) {

                Inventory::create([
                    "inv_id" => $item['inv_id'],
                    "manufacture_date" => $item['manufacture_date'],
                    "expiry_date" => $item['expiry_date'],
                    "supplier_id" => $item['supplier_id'],
                    "category_id" => $item['category_id'],
                    "medicine_group" => $item['group_name'],
                    "medicine_name" => $item['medicine_name'],
                    "medicine_dosage" => $item['medicine_dosage'],
                    "medicine_origin" => $item['origin_name'],
                    "medicine_size" => $item['medicine_size'],
                    "price" => $item['unit_price'],
                    "quantity" => $item['quantity'],
                    "amount" => $item['amount'],
                    "sub_total" => $item['sub_total'],
                    // 'status' => 1,
                    "vat_percentage" => $item['vat'],
                    "tax_percentage" => $item['tax'],
                    'discount_percentage' => isset($item['discount_percentage']) ? $item['discount_percentage'] : 0,
                    "user_id" => Auth::user()->id,
                ]);
                
            }
        }

        //$request->created_by = Auth::user()->id;
        return response()->json([
            'messages' => 'Inventory has created successfully.',
            'code' => 200,
        ]);
    }
    /**
     * Handle Edit Medicine Inventory Data
    */
    public function editInventories($inventory_id)
    {
        $inventories = Inventory::find($inventory_id);
        if ($inventories) {
            return response()->json([
                'status' => 200,
                'messages' => $inventories,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'The inventory is not found',
            ]);
        }
    }
    /**
     * Handle Update Medicine Inventory Data
    */
    public function updateInventories(Request $request, $inventory_id)
    {
        $validator = validator::make($request->all(), [
            'inv_id' => 'required',
            'manufacture_date' => 'required',
            'expiry_date' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'medicine_group' => 'required',
            'medicine_name' => 'required|max:191',
            'medicine_dosage' => 'required|max:191',
            'medicine_size' => 'required|max:191',
            'quantity' => 'required',
            'amount' => 'required',
            'status_inv' => 'required',
        ], [
            'medicine_dosage.required' => 'Medicine Dosage is required.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $inventories = Inventory::find($inventory_id);
            if ($inventories) {
                $inventories->inv_id = $request->input('inv_id');
                $inventories->manufacture_date = $request->input('manufacture_date');
                $inventories->expiry_date = $request->input('expiry_date');
                $inventories->supplier_id = $request->input('supplier_id');
                $inventories->category_id = $request->input('category_id');
                $inventories->medicine_group = $request->input('medicine_group');
                $inventories->medicine_name = $request->input('medicine_name');
                $inventories->medicine_dosage = $request->input('medicine_dosage');
                $inventories->medicine_origin = $request->input('medicine_origin');
                $inventories->medicine_size = $request->input('medicine_size');
                $inventories->price = $request->input('price');
                $inventories->quantity = $request->input('quantity');
                $inventories->amount = $request->input('amount');
                $inventories->vat_percentage = $request->input('vat_percentage');
                $inventories->tax_percentage = $request->input('tax_percentage');
                $inventories->vat_percentage = $request->input('vat_percentage');
                $inventories->sub_total = $request->input('sub_total');
                $inventories->status_inv = $request->input('status_inv');
                $inventories->updated_by = Auth::user()->id;
                $inventories->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'The inventory has updated successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'The inventory is not found',
                ]);
            }
        }
    }
}
