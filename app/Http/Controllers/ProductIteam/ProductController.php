<?php

namespace App\Http\Controllers\Productiteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('super-admin.medicine-item.product.index', compact('company_profiles'));
    }

    // Get Product
    public function getproduct(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Product::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('product_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Add Product
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'product_name'=>'required|max:191',
        ],[
            'product.required'=>'The product is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $products = new Product;
            $products->product_name = $request->input('product_name');
            $products->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Product added successfully',
            ]);
        }
    }

    // Edit Product
    public function editproduct($id)
    {
        $products = Product::find($id);
        if($products){
            return response()->json([
                'status'=> 200,
                'messages'=> $products,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Product is not found',
            ]);
        }
    }

    // Update Product
    public function updateproduct(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'product_name'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $products = Product::find($id);
            if($products){
                $products->product_name = $request->input('product_name');
                $products->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Product updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Product is not found',
                ]);
            } 
        }
    }

    // Delete Product
    public function deleteproduct($id)
    {
        $products = Product::find($id);
        $products->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Product is deleted successfully',
        ]);
    }

    // Status-Update
    public function updateproductStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Product::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Product Permission Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
