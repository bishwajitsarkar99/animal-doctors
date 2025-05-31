<?php
namespace App\LogicBild\UserActivity;
use Illuminate\Http\Request;
use App\Models\SessionModel;
use App\Models\User;
use App\Models\Role;
use App\Models\Branch\Branches;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;

class UserActivityServiceProvider
{
    // ========================= User Activity =================================
    // =========================================================================
    /**
     * Handle Route ID Generate User Log Details.
    */
    public function redirectWithRandomId()
    {
        $idRange = 30; // Random 30-character string
        $firstRanger = '~^&&>~^&&' ; // First Ranger
        $lastRanger = '~$^&&<$^&' ; // First Ranger
        $id = Str::random($idRange);
        $slug = $firstRanger.$id.$lastRanger;
        session([
            'valid_user_log_random' => $slug,
        ]);

        return redirect()->route('user.details', [
            'slug' => $slug,
        ]);
    }
    /**
     * Handle User Details View 
    */
    public function viewUserDetails(Request $request, $slug)
    {
        $auth = Auth::User();
        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;

        if($email && $role_id){
            $user_analycis_authorize = 1; // log dashboard page authorize
            $user_activity_authorize = 1; // user activity authorize
            $user_activity_graph_authorize = 1; // user activity graph authorize
            $user_log_data_table_permission = 1; // log data table permission
        }

        if($user_branch_id && $role_id){

            if ($role_id === 1) {
                $branch_id = Branches::pluck('branch_id'); // Get all branch IDs as array
            } else {
                $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
            }
            
            // Define the start and end of the current month
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();
            // Get Session user login data
            $start = Carbon::now()->startOfYear();
            $end = Carbon::now();

            // User storage capacity
            $user_capacity=100;
            
            // User and Role Count
            $user_roles = User::whereIn('branch_id', $branch_id)->pluck('role')->unique();
            $roles = Role::whereIn('id', $user_roles)->get();

            $total_users = User::whereIn('branch_id', $branch_id)->count();
            $superAdmin = User::where('role', 1)->whereIn('branch_id', $branch_id)->count();
            $admin = User::where('role', 3)->whereIn('branch_id', $branch_id)->count();
            $subAdmin = User::where('role', 2)->whereIn('branch_id', $branch_id)->count();
            $accounts = User::where('role', 5)->whereIn('branch_id', $branch_id)->count();
            $marketing = User::where('role', 6)->whereIn('branch_id', $branch_id)->count();
            $deliveryTeam = User::where('role', 7)->whereIn('branch_id', $branch_id)->count();
            $users = User::where('role', 0)->whereIn('branch_id', $branch_id)->count();
            $inactiveUsers = User::where('status', 1)->whereIn('branch_id', $branch_id)->count();
            $activeUsers = User::where('status', 0)->whereIn('branch_id', $branch_id)->count();
            // User Session Data Count
            $userSessionData = SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->whereIn('branch_id', $branch_id)->count();

            // Get login data grouped by branch and role
            $logins = SessionModel::whereIn('branch_id', $branch_id)->whereBetween('created_at', [$start, $end])
                ->whereNotNull('user_id')
                ->whereNotNull('role')
                ->whereNotNull('branch_id')
                ->whereIn('payload', ['login', 'logout'])
                ->with('roles') // ensure you load the role relationship
                ->select('branch_id', 'role', DB::raw('count(*) as login_count'))
                ->groupBy('branch_id', 'role')
                ->get();

            // Get logout data grouped by branch and role
            $logouts = SessionModel::whereIn('branch_id', $branch_id)->whereBetween('created_at', [$start, $end])
                ->whereNotNull('user_id')
                ->whereNotNull('role')
                ->whereNotNull('branch_id')
                ->where('payload', 'logout')
                ->with('roles')
                ->select('branch_id', 'role', DB::raw('count(*) as logout_count'))
                ->groupBy('branch_id', 'role')
                ->get();

            // Additional query 1: Total login + logout activity
            $logActivities = SessionModel::whereIn('branch_id', $branch_id)->whereBetween('created_at', [$start, $end])
                ->whereNotNull('user_id')
                ->whereNotNull('role')
                ->whereNotNull('branch_id')
                ->whereIn('payload', ['login', 'logout']) // fixed: should be `whereIn`
                ->with('roles')
                ->select('branch_id', 'role', DB::raw("COUNT(*) as total_activity_count"))
                ->groupBy('branch_id', 'role')
                ->get();

            // Additional query 2: Current login counts
            $currentLogin = SessionModel::whereIn('branch_id', $branch_id)->whereBetween('created_at', [$start, $end])
                ->whereNotNull('user_id')
                ->whereNotNull('role')
                ->whereNotNull('branch_id')
                ->where('payload', 'login')
                ->with('roles')
                ->select('branch_id', 'role', DB::raw('count(*) as current_login'))
                ->groupBy('branch_id', 'role')
                ->get();

            // User Analycis Page Mini Card Data
            $miniCardData = $this->getMiniCardData($branch_id, $total_users, $user_capacity, $startOfMonth, $endOfMonth, $inactiveUsers, $activeUsers);
            // User Analycis Page Summary Card Data
            $summaryCardData = $this->getSummaryCardData($roles, $total_users, $superAdmin, $admin, $subAdmin, $accounts, $marketing, $deliveryTeam, $users);
            $totalPercentageVlaue = array_sum($summaryCardData);
            $bytes = 1024;
            $totalPercentage = $totalPercentageVlaue > 0 ? ($totalPercentageVlaue / $bytes) * 100 : 0;
            // User Analycis Page Branch Session Data 
            $branch_log_session_data = $this->getBranchInfoData($branch_id);
            // User Analycis Page User Activities Line Chart
            $usersActivityCount = $this->getUserActivitiesLineChart($startOfMonth, $endOfMonth, $inactiveUsers, $activeUsers, $userSessionData, $total_users);
            // User Analycis Page User Activities Bar Chart
            $usersCount = $this->getUserActivitiesBarChart($total_users, $startOfMonth, $endOfMonth,$superAdmin, $admin, $subAdmin, $accounts, $marketing, $deliveryTeam, $users, $inactiveUsers, $activeUsers, $userSessionData);
            // User Analycis Page User Branch Bar Chart
            [$formattedBranchStats, $branchRoleStats] = $this->getBranchBarChart($logins, $logouts, $logActivities, $currentLogin);
            // User Storage allocation
            $storage = $this->storageAllocation($total_users);
            
            $storedRandom = session('valid_user_log_random');
            $page_name = 'User Log Activity';
            $user_activity_page_name = 'User Activity';
            $user_activity_graph_page_name = 'User Activity Graph';
            
            if ($storedRandom && $slug === $storedRandom) {
                $user_analycis_authorize = (int) $user_analycis_authorize;
    
                if ($user_analycis_authorize === 1) {
                    return view('super-admin.user-details.details', compact('usersCount','usersActivityCount',
                    'miniCardData','summaryCardData', 'totalPercentage', 'roles', 'page_name','user_activity_authorize', 'user_activity_graph_authorize', 
                    'user_activity_page_name', 'user_activity_graph_page_name', 'user_log_data_table_permission', 
                    'branch_log_session_data', 'formattedBranchStats', 'storage', 'totalPercentageVlaue'))->with('branchRoleStats', $formattedBranchStats);
                }else{
                    return view('unauthorize-page.index', compact('page_name'));
                }
            }
            return view('unauthorize-page.page-session-block', compact('page_name'));
        }
    }

