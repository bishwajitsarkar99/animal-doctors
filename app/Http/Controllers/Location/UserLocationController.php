<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SessionModel;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;
use DB;

class UserLocationController extends Controller
{
    // User Activity Loaction
    public function details(Request $request)
    {
        // Get Role
        $roles = Role::orderBy('id', 'desc')->get();

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
            'total_users_percentage','authentic_users_percentage','inactive_users_percentage','percentageRoles','activity_users_percentage','roles')
        );
    }

    // Get User Activity
    public function getActivity(Request $request)
    {
        // Start of the week on Sunday
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        // End of the week on Saturday
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY);


        // Date Request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Sort field and direction
        $sort_field = $request->input('sort_field', 'id');
        $sort_direction = $request->input('sort_direction', 'asc');

        // Start the query for user activities
        $user_activities = SessionModel::whereNotNull('role')->with(['roles']);

        // Apply default current month filter if no custom date range provided
        if (!$start_date || !$end_date) {
            $user_activities->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
        }

        // Apply date range filter
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfDay();
            $end = Carbon::parse($end_date)->endOfDay();
            $user_activities->whereBetween('created_at', [$start, $end]);
        }

        // Apply search query
        if ($query = $request->get('query')) {
            $user_activities->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $query . '%')
                ->orWhere('role', 'LIKE', '%' . $query . '%')
                ->orWhere('user_id', 'LIKE', '%' . $query . '%');
            });
        }

        // Apply role filter
        if ($role = $request->input('role')) {
            $user_activities->where('role', $role);
        }

        // Apply sorting based on requested field and direction
        $user_activities->orderBy($sort_field, $sort_direction);

        // Set pagination limit
        $perItem = $request->input('per_item', 10);

        // Get the final paginated data
        $data = $user_activities->paginate($perItem)->toArray();

        return response()->json($data, 200);
    }

    // Show User Log Details
    public function activity(Request $request)
    {
        // Current Month User Activities
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Current Week User Activities (last 7 days)
        $startOfWeek = Carbon::now()->subDays(6)->startOfDay();
        $endOfWeek = Carbon::now()->endOfDay();

        // Current Day User Activities
        $startOfDay = Carbon::now()->startOfDay();
        $endOfDay = Carbon::now()->endOfDay();

        // Count current users, logins, and logouts
        $current_users = SessionModel::whereBetween('created_at', [$startOfDay, $endOfDay])
            ->whereNotNull('user_id')->distinct('user_id')->count('user_id');

        $current_login_users = SessionModel::where('payload', 'login')
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->whereNotNull('user_id')->distinct('user_id')->count('user_id');

        $current_logout_users = SessionModel::where('payload', 'logout')
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->whereNotNull('user_id')->distinct('user_id')->count('user_id');

        // Authentic users
        $authentic_users = User::where('status', 0)->count();

        // Calculate percentage values for current activities
        $total_current_users_activities_percentage = $authentic_users > 0 
            ? ($current_users / $authentic_users) * 100 
            : 0;

        $login_current_users_activities_percentage = $authentic_users > 0 
            ? ($current_login_users / $authentic_users) * 100 
            : 0;

        $logout_current_users_activities_percentage = $authentic_users > 0 
            ? ($current_logout_users / $authentic_users) * 100 
            : 0;

        // Group by day for login, logout, and current user counts (weekly data)
        $login_counts = SessionModel::select(DB::raw('DATE(created_at) as day'), DB::raw('count(*) as count'))
            ->where('payload', 'login')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray();

        $logout_counts = SessionModel::select(DB::raw('DATE(created_at) as day'), DB::raw('count(*) as count'))
            ->where('payload', 'logout')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray();

        $current_user_counts = SessionModel::whereNotNull('user_id')
            ->select(DB::raw('DATE(created_at) as day'), DB::raw('COUNT(DISTINCT user_id) as count'))
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray();

        // Prepare array with the last 7 days (Saturday to Friday)
        $daysOfWeek = [];
        for ($i = 6; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i)->format('Y-m-d');
            $daysOfWeek[] = $day;
        }

        // Fill in missing days with 0 counts
        $login_counts_filled = [];
        $logout_counts_filled = [];
        $current_user_counts_filled = [];

        foreach ($daysOfWeek as $day) {
            $login_counts_filled[] = isset($login_counts[$day]) ? $login_counts[$day] : 0;
            $logout_counts_filled[] = isset($logout_counts[$day]) ? $logout_counts[$day] : 0;
            $current_user_counts_filled[] = isset($current_user_counts[$day]) ? $current_user_counts[$day] : 0;
        }

        // Monthly user activity data (group by month)
        $login_counts_monthly = SessionModel::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        ->where('payload', 'login')
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

        $logout_counts_monthly = SessionModel::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        ->where('payload', 'logout')
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

        $current_user_counts_monthly = SessionModel::whereNotNull('user_id')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(DISTINCT user_id) as count'))
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

        // Generate the months for August and September
        $daysOfMonth = []; // Initialize the array

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth(); // Start of August
        $endOfThisMonth = Carbon::now()->endOfMonth(); // End of September

        // Generate the days for August and September
        $period = CarbonPeriod::create($startOfLastMonth, '1 day', $endOfThisMonth);

        foreach ($period as $date) {
            $daysOfMonth[] = $date->format('Y-m-d'); // Fill $daysOfMonth with dates from August and September
        }

        // Now you can safely use $daysOfMonth in your loops

        $login_counts_monthly_filled = [];
        $logout_counts_monthly_filled = [];
        $current_user_counts_monthly_filled = [];

        foreach ($daysOfMonth as $day) {
            $login_counts_monthly_filled[] = isset($login_counts_monthly[$day]) ? $login_counts_monthly[$day] : 0;
            $logout_counts_monthly_filled[] = isset($logout_counts_monthly[$day]) ? $logout_counts_monthly[$day] : 0;
            $current_user_counts_monthly_filled[] = isset($current_user_counts_monthly[$day]) ? $current_user_counts_monthly[$day] : 0;
        }

        return response()->json([
            'current_users' => $current_users,
            'current_login_users' => $current_login_users,
            'current_logout_users' => $current_logout_users,
            'total_current_users_activities_percentage' => $total_current_users_activities_percentage,
            'login_current_users_activities_percentage' => $login_current_users_activities_percentage,
            'logout_current_users_activities_percentage' => $logout_current_users_activities_percentage,
            // Daily user activity data
            'current_user_count_per_day' => [
                'login_counts' => $login_counts_filled,
                'logout_counts' => $logout_counts_filled,
                'current_user_counts' => $current_user_counts_filled,
            ],
            'labels' => $daysOfWeek,
            'data' => $current_user_counts_filled,
             // Monthly user activity data
            'monthly_user_count_per_day' => [
                'login_counts' => $login_counts_monthly_filled,
                'logout_counts' => $logout_counts_monthly_filled,
                'current_user_counts' => $current_user_counts_monthly_filled,
            ],
            'labels_monthly' => $daysOfMonth,
            'data_monthly' => $current_user_counts_monthly_filled,
        ]);
    }
    // private function getUserCounts($role)  {
        
    //     $data = [];
    //     for ($i = 1; $i <= 12; $i++) {
    //         $data[$i] = $i;
    //     }
    //     $year = date("Y"); 

    //     foreach (User::getUserCounts($role) as $key => $user) {
    //         $month = (int)\str_replace("{$year}-", '', $user->month);
    //         $data[$month] = $user->user_count;
    //     }
    //     return  $data ;
    // }

}
