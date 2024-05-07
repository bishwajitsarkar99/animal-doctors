<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\MedicineName;
use App\Models\MedicineGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class MedicineNameController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $medicines = MedicineName::all();
        $medicinegroups = MedicineGroup::all();
        return view('super-admin.medicine-item.medicine-name.index', compact('company_profiles','medicines','medicinegroups'));
    }

    // Get Medicine Name
    public function getmedicinename(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineName::with('medicine_groups')->orderBy('id','desc')->latest();

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

    // Get Medicine Group
    public function getGroup(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineGroup::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('group_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Add Medicine Name
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'medicine_name'=>'required|max:191|unique:medicine_names',
            'group_id'=>'required',
        ],[
            'medicine_name.required'=>'The medicine name is required mandatory.',
            'medicine_name.unique'=>'The medicine name has already been taken.',
            'group_id.required'=>'The medicine group id is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $medicinenames = new MedicineName;
            $medicinenames->medicine_name = $request->input('medicine_name');
            $medicinenames->group_id = $request->input('group_id');
            $medicinenames->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Medicine Name has added successfully',
            ]);
        }
    }

    // Edit Medicine Name
    public function editmedicinename($id)
    {
        $medicines = MedicineName::find($id);

        if($medicines){
            return response()->json([
                'status' =>200,
                'messages'=>$medicines,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'messages'=>'Medicine Name is not found',
            ]);
        }
        
    }
    // Update Medicine Name
    public function updatemedicinename(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'medicine_name'=>'required|max:191|unique:medicine_names,medicine_name,' .$id,
            'group_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $medicinenames = MedicineName::find($id);
            if($medicinenames){
                $medicinenames->medicine_name = $request->input('medicine_name');
                $medicinenames->group_id = $request->input('group_id');
                $medicinenames->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Medicine Name has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Medicine Name is not found',
                ]);
            } 
        }
    }

    // Delete Medicine Name
    public function deletemedicinename($id)
    {
        $medicinenames = MedicineName::find($id);
        $medicinenames->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Medicine Name is deleted successfully',
        ]);
    }

    // Status-Update
    public function updatemedicinenameStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineName::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Medicine Name Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