    // Helper Function User Analycis Page Mini Card Get Data
    private function getMiniCardData($branch_id, $total_users, $user_capacity, $startOfMonth, $endOfMonth, $inactiveUsers, $activeUsers)
    {
        $authentic_users = $activeUsers;
        $inactive_users = $inactiveUsers;

        // start top mini card Calculate the percentage of total users
        $total_users_percentage = $user_capacity > 0 ? ($total_users / $user_capacity) * 100 : 0;
        // Calculate the percentage of total authentic_users
        $authentic_users_percentage = $user_capacity > 0 ? ($authentic_users / $user_capacity) * 100 : 0;
        // Calculate the percentage of total inactive_users
        $inactive_users_percentage = $user_capacity > 0 ? ($inactive_users / $user_capacity) * 100 : 0;

        // Calculate the percentage and total activity users
        $intime_or_outtime_activity_users = SessionModel::whereNotNull('id')->whereIn('branch_id', $branch_id)->count();
        $intime_activity_users = SessionModel::where('status', 0)->whereIn('branch_id', $branch_id)->count();
        $activity_users = SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->whereIn('branch_id', $branch_id)->count();

        $activity_users_percentage = $intime_activity_users > 0 ? ($activity_users / $intime_or_outtime_activity_users) * 100 : 0;

        return [
            'total_users' => $total_users,
            'total_users_percentage' => $total_users_percentage,
            'authentic_users' => $authentic_users,
            'authentic_users_percentage' => $authentic_users_percentage,
            'inactive_users' => $inactive_users,
            'inactive_users_percentage' => $inactive_users_percentage,
            'activity_users' => $intime_or_outtime_activity_users,
            'activity_users_percentage' => $activity_users_percentage,
        ];
    }
    // Helper Function User Analycis Page Summary Card Get Data
    private function getSummaryCardData($roles, $total_users, $superAdmin, $admin, $subAdmin, $accounts, $marketing, $deliveryTeam, $users)
    {
        $usersCount = [
            'super_admin' => $superAdmin,
            'admin' => $admin,
            'sub_admin' => $subAdmin,
            'accounts' => $accounts,
            'marketing' => $marketing,
            'delivery_team' => $deliveryTeam,
            'users' => $users,
        ];
        $percentageRoles = [];
        foreach ($usersCount as $role => $count) {
            $percentageRoles[$role] = $total_users > 0 ? ($count / $total_users) * 100 : 0;
        }
        return $percentageRoles;
    }
    // Helper Function User Analycis Page Branch Information Get Data
    private function getBranchInfoData($branch_id)
    {
        // Start Branch Information Data Chart
        $branch_session_data = SessionModel::whereIn('branch_id', $branch_id)
        ->whereNotNull('user_id')
        ->whereNotNull('role')
        ->whereNotNull('branch_id')
        ->select('user_id', 'branch_id', 'role', DB::raw('COUNT(DISTINCT user_id) as unique_email_count'))
        ->groupBy('user_id', 'branch_id', 'role')
        ->with(['users', 'roles'])
        ->get()
        ->groupBy('branch_id');

        return $branch_session_data;
    }
    // Helper Function User Analycis Page User Acivities Line Chart ( Current Time )
    private function getUserActivitiesLineChart($startOfMonth, $endOfMonth, $inactiveUsers, $activeUsers, $userSessionData, $total_users)
    {
        $usersActivityLineCount = [
            'inactive_users_activity' => $inactiveUsers,
            'active_users_activity' => $activeUsers,
            'users_log_activities' => $userSessionData,
            'total_users_activity' => $total_users,
        ];

        return $usersActivityLineCount;
    }
    // Helper Function User Analycis Page User Acivities Bar Chart
    private function getUserActivitiesBarChart($total_users, $startOfMonth, $endOfMonth, $superAdmin, $admin, $subAdmin, $accounts, $marketing, $deliveryTeam, $users, $inactiveUsers, $activeUsers, $userSessionData)
    {
        $usersBarChartCount = [
            'super_admin' => $superAdmin,
            'admin' => $admin,
            'sub_admin' => $subAdmin,
            'accounts' => $accounts,
            'marketing' => $marketing,
            'delivery_team' => $deliveryTeam,
            'users' => $users,
            'inactive_users' => $inactiveUsers,
            'active_users' => $activeUsers,
            'users_log_activity' => $userSessionData,
            'total_users' => $total_users,
        ];

        return $usersBarChartCount;
    }
    // Helper Function User Analycis Page User Acivities Bar Chart
    private function getBranchBarChart($logins, $logouts, $logActivities, $currentLogin)
    {
       $activityMap = [];
        foreach ($logActivities as $activity) {
            $branchId = $activity->branch_id;
            $roleName = $activity->roles->name ?? 'N/A';
            $activityMap[$branchId][$roleName] = $activity->total_activity_count;
        }

        $currentLoginMap = [];
        foreach ($currentLogin as $login) {
            $branchId = $login->branch_id;
            $roleName = $login->roles->name ?? 'N/A';
            $currentLoginMap[$branchId][$roleName] = $login->current_login;
        }
        // Combine login and logout counts
        $branchRoleStats = [];

        foreach ($logins as $login) {
            $branchId = $login->branch_id;
            $roleName = $login->roles->name ?? 'N/A';

            $branchRoleStats[$branchId][$roleName]['login'] = $login->login_count;
            $branchRoleStats[$branchId][$roleName]['logout'] = 0; // initialize
        }

        foreach ($logouts as $logout) {
            $branchId = $logout->branch_id;
            $roleName = $logout->roles->name ?? 'N/A';

            if (!isset($branchRoleStats[$branchId][$roleName])) {
                $branchRoleStats[$branchId][$roleName]['login'] = 0; // initialize
            }
            $branchRoleStats[$branchId][$roleName]['logout'] = $logout->logout_count;
        }

        $formattedBranchStats = [];

        foreach ($branchRoleStats as $branchId => $roleData) {
            $roles = [];
            $loginCounts = [];
            $logoutCounts = [];
            $activityCounts = [];
            $currentLogins = [];

            foreach ($roleData as $role => $counts) {
                $roles[] = $role;
                $loginCounts[] = $counts['login'] ?? 0;
                $logoutCounts[] = $counts['logout'] ?? 0;
                // Add total activity count
                $activityCounts[] = $activityMap[$branchId][$role] ?? 0;
                // Add current login count
                $currentLogins[] = $currentLoginMap[$branchId][$role] ?? 0;
            }

            // Total values
            $totalLogin = array_sum($loginCounts);
            $totalLogout = array_sum($logoutCounts);
            $totalActivity = array_sum($activityCounts);
            $totalCurrentLogin = array_sum($currentLogins);

            $formattedBranchStats[$branchId] = [
                'roles' => $roles,
                'login_counts' => $loginCounts,
                'logout_counts' => $logoutCounts,
                'activity_counts' => $activityCounts,
                'current_login_counts' => $currentLogins,
                // Totals
                'total_login' => $totalLogin,
                'total_logout' => $totalLogout,
                'total_activity' => $totalActivity,
                'total_current_login' => $totalCurrentLogin,
            ];
        } 

        return [$formattedBranchStats, $branchRoleStats];
    }
    // User Dynamic Storage Allocation
    private function storageAllocation($total_users)
    {
        // Each 100 users = 1 KB
        $kb_storage = ceil($total_users / 100);

        // If 100 KB or more, convert to MB
        if ($kb_storage >= 100) {
            $mb_storage = number_format($kb_storage / 100, 2);
            return $mb_storage . ' MB';
        }
        return $kb_storage . ' KB';
    }
    /**
     * Handle User Activity Get
    */
    public function getActivities(Request $request)
    {
        $auth = Auth::User();
        $user_branch_id = $auth->branch_id;
        $role_id = $auth->role;
        $email = $auth->login_email;

        if($email && $role_id){
            $user_log_data_table_permission = 1; // log data table permission
        }

        if($user_branch_id && $role_id){

            if ($role_id === 1) {
                $branch_id = Branches::pluck('branch_id'); // Get all branch IDs as array
            } else {
                $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
            }

            // Start of the week on Sunday
            //$startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY);
            // End of the week on Saturday
            //$endOfWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY);

            // Start of the day
            $startOfDay = Carbon::now()->startOfDay();
            // End of the day
            $endOfDay = Carbon::now()->endOfDay();
    
    
            // Date Request
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            // Sort field and direction
            $sort_field = $request->input('sort_field', 'id');
            $sort_direction = $request->input('sort_direction', 'desc');
            
            // total data count
            $total_users = SessionModel::whereIn('branch_id', $branch_id)->count();
            // Start the query for user activities
            $user_activities = SessionModel::whereNotNull('role')->whereIn('branch_id', $branch_id)->with(['roles', 'users']);
    
            // Apply default current month filter if no custom date range provided
            if (!$start_date || !$end_date) {
                $user_activities->whereBetween('created_at', [$startOfDay, $endOfDay]);
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
            
            // Paginate
            $perItem = (int) $request->input('per_item', 10);
            $perItem = $perItem > 0 ? $perItem : 10;
    
            $paginateData = $user_activities->paginate($perItem);
            
            $item_num = $paginateData->count();
            if($user_log_data_table_permission === 1){
                return response()->json([
                    'data' => $paginateData->items(),
                    'links' => $paginateData->toArray()['links'] ?? [],
                    'total' => $paginateData->total(),
                    'total_users' => $total_users,
                    'per_page' => $perItem,
                    'per_item_num' => $item_num,
                ],200);

            }else{
                return response()->json([
                    'message' => 'Server does not response data.'
                ], 200);
            }
        }
    }
    /**
     * Handle User Activity Log Show
    */
    public function activities(Request $request)
    {
        $auth = Auth::User();
        $branch_id = $auth->branch_id;
        $role_id = $auth->role;
        $email = $auth->login_email;

        if($branch_id && $role_id && $email){

            $user_log_data_table_permission = 1; // log data table permission
            
            // Current Month User Activities
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();
    
            // Current Week User Activities (last 7 days)
            $startOfWeek = Carbon::now()->subDays(6)->startOfDay();
            $endOfWeek = Carbon::now()->endOfDay();
    
            // Current Day User Activities
            $startOfDay = Carbon::now()->startOfDay();
            $endOfDay = Carbon::now()->endOfDay();

            if($role_id === 1){
                // Count current users, logins, and logouts
                $current_users = SessionModel::whereBetween('created_at', [$startOfDay, $endOfDay])
                    ->whereNotNull('user_id')->distinct('user_id')->count('user_id');
        
                $current_login_users = SessionModel::where('payload', 'login')
                    ->whereBetween('created_at', [$startOfDay, $endOfDay])
                    ->whereNotNull('user_id')->count();
        
                $current_logout_users = SessionModel::where('payload', 'logout')
                    ->whereBetween('created_at', [$startOfDay, $endOfDay])
                    ->whereNotNull('user_id')->count();
        
                // Authentic users
                $authentic_users = User::where('status', 0)->count();

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

                // Monthly user activity data (group by month)
                $login_counts_monthly = SessionModel::whereNotNull('user_id')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                ->where('payload', 'login')
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();
                
                $logout_counts_monthly = SessionModel::whereNotNull('user_id')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                ->where('payload', 'logout')
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();
                
                $current_user_counts_monthly = SessionModel::whereNotNull('user_id')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(DISTINCT user_id) as count'))
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();
            }else{
                // Count current users, logins, and logouts
                $current_users = SessionModel::whereBetween('created_at', [$startOfDay, $endOfDay])
                    ->whereNotNull('user_id')->distinct('user_id')->where('branch_id', $branch_id)->count('user_id');
        
                $current_login_users = SessionModel::where('payload', 'login')
                    ->whereBetween('created_at', [$startOfDay, $endOfDay])
                    ->whereNotNull('user_id')->where('branch_id', $branch_id)->count();
        
                $current_logout_users = SessionModel::where('payload', 'logout')
                    ->whereBetween('created_at', [$startOfDay, $endOfDay])
                    ->whereNotNull('user_id')->where('branch_id', $branch_id)->count();
        
                // Authentic users
                $authentic_users = User::where('status', 0)->where('branch_id', $branch_id)->count();

                // Group by day for login, logout, and current user counts (weekly data)
                $login_counts = SessionModel::select(DB::raw('DATE(created_at) as day'), DB::raw('count(*) as count'))
                    ->where('payload', 'login')
                    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->where('branch_id', $branch_id)
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
        
                $logout_counts = SessionModel::select(DB::raw('DATE(created_at) as day'), DB::raw('count(*) as count'))
                    ->where('payload', 'logout')
                    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->where('branch_id', $branch_id)
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
        
                $current_user_counts = SessionModel::whereNotNull('user_id')
                    ->select(DB::raw('DATE(created_at) as day'), DB::raw('COUNT(DISTINCT user_id) as count'))
                    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->where('branch_id', $branch_id)
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
                

                // Monthly user activity data (group by month)
                $login_counts_monthly = SessionModel::whereNotNull('user_id')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                ->where('payload', 'login')
                ->where('branch_id', $branch_id)
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();
                
                $logout_counts_monthly = SessionModel::whereNotNull('user_id')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                ->where('payload', 'logout')
                ->where('branch_id', $branch_id)
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();
                
                $current_user_counts_monthly = SessionModel::whereNotNull('user_id')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(DISTINCT user_id) as count'))
                ->where('branch_id', $branch_id)
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();

            }
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
    
            // Prepare array with the last 7 days (Saturday to Friday)
            $daysOfWeek = [];
            for ($i = 6; $i >= 0; $i--) {
                $day = Carbon::now()->subDays($i)->format('Y-m-d');
                //$daysOfWeek[] = $day->format('d M Y');
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
    
            // Initialize an array for 12 months (Jan to Dec) with zeros
            $data = array_fill(1, 12, 0);
            $year = date("Y");
            // Fill monthly data with login, logout, and user counts
            $login_counts_monthly_filled = [];
            $logout_counts_monthly_filled = [];
            $current_user_counts_monthly_filled = [];
    
            for ($month = 1; $month <= 12; $month++) {
                $formattedMonth = sprintf('%s-%02d', $year, $month); // Format as 'MM-YYYY'
    
                $login_counts_monthly_filled[] = isset($login_counts_monthly[$formattedMonth]) ? $login_counts_monthly[$formattedMonth] : 0;
                $logout_counts_monthly_filled[] = isset($logout_counts_monthly[$formattedMonth]) ? $logout_counts_monthly[$formattedMonth] : 0;
                $current_user_counts_monthly_filled[] = isset($current_user_counts_monthly[$formattedMonth]) ? $current_user_counts_monthly[$formattedMonth] : 0;
            }

            if($user_log_data_table_permission === 1){
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
                ]);
            }else{
                return response()->json([
                    'message' => 'Server data not response.'
                ], 200);
            }
        }
    }
    /**
     * Handle User Activity Log Analytical Chart
    */
    public function userAnalyticalCharts(Request $request)
    {
        $auth = Auth::User();
        $branch_id = $auth->branch_id;
        $role_id = $auth->role;
        $email = $auth->login_email;

        if($branch_id && $role_id && $email){

            $user_log_data_table_permission = 1; // log data table permission

            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            if ($start_date && $end_date) {
                $start = Carbon::parse($start_date)->startOfDay();
                $end = Carbon::parse($end_date)->endOfDay();
            } else {
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfMonth();
            }

            if($role_id === 1){
                // Monthly data get 
                $login_counts_monthly = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'login')
                    ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                    ->groupBy('month')
                    ->pluck('count', 'month')
                    ->toArray();
        
                $logout_counts_monthly = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'logout')
                    ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                    ->groupBy('month')
                    ->pluck('count', 'month')
                    ->toArray();
        
                $current_user_counts_monthly = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(DISTINCT user_id) as count'))
                    ->groupBy('month')
                    ->pluck('count', 'month')
                    ->toArray();

                // Day Basis data 
                $login_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'login')
                    ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
        
