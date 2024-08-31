<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SessionModel;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UserLocationController extends Controller
{
    // User Activity Loaction
    public function details(Request $request)
    {
        $usersCount = [
            'super_admin' => User::where('role', 1)->count(),
            'admin' => User::where('role', 3)->count(),
            'sub_admin' => User::where('role', 2)->count(),
            'accounts' => User::where('role', 5)->count(),
            'marketing' => User::where('role', 6)->count(),
            'delivery_team' => User::where('role', 7)->count(),
            'users' => User::where('role', 0)->count(),
        ];

        $total_users = User::count();
        $authentic_users = User::where('status', 0)->count();
        $inactive_users = User::where('status', 1)->count();

        // Calculate the percentage of total users
        $total_users_percentage = $total_users > 0 ? ($total_users / $total_users) * 100 : 0;
        // Calculate the percentage of total authentic_users
        $authentic_users_percentage = $total_users > 0 ? ($authentic_users / $total_users) * 100 : 0;
        // Calculate the percentage of total inactive_users
        $inactive_users_percentage = $total_users > 0 ? ($inactive_users / $total_users) * 100 : 0;
        // Calculate the percentage for each role
        $percentageRoles = [];
        foreach ($usersCount as $role => $count) {
            $percentageRoles[$role] = $total_users > 0 ? ($count / $total_users) * 100 : 0;
        }

        // activity users
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $intime_or_outtime_activity_users = SessionModel::whereNotNull('id')->count();
        $intime_activity_users = SessionModel::where('status', 0)->count();
        $activity_users = SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        // Calculate the percentage of total activity users
        $activity_users_percentage = $intime_or_outtime_activity_users > 0 ? ($intime_activity_users / $intime_or_outtime_activity_users) * 100 : 0;

        if ($request->expectsJson()) {
            return response()->json([
                'total_users' => $total_users,
                'authentic_users' => $authentic_users,
                'inactive_users' => $inactive_users,
                'activity_users' => $activity_users,
                'usersCount' => $usersCount,
                'total_users_percentage' => $total_users_percentage,
                'authentic_users_percentage' => $authentic_users_percentage,
                'inactive_users_percentage' => $inactive_users_percentage,
                'activity_users_percentage' => $activity_users_percentage,
                'percentageRoles' => $percentageRoles,
            ]);
        }
        
        return view('super-admin.user-details.details', compact('usersCount','total_users','authentic_users','inactive_users','activity_users',
            'total_users_percentage','authentic_users_percentage','inactive_users_percentage','percentageRoles','activity_users_percentage')
        );
    }

    // Get User Activity
    public function getActivity(Request $request)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $user_activities = SessionModel::whereNotNull('role')->orderBy('id', 'desc')->latest()->with(['roles'])->whereBetween('created_at', [$startOfMonth, $endOfMonth]);

        if ($query = $request->get('query')) {
            $user_activities->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $query . '%')
                ->orWhere('role', 'LIKE', '%' . $query . '%')
                ->orWhere('id', 'LIKE', '%' . $query . '%');
        }

        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        $data = $user_activities->paginate($perItem)->toArray();

        return response()->json($data, 200);
    }

    // Show User Log Details
    public function activity($user_id)
    {
        
        $users_session = SessionModel::with('roles')->find($user_id);
        //dd($users_session);

        if ($users_session) {
            return response()->json([
                'status' => 200,
                'messages' => $users_session,
                'data' => $users_session
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'User is not found!',
            ]);
        }
    }
}
