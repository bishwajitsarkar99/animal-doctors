<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class ProductModelController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Product Model View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewProductModel();
    }

    // Get Model Name
    public function getmodel(Request $request)
    {
        return $this->productIteamsServiceProvider->getProductModels($request);
    }

    // Get Product Data
    public function getDataProduct(Request $request)
    {
        return $this->productIteamsServiceProvider->getDataProducts($request);
    }

    // Add Model Name
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createProductModels($request);
    }

    // Edit Model Name
    public function editmodel($id)
    {
        return $this->productIteamsServiceProvider->editProductModels($id); 
    }

    // Update mdoel Name
    public function updatemodel(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateProductModels($request, $id); 
    }

    // Delete Brand Name
    public function deletemodel($id)
    {
        return $this->productIteamsServiceProvider->deleteProductModels($id); 
    }

    // Product Mdoel Status-Update
    public function updatemodelStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->ProductModelStatusUpdate($request); 
    }
}
