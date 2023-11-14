<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Post\PostCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;


class CreateCategoryPostController extends Controller
{   
    // Category-List
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $category = PostCategory::where('status','=',0)->latest()->paginate(10);
        return view('admin.post.blog-post.index',compact('company_profiles','category'));
    }

    // Create-Category
    public function createCategoryPost()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.post.blog-post.add-category.create',compact('company_profiles'));
    }

    // Post-Category
    public function storeData(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new PostCategory;
        $category->post_title = $data['post_title'];
        $category->slug = $data['slug'];
        $category->category_name = $data['category_name'];
        $category->sub_category_name = $data['sub_category_name'];
        $category->meta_title = $data['meta_title'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->meta_description = $data['meta_description'];
        $category->description = $data['description'];

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('post/category/', $filename);
            $category->image = $filename;
        }

        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/categories-list')->with('success', 'The category has added successfully.');
    }

    // Edit post-cateogry
    public function editCateg($category_id)
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $category = PostCategory::find($category_id);
        return view('admin.post.blog-post.edit-category.edit', compact('category','company_profiles'));
    }

    // Update post-category
    public function updateCateg(CategoryFormRequest $request,$category_id)
    {
        $data = $request->validated();

        $category = PostCategory::find($category_id);
        $category->post_title = $data['post_title'];
        $category->slug = $data['slug'];
        $category->category_name = $data['category_name'];
        $category->sub_category_name = $data['sub_category_name'];
        $category->meta_title = $data['meta_title'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->meta_description = $data['meta_description'];
        $category->description = $data['description'];

        if($request->hasfile('image'))
        {
            $destination = 'post/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('post/category/', $filename);
            $category->image = $filename;
        }

        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->update();
        return redirect('admin/categories-list')->with('success', 'The category has updated successfully.');
    }
}
