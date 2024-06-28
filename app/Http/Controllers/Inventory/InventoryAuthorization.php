<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Medicine\Inventory;
use App\Models\MedicineGroup;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission\inventoryPermission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventoryAuthorization extends Controller
{
    // Inventory Authorize Page
    public function index(Request $request)
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
    // Get user for role dropdown
    public function getSelectRole(Request $request ,$selectedRole){
        
        $users = User::whereHas('roles', function($query) use ($selectedRole) {
            $query->where('id', $selectedRole);
        })->get();
    
        return response()->json([
            'users' => $users
        ]);
    }
    // Search Talble id for permission form
    public function searchInventory(Request $request)
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
    // Get Inventories Data for authorize
    public function getInventoryData(Request $request){
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

    // Inventory Authorization 
    public function inventoryAuthorize(Request $request)
    {
        $inventory_id = (int)$request->input('inventory_id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Inventory::findOrFail($inventory_id);
        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The Inventory has Authorized Successfully',
            'code' => 202,
        ], 202);
    }
    // Inventoy Token Or Id Store for Inventory Data
    public function inventoryPermission(Request $request)
    {
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
    // Inventory Permission Table Data Get
    public function inventoryPermissionGet(Request $request)
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

    // Access Permission for inventory
    public function inventoryPermissionStatusUpdate(Request $request){
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

    // Delete Inventory Permission
    public function inventoryPermissionDelete($id)
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

    // Token send for data update
    public function inventoryToken(Request $request, $inventory_id)
    {
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
    
}
