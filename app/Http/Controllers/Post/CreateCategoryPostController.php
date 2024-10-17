<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\LogicBild\Post\PostServiceProvider;

class CreateCategoryPostController extends Controller
{   
    protected $postServiceProvider;

    // inject PostServiceProvider
    public function __construct(PostServiceProvider $postServiceProvider)
    {
        return $this->postServiceProvider = $postServiceProvider;
    }

    // Category-List View
    public function index()
    {
        return $this->postServiceProvider->viewCategoriesPostList();
    }

    // Create-Category Page
    public function createCategoryPost()
    {
        return $this->postServiceProvider->viewCategoriesPost();
    }

    // Post-Category
    public function storeData(CategoryFormRequest $request)
    {
        return $this->postServiceProvider->createPostCategories($request);
    }

    // Edit post-cateogry
    public function editCateg($category_id)
    {
        return $this->postServiceProvider->editPostCategories($category_id);
    }

    // Update post-category
    public function updateCateg(CategoryFormRequest $request,$category_id)
    {
        return $this->postServiceProvider->updatePostCategories($request,$category_id);
    }
}
