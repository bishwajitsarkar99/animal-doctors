<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\CompanyProfile;
use App\Models\Post\PostCategory;
use App\Models\Post\PostTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class CreatePostController extends Controller
{
    // Post-List
    public function index()
    {
        $posts = PostTable::where('navbar_status','=',0)->latest()->paginate(10);
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.post.blog-post.post-list.index', compact('company_profiles','posts'));
    }

    // Create-post
    public function createPost()
    {
        $category = PostCategory::where('status','=',0)->get();
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.post.blog-post.post-create.create', compact('company_profiles','category'));
    }

    // Post-Store Data
    public function storeData(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new PostTable;
        $post->category_id = $data['category_id'];
        $post->post_title = $data['post_title'];
        $post->slug = $data['slug'];
        $post->category_name = $data['category_name'];
        $post->sub_category_name = $data['sub_category_name'];
        $post->meta_title = $data['meta_title'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->meta_description = $data['meta_description'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];

        $post->navbar_status = $request->navbar_status == true ? '1':'0';
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->save();
        return redirect('admin/post-list')->with('success', 'The post has added successfully.');
    }

    // Edit Post
    public function editPost($id)
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $category = PostCategory::where('status','=',0)->get();
        $posts = PostTable::find($id);
        return view('admin.post.blog-post.post-edit.edit',compact('company_profiles','category','posts'));
    }

    // Update Post
    public function updatePost(PostFormRequest $request,$id)
    {
        $data = $request->validated();

        $post = PostTable::find($id);
        $post->category_id = $data['category_id'];
        $post->post_title = $data['post_title'];
        $post->slug = $data['slug'];
        $post->category_name = $data['category_name'];
        $post->sub_category_name = $data['sub_category_name'];
        $post->meta_title = $data['meta_title'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->meta_description = $data['meta_description'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];

        $post->status = $request->status == true ? '1':'0';
        $post->update();
        return redirect('admin/post-list')->with('success', 'The post has updated successfully.');
    }
}
