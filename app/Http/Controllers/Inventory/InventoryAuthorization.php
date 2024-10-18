<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\LogicBild\Permission\InventoryPermissionServiceProvider;

class InventoryAuthorization extends Controller
{
    protected $inventoryPermissionServiceProvider;

    // inject InventoryPermissionServiceProvider
    public function __construct(InventoryPermissionServiceProvider $inventoryPermissionServiceProvider)
    {
        return $this->inventoryPermissionServiceProvider = $inventoryPermissionServiceProvider;
    }

    // Inventory Authorize Page
    public function index(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->viewInventoryAuthorization($request);
    }
    // Get user for role dropdown
    public function getSelectRole(Request $request ,$selectedRole)
    {
        return $this->inventoryPermissionServiceProvider->getSelectRoles($request ,$selectedRole);
    }
    // Search Talble id for permission form
    public function searchInventory(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->searchInventories($request); 
    }
    // Get Inventories Data for authorize
    public function getInventoryData(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->getInventoriesData($request); 
    }

    // Inventory Authorization 
    public function inventoryAuthorize(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->inventoriesAuthorize($request); 
    }

    // Inventoy Token Or Id Store for Inventory Data
    public function inventoryPermission(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->inventoriesPermission($request); 
    }

    // Inventory Permission Table Data Get
    public function inventoryPermissionGet(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->inventoriesPermissionGet($request); 
    }

    // Access Permission for inventory
    public function inventoryPermissionStatusUpdate(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->inventoriesPermissionStatusUpdate($request);
    }

    // Delete Inventory Permission
    public function inventoryPermissionDelete($id)
    {
        return $this->inventoryPermissionServiceProvider->inventoriesPermissionDelete($id);
    }

    // Token send for data update
    public function inventoryToken(Request $request, $inventory_id)
    {
        return $this->inventoryPermissionServiceProvider->inventoriesToken($request, $inventory_id);
    }
    
}
