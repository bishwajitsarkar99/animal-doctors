<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Supplier\SupplierServiceProvider;

class SupplierController extends Controller
{
    protected $supplierServiceProvider;

    // inject SupplierServiceProvider
    public function __construct(SupplierServiceProvider $supplierServiceProvider)
    {
        return $this->supplierServiceProvider = $supplierServiceProvider;
    }

    // Supplier Home Page
    public function index()
    {
        return $this->supplierServiceProvider->viewSupplier();
    }

    // Branch Fetch
    public function branchFetch(Request $request, $id)
    {
        return $this->supplierServiceProvider->branchToFetch($request, $id);
    }

    // Supplier Permission Part
    public function Supplier_Access_Permission(Request $request)
    {
        return $this->supplierServiceProvider->Supplier_Access_Permissions($request);
    }

    // Dropdown item email
    public function getUserEmail(Request $request ,$selectedUserRole)
    {
        return $this->supplierServiceProvider->getUserEmails($request ,$selectedUserRole);
    }

    // Permission Access Store
    public function storeUserPermission(Request $request)
    {
        return $this->supplierServiceProvider->createPermission($request);
    }

    // Permission Edit
    public function editUserPermission($id)
    {
        return $this->supplierServiceProvider->editPermission($id);
    }

    // Permission Update
    public function updateUserPermission(Request $request, $id)
    {
        return $this->supplierServiceProvider->updatePermission($request, $id);
    }

    // Permission Delete
    public function deleteUserPermission($id)
    {
        return $this->supplierServiceProvider->deletePermission($id);
    }

    // Permission Status Update
    public function permissionUserStatusUpdate(Request $request)
    {

    }

    // Get Supplier
    public function getSupplier(Request $request)
    {
        return $this->supplierServiceProvider->getSuppliers($request);
    }

    // Store Supplier
    public function stroeData(Request $request)
    {
        return $this->supplierServiceProvider->createSupplier($request);
    }

    // Edit Supplier
    public function editSupplier($id)
    {
        return $this->supplierServiceProvider->editSuppliers($id);
    }

    // Update Supplier
    public function updateSupplier(Request $request, $id)
    {
        return $this->supplierServiceProvider->updateSuppliers($request, $id);
    }

    // View Supplier
    public function viewSupplier($id)
    {
        return $this->supplierServiceProvider->viewSuppliers($id); 
    }

    // Delete Supplier
    public function deleteSupplier($id)
    {
        return $this->supplierServiceProvider->deleteSuppliers($id); 
    }

    // Supplier Status Update
    public function updatesupplierStatus(Request $request)
    {
        return $this->supplierServiceProvider->supplierStatusUpdate($request); 
    }
}
