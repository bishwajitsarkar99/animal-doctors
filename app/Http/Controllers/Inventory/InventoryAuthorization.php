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


class InventoryAuthorization extends Controller
{
    // Inventory Authorize Page
    public function index()
    {
        $Inventory_permissions = InventoryPermission::orderBy('id', 'desc')->latest()->get();
        $roles = Role::whereIn('id', [2,3,4,5])->get();
        $users = User::whereHas('roles', function($query) {
            $query->whereIn('id', [2, 3, 4, 5]);
        })->get();
        $inventories = Inventory::all();
        $medicine_groups = MedicineGroup::all();
        foreach ($medicine_groups as $group) {
            $sum = $group->inventories()->sum('sub_total');
            $group->sub_total = $sum;
            $quantity = $group->inventories()->sum('quantity');
            $group->quantity = $quantity;
        }
        // Total Inventory
        // $totalInventory = Inventory::sum('sub_total');
        // $totalQuantity = Inventory::sum('quantity');
        // Weekly Inventory
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek(); 
        $weekly_inventories = Inventory::orderBy('inventory_id', 'desc')->latest()->whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('sub_total');
        $weekly_quantity = Inventory::orderBy('inventory_id', 'desc')->latest()->whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('quantity');
        // Monthly Inventory
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth(); 
        $monthly_inventories = Inventory::orderBy('inventory_id', 'desc')->latest()->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('sub_total');
        $monthly_quantity = Inventory::orderBy('inventory_id', 'desc')->latest()->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('quantity');

        return view('super-admin.inventory-authorize.index', compact( 'users','roles','medicine_groups','inventories','weekly_inventories', 'weekly_quantity', 'monthly_inventories', 'monthly_quantity'));   
    }

    // Inventory Data Search according to Date Range
    public function getInventoryData(Request $request){
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $results = Inventory::whereBetween('medicine_group', [$startDate, $endDate])->get();
    
        return response()->json(['results' => $results]);
    }

    // Get Inventory Data
    // public function getInventoryData(Request $request)
    // {
    // }

    // Get Inventory Data In Delete Table
    public function getInventoryDeleteData(Request $request)
    {
    }

    // Inventory Authorization 
    public function inventoryAuthorize(Request $request)
    {
    }
    // Delete Inventory
    public function inventoryDelete($id)
    {
    }
    // Inventoy Token Or Id Store for Inventory Data
    public function inventoryPermission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'mail_id' => 'required',
            'inventory_id' => 'required|unique:inventory_permissions,inventory_id',
            'issue_name' => 'required',
        ], [
            'role_id.required' => 'The Role id is required.',
            'mail_id.required' => 'The user mail is required.',
            'inventory_id.unique' => 'The inventory id has already taken.',
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
            $inventoryPermissions->inventory_id = $request->input('inventory_id');
            $inventoryPermissions->issue_name = $request->input('issue_name');
            $inventoryPermissions->approved_by = Auth::user()->id;
            $inventoryPermissions->save();
            return response()->json([
                'messages' => 'Inventory permission has been justified',
                'code' => 200,
            ]);
        }
    }
    // Inventory Token or id Get
    public function inventoryPermissionGet(Request $request)
    {
        // if (!$request->ajax()) {
        //     return abort(404);
        // }
        // $startOfMonth = Carbon::now()->startOfMonth();
        // $endOfMonth = Carbon::now()->endOfMonth();
    
        // $data = inventoryPermission::with(['roles','users'])
        //     ->orderBy('id', 'desc')
        //     ->latest()
        //     ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    
        // if ($query = $request->get('query')) {
        //     $data->Where('inventory_id', 'LIKE', '%' . $query . '%');
        // }
    
        // $perItem = $request->input('per_item', 10);
    
        // $data = $data->paginate($perItem)->toArray();
    
        // return response()->json($data, 200);




        if (!$request->ajax()) {
            //return abort(404);
        }
    
        // Extracting filter criteria from the request
        $role_id = $request->input('role_id');
        $inventory_id = $request->input('inventory_id');
        $permission_status = $request->input('permission_status');
    
        // Date range filter
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        // Query initialization
        $query = InventoryPermission::with(['roles', 'users'])
            ->orderBy('id', 'desc')
            ->latest();
    
        // Applying date range filter if provided
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [Carbon::parse($start_date), Carbon::parse($end_date)->endOfDay()]);
        }
        // Applying additional filter criteria if provided
        if ($role_id) {
            $query->where('role_id', $role_id);
        }
        if ($inventory_id) {
            $query->where('inventory_id', 'LIKE', '%' . $inventory_id . '%');
        }
        if ($permission_status !== null) {
            $query->where('permission_status', $permission_status);
        }
        // Paginate the results
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
        // $perItem = $request->input('per_item', 10);
    
        // $data = $data->paginate($perItem)->toArray();
    
        return response()->json($data, 200);
    }

    // Access Permission
    public function inventoryPermissionStatusUpdate(Request $request){
        $id = (int)$request->input('id');
        $permission_status = (bool)$request->input('permission_status');
        $permission_status = !$permission_status;

        $data = InventoryPermission::findOrFail( $id);

        $data->update([
            'permission_status' => (int)$permission_status,
        ]);

        return response()->json([
            'messages' => 'The Access Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }

}
