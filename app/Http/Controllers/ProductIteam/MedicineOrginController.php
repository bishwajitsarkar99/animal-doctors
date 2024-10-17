<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\MedicineOrigin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\LogicBild\ProductIteams\ProductIteamsServiceProvider;

class MedicineOrginController extends Controller
{
    protected $productIteamsServiceProvider;

    // inject ProductIteamsServiceProvider
    public function __construct(ProductIteamsServiceProvider $productIteamsServiceProvider)
    {
        return $this->productIteamsServiceProvider = $productIteamsServiceProvider;
    }

    // Origin View
    public function index()
    {
        return $this->productIteamsServiceProvider->viewOrigin();
    }

    // Get Origin Name
    public function getorigin(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineOrigin::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('origin_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Add Origin Name
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'origin_name'=>'required|max:191|unique:medicine_origins',
        ],[
            'origin_name.required'=>'The medicine origin is required mandatory.',
            'origin_name.unique'=>'The medicine origin has already been taken.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $origins = new MedicineOrigin;
            $origins->origin_name = $request->input('origin_name');
            $origins->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Medicine Origin has added successfully',
            ]);
        }
    }

    // Edit Origin Name
    public function editorigin($id)
    {
        $origins = MedicineOrigin::find($id);
        if($origins){
            return response()->json([
                'status'=> 200,
                'messages'=> $origins,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'The medicine origin is not found',
            ]);
        }
    }

    // Update Origin Name
    public function updateorigin(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'origin_name'=>'required|max:191|unique:medicine_origins,origin_name,' .$id,
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $origins = MedicineOrigin::find($id);
            if($origins){
                $origins->origin_name = $request->input('origin_name');
                $origins->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'The medicine origin has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'The medicine origin is not found',
                ]);
            } 
        }
    }

    // Delete Origin Name
    public function deleteorigin($id)
    {
        $origins = MedicineOrigin::find($id);
        $origins->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The medicine origin is deleted successfully',
        ]);
    }

    // Status-Update
    public function updateoriginStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineOrigin::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The medicine origin Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
