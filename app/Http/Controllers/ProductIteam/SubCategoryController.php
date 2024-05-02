<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Validator;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Cache;

class SubCategoryController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $subcategories = SubCategory::all();
        $categories = Category::all();
        return view('super-admin.medicine-item.sub-category.index', compact('company_profiles','categories', 'subcategories'));
    }

    // Get Sub-Category
    public function getSubCategory(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = SubCategory::with(['categories'])->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
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

    // Get Cateogry
    public function getCategories(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Category::orderBy('id','desc')->latest()->where('status', '!=', 0);

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

    // Add Sub-Cateogry
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'sub_category_name'=>'required|max:191',
            'category_id'=>'required',
        ],[
            'sub-category.required'=>'The sub-category is required mandatory.',
            'category_id.required'=>'The category is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $subcategory = new SubCategory;
            $subcategory->sub_category_name = $request->input('sub_category_name');
            $subcategory->category_id = $request->input('category_id');
            $subcategory->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Sub-Category added successfully',
            ]);
        }
    }

    // Edit Sub-Category
    public function editSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        if($subcategory){
            return response()->json([
                'status'=> 200,
                'messages'=> $subcategory,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Sub-Category is not found',
            ]);
        }
    }

    // Update Sub-Category
    public function updateSubCategory(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'sub_category_name'=>'required|max:191',
            'category_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $subcategories = SubCategory::find($id);
            if($subcategories){
                $subcategories->sub_category_name = $request->input('sub_category_name');
                $subcategories->category_id = $request->input('category_id');
                $subcategories->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Sub-Category updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Sub-Category is not found',
                ]);
            } 
        }
    }

    // Delete Sub-Category
    public function deleteSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Sub-Category is deleted successfully',
        ]);
    }

    // Status-Update
    public function updateSubCategoryStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = SubCategory::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Category Permission Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
