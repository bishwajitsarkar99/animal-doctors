<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Unit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class UnitController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $units = Unit::all();
        return view('super-admin.medicine-item.units.index', compact('company_profiles','units'));
    }

    // Get Units Name
    public function getunits(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Unit::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('units_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Add Units Name
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'units_name'=>'required|max:191',
        ],[
            'units_name.required'=>'The medicine dogs is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $units = new Unit;
            $units->units_name = $request->input('units_name');
            $units->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Unit has added successfully',
            ]);
        }
    }

    // Edit Units Name
    public function editunits($id)
    {
        $units = Unit::find($id);
        if($units){
            return response()->json([
                'status'=> 200,
                'messages'=> $units,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Unit is not found',
            ]);
        }
    }

    // Update Units Name
    public function updateunits(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'units_name'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $units = Unit::find($id);
            if($units){
                $units->units_name = $request->input('units_name');
                $units->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Unit has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Unit is not found',
                ]);
            } 
        }
    }

    // Delete Units Name
    public function deleteunits($id)
    {
        $units = Unit::find($id);
        $units->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Unit is deleted successfully',
        ]);
    }

    // Status-Update
    public function updateunitsStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Unit::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Unit Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
