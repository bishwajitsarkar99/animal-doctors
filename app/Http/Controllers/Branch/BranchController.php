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
    public function index(Request $request, $slug)
    {
        return $this->branchServiceProvider->viewBranchTemplate($request, $slug);
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

    // Create Branch Type
    public function branchTypeStore(Request $request)
    {
        return $this->branchServiceProvider->createBranchType($request);
    }

    // Search Branch Type
    public function searchBranchType(Request $request)
    {
        return $this->branchServiceProvider->searchBranchTypes($request);
    }

    // Edit Branch Type
    public function editBranchType($id)
    {
        return $this->branchServiceProvider->editBranchTypes($id);
    }

    // Update Branch Type
    public function updateBranchType(Request $request, $id)
    {
        return $this->branchServiceProvider->updateBranchTypes($request, $id);
    }

    // Delete Branch Type
    public function deleteBranchType($id)
    {
        return $this->branchServiceProvider->deleteBranchTypes($id);
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

    // Branch Create Page Url id generate
    public function redirectWithRandomAdminBranchAccess()
    {
        return $this->branchServiceProvider->redirectWithRandomAdminBranchAccessId();
    }

    // Branch Admin Access View
    public function branchAccessView(Request $request, $random, $page_authorize)
    {
        return $this->branchServiceProvider->branchAdminAccessView($request, $random, $page_authorize);
    }

    // Branch Data Fetch
    public function branchDataFetch(Request $request)
    {
        return $this->branchServiceProvider->branchDataFetchs($request);
    }

    // Branch Data Fetch
    public function userBranchDataFetch(Request $request)
    {
        return $this->branchServiceProvider->userBranchDataFetchs($request);
    }

    // Branch User Email Data Fetch
    public function branchUserEmail(Request $request)
    {
        return $this->branchServiceProvider->branchFetchUserEmail($request);
    }

    // Branch Name Query/Search
    public function branchSearchName(Request $request, $id)
    {
        return $this->branchServiceProvider->branchSearchNames($request, $id); 
    }

    // Branch Admin Access Store
    public function branchAcessStore(Request $request)
    {
        return $this->branchServiceProvider->branchAdminAcessStore($request);
    }

    // Branch Admin Access
    public function accessBranch(Request $request)
    {
        return $this->branchServiceProvider->accessBranchAdmin($request);
    }

    // Admin Branch Fetch
    public function adminBranchChangeFetch(Request $request)
    {
        return $this->branchServiceProvider->adminBranchChangesFetch($request);
    }

    // Admin Branch Change
    public function adminBranchChange(Request $request, $id)
    {
        return $this->branchServiceProvider->adminBranchChanges($request, $id);
    }

    // Admin Branch Delete
    public function adminBranchDelete(Request $request, $id)
    {
        return $this->branchServiceProvider->adminBranchsDelete($request, $id);
    }

    // Branch Create Page Url id generate
    public function redirectWithRandomUserBranchAccess()
    {
        return $this->branchServiceProvider->redirectWithRandomUserBranchAccessId();
    }

    // Branch User Access Permission View
    public function branchAccessUserPermission(Request $request, $random, $page_authorize)
    {
        return $this->branchServiceProvider->branchAccessUserPermissionView($request, $random, $page_authorize);
    }

    // Branch Search Data For Create
    public function branchSearchSpecify(Request $request)
    {
        return $this->branchServiceProvider->getSpecifyBranch($request);
    }

    // Branch Get Data For Create
    public function branchGetData(Request $request, $id)
    {
        return $this->branchServiceProvider->branchGet($request, $id);
    }

    // Branch User Access Permission Create
    public function permissionCreate(Request $request)
    {
        return $this->branchServiceProvider->userBranchPermissionCreate($request);
    }

    // Branch User Access Permission To Get Role
    public function permission_role(Request $request, $id)
    {
        return $this->branchServiceProvider->userBranchFetchRole($request, $id);
    }

    // Branch User Access Permission To Get Email
    public function permission_email(Request $request, $id)
    {
        return $this->branchServiceProvider->userBranchFetchEmail($request, $id);
    }

    // Branch User Access Permission Edit
    public function permissionEdit($id)
    {
        return $this->branchServiceProvider->userBranchPermissionEdit($id);
    }

    // Branch User Access Permission Edit
    public function userBranchChange($id)
    {
        return $this->branchServiceProvider->userBranchChangeEdit($id);
    }

    // Branch User Access Permission Update
    public function permissionUpdate(Request $request, $id)
    {
        return $this->branchServiceProvider->userBranchPermissionChange($request, $id);
    }

    // Branch User Access Permission Delete
    public function permissionDelete(Request $request, $id)
    {
        return $this->branchServiceProvider->userBranchPermissionDelete($request, $id);
    }

    // Branch User Access Permission
    public function permissionBranch(Request $request)
    {
        return $this->branchServiceProvider->userBranchAccessPermission($request);
    }


}
