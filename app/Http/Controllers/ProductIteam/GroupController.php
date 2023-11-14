<?php

namespace App\Http\Controllers\ProductIteam;

use App\Http\Controllers\Controller;
use App\Models\MedicineGroup;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class GroupController extends Controller
{
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $groups = MedicineGroup::all();
        return view('super-admin.medicine-item.medicine-group.index', compact('company_profiles','groups'));
    }

    // Get Group
    public function getmedicinegroup(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineGroup::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('group_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Add Group
    public function storeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'group_name'=>'required|max:191',
        ],[
            'group.required'=>'The medicine group is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $medicinegroups = new MedicineGroup;
            $medicinegroups->group_name = $request->input('group_name');
            $medicinegroups->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Medicine Group has added successfully',
            ]);
        }
    }

    // Edit Group
    public function editmedicinegroup($id)
    {
        $medicinegroups = MedicineGroup::find($id);
        if($medicinegroups){
            return response()->json([
                'status'=> 200,
                'messages'=> $medicinegroups,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Medicine Group is not found',
            ]);
        }
    }

    // Update Group
    public function updatemedicinegroup(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'group_name'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $medicinegroups = MedicineGroup::find($id);
            if($medicinegroups){
                $medicinegroups->group_name = $request->input('group_name');
                $medicinegroups->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Medicine Group has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Medicine Group is not found',
                ]);
            } 
        }
    }

    // Delete Group
    public function deletemedicinegroup($id)
    {
        $medicinegroups = MedicineGroup::find($id);
        $medicinegroups->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Medicine Group is deleted successfully',
        ]);
    }

    // Status-Update
    public function updatemedicinegroupStatus(Request $request){
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineGroup::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Medicine Group Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
