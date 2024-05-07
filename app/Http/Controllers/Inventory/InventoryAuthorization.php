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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class InventoryAuthorization extends Controller
{
    // Inventory Authorize Page
    public function index()
    {
        $roles = Role::whereIn('id', [2,3,4,5,6,7])->get();
        $users = User::whereHas('roles', function($query) {
            $query->whereIn('id', [2, 3, 4, 5, 6, 7]);
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

    public function inventoryPermission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'user_id' => 'required',
            'permission' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'role_id.required' => 'The Role id is required.',
            'user_id.required' => 'The user id is required.',
            'permission.required' => 'The permission is required.',
            'start_date.required' => 'The start date is required.',
            'end_date.required' => 'The end date is required.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        // Retrieve inventory data according to date range
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));

        $inventories = Inventory::whereBetween('created_at', [$start_date, $end_date])->get();

        // Create new records based on the data provided
        foreach ($inventories as $inventory) {
            if (Auth::user()->hasRole($request->input('role_id'))) {
                Inventory::create([
                    "role_id" => $request->input('role_id'),
                    "email" => $request->input('email'),
                    "permission" => $request->input('permission'),
                    "approved_by" => Auth::user()->id,
                ]);
            }
        }

        return response()->json([
            'messages' => 'Inventory permissions have been justified',
            'code' => 200,
        ]);
    }


    // public function inventoryPermission(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'role_id' => 'required',
    //         'user_id' => 'required',
    //         'permission' => 'required',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //     ], [
    //         'role_id.required' => 'The Role id is required.',
    //         'user_id.required' => 'The user id is required.',
    //         // 'email.email' => 'The email must be a valid email address.',
    //         'permission.required' => 'The permission is required.',
    //         'start_date.required' => 'The start date is required.',
    //         'end_date.required' => 'The end date is required.',
    //         'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 400,
    //             'errors' => $validator->messages(),
    //         ]);
    //     }

    //     // Retrieve inventory data according to date range and filter by certain columns
    //     $start_date = date('Y-m-d', strtotime($request->input('start_date')));
    //     $end_date = date('Y-m-d', strtotime($request->input('end_date')));

    //     $inventories = Inventory::whereBetween('created_at', [$start_date, $end_date])
    //         ->where(function ($query) use ($request) {
    //             $query->whereIn('role_id', $request->input(['role_id']))
    //                 ->orWhereIn('user_id', $request->input(['user_id']))
    //                 ->orWhereIn('permission', $request->input(['permission']))
    //                 ->orWhereIn('approved_by', $request->input(['approved_by']));
    //         })
    //         ->get();

    //     // Create new records based on the data provided
    //     foreach ($request->data as $item) {
    //         foreach ($inventories as $inventory) {
    //             if (Auth::user()->hasRole($item['role_id'])) {
    //                 Inventory::create([
    //                     "role_id" => $item['role_id'],
    //                     "user_id" => $item['user_id'],
    //                     "permission" => $item['permission'],
    //                     "approved_by" => Auth::user()->id,
    //                 ]);
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'message' => 'Inventory permissions have been successfully justified.',
    //         'code' => 200,
    //     ]);
    // }




}
