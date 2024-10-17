<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class CategoryController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }
    
    // Category View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewCategory();
    }

    // Get Category
    public function getCategory(Request $request)
    {
        return $this->productIteamsServiceProvider->getCategories($request);
    }

    // Add Cateogry
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createCategory($request);
    }

    // Edit Category
    public function editCategory($id)
    {
        return $this->productIteamsServiceProvider->editCategories($id);
    }

    // Update Category
    public function updateCategory(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateCategories($request, $id);
    }

    // Delete Category
    public function deleteCategory($id)
    {
        return $this->productIteamsServiceProvider->deleteCategories($id);
    }

    // Category-Status-Update
    public function updateCategoryStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->categoriesStatusUpdate($request);
    }
}