                $logout_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'logout')
                    ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
        
                $current_user_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('COUNT(DISTINCT user_id) as count'))
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();

            }else{
                // Monthly data get 
                $login_counts_monthly = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'login')
                    ->where('branch_id', $branch_id)
                    ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                    ->groupBy('month')
                    ->pluck('count', 'month')
                    ->toArray();
        
                $logout_counts_monthly = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'logout')
                    ->where('branch_id', $branch_id)
                    ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
                    ->groupBy('month')
                    ->pluck('count', 'month')
                    ->toArray();
        
                $current_user_counts_monthly = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('branch_id', $branch_id)
                    ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(DISTINCT user_id) as count'))
                    ->groupBy('month')
                    ->pluck('count', 'month')
                    ->toArray();

                // Day Basis data 
                $login_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'login')
                    ->where('branch_id', $branch_id)
                    ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
        
                $logout_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('payload', 'logout')
                    ->where('branch_id', $branch_id)
                    ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
        
                $current_user_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
                    ->whereNotNull('user_id')
                    ->where('branch_id', $branch_id)
                    ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('COUNT(DISTINCT user_id) as count'))
                    ->groupBy('day')
                    ->pluck('count', 'day')
                    ->toArray();
            }
    
            $monthly_labels = [];
            $login_counts_monthly_filled = [];
            $logout_counts_monthly_filled = [];
            $current_user_counts_monthly_filled = [];
    
            $period = Carbon::parse($start)->startOfDay();
            $endPeriod = Carbon::parse($end)->startOfDay();
    
            while ($period <= $endPeriod) {
                $formattedMonth = $period->format('Y-m');
                $monthly_labels[] = $period->format('M Y');
                $login_counts_monthly_filled[] = $login_counts_monthly[$formattedMonth] ?? 0;
                $logout_counts_monthly_filled[] = $logout_counts_monthly[$formattedMonth] ?? 0;
                $current_user_counts_monthly_filled[] = $current_user_counts_monthly[$formattedMonth] ?? 0;
                // change period day or month
                //$period->addDay();
                $period->addMonth();
            }
    
            $date_labels = [];
            $login_counts_date_filled = [];
            $logout_counts_date_filled = [];
            $current_user_counts_date_filled = [];
    
            $start_period = Carbon::parse($start)->startOfDay();
            $end_eriod = Carbon::parse($end)->startOfDay();
    
            while ($start_period <= $end_eriod) {
                $formattedDate = $start_period->format('d-m-Y');
                $date_labels[] = $start_period->format('d M Y');
                $login_counts_date_filled[] = $login_counts_date[$formattedDate] ?? 0;
                $logout_counts_date_filled[] = $logout_counts_date[$formattedDate] ?? 0;
                $current_user_counts_date_filled[] = $current_user_counts_date[$formattedDate] ?? 0;
    
                $start_period->addDay();
            }
            
            if($user_log_data_table_permission === 1){
                return response()->json([
                    // Monthly Basis
                    'labels' => $monthly_labels,
                    'monthly_user_count_per_day' => [
                        'login_counts' => $login_counts_monthly_filled,
                        'logout_counts' => $logout_counts_monthly_filled,
                        'current_user_counts' => $current_user_counts_monthly_filled,
                    ],
                    // Date Basis
                    'date_labels' => $date_labels,
                    'monthly_user_count_per_date' => [
                        'date_login_counts' => $login_counts_date_filled,
                        'date_logout_counts' => $logout_counts_date_filled,
                        'date_current_user_counts' => $current_user_counts_date_filled,
                    ],
                ]);
            }else{
                return response()->json([
                    'message' => 'Server data not response.'
                ], 200);
            }
        }
    }
}
