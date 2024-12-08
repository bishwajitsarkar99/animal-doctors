<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Branch\BranchServiceProvicer;

class BranchController extends Controller
{
    protected $branchServiceProvider;

    public function __construct(BranchServiceProvicer $branchServiceProvider)
    {
        return $this->branchServiceProvider = $branchServiceProvider;
    }

    // Branch Page View
    public function index(Request $request)
    {
        return $this->branchServiceProvider->viewBranchTemplate($request);
    }

    // Get Division Name
    public function getDivision(Request $request)
    {
        return $this->branchServiceProvider->fetchDivision($request);
    }

    // Get District Name
    public function getDistrict(Request $request, $selectedDivision)
    {
        return $this->branchServiceProvider->fetchDistrict($request, $selectedDivision);
    }

    // Get Upazila Name
    public function getUpazila(Request $request, $selectedDistrict)
    {
        return $this->branchServiceProvider->fetchUpazila($request, $selectedDistrict);
    }

    // Create Branch
    public function store(Request $request)
    {
        return $this->branchServiceProvider->createBranch($request);
    }

    // Search Branch
    public function searchBranch(Request $request)
    {
        return $this->branchServiceProvider->searchBranchs($request);
    }

    // Edit Branch
    public function editBranch($id)
    {
        return $this->branchServiceProvider->editBranchs($id);
    }

    // Update Branch
    public function updateBranch(Request $request, $id)
    {
        return $this->branchServiceProvider->updateBranchs($request, $id);
    }

    // Delete Branch
    public function deleteBranch($id)
    {
        return $this->branchServiceProvider->deleteBranchs($id);
    }

    // Branch Admin Access View
    public function branchAccessView(Request $request)
    {
        return $this->branchServiceProvider->branchAdminAccessView($request);
    }

    // Branch Admin Access
    public function accessBranch(Request $request)
    {
        return $this->branchServiceProvider->accessBranchAdmin($request);
    }

    // Branch User Access Permission View
    public function branchAccessUserPermission(Request $request)
    {
        return $this->branchServiceProvider->branchAccessUserPermissionView($request);
    }

    // Branch User Access Permission Create
    public function permissionCreate(Request $request)
    {
        return $this->branchServiceProvider->userBranchPermissionCreate($request);
    }

    // Branch User Access Permission Edit
    public function permissionEdit($id)
    {
        return $this->branchServiceProvider->userBranchPermissionEdit($id);
    }

    // Branch User Access Permission Update
    public function perpermissionUpdatemissionEdit(Request $request, $id)
    {
        return $this->branchServiceProvider->userBranchPermissionUpdate($request, $id);
    }

    // Branch User Access Permission Delete
    public function permissionDelete($id)
    {
        return $this->branchServiceProvider->userBranchPermissionDelete($id);
    }

    // Branch User Access Permission
    public function permissionBranch(Request $request)
    {
        return $this->branchServiceProvider->userBranchAccessPermission($request);
    }


}
