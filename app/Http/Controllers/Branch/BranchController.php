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

    // Branch Access
    public function accessBranch(Request $request)
    {
        return $this->branchServiceProvider->accessBranchs($request);
    }

    // Branch Access Permission
    public function permissionBranch(Request $request)
    {
        return $this->branchServiceProvider->permissionBranchs($request);
    }
}
