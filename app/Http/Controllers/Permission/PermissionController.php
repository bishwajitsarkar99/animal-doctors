<?php

namespace App\Http\Controllers\Permission;

use App\Models\Permission\InventoryAccessPermission;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index(Request $request){

        $roles = Role::whereIn('id', [2, 3, 4, 5, 6, 7])->get();
        $dataQuery = InventoryAccessPermission::with('roles', 'users')->orderBy('id', 'desc');
    
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
        return view('super-admin.user-permission.index');
    }

    // Get Email in Dropdown
    public function getEmail(Request $request ,$selectedRole){
        $users = User::whereHas('roles', function($query) use ($selectedRole) {
            $query->where('id', $selectedRole);
        })->get();
    
        return response()->json([
            'users' => $users
        ]);
    }

    // Permission Access Store
    public function storePermission(Request $request){
        
        $validator = Validator::make($request->all(), [
            'roles_id' => 'required|exists:roles,id',
            'emails_id' => 'required|unique:inventory_access_permissions,emails_id',
            'permission_status' => 'required|in:0,1',
        ], [
            'roles_id.required' => 'Role is required',
            'roles_id.exists' => 'The selected role does not exist',
            'emails_id.required' => 'Email field is required',

            'emails_id.unique' => 'This email has already taken.',
            'permission_status.required' => 'Permission status field is required',
            'permission_status.in' => 'Permission status must be true (1) or false (0)',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $InventoryAccessPermissions = new InventoryAccessPermission;
            $InventoryAccessPermissions->roles_id = $request->input('roles_id');
            $InventoryAccessPermissions->emails_id = $request->input('emails_id');
            $InventoryAccessPermissions->permission_status = $request->input('permission_status');
            $InventoryAccessPermissions->data_export_status = $request->input('data_export_status');
            $InventoryAccessPermissions->save();
            return response()->json([
                'messages' => 'Inventory access permission has been granted.',
                'code' => 200,
            ]);
        }
    }

    // Permission Edit
    public function editPermission($id){

        $InventoryAccessPermissions = InventoryAccessPermission::find($id);
        if ($InventoryAccessPermissions) {
            return response()->json([
                'status' => 200,
                'messages' => $InventoryAccessPermissions,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'The inventory permission is not found',
            ]);
        }
    }

    // Permission UPdate
    public function updatePermission(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'roles_id' => 'required|exists:roles,id',
            'emails_id' => 'required',
            'permission_status' => 'required|in:0,1',
        ], [
            'roles_id.required' => 'Role is required',
            'roles_id.exists' => 'The selected role does not exist',
            'emails_id.required' => 'Email field is required',
            'permission_status.required' => 'Permission status field is required',
            'permission_status.in' => 'Permission status must be true (1) or false (0)',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $InventoryAccessPermissions = InventoryAccessPermission::find($id);
            if ($InventoryAccessPermissions) {
                $InventoryAccessPermissions->roles_id = $request->input('roles_id');
                $InventoryAccessPermissions->emails_id = $request->input('emails_id');
                $InventoryAccessPermissions->permission_status = $request->input('permission_status');
                $InventoryAccessPermissions->data_export_status = $request->input('data_export_status');
                $InventoryAccessPermissions->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'The inventory access permission has updated.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'The inventory access permission is not found',
                ]);
            }
        }
    }

    // Permission Delete
    public function deletePermission($id){
        
        $InventoryAccessPermissions = InventoryAccessPermission::find($id);
        $InventoryAccessPermissions->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The inventory access permission is deleted.',
        ]);
    }
    
}
