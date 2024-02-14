<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post\PostTable;
use App\Models\Post\PostCategory;

class BlogPostController extends Controller
{
    public function index(){
        $posts = PostTable::where('navbar_status','=',0)->latest()->paginate(10);
        return  response()->json([
            'status'=>200,
            'posts'=>$posts
        ]);
    }

    public function blogCategory(){
        $blog_category = PostCategory::where('status','=',0)->latest()->paginate(10);
        return  response()->json([
            'status'=>200,
            'blog_category'=>$blog_category 
        ]);
    }
}
