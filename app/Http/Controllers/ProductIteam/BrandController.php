<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class BrandController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Brand View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewBrand();
    }

    // Get Brand Name
    public function getbrand(Request $request)
    {
        return $this->productIteamsServiceProvider->getBrands($request);
    }
    // Get Origin Data
    public function getDataOrigin(Request $request)
    {
        return $this->productIteamsServiceProvider->getOrigins($request);
    }
    // Add Brand Name
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createBrands($request);
    }

    // Edit Brand Name
    public function editbrand($id)
    {
        return $this->productIteamsServiceProvider->editBrands($id);
    }

    // Update Brand Name
    public function updatebrand(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateBrands($request, $id);
    }

    // Delete Brand Name
    public function deletebrand($id)
    {
        return $this->productIteamsServiceProvider->deleteBrands($id);
    }

    // Brand-Status-Update
    public function updatebrandStatus(Request $request){
        return $this->productIteamsServiceProvider->brandUpdateStatus($request);
    }
}
