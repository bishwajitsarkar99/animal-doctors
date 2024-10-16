<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogicBild\Admin\AdminService;

class AdminController extends Controller
{
    protected $adminService;
    // inject AdminService
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    // view admin dashboard
    public function dashboard()
    {
        return $this->adminService->viewDashboard();
    }
}
