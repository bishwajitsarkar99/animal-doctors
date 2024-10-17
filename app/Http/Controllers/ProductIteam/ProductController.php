<?php

namespace App\Http\Controllers\Productiteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class ProductController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Product View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewProduct();
    }

    // Get Product
    public function getproduct(Request $request)
    {
        return $this->productIteamsServiceProvider->getProducts($request);
    }

    // Add Product
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createProduct($request);
    }

    // Edit Product
    public function editproduct($id)
    {
        return $this->productIteamsServiceProvider->editProduct($id);
    }

    // Update Product
    public function updateproduct(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateProduct($request, $id);
    }

    // Delete Product
    public function deleteproduct($id)
    {
        return $this->productIteamsServiceProvider->deleteProduct($id);
    }

    // Product-Status-Update
    public function updateproductStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->ProductStatusUpdate($request);
    }
}
