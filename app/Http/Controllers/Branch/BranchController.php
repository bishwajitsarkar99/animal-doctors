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
}
