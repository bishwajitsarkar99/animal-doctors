<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Brand;
use App\Models\MedicineOrigin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class BrandController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $brands = Brand::all();
        $origins = MedicineOrigin::all();
        return view('super-admin.medicine-item.brand.index', compact('company_profiles','brands','origins'));
    }

    // Get Brand Name
    public function getbrand(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Brand::with(['medicine_origins'])->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('brand_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    // Get Origin Data
    public function getDataOrigin(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineOrigin::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('origin_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
        
    }
    // Add Brand Name
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'brand_name'=>'required|max:191',
            'origin_id' =>'required',
        ],[
            'brand_name.required'=>'The brand name is required mandatory.',
            'origin_id.required'=>'The medicine origin is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $brands = new Brand;
            $brands->brand_name = $request->input('brand_name');
            $brands->origin_id = $request->input('origin_id');
            $brands->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Brand has added successfully',
            ]);
        }
    }

    // Edit Brand Name
    public function editbrand($id)
    {
        $brands = Brand::find($id);
        if($brands){
            return response()->json([
                'status'=> 200,
                'messages'=> $brands,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'The brand is not found',
            ]);
        }
    }

    // Update Brand Name
    public function updatebrand(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'brand_name'=>'required|max:191',
            'origin_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $brands = Brand::find($id);
            if($brands){
                $brands->brand_name = $request->input('brand_name');
                $brands->origin_id = $request->input('origin_id');
                $brands->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'The brand has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'The brand is not found',
                ]);
            } 
        }
    }

    // Delete Brand Name
    public function deletebrand($id)
    {
        $brands = Brand::find($id);
        $brands->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The brand is deleted successfully',
        ]);
    }

    // Status-Update
    public function updatebrandStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Brand::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The brand Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
