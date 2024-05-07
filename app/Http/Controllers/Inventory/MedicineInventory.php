<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Medicine\Inventory;
use App\Models\Supplier\Supplier;
use App\Models\SubCategory;
use App\Models\MedicineGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class MedicineInventory extends Controller
{
    // inventory index page
    public function index()
    {
        $suppliers = Supplier::where('supplier_status', '=', 1)->get();
        $cateogries = SubCategory::where('status', '=', 1)->get();
        $medicine_groups = MedicineGroup::where('status', '=', 1)->get();
        $units = DB::table('units')->orderBy('units_name', 'ASC')->get();
        $medicine_origins = DB::table('medicine_origins')->orderBy('origin_name', 'ASC')->get();

        //$inventories = Inventory::where('amount', '')->get();

        return view('admin.inventory.medicine-inventory', compact('suppliers', 'cateogries', 'medicine_groups', 'units', 'medicine_origins'));
    }

    // get inventory for edit table
    public function getData(Request $request)
    {
        if (!$request->ajax()) {
            // return abort(404);
        }
    
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        $data = Inventory::with(['suppliers', 'sub_categories', 'medicine_groups', 'medicine_names', 'medicine_origins', 'medicine_dogs', 'units'])
            ->orderBy('inventory_id', 'desc')
            ->latest()
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
    
        if ($query = $request->get('query')) {
            $data->where('id_name', 'LIKE', '%' . $query . '%')
                ->orWhere('medicine_name', 'LIKE', '%' . $query . '%')
                ->orWhere('medicine_group', 'LIKE', '%' . $query . '%');
        }
    
        $perItem = $request->input('per_item', 10);
    
        $data = $data->paginate($perItem)->toArray();
    
        return response()->json($data, 200);
    }

    // get inventory unauthorized data
    public function unauthorizedData(Request $request)
    {
        if (!$request->ajax()) {
            // return abort(404);
        }
    
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        $data = Inventory::with(['suppliers', 'sub_categories', 'medicine_groups', 'medicine_names', 'medicine_origins', 'medicine_dogs', 'units'])
            ->orderBy('inventory_id', 'desc')
            ->latest()
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
    
        if ($query = $request->get('query')) {
            $data->where('id_name', 'LIKE', '%' . $query . '%')
                ->orWhere('medicine_name', 'LIKE', '%' . $query . '%')
                ->orWhere('medicine_group', 'LIKE', '%' . $query . '%');
        }
    
        $perItem = $request->input('per_item', 10);
    
        $data = $data->paginate($perItem)->toArray();
    
        return response()->json($data, 200);
    }

    // inventory data store
    public function store(Request $request)
    {
        
        $validators = validator::make($request->all(), [
            "data.*.inv_id" => 'required|max:100|unique:inventories',
            "data.*.manufacture_date" => 'required',
            "data.*.expiry_date" => 'required',
            "data.*.supplier_id" => "required",
            "data.*.category_id" => "required",
            "data.*.group_name" => "required",
            "data.*.medicine_name" => "required",
            "data.*.medicine_dogs" => 'required',
            "data.*.origin_name" => "required",
            "data.*.medicine_size" => "required",
            "data.*.unit_price" => 'required',
            "data.*.quantity" => 'required',
            "data.*.amount" => 'required',
            "data.*.sub_total" => 'required',
        ], [
            'data.*.medicine_dogs.required' => 'Medicine Dosage is required.',
            'data.*.sub_total.required' => 'Net amount is required.',
            'data.*.quantity.required' => 'Medicine quantity is required.',
            'data.*.unit_price.required' => 'Medicine unit price is required.',
            'data.*.medicine_size.required' => 'Medicine size is required.',
            'data.*.origin_name.required' => 'Medicine origin is required.',
            'data.*.medicine_name.required' => 'Medicine name is required.',
            'data.*.group_name.required' => 'Medicine group is required.',
            'data.*.category_id.required' => 'Medicine category is required.',
            'data.*.supplier_id.required' => 'Supplier id is mandatory.',
            'data.*.expiry_date.required' => 'Medicine expiry date is required.',
            'data.*.manufacture_date.required' => 'Medicine manufacture date is required.',
            'data.*.inv_id.unique' => 'The inventory id has already taken.',
        ]);
        if ($validators->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages(),
            ]);
        } else {
            // Assuming $request contains the validated data
            foreach ($request->data as $item) {

                Inventory::create([
                    "inv_id" => $item['inv_id'],
                    "manufacture_date" => $item['manufacture_date'],
                    "expiry_date" => $item['expiry_date'],
                    "supplier_id" => $item['supplier_id'],
                    "category_id" => $item['category_id'],
                    "medicine_group" => $item['group_name'],
                    "medicine_name" => $item['medicine_name'],
                    "medicine_dogs" => $item['medicine_dogs'],
                    "medicine_origin" => $item['origin_name'],
                    "medicine_size" => $item['medicine_size'],
                    "price" => $item['unit_price'],
                    "quantity" => $item['quantity'],
                    "amount" => $item['amount'],
                    "sub_total" => $item['sub_total'],
                    // 'status' => 1,
                    "vat_percentage" => $item['vat'],
                    "tax_percentage" => $item['tax'],
                    'discount_percentage' => isset($item['discount_percentage']) ? $item['discount_percentage'] : 0,

                ]);
            }
        }

        //$request->created_by = Auth::user()->id;
        return response()->json([
            'message' => 'Inventory has created successfully.',
            'code' => 200,
        ]);
    }

    // Inventory Edit
    public function editInventory($inventory_id)
    {
        $inventories = Inventory::find($inventory_id);
        if ($inventories) {
            return response()->json([
                'status' => 200,
                'messages' => $inventories,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'The inventory is not found',
            ]);
        }
    }

    // Inventory Update
    public function updateInventory(Request $request, $inventory_id)
    {
        $validator = validator::make($request->all(), [
            'inv_id' => 'required',
            'manufacture_date' => 'required',
            'expiry_date' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'medicine_group' => 'required',
            'medicine_name' => 'required|max:191',
            'medicine_dogs' => 'required|max:191',
            'medicine_size' => 'required|max:191',
            'quantity' => 'required',
            'amount' => 'required',
        ], [
            'medicine_dogs.required' => 'Medicine Dosage is required.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $inventories = Inventory::find($inventory_id);
            if ($inventories) {
                $inventories->inv_id = $request->input('inv_id');
                $inventories->manufacture_date = $request->input('manufacture_date');
                $inventories->expiry_date = $request->input('expiry_date');
                $inventories->supplier_id = $request->input('supplier_id');
                $inventories->category_id = $request->input('category_id');
                $inventories->medicine_group = $request->input('medicine_group');
                $inventories->medicine_name = $request->input('medicine_name');
                $inventories->medicine_dogs = $request->input('medicine_dogs');
                $inventories->medicine_origin = $request->input('medicine_origin');
                $inventories->medicine_size = $request->input('medicine_size');
                $inventories->price = $request->input('price');
                $inventories->quantity = $request->input('quantity');
                $inventories->amount = $request->input('amount');
                $inventories->vat_percentage = $request->input('vat_percentage');
                $inventories->tax_percentage = $request->input('tax_percentage');
                $inventories->vat_percentage = $request->input('vat_percentage');
                $inventories->sub_total = $request->input('sub_total');
                $inventories->status_inv = $request->status_inv == true ? '1' : '0';
                $inventories->updated_by = Auth::user()->id;
                $inventories->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'The inventory has updated successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'The inventory is not found',
                ]);
            }
        }
    }
}
