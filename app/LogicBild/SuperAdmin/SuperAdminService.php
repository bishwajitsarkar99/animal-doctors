<?php
namespace App\LogicBild\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Email\EmailVerification;
use App\Models\Role;
use App\Models\CompanyProfile;

class SuperAdminService
{
    /**
     * Handle the fetch user data event.
    */
    public function getuser(Request $request)
    {
        // sort-field
        $sort_field_id = $request->input('sort_field_id', 'id');
        $sort_field_image = $request->input('sort_field_image', 'image');
        $sort_field_name = $request->input('sort_field_name', 'name');
        $sort_field_email = $request->input('sort_field_email', 'email');
        $sort_field_contract_number = $request->input('sort_field_contract_number', 'contract_number');
        $sort_field_role = $request->input('sort_field_role', 'role');
        $sort_field_status = $request->input('sort_field_status', 'status');

        $sort_field_direction = $request->input('sort_field_direction', 'desc');

        $users = User::where('role', '!=', 1)->with(['roles']);

        if ($query = $request->get('query')) {
            $users->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $query . '%')
                ->orWhere('role', 'LIKE', '%' . $query . '%')
                ->orWhere('id', 'LIKE', '%' . $query . '%');
        }

        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        // sorting field
        $users = $users->orderBy($sort_field_id, $sort_field_direction)
                        ->orderBy($sort_field_image, $sort_field_direction)
                        ->orderBy($sort_field_name, $sort_field_direction)
                        ->orderBy($sort_field_email, $sort_field_direction)
                        ->orderBy($sort_field_contract_number, $sort_field_direction)
                        ->orderBy($sort_field_role, $sort_field_direction)
                        ->orderBy($sort_field_status, $sort_field_direction);

        $users = $users->paginate($perItem)->toArray();

        return response()->json($users, 200);
    }
    /**
     * Handle the edit user event.
    */
    public function editUser($id)
    {
        $users = User::findOrFail($id);
        return response()->json([
            'status' => 200,
            'messages' => $users,
            'data' => $users
        ]);
    }
    /**
     * Handle the update user event.
    */
    public function updateUser(Request $request, User $user)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:120',
            'contract_number' => 'required|numeric|digits:11',
            'email' => 'string|email|required|max:100',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contract_number = $request->input('contract_number');
    
        if ($request->hasFile('image')) {
            $this->handleImageUpload($request, $user);
        }
        $user->save();
        
        return response()->json([
            'status' => 200,
            'messages' => 'User account is updated successfully',
            // 'data' => $user->toArray(),
        ]);
    }
    // image handle
    private function handleImageUpload(Request $request, User $user)
    {
        $path = 'image/' . $user->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('image/', $filename);
        $user->image = $filename;
    }
    /**
     * Handle the show user event.
    */
    public function showUser($id)
    {
        $users = User::with('emailVerification')->findOrFail($id);

        if ($users) {
            return response()->json([
                'status' => 200,
                'messages' => $users,
                'data' => $users
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'User is not found!',
            ]);
        }
    }
    /**
     * Handle the delete user event.
    */
    public function deleteUser($id)
    {
        $users = User::find($id);
        $users->delete();

        return response()->json([
            'status' => 200,
            'messages' => 'User account is deleted successfully',
        ]);
    }
    /**
     * Handle the user status update event.
    */
    public function update_statu(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = User::findOrFail($id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'User Status Update Successfully',
            'code' => 202,
        ], 202);
    }
    /**
     * Handle the search account-holders data get event.
    */
    public function accounts_holder(Request $request)
    {
        $roles = Role::all();
        $data = EmailVerification::all();

        $search = $request['search'] ?? "";
        if ($search != null) {
            $users = User::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $search . '%')
                ->orWhere('role', 'LIKE', '%' . $search . '%')
                ->orWhere('id', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $users = User::orderBy('id', 'desc')
            ->latest()
            ->paginate(1);
        }

        return view('super-admin.account-holders.account-holders_list', compact('data','roles','users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    /**
     * Handle manage role view event.
    */
    public function manageRoles()
    {
        $users = User::where('status', '=', 0)->orderBy('id', 'desc')->get();
        // $company_profiles = companyProfile::where('id', '=', 1)->get();
        $roles = Role::all();
        return view('super-admin.manage-role',compact('users', 'roles'));
    }
    /**
     * Handle update manage role event.
    */
    public function updateRoles(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'role_id' => 'required|string',
        ],[
            'user_id.required' => 'User email is required.',
            'role_id.required' => 'User role is required.',
        ]);
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back()->with('success', 'User role and permission is updated');
    }
    /**
     * Handle update manage role event.
    */
}
