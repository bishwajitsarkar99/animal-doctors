<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use App\LogicBild\Post\PostServiceProvider;

class CreatePostController extends Controller
{
    protected $postServiceProvider;

    // inject PostServiceProvider
    public function __construct(PostServiceProvider $postServiceProvider)
    {
        return $this->postServiceProvider = $postServiceProvider;
    }
    
    // Post-List
    public function index()
    {
        return $this->postServiceProvider->viewPostList();
    }

    // Create-post Page
    public function createPost()
    {
        return $this->postServiceProvider->createPostPage();
    }

    // Post-Store Data
    public function storeData(PostFormRequest $request)
    {
        return $this->postServiceProvider->createPost($request);
    }

    // Edit Post
    public function editPost($id)
    {
        return $this->postServiceProvider->editPosts($id);
    }

    // Update Post
    public function updatePost(PostFormRequest $request,$id)
    {
        return $this->postServiceProvider->updatePosts($request,$id);
    }
}
