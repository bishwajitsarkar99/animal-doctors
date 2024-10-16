<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogicBild\SubAdmin\SubAdminService;

class SubAdminController extends Controller
{
    protected $subAdminService;

    // inject SubAdminService
    public function __construct(SubAdminService $subAdminService)
    {
        $this->subAdminService = $subAdminService;
    }
    
    // view sub admin dashboard
    public function dashboard()
    {    
        return $this->subAdminService->viewDashboard();
    }
}
