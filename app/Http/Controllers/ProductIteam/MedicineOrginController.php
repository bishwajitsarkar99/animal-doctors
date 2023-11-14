<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\MedicineOrigin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class MedicineOrginController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $origins = MedicineOrigin::all();
        return view('super-admin.medicine-item.origin.index', compact('company_profiles','origins'));
    }

    // Get Origin Name
    public function getorigin(Request $request)
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

    // Add Origin Name
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'origin_name'=>'required|max:191',
        ],[
            'origin_name.required'=>'The medicine origin is required mandatory.',
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
            'origin_name'=>'required|max:191',
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
