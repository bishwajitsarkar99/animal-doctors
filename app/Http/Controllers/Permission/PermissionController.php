<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Permission\InventoryPermissionServiceProvider;

class PermissionController extends Controller
{
    protected $inventoryPermissionServiceProvider;

    // inject InventoryPermissionServiceProvider
    public function __construct(InventoryPermissionServiceProvider $inventoryPermissionServiceProvider)
    {
        return $this->inventoryPermissionServiceProvider = $inventoryPermissionServiceProvider;
    }

    // Inventory Permission Home Page
    public function index(Request $request){
        return $this->inventoryPermissionServiceProvider->viewInventoryPermission($request);
    }

    // Get Email in Dropdown iteam
    public function getEmail(Request $request ,$selectedRole)
    {
        return $this->inventoryPermissionServiceProvider->getEmails($request ,$selectedRole);
    }

    // Permission Access Store
    public function storePermission(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->createPermission($request);
    }

    // Permission Edit
    public function editPermission($id)
    {
        return $this->inventoryPermissionServiceProvider->editPermissions($id); 
    }

    // Permission Update
    public function updatePermission(Request $request, $id)
    {
        return $this->inventoryPermissionServiceProvider->updatePermissions($request, $id); 
    }

    // Permission Delete
    public function deletePermission($id){
        return $this->inventoryPermissionServiceProvider->deletePermissions($id); 
    }
    
}
