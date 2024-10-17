<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\SettingService\PostSettingServiceProvider;

class PostSettngController extends Controller
{
    protected $postSettingServiceProvider;

    // inject PostSettingServiceProvider
    public function __construct(PostSettingServiceProvider $postSettingServiceProvider)
    {
        return $this->postSettingServiceProvider = $postSettingServiceProvider;
    }

    //post-category-setting view page
    public function index()
    {
        return $this->postSettingServiceProvider->viewPostSetting();
    }

    //get post-category
    public function getPost(Request $request)
    {
        return $this->postSettingServiceProvider->getPostCategories($request);
    }

    // post-category-hide status update
    public function updatepostCategoryStatus(Request $request)
    {
        return $this->postSettingServiceProvider->postCategoryStatusUpdate($request);
    }

    // post-category-delete
    public function deletePostCategory(Request $request ,$folder ,$filename ,$id)
    {
        return $this->postSettingServiceProvider->deletePostCategories($request ,$folder ,$filename ,$id);
    }

    //get-Post-data
    public function getMainPost(Request $request)
    {
        return $this->postSettingServiceProvider->getMainPosts($request);
    }

    //main-post update status
    public function updateMainPostStatus(Request $request)
    {
        return $this->postSettingServiceProvider->mainPostStatusUpdate($request);
    }

    // post-delete
    public function deleteMainPost($id)
    {
        return $this->postSettingServiceProvider->deleteMainPosts($id);
    }
}
