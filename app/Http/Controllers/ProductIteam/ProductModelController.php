<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class ProductModelController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $products = Product::all();
        $product_models = ProductModel::all();
        return view('super-admin.medicine-item.model.index', compact('company_profiles','products','product_models'));
    }

    // Get Model Name
    public function getmodel(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = ProductModel::with(['products'])->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('model_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Get Product Data
    public function getDataProduct(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Product::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('product_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Add Model Name
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'model_name'=>'required|max:191',
            'product_id' =>'required',
        ],[
            'model_name.required'=>'The model name is required mandatory.',
            'product_id.required'=>'The product id is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $product_models = new ProductModel;
            $product_models->model_name = $request->input('model_name');
            $product_models->product_id = $request->input('product_id');
            $product_models->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Product Model has added successfully',
            ]);
        }
    }

    // Edit Model Name
    public function editmodel($id)
    {
        $product_models = ProductModel::find($id);
        if($product_models){
            return response()->json([
                'status'=> 200,
                'messages'=> $product_models,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'The product model is not found',
            ]);
        }
    }

    // Update mdoel Name
    public function updatemodel(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'model_name'=>'required|max:191',
            'product_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $product_models = ProductModel::find($id);
            if($product_models){
                $product_models->model_name = $request->input('model_name');
                $product_models->product_id = $request->input('product_id');
                $product_models->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'The product model has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'The product model is not found',
                ]);
            } 
        }
    }

    // Delete Brand Name
    public function deletemodel($id)
    {
        $product_models = ProductModel::find($id);
        $product_models->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The product model is deleted successfully',
        ]);
    }

    // Status-Update
    public function updatemodelStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = ProductModel::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The product model Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
