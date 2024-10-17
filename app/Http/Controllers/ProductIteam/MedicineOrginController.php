<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class MedicineOrginController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Origin View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewOrigin();
    }

    // Get Origin Name
    public function getorigin(Request $request)
    {
        return $this->productIteamsServiceProvider->getOrigin($request);
    }

    // Add Origin Name
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createOrigins($request);
    }

    // Edit Origin Name
    public function editorigin($id)
    {
        return $this->productIteamsServiceProvider->editOrigins($id);
    }

    // Update Origin Name
    public function updateorigin(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateOrigins($request, $id);
    }

    // Delete Origin Name
    public function deleteorigin($id)
    {
        return $this->productIteamsServiceProvider->deleteOrigins($id);
    }

    // Origin-Status-Update
    public function updateoriginStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->originStatusUpdate($request);
    }
}
