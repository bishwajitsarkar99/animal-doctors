<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SessionModel;

class UserLocationController extends Controller
{
    // User Activity Loaction
    public function details()
    {
        return view('super-admin.user-details.details');
    }

    // Get User Activity
    public function getActivity(Request $request)
    {
        $user_activities = SessionModel::whereNotNull('role')->orderBy('id', 'desc')->with('roles')->get();

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

        $users = $users->paginate($perItem)->toArray();

        return response()->json($users, 200);
    }
}
