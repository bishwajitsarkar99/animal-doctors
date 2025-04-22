<?php
namespace App\LogicBild\Supplier;
use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Helpers\helper;
use Illuminate\Support\Facades\Cache;
use App\Models\Role;
use App\Models\User;
use App\Models\Supplier\SupplierPermission;
use App\Models\Branch\BranchCategory;
use App\Models\Branch\Branches;
use Illuminate\Validation\Rule;

class SupplierServiceProvider
{
    // ========================= Supplier ======================================
    // =========================================================================
    /**
     * Handle Supplier Home Page view
    */
    public function viewSupplier()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $branch_categories = BranchCategory::orderBy('id', 'desc')->get();
        // Get authenticated user's email
        $auth = Auth::user();
        $user_branch = $auth->branch_id;
        $branches = Branches::where('branch_id', $user_branch)->get();
        $page_name = 'Supplier';
        return view('super-admin.supplier.index', compact('company_profiles', 'page_name', 'branch_categories', 'branches'));
    }
    /**
     * Handle Fetch Branch
    */
    public function branchToFetch(Request $request, $id)
    {
        // Get authenticated user's email
        $auth = Auth::user();
        $user_branch = $auth->branch_id;

        if (!$auth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if($user_branch){
            $branches = Branches::where('branch_id', $user_branch)->where('id', $id)->get();

            if ($branches->isNotEmpty()) {
                return response()->json([
                    'status' => 200,
                    'messages' => $branches,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => [],
                ]);
            }
        }
        return response()->json(['message' => 'No branches available for this role'], 403);
        
    }
    /**
     * Handle Supplier Fetch Data
    */
    public function getSuppliers(Request $request, $branch_id)
    {
        $data = Supplier::where('branch_id', $branch_id)->get();

        if ($data->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'messages' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'No suppliers found for this branch.',
            ]);
        }
    }
    /**
     * Handle Create Supplier Event
    */
    public function createSupplier(Request $request)
    {
        // validation
        $validators = Validator::make($request->all(), [
            'branch_category' => 'required|max:191',
            'branch_id' => 'required|max:191',
            'type' => 'required|max:191',
            'bussiness_type' => 'required|max:191',
            'name' => 'required|max:191',
            'current_address' => 'required|max:300',
            'contact_number_one' => 'required|max:11|unique:suppliers',
            'contact_number_two' => 'max:11|unique:suppliers',
        ], [
            'branch_category.required' => 'The branch category required.',
            'branch_id.required' => 'The branch id required.',
            'type.required' => 'The supplier type is required.',
            'type.max' => 'The supplier type may not be greater than 191 characters.',
            'bussiness_type.required' => 'The business type is required.',
            'bussiness_type.max' => 'The business type may not be greater than 191 characters.',
            'name.required' => 'The name is required.',
            'current_address.required' => 'The current address is required.',
            'contact_number_one.required' => 'The contact number is required.',
            'contact_number_one.max' => 'The contact number may not be greater than 11 digit.',
            'contact_number_one.unique' => 'The contact number has already been taken.',
            'contact_number_two.max' => 'The contact number may not be greater than 11 digit.',
            'contact_number_two.unique' => 'The contact number has already been taken.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{

            $auth = Auth::user();

            $id_name = helper::IDGenerator(new Supplier, 'id_name',5, 'SVC');

            $suppliers = new Supplier;
            $suppliers->branch_category = $request->input('branch_category');
            $suppliers->branch_id = $request->input('branch_id');
            $suppliers->id_name = $id_name;
            $suppliers->type = $request->input('type');
            $suppliers->bussiness_type = $request->input('bussiness_type');
            $suppliers->name = $request->input('name');
            $suppliers->office_address = $request->input('office_address');
            $suppliers->current_address = $request->input('current_address');
            $suppliers->contact_number_one = $request->input('contact_number_one');
            $suppliers->contact_number_two = $request->input('contact_number_two');
            $suppliers->whatsapp_number = $request->input('whatsapp_number');
            $suppliers->email = $request->input('email');
            $suppliers->created_by = $auth->id;

            $suppliers->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Conatact has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Supplier Event
    */
    public function editSuppliers($id)
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
                'messages'=> 'Search data no found.',
            ]);
        }
    }
    /**
     * Handle Update Supplier Event
    */
    public function updateSuppliers(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'branch_category' => 'required|max:191',
            'branch_id' => 'required|max:191',
            'type' => 'required|max:191',
            'bussiness_type' => 'required|max:191',
            'name' => 'required|max:191',
            'current_address' => 'required|max:300',
            'contact_number_one' => 'required|max:11',
            'contact_number_two' => 'max:11',
        ],[
            'branch_category.required' => 'The branch category required.',
            'branch_id.required' => 'The branch id required.',
            'type.required' => 'The supplier type is required.',
            'type.max' => 'The supplier type may not be greater than 191 characters.',
            'bussiness_type.required' => 'The business type is required.',
            'bussiness_type.max' => 'The business type may not be greater than 191 characters.',
            'name.required' => 'The name is required.',
            'current_address.required' => 'The current address is required.',
            'contact_number_one.required' => 'The contact number is required.',
            'contact_number_one.max' => 'The contact number may not be greater than 11 digit.',
            'contact_number_two.max' => 'The contact number may not be greater than 11 digit.',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{

            $auth = Auth::user();

            $suppliers = Supplier::find($id);
            if($suppliers){
                $suppliers->branch_category = $request->input('branch_category');
                $suppliers->branch_id = $request->input('branch_id');
                $suppliers->type = $request->input('type');
                $suppliers->bussiness_type = $request->input('bussiness_type');
                $suppliers->name = $request->input('name');
                $suppliers->office_address = $request->input('office_address');
                $suppliers->current_address = $request->input('current_address');
                $suppliers->contact_number_one = $request->input('contact_number_one');
                $suppliers->contact_number_two = $request->input('contact_number_two');
                $suppliers->whatsapp_number = $request->input('whatsapp_number');
                $suppliers->email = $request->input('email');
                // update status
                $suppliers->supplier_status = $request->input('supplier_status');

                if($request->input('supplier_status') === 1){
                    $suppliers->supplier_access_date = now();
                    $suppliers->supplier_deny_date = null;
                }else if($request->input('supplier_status') === 0){
                    $suppliers->supplier_access_date = null;
                    $suppliers->supplier_deny_date = now();
                }
                // updator
                $suppliers->updated_by = $auth->id;

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
    /**
     * Handle Delete Supplier Event
    */
    public function deleteSuppliers($id)
    {
        $suppliers = Supplier::find($id);
        $suppliers->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The contact is deleted successfully',
        ]);
    }
    /**
     * Handle View Supplier Event
    */
    public function viewSuppliers($id)
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
                'messages'=> 'The supplier view is not found',
            ]);
        }
    }
    /**
     * Handle Supplier Status Update Event
    */
    public function supplierStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $supplier_status = (bool)$request->input('supplier_status');
        $supplier_status = !$supplier_status;

        $data = Supplier::findOrFail($id);

        $data->update([
            'supplier_status' => (int)$supplier_status,
        ]);

        return response()->json([
            'messages' => 'My Sql Data Permission has Updated',
            'code' => 202,
        ], 202);
    }


    // ========================= Supplier Access Permission ====================
    // =========================================================================
    /**
     * Handle Supplier Access Permission Fetch Data
    */
    public function Supplier_Access_Permissions(Request $request)
    {
        $roles = Role::whereIn('id', [1, 2, 3, 4, 5, 6, 7])->get();
        $dataQuery = SupplierPermission::with('roles', 'users')->orderBy('id', 'desc');
    
        if ($query = $request->get('query')) {
            $dataQuery->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'LIKE', '%' . $query . '%');
            });
        }
        $perItem = $request->input('per_item', 10);
        $data = $dataQuery->paginate($perItem);

        if ($request->expectsJson()) {
            return response()->json([
                'roles' => $roles,
                'data' => $data->items(),
                'links' => $data->links(),
                'total' => $data->total(),
            ]);
        }
        return view('super-admin.supplier.supplier-permission');
    }
    /**
     * Handle Dropdown item email
    */
    public function getUserEmails(Request $request ,$selectedUserRole)
    {
        $users = User::whereHas('roles', function($query) use ($selectedUserRole) {
            $query->where('id', $selectedUserRole);
        })->get(['id', 'email']);
    
        return response()->json([
            'users' => $users
        ]);
    }
    /**
     * Handle Create Permission Access Event
    */
    public function createPermission(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'user_roles_id' => 'required|exists:roles,id',
            'user_emails_id' => 'required|unique:supplier_permissions,user_emails_id',
            'view_status' => 'required|in:0,1',
        ], [
            'user_roles_id.required' => 'Role is required',
            'user_roles_id.exists' => 'The selected role does not exist',
            'emails_id.required' => 'Email field is required',

            'user_emails_id.unique' => 'This email has already taken.',
            'view_status.required' => 'Permission status field is required',
            'view_status.in' => 'Permission status must be true (1) or false (0)',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $SupplierPermissions = new SupplierPermission;
            $SupplierPermissions->user_roles_id = $request->input('user_roles_id');
            $SupplierPermissions->user_emails_id = $request->input('user_emails_id');
            $SupplierPermissions->view_status = $request->input('view_status');
            $SupplierPermissions->create_status = $request->input('create_status');
            $SupplierPermissions->update_status = $request->input('update_status');
            $SupplierPermissions->delete_status = $request->input('delete_status');
            $SupplierPermissions->data_export_status = $request->input('data_export_status');
            $SupplierPermissions->data_table_status = $request->input('data_table_status');
            $SupplierPermissions->supplier_requisition_status = $request->input('supplier_requisition_status');
            $SupplierPermissions->supplier_payment_status = $request->input('supplier_payment_status');
            $SupplierPermissions->supplier_setting_status = $request->input('supplier_setting_status');
            $SupplierPermissions->supplier_summary_status = $request->input('supplier_summary_status');
            $SupplierPermissions->supplier_searching_status = $request->input('supplier_searching_status');
            $SupplierPermissions->approved_by = Auth::user()->id;
            $SupplierPermissions->save();
            return response()->json([
                'messages' => 'permission has been created.',
                'code' => 200,
            ]);
        }
    }
    /**
     * Handle Edit Permission Access Event
    */
    public function editPermission($id)
    {
        $SupplierPermissions = SupplierPermission::find($id);
        if ($SupplierPermissions) {
            return response()->json([
                'status' => 200,
                'messages' => $SupplierPermissions,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'permission is not found',
            ]);
        }
    }
    /**
     * Handle Update Permission Access Event
    */
    public function updatePermission(Request $request, $id)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'user_roles_id' => 'required|exists:roles,id',
            'user_emails_id' => [
                'required',
                Rule::unique('supplier_permissions', 'user_emails_id')->ignore($id),
            ],
            'view_status' => 'required|in:0,1',
        ], [
            'user_roles_id.required' => 'Role is required',
            'user_roles_id.exists' => 'The selected role does not exist',
            'user_emails_id.required' => 'Email field is required',
            'user_emails_id.unique' => 'This email has already been taken.',
            'view_status.required' => 'Permission status field is required',
            'view_status.in' => 'Permission status must be true (1) or false (0)',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $SupplierPermissions = SupplierPermission::find($id);
            if ($SupplierPermissions) {
                $SupplierPermissions->user_roles_id = $request->input('user_roles_id');
                $SupplierPermissions->user_emails_id = $request->input('user_emails_id');
                $SupplierPermissions->view_status = $request->input('view_status');
                $SupplierPermissions->create_status = $request->input('create_status');
                $SupplierPermissions->update_status = $request->input('update_status');
                $SupplierPermissions->delete_status = $request->input('delete_status');
                $SupplierPermissions->data_export_status = $request->input('data_export_status');
                $SupplierPermissions->data_table_status = $request->input('data_table_status');
                $SupplierPermissions->supplier_requisition_status = $request->input('supplier_requisition_status');
                $SupplierPermissions->supplier_payment_status = $request->input('supplier_payment_status');
                $SupplierPermissions->supplier_setting_status = $request->input('supplier_setting_status');
                $SupplierPermissions->supplier_summary_status = $request->input('supplier_summary_status');
                $SupplierPermissions->supplier_searching_status = $request->input('supplier_searching_status');
                $SupplierPermissions->update_by = Auth::user()->id;
                $SupplierPermissions->save();
    
                return response()->json([
                    'status' => 200,
                    'messages' => 'permission has been updated.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'permission not found.',
                ]);
            }
        }
    }
    /**
     * Handle Delete Permission Access Event
    */
    public function deletePermission($id)
    {
        $SupplierPermissions = SupplierPermission::find($id);
        $SupplierPermissions->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Permission has deleted.',
        ]);
    }

}
