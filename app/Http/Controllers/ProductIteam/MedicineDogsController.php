<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\MedicineName;
use App\Models\MedicineDogs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class MedicineDogsController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $medicines = MedicineName::Where('status','!=', 0)->get();
        return view('super-admin.medicine-item.medicine-dogs.index', compact('company_profiles', 'medicines'));
    }

    // Get Medicine Dogs
    public function getmedicinedogs(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineDogs::with(['medicine_names'])->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->orWhere('id','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');  
                // ->Where('medicine_dogs','LIKE','%'.$query.'%')
                // ->orWhere('medicine_id','LIKE','%'.$query.'%')    
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Get Medicine Name
    public function get_medicine(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineName::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('medicine_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    
    // Add Medicine Dogs
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'dosage'=>'required|max:191',
            'medicine_id'=>'required',
        ],[
            'dosage.required'=>'The medicine dosage is required mandatory.',
            'medicine_id.required'=>'The medicine id is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $medicinedogs = new MedicineDogs;
            $medicinedogs->dosage = $request->input('dosage');
            $medicinedogs->medicine_id = $request->input('medicine_id');
            $medicinedogs->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Medicine Dogs has added successfully',
            ]);
        }
    }

    // Edit Medicine Dogs
    public function editmedicinedogs($id)
    {
        $medicinedogs = MedicineDogs::find($id);
        if($medicinedogs){
            return response()->json([
                'status'=> 200,
                'messages'=> $medicinedogs,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Medicine Dogs is not found',
            ]);
        }
    }

    // Update Medicine Dogs
    public function updatemedicinedogs(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'dosage'=>'required|max:191',
            'medicine_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $medicinedogs = MedicineDogs::find($id);
            if($medicinedogs){
                $medicinedogs->dosage = $request->input('dosage');
                $medicinedogs->medicine_id = $request->input('medicine_id');
                $medicinedogs->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Medicine Dogs has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Medicine Dogs is not found',
                ]);
            } 
        }
    }

    // Delete Medicine Dogs
    public function deletemedicinedogs($id)
    {
        $medicinedogs = MedicineDogs::find($id);
        $medicinedogs->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Medicine Dosage is deleted successfully',
        ]);
    }

    // Status-Update
    public function updatemedicinedogsStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineDogs::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Medicine Dosage Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
