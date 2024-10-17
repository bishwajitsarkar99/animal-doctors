<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class UnitController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Units View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewUnits();
    }

    // Get Units Name
    public function getunits(Request $request)
    {
        return $this->productIteamsServiceProvider->getUnits($request);
    }

    // Add Units Name
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createUnits($request);
    }

    // Edit Units Name
    public function editunits($id)
    {
        return $this->productIteamsServiceProvider->editUnits($id);
    }

    // Update Units Name
    public function updateunits(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateUnits($request, $id);
    }

    // Delete Units Name
    public function deleteunits($id)
    {
        return $this->productIteamsServiceProvider->deleteUnits($id);
    }

    // Units-Status-Update
    public function updateunitsStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->UnitsStatusUpdate($request);
    }
}
