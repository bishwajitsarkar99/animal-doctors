<?php

namespace App\Http\Controllers\Permission;

use App\Models\Permission\Permission;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index(){
        $data['permissions']=Permission::all();
        return view('super-admin.user-permission.index',$data);
    }

    // Permission Create
    public function createPermission(){
        //$roles = Role::whereIn('id', [1, 2, 3])->get();
        $roles = Role::whereIn('id', [2,3,4,5,6,7])->get();
        return view('super-admin.user-permission.create-permission.create', compact('roles'));
    }

    // Permission Store
    public function storePermission(Request $request){
        $request->validate([
            'name'=>'required',
            'role_id'=>'required',
        ],[
            'role_id.required'=>'Role is required',
            'name.required'=>'Permission field is required',
        ]);
        Permission::create($request->all());
        return redirect()->route('permission.show')->with('success','Permission Created Successfully.');
    }

    // Permission Edit
    public function editPermission($id){
        $permissions = Permission::find($id);
        //dd($permissions);
        return view('super-admin.user-permission.edit-permission.edit',compact('permissions'));
    }

    // Permission UPdate
    public function updatePermission(Request $request){
        $permissions = Permission::find($request->id);
        $permissions->role_id = $request->role_id;
        $permissions->name = $request->name;
        $permissions->update();

        return redirect()->route('permission.show')->with('success','Permission has updated successfully.');
    }

    // Permission Delete
    public function deletePermission($id){
        $permissions=Permission::find($id);
        $permissions->delete();
        return redirect()->route('permission.show')
        ->with('success','Permission has deleted successfully.');
    }
    
}
