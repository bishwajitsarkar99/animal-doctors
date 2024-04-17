<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Folder\Folder_entry;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $allfolders = Folder_entry::all();
        $categories = Category::all();
        return view('super-admin.medicine-item.category.index', compact('company_profiles','categories', 'allfolders'));
    }

    // Get Category
    public function getCategory(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Category::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('category_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Add Cateogry
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'category_name'=>'required|max:191',
        ],[
            'category.required'=>'The category is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $category = new Category;
            $category->category_name = $request->input('category_name');
            $category->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Category added successfully',
            ]);
        }
    }

    // Edit Category
    public function editCategory($id)
    {
        $category = Category::find($id);
        if($category){
            return response()->json([
                'status'=> 200,
                'messages'=> $category,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Category is not found',
            ]);
        }
    }

    // Update Category
    public function updateCategory(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'category_name'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $category = Category::find($id);
            if($category){
                $category->category_name = $request->input('category_name');
                $category->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Category updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Category is not found',
                ]);
            } 
        }
    }

    // Delete Category
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Category is deleted successfully',
        ]);
    }

    // Status-Update
    public function updateCategoryStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Category::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Category Permission Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
