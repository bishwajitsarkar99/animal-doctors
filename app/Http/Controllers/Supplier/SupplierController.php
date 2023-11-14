<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Validator;
use App\Helpers\helper;
use Illuminate\Support\Facades\Cache;

class SupplierController extends Controller
{
    // Supplier
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $suppliers = Supplier::all();
        return view('super-admin.supplier.index', compact('company_profiles','suppliers'));
    }

    // Get Supplier
    public function getSupplier(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Supplier::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('supplier_id','LIKE','%'.$query.'%')
                ->orWhere('name','LIKE','%'.$query.'%')
                ->orWhere('contact_number_one','LIKE','%'.$query.'%') 
                ->orWhere('contact_number_two','LIKE','%'.$query.'%') 
                ->orWhere('whatsapp_number','LIKE','%'.$query.'%');     
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Store Supplier
    public function stroeData(Request $request)
    {
        $validators = validator::make($request->all(),[
            'type'=>'required |max:191',
            'bussiness_type' =>'required |max:191',
            'name' =>'required |max:191',
            'current_address' =>'required |max:300',
            'contact_number_one' =>'required |max:191',
        ],[
            'type.required'=>'The supplier type is required mandatory.',
            'name.required'=>'The name is required mandatory.',
            'contact_number_one.required'=>'The contact number is mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{

            $supplier_id = helper::IDGenerator(new Supplier, 'supplier_id',5, 'SVC');

            $suppliers = new Supplier;
            $suppliers->supplier_id = $supplier_id;
            $suppliers->type = $request->input('type');
            $suppliers->bussiness_type = $request->input('bussiness_type');
            $suppliers->name = $request->input('name');
            $suppliers->office_address = $request->input('office_address');
            $suppliers->current_address = $request->input('current_address');
            $suppliers->contact_number_one = $request->input('contact_number_one');
            $suppliers->contact_number_two = $request->input('contact_number_two');
            $suppliers->whatsapp_number = $request->input('whatsapp_number');
            $suppliers->email = $request->input('email');

            $suppliers->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Conatact has added successfully',
            ]);
        }
    }

    // Edit Supplier
    public function editSupplier($id)
    {
        $suppliers = Supplier::find($id);
        if($suppliers){
            return response()->json([
                'status'=> 200,
                'messages'=> $suppliers,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'The brand is not found',
            ]);
        }
    }

    // Update Supplier
    public function updateSupplier(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'type'=>'required|max:191',
            'bussiness_type' =>'required|max:191',
            'name' =>'required|max:191',
            'current_address' =>'required|max:300',
            'contact_number_one' =>'required|max:191',
        ],[
            'type.required'=>'The supplier type is required mandatory.',
            'name.required'=>'The name is required mandatory.',
            'contact_number_one.required'=>'The contact number is mandatory.',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $suppliers = Supplier::find($id);
            if($suppliers){
                $suppliers->type = $request->input('type');
                $suppliers->bussiness_type = $request->input('bussiness_type');
                $suppliers->name = $request->input('name');
                $suppliers->office_address = $request->input('office_address');
                $suppliers->current_address = $request->input('current_address');
                $suppliers->contact_number_one = $request->input('contact_number_one');
                $suppliers->contact_number_two = $request->input('contact_number_two');
                $suppliers->whatsapp_number = $request->input('whatsapp_number');
                $suppliers->email = $request->input('email');

                $suppliers->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'The contact has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'The contact is not found',
                ]);
            } 
        }
    }

    // Delete Supplier
    public function deleteSupplier($id)
    {
        $suppliers = Supplier::find($id);
        $suppliers->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The contact is deleted successfully',
        ]);
    }

    // Supplier Status Update
    public function updatesupplierStatus(Request $request)
    {
        $id = (int)$request->input('id');
        $supplier_status = (bool)$request->input('supplier_status');
        $supplier_status = !$supplier_status;

        $data = Supplier::findOrFail($id);

        $data->update([
            'supplier_status' => (int)$supplier_status,
        ]);

        return response()->json([
            'messages' => 'The contact Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
}
