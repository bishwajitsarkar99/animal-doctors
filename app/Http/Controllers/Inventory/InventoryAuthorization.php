<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Medicine\Inventory;
use App\Models\MedicineGroup;

class InventoryAuthorization extends Controller
{
    // Inventory Authorize Page
    public function index()
    {
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
        $weekly_inventories = Inventory::orderBy('medicine_group_id', 'desc')->latest()->whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('sub_total');
        $weekly_quantity = Inventory::orderBy('medicine_group_id', 'desc')->latest()->whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('quantity');
        // Monthly Inventory
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth(); 
        $monthly_inventories = Inventory::orderBy('medicine_group_id', 'desc')->latest()->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('sub_total');
        $monthly_quantity = Inventory::orderBy('medicine_group_id', 'desc')->latest()->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('quantity');

        return view('super-admin.inventory-authorize.index', compact( 'medicine_groups','inventories','weekly_inventories', 'weekly_quantity', 'monthly_inventories', 'monthly_quantity'));   
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
}
