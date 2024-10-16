<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\LogicBild\SuperAdmin\SuperAdminService;
use App\LogicBild\SettingService\AppSettingService;

class SuperAdminController extends Controller
{
    protected $superAdminService, $appSettingService;

    // Inject the SuperAdminService
    public function __construct(SuperAdminService $superAdminService, AppSettingService $appSettingService)
    {
        $this->superAdminService = $superAdminService;
        $this->appSettingService = $appSettingService;
    }

    //  Show Super Admin Dashboard Page
    public function dashboard()
    {
        return $this->superAdminService->dashboardDataLoad();
    }

    //  Show Super Admin Get User Page
    public function users()
    {
        // $users = User::latest()->paginate(1);
        return view('super-admin.users');
    }

    // Search Account-Holders Data----------
    public function accounts_holders(Request $request)
    {
        return $this->superAdminService->accounts_holder($request);
    }

    // Fetch Users Data-----------
    public function getusers(Request $request)
    {
        return $this->superAdminService->getuser($request);
    }

    // User Status Update---------
    public function update_status(Request $request)
    {
        return $this->superAdminService->update_statu($request);
    }

    // Edit Users -----------
    public function editUsers($id)
    {
        return $this->superAdminService->editUser($id);
    }

    // View Users -----------
    public function showUsers($id)
    {
        return $this->superAdminService->showUser($id);
    }

    // Update Users ------------
    public function updateUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return $this->superAdminService->updateUser($request, $user);
    }

    // Delete Users Data-----------
    public function deleteUsers($id)
    {
        return $this->superAdminService->deleteUser($id);
    }

    // Manage Role-----------
    public function manageRole()
    {
        return $this->superAdminService->manageRoles();
    }

    // Update Manage Role-----------
    public function updateRole(Request $request)
    {
        return $this->superAdminService->updateRoles($request);
    }
    
    // Email Verification Page Load
    public function loadEmailVerification(Request $request)
    {
        return $this->superAdminService->loadEmailVerifications($request);
    }

    // Email Verification Manage
    public function updateEmailStatus(Request $request)
    {
        return $this->superAdminService->emailVerificationManage($request);
    }

    // Auth Page Load -----------------
    public function loadAuthPage(Request $request)
    {   
        return $this->superAdminService->loadAuthPages($request);
    }

    // filter page item
    public function pageItemFilter(Request $request, $page_id)
    {
        return $this->superAdminService->pageItemFilters($request, $page_id);
    }

    // Auth Manage -----------------
    public function authManagePage(Request $request, $id)
    {
        return $this->superAdminService->authManagePages($request, $id);
    }

    // Company Profile--------------
    public function appSetting()
    {
        return view('super-admin.setting.app-setting.index');
    }

    // Company Profile Setting Update--------------
    public function appSettingUpdate(Request $request)
    {
       return $this->appSettingService->appSettings($request);
    }
}
