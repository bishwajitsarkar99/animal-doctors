<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class GroupController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Medicine Group View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewMedicineGroup();
    }

    // Fetch Group Data
    public function getmedicinegroup(Request $request)
    {
        return $this->productIteamsServiceProvider->getMedicineGroups($request);
    }

    // Add Group
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createMedicineGroup($request);
    }

    // Edit Group
    public function editmedicinegroup($id)
    {
        return $this->productIteamsServiceProvider->editMedicineGroups($id);
    }

    // Update Group
    public function updatemedicinegroup(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateMedicineGroups($request, $id);
    }

    // Delete Group
    public function deletemedicinegroup($id)
    {
        return $this->productIteamsServiceProvider->deleteMedicineGroup($id);
    }

    // Group-Status-Update
    public function updatemedicinegroupStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->MedicineGroupStatusUpdate($request);
    }
}
