<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class SubCategoryController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Sub Category View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewSubCategories();
    }

    // Get Sub-Category
    public function getSubCategory(Request $request)
    {
        return $this->productIteamsServiceProvider->getSubCategories($request);
    }

    // Get Cateogry
    public function getCategories(Request $request)
    {
        return $this->productIteamsServiceProvider->getCategoriesData($request);
    }

    // Add Sub-Cateogry
    public function storeData(Request $request)
    {
        return $this->productIteamsServiceProvider->createSubCategories($request);
    }

    // Edit Sub-Category
    public function editSubCategory($id)
    {
        return $this->productIteamsServiceProvider->editSubCategories($id);
    }

    // Update Sub-Category
    public function updateSubCategory(Request $request, $id)
    {
        return $this->productIteamsServiceProvider->updateSubCategories($request, $id);
    }

    // Delete Sub-Category
    public function deleteSubCategory($id)
    {
        return $this->productIteamsServiceProvider->deleteSubCategories($id);
    }

    // SubCategory-Status-Update
    public function updateSubCategoryStatus(Request $request)
    {
        return $this->productIteamsServiceProvider->subCategoriesStatusUpdate($request);
    }
}
