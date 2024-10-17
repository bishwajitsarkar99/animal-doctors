<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class MedicineNameController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Medicine Name View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewMedicineName();
    }

    // Get Medicine Name
    public function getmedicinename(Request $request)
    {
        return $this->productIteamsServiceProvider->getMedicineNames($request);
    }

    // Get Medicine Group
    public function getGroup(Request $request)
    {
        return $this->productIteamsServiceProvider->getGroups($request);
    }

    // Add Medicine Name
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createMedicineNames($request);
    }

    // Edit Medicine Name
    public function editmedicinename($id)
    {
        return $this->productIteamsServiceProvider->editMedicineNames($id);
    }
    // Update Medicine Name
    public function updatemedicinename(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateMedicineNames($request, $id);
    }

    // Delete Medicine Name
    public function deletemedicinename($id)
    {
        return $this->productIteamsServiceProvider->deleteMedicineNames($id);
    }

    // MedicineName-Status-Update
    public function updatemedicinenameStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->MedicineNameStatusUpdate($request);
    }
}
