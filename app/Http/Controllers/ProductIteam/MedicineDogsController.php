<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class MedicineDogsController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Medicine Dosage View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewMedicineDosage();
    }

    // Get Medicine Dosage
    public function getmedicinedogs(Request $request)
    {
        return $this->productIteamsServiceProvider->getMedicineDosages($request);
    }
    
    // Add Medicine Dosage
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createMedicineDosages($request);
    }

    // Edit Medicine Dosage
    public function editmedicinedogs($id)
    {
        return $this->productIteamsServiceProvider->editMedicineDosages($id);
    }

    // Update Medicine Dosage
    public function updatemedicinedogs(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateMedicineDosages($request, $id);
    }

    // Delete Medicine Dosage
    public function deletemedicinedogs($id)
    {
        return $this->productIteamsServiceProvider->deleteMedicineDosages($id);
    }

    // Medicine-Dosage-Status-Update
    public function updatemedicinedogsStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->MedicineDosageStatus($request);
    }
}
