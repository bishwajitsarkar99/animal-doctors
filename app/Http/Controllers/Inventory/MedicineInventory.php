<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Permission\InventoryPermissionServiceProvider;

class MedicineInventory extends Controller
{
    protected $inventoryPermissionServiceProvider;

    // inject InventoryPermissionServiceProvider
    public function __construct(InventoryPermissionServiceProvider $inventoryPermissionServiceProvider)
    {
        return $this->inventoryPermissionServiceProvider = $inventoryPermissionServiceProvider;
    }

    // inventory index page
    public function index()
    {
        return $this->inventoryPermissionServiceProvider->viewMedicineInventories();
    }

    // get inventory for edit table
    public function getData(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->get_data($request); 
    }
    
    // get inventory unauthorized data
    public function unauthorizedData(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->un_authorized_data($request); 
    }

    // inventory data store
    public function store(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->createInventories($request); 
    }
    
    // Inventory Edit
    public function editInventory($inventory_id)
    {
        return $this->inventoryPermissionServiceProvider->editInventories($inventory_id);
    }

    // Inventory Update
    public function updateInventory(Request $request, $inventory_id)
    {
        return $this->inventoryPermissionServiceProvider->updateInventories($request, $inventory_id); 
    }
}
