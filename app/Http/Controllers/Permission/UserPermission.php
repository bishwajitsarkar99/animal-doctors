<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Permission\UserPermissionService;

class UserPermission extends Controller
{
    protected $userPermissionService;

    // inject UserPermissionService
    public function __construct(UserPermissionService $userPermissionService)
    {
        return $this->userPermissionService = $UserPermissionService;
    }

    // User Permission Home Page
    public function index(Request $request){
        return $this->userPermissionService->viewUserPermission($request);
    }
}
