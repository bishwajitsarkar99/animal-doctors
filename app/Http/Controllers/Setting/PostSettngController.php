<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Post\PostCategory;
use App\Models\Post\PostTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PostSettngController extends Controller
{
    //post-category-setting view page
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $post_categories = DB::table('post_categories')->orderBy('id','ASC')->get();
        $post_tables = DB::table('post_tables')->orderBy('id','ASC')->get();
        return view('super-admin.setting.post-setting.index', compact('company_profiles','post_categories','post_tables'));
    }

    //get post-category
    public function getPost(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = PostCategory::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('post_title','LIKE','%'.$query.'%')
                ->orWhere('category_name','LIKE','%'.$query.'%')
                ->orWhere('sub_category_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        }
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        } 
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    //post-category-hide status update
    public function updatepostCategoryStatus(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = PostCategory::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The Post Category Access Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }

    //get post-category-delete
    public function deletePostCategory($id)
    {
        $post_categories = PostCategory::find($id);
        $post_categories->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The post category is deleted successfully',
        ]);
    }

    //get-Post-data
    public function getMainPost(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = PostTable::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('post_title','LIKE','%'.$query.'%')
                ->orWhere('category_name','LIKE','%'.$query.'%')
                ->orWhere('sub_category_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    //main-post update status
    public function updateMainPostStatus(Request $request)
    {
        $id = (int)$request->input('id');
        $navbar_status = (bool)$request->input('navbar_status');
        $navbar_status = !$navbar_status;

        $data = PostTable::findOrFail( $id);

        $data->update([
            'navbar_status' => (int)$navbar_status,
        ]);

        return response()->json([
            'messages' => 'The Main Post Access Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }

    //get post-category-delete
    public function deleteMainPost($id)
    {
        $main_post = PostTable::find($id);
        $main_post->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The main post is deleted successfully',
        ]);
    }
}
