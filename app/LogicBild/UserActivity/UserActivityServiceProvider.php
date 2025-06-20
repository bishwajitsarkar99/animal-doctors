<?php
namespace App\LogicBild\UserActivity;
use Illuminate\Pipeline\Pipeline;
use App\LogicBild\UserActivity\{
    DateFilter,
    RoleFilter,
    SearchFilter,
    SortFilter,
    BranchFilter
};
use Illuminate\Http\Request;
use App\Models\SessionModel;
use App\Models\User;
use App\Models\Role;
use App\Models\Branch\Branches;
use App\Models\Forntend\ForntEndFooter;
use App\Models\Logo\Logodegin;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use DB;
use Illuminate\Support\Str;
use App\cacheStorage\CacheManage;
use Illuminate\Support\Arr;
use App\Services\PdfService;

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
     * Handle User Details Home Page View 
    */
    public function viewUserDetails(Request $request, $slug)
    {
        $auth = Auth::User();
        if (!$auth) {
            return redirect()->route('login'); // or unauthorized view
        }
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
                $branch_id = DB::table('branches')->pluck('branch_id')->toArray(); // Get all branch IDs as array
            } else {
                $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
            }
            
            // Define the start and end of the current month
            $now = Carbon::now();
            $startOfMonth = $now->copy()->startOfMonth();
            $endOfMonth = $now->copy()->endOfMonth();
            // Get Session user login data
            $start = $now->copy()->startOfYear();
            $end = $now;

            // User storage capacity
            $user_capacity=100;
            
            // Get Role
            $roles = DB::table('roles')->select('roles.id', 'roles.name', 'roles.created_at', 'roles.updated_at')
            ->join('users', 'users.role', '=', 'roles.id')
            ->whereIn('users.branch_id', $branch_id)
            ->groupBy('roles.id', 'roles.name', 'roles.created_at', 'roles.updated_at')
            ->get();

            // Get User For Calculation
            $userStats = DB::table('users')->selectRaw("
                SUM(CASE WHEN role = 1 THEN 1 ELSE 0 END) as super_admin,
                SUM(CASE WHEN role = 2 THEN 1 ELSE 0 END) as sub_admin,
                SUM(CASE WHEN role = 3 THEN 1 ELSE 0 END) as admin,
                SUM(CASE WHEN role = 5 THEN 1 ELSE 0 END) as accounts,
                SUM(CASE WHEN role = 6 THEN 1 ELSE 0 END) as marketing,
                SUM(CASE WHEN role = 7 THEN 1 ELSE 0 END) as delivery_team,
                SUM(CASE WHEN role = 0 THEN 1 ELSE 0 END) as users,
                COUNT(*) as total_users,
                SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as active_users,
                SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as inactive_users
            ")
            ->whereIn('branch_id', $branch_id)
            ->first();
            // Role Count
            $superAdmin   = $userStats->super_admin;
            $subAdmin     = $userStats->sub_admin;
            $admin        = $userStats->admin;
            $accounts     = $userStats->accounts;
            $marketing    = $userStats->marketing;
            $deliveryTeam = $userStats->delivery_team;
            $users        = $userStats->users;
            // User Count
            $total_users   = $userStats->total_users;
            $activeUsers   = $userStats->active_users;
            $inactiveUsers = $userStats->inactive_users;

            // User Session Data Count for frequently data change;
            $userSessionData = DB::table('sessions')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->whereIn('branch_id', $branch_id)->count();

            // Get login data grouped by branch and role
            $sessionStats = SessionModel::whereBetween('created_at', [$start, $end])
            ->whereIn('branch_id', $branch_id)
            ->whereNotNull('user_id')
            ->whereNotNull('role')
            ->whereNotNull('branch_id')
            ->whereIn('payload', ['login', 'logout'])
            ->with('roles')
            ->select(
                'branch_id',
                'role',
                DB::raw('
                    COUNT(*) as total_activity_count,
                    SUM(CASE WHEN payload IN ("login", "logout") THEN 1 ELSE 0 END) as login_count,
                    SUM(CASE WHEN payload = "logout" THEN 1 ELSE 0 END) as logout_count,
                    SUM(CASE WHEN payload = "login" THEN 1 ELSE 0 END) as current_login
                ')
            )
            ->groupBy('branch_id', 'role')
            ->get();
            //dd(config('cache.prefix'));
            // Cache::put('sample_test_key', 'value', 600);
            // $redis = Cache::store('redis')->getRedis();
            // $redis->select(1);
            // dd($redis->keys('*'));
            $miniCardData = CacheManage::remember(
                'miniCardData',
                fn() => $this->getMiniCardData(
                    $branch_id,
                    $total_users,
                    $user_capacity,
                    $startOfMonth,
                    $endOfMonth,
                    $inactiveUsers,
                    $activeUsers
                ),
                $branch_id,
                $total_users,
                $user_capacity,
                $startOfMonth,
                $endOfMonth,
                $inactiveUsers,
                $activeUsers,
            );
            // User Count Summary Card Data
            $summaryCardData = CacheManage::remember(
                'summaryCardData',
                fn() => $this->getSummaryCardData($roles, $total_users, $superAdmin, $admin, $subAdmin,$accounts, $marketing, $deliveryTeam, $users),
                $roles, $total_users, $superAdmin, $admin, $subAdmin,$accounts, $marketing, $deliveryTeam, $users
            );
            $totalPercentageVlaue = array_sum($summaryCardData);
            $bytes = 1024;
            $totalPercentage = $totalPercentageVlaue > 0 ? ($totalPercentageVlaue / $bytes) * 100 : 0;
            // Branch Info Bar Chart Data
            $branch_log_session_data = CacheManage::remember(
                'branch_log_session_data',
                fn() => $this->getBranchInfoData($branch_id),
                $branch_id
            );
            // User Activities Line Chart Data
            $usersActivityCount = CacheManage::remember(
                'usersActivityCount',
                fn () => $this->getUserActivitiesLineChart($startOfMonth, $endOfMonth, $inactiveUsers, $activeUsers, $userSessionData, $total_users),
                $startOfMonth, $endOfMonth, $inactiveUsers, $activeUsers, $userSessionData, $total_users
            );
            // User Analycis Bar Chart -- Data
            $usersCount = CacheManage::remember(
                'usersCount',
                fn () => $this->getUserActivitiesBarChart($total_users, $startOfMonth, $endOfMonth,$superAdmin, $admin, $subAdmin, $accounts, $marketing, $deliveryTeam, $users, $inactiveUsers, $activeUsers, $userSessionData)
            );
            // User Analycis Bar Chart
            [$formattedBranchStats, $branchRoleStats] = CacheManage::remember(
                'userBranchBarChart',
                fn () => $this->getBranchBarChart($sessionStats),
                $branch_id, now()->format('Y_m')
            );
            // Storage Allocation
            $storage = CacheManage::remember(
                'storageAllocation',
                fn () => $this->storageAllocation($total_users),$total_users
            );

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

        // Merge all session counts into one query
        $sessionStats = DB::table('sessions')->selectRaw("
                COUNT(*) as total_sessions,
                SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as intime_activity_users,
                SUM(CASE WHEN created_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as activity_users
            ", [$startOfMonth, $endOfMonth])
            ->whereIn('branch_id', $branch_id)
            ->first();

        $intime_or_outtime_activity_users = $sessionStats->total_sessions;
        $intime_activity_users = $sessionStats->intime_activity_users;
        $activity_users = $sessionStats->activity_users;
        // Calculate the percentage and total activity users
        $activity_users_percentage = $intime_activity_users > 0 ? ($activity_users / $intime_or_outtime_activity_users) * 100 : 0;

        return [
            'total_users' => $total_users,
            'total_users_percentage' => $total_users_percentage,
            'authentic_users' => $authentic_users,
            'authentic_users_percentage' => $authentic_users_percentage,
            'inactive_users' => $inactive_users,
            'inactive_users_percentage' => $inactive_users_percentage,
            'activity_users' => $activity_users,
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
    private function getBranchBarChart($sessionStats)
    {
        $branchRoleStats = [];
        $activityMap = [];
        $currentLoginMap = [];

        foreach ($sessionStats as $entry) {
            $branchId = $entry->branch_id;
            $roleName = $entry->roles->name ?? 'N/A';

            // Assign all values directly
            $branchRoleStats[$branchId][$roleName] = [
                'login' => (int) $entry->login_count,
                'logout' => (int) $entry->logout_count,
            ];

            $activityMap[$branchId][$roleName] = (int) $entry->total_activity_count;
            $currentLoginMap[$branchId][$roleName] = (int) $entry->current_login;
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
                $activityCounts[] = $activityMap[$branchId][$role] ?? 0;
                $currentLogins[] = $currentLoginMap[$branchId][$role] ?? 0;
            }

            $formattedBranchStats[$branchId] = [
                'roles' => $roles,
                'login_counts' => $loginCounts,
                'logout_counts' => $logoutCounts,
                'activity_counts' => $activityCounts,
                'current_login_counts' => $currentLogins,
                'total_login' => array_sum($loginCounts),
                'total_logout' => array_sum($logoutCounts),
                'total_activity' => array_sum($activityCounts),
                'total_current_login' => array_sum($currentLogins),
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
        $auth = Auth::user();
        $role_id = $auth->role;
        $email = $auth->login_email;
        $user_branch_id = $auth->branch_id;
        
        if ($role_id === 1) {
            $branch_id = DB::table('branches')->pluck('branch_id')->toArray(); // Get all branch IDs as array
        } else {
            $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
        }

        //$user_log_data_table_permission = ($auth->login_email && $role_id) ? 1 : 0;
        if($email && $role_id){
            $user_log_data_table_permission = 1; // log data table permission
        }

        if ($user_log_data_table_permission) {

            $baseQuery = SessionModel::query()
                ->whereNotNull('role')
                ->with(['roles', 'users']);

            $user_activities = app(Pipeline::class)
                ->send($baseQuery)
                ->through([
                    new BranchFilter($branch_id),
                    DateFilter::class,
                    SearchFilter::class,
                    RoleFilter::class,
                    SortFilter::class,
                ])
                ->thenReturn();

            $perItem = max((int) $request->input('per_item', 10), 1);
            $paginateData = $user_activities->paginate($perItem);
            
            return response()->json([
                'data' => $paginateData->items(),
                'links' => $paginateData->toArray()['links'] ?? [],
                'total' => $paginateData->total(),
                'total_users' => DB::table('sessions')->whereIn('branch_id', $branch_id)->count(),
                'per_page' => $perItem,
                'per_item_num' => $paginateData->count(),
            ]);
        }

        return response()->json(['message' => 'Server does not response data.']);
    }

    /**
     * Handle User Activity Grahp Tab ===> Daily,Weekly and Monthly Chart Data
    */
    public function activities(Request $request)
    {
        $auth = Auth::User();
        $user_branch_id = $auth->branch_id;
        $role_id = $auth->role;
        $email = $auth->login_email;

        if($email && $role_id){
            $user_log_data_table_permission = 1; // log data table permission
        }

        if($user_branch_id && $role_id && $email){

            if ($role_id === 1) {
                $branch_id = DB::table('branches')->pluck('branch_id'); // Get all branch IDs as array
            } else {
                $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
            }
            
            $now = Carbon::now();
            // Current Month User Activities
            $startOfMonth = $now->copy()->startOfMonth();
            $endOfMonth = $now->copy()->endOfMonth();
    
            // Current Week User Activities (last 7 days)
            $startOfWeek = $now->copy()->subDays(6)->startOfDay();
            $endOfWeek = $now->copy()->endOfDay();
    
            // Current Day User Activities
            $startOfDay = $now->copy()->startOfDay();
            $endOfDay = $now->copy()->endOfDay();

            // Count current users, logins, and logouts
            [$current_users, $current_login_users, $current_logout_users] = $this->countCurrentUsers($startOfDay, $endOfDay, $branch_id);
            
            // Group by day for login, logout, and current user counts (weekly data)
            [$login_counts, $logout_counts, $current_user_counts] = $this->countWeeklyUsersLogData($startOfWeek, $endOfWeek, $branch_id);
            
            // Monthly user activity data (group by month)
            [$login_counts_monthly, $logout_counts_monthly, $current_user_counts_monthly] = $this->countMonthlyUsersLogData($branch_id);
            
            // Authentic users
            //$authentic_users = User::where('status', 0)->whereIn('branch_id', $branch_id)->count();
            //$authentic_users = SessionModel::whereNotNull('user_id')->whereIn('branch_id', $branch_id)->count();
            $authentic_users = 100;
            // Calculate percentage values for current activities
            [$total_current_users_activities_percentage, $login_current_users_activities_percentage, $logout_current_users_activities_percentage] = 
            $this->calculatePercentage($current_users, $current_login_users, $current_logout_users, $authentic_users);
            
            // Prepare date format array with the last 7 days (Saturday to Friday)
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

    // Helper function count current users, logins, and logouts
    private function countCurrentUsers($startOfDay, $endOfDay, $branch_id)
    {
        // First Query
        // $current_users = DB::table('sessions')->whereBetween('created_at', [$startOfDay, $endOfDay])
        // ->whereNotNull('user_id')->distinct('user_id')->whereIn('branch_id', $branch_id)->count('user_id');

        // $current_login_users = DB::table('sessions')->where('payload', 'login')
        //     ->whereBetween('created_at', [$startOfDay, $endOfDay])
        //     ->whereNotNull('user_id')->whereIn('branch_id', $branch_id)->count();

        // $current_logout_users = DB::table('sessions')->where('payload', 'logout')
        //     ->whereBetween('created_at', [$startOfDay, $endOfDay])
        //     ->whereNotNull('user_id')->whereIn('branch_id', $branch_id)->count();

        // Alternative Query
        $sessionCounts = DB::table('sessions')->whereBetween('created_at', [$startOfDay, $endOfDay])
        ->whereIn('branch_id', $branch_id)
        ->whereNotNull('user_id')
        ->selectRaw("
            COUNT(DISTINCT user_id) as current_users,
            SUM(CASE WHEN payload = 'login' THEN 1 ELSE 0 END) as current_login_users,
            SUM(CASE WHEN payload = 'logout' THEN 1 ELSE 0 END) as current_logout_users
        ")
        ->first();

        $current_users = $sessionCounts->current_users ?? 0;
        $current_login_users = $sessionCounts->current_login_users ?? 0;
        $current_logout_users = $sessionCounts->current_logout_users ?? 0;

        return [$current_users, $current_login_users, $current_logout_users];
    }
    // Helper function calculate percentage values for current activities
    private function calculatePercentage($current_users, $current_login_users, $current_logout_users, $authentic_users)
    {
        $total_current_users_activities_percentage = $authentic_users > 0 
        ? ($current_users / $authentic_users) * 100 
        : 0;

        $login_current_users_activities_percentage = $authentic_users > 0 
            ? ($current_login_users / $authentic_users) * 100 
            : 0;

        $logout_current_users_activities_percentage = $authentic_users > 0 
            ? ($current_logout_users / $authentic_users) * 100 
            : 0;

        return [$total_current_users_activities_percentage, $login_current_users_activities_percentage, $logout_current_users_activities_percentage];
    }
    // Helper function group by day for login, logout, and current user counts (weekly data)
    private function countWeeklyUsersLogData($startOfWeek, $endOfWeek, $branch_id)
    {
        // $login_counts = SessionModel::select(DB::raw('DATE(created_at) as day'), DB::raw('count(*) as count'))
        //     ->where('payload', 'login')
        //     ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        //     ->whereIn('branch_id', $branch_id)
        //     ->groupBy('day')
        //     ->pluck('count', 'day')
        //     ->toArray();

        // $logout_counts = SessionModel::select(DB::raw('DATE(created_at) as day'), DB::raw('count(*) as count'))
        //     ->where('payload', 'logout')
        //     ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        //     ->whereIn('branch_id', $branch_id)
        //     ->groupBy('day')
        //     ->pluck('count', 'day')
        //     ->toArray();

        // $current_user_counts = SessionModel::whereNotNull('user_id')
        //     ->select(DB::raw('DATE(created_at) as day'), DB::raw('COUNT(DISTINCT user_id) as count'))
        //     ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        //     ->whereIn('branch_id', $branch_id)
        //     ->groupBy('day')
        //     ->pluck('count', 'day')
        //     ->toArray();
        
        $weeklyUserLogSession = DB::table('sessions')
        ->selectRaw('
            DATE(created_at) as day,
            SUM(CASE WHEN payload IN ("login", "logout") THEN 1 ELSE 0 END) as login_counts,
            SUM(CASE WHEN payload = "logout" THEN 1 ELSE 0 END) as logout_counts,
            COUNT(DISTINCT CASE WHEN user_id IS NOT NULL THEN user_id ELSE NULL END) as current_user_counts
        ')
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->whereIn('branch_id', $branch_id)
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();

        // Convert to associative arrays
        $login_counts = [];
        $logout_counts = [];
        $current_user_counts = [];

        foreach ($weeklyUserLogSession as $row) {
            $day = $row->day;
            $login_counts[$day] = $row->login_counts;
            $logout_counts[$day] = $row->logout_counts;
            $current_user_counts[$day] = $row->current_user_counts;
        }
                
        return [$login_counts, $logout_counts, $current_user_counts];
    }
    // Helper function monthly user activity data (group by month)
    private function countMonthlyUsersLogData($branch_id)
    {
        // $login_counts_monthly = SessionModel::whereNotNull('user_id')
        //     ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        //     ->where('payload', 'login')
        //     ->whereIn('branch_id', $branch_id)
        //     ->groupBy('month')
        //     ->pluck('count', 'month')
        //     ->toArray();
        
        // $logout_counts_monthly = SessionModel::whereNotNull('user_id')
        //     ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        //     ->where('payload', 'logout')
        //     ->whereIn('branch_id', $branch_id)
        //     ->groupBy('month')
        //     ->pluck('count', 'month')
        //     ->toArray();
        
        // $current_user_counts_monthly = SessionModel::whereNotNull('user_id')
        //     ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(DISTINCT user_id) as count'))
        //     ->whereIn('branch_id', $branch_id)
        //     ->groupBy('month')
        //     ->pluck('count', 'month')
        //     ->toArray();

        $monthlyUserLogSession = DB::table('sessions')
        ->selectRaw('
            DATE_FORMAT(created_at, "%Y-%m") as month,
            SUM(CASE WHEN payload IN ("login", "logout") THEN 1 ELSE 0 END) as login_counts_monthly,
            SUM(CASE WHEN payload = "logout" THEN 1 ELSE 0 END) as logout_counts_monthly,
            COUNT(DISTINCT CASE WHEN user_id IS NOT NULL THEN user_id ELSE NULL END) as current_user_counts_monthly
        ')
        ->whereIn('branch_id', $branch_id)
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
        ->get();

        $login_counts_monthly = [];
        $logout_counts_monthly = [];
        $current_user_counts_monthly = [];

        foreach ($monthlyUserLogSession as $row) {
            $month = $row->month;
            $login_counts_monthly[$month] = $row->login_counts_monthly;
            $logout_counts_monthly[$month] = $row->logout_counts_monthly;
            $current_user_counts_monthly[$month] = $row->current_user_counts_monthly;
        }

        return [$login_counts_monthly, $logout_counts_monthly, $current_user_counts_monthly];
    }
    
    /**
     * Handle User Activity Log Analytical Chart
    */
    public function userAnalyticalCharts(Request $request)
    {
        $auth = Auth::User();
        $user_branch_id = $auth->branch_id;
        $role_id = $auth->role;
        $email = $auth->login_email;

        if($email && $role_id){
            $user_log_data_table_permission = 1; // log data table permission
        }

        if($user_branch_id && $role_id && $email){

            if ($role_id === 1) {
                $branch_id = DB::table('branches')->pluck('branch_id'); // Get all branch IDs as array
            } else {
                $branch_id = [$user_branch_id]; // Wrap single branch_id in an array
            }

            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $now = Carbon::now();
            if ($start_date && $end_date) {
                $start = Carbon::parse($start_date)->startOfDay();
                $end = Carbon::parse($end_date)->endOfDay();
            } else {
                $start = $now->copy()->startOfYear();
                $end = $now->copy()->endOfMonth();
            }

            // Monthly user activity data (group by month)
            [$login_counts_monthly, $logout_counts_monthly, $current_user_counts_monthly] = $this->countMonthlyUsersLogData($branch_id);

            // Day Basis data 
            [$login_counts_date, $logout_counts_date, $current_user_counts_date] = $this->countDailyUsersLogData($start, $end, $branch_id);
            
            // Month Date Formate
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
            
            // Daily Date Formate
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

    // Helper function day base user activity data (group by day)
    private function countDailyUsersLogData($start, $end, $branch_id)
    {
        // $login_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
        //     ->whereNotNull('user_id')
        //     ->where('payload', 'login')
        //     ->whereIn('branch_id', $branch_id)
        //     ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
        //     ->groupBy('day')
        //     ->pluck('count', 'day')
        //     ->toArray();

        // $logout_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
        //     ->whereNotNull('user_id')
        //     ->where('payload', 'logout')
        //     ->whereIn('branch_id', $branch_id)
        //     ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
        //     ->groupBy('day')
        //     ->pluck('count', 'day')
        //     ->toArray();

        // $current_user_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
        //     ->whereNotNull('user_id')
        //     ->whereIn('branch_id', $branch_id)
        //     ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('COUNT(DISTINCT user_id) as count'))
        //     ->groupBy('day')
        //     ->pluck('count', 'day')
        //     ->toArray();

        $dateBasisUserLogSessionData = DB::table('sessions')
        ->whereBetween('created_at', [$start, $end])
        ->whereIn('branch_id', $branch_id)
        ->selectRaw('
            DATE_FORMAT(created_at, "%d-%m-%Y") as day,
            SUM(CASE WHEN payload IN ("login", "logout") THEN 1 ELSE 0 END) as login_counts_date,
            SUM(CASE WHEN payload = "logout" THEN 1 ELSE 0 END) as logout_counts_date,
            COUNT(DISTINCT CASE WHEN user_id IS NOT NULL THEN user_id ELSE NULL END) as current_user_counts_date
        ')
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'))
        ->get();

        $login_counts_date = [];
        $logout_counts_date = [];
        $current_user_counts_date = [];

        foreach ($dateBasisUserLogSessionData as $row) {
            $date = $row->day;
            $login_counts_date[$date] = $row->login_counts_date;
            $logout_counts_date[$date] = $row->logout_counts_date;
            $current_user_counts_date[$date] = $row->current_user_counts_date;
        }

        return [$login_counts_date, $logout_counts_date, $current_user_counts_date];
    }
    
    // Get Branch Data 
    public function fetchBranchData(Request $request)
    {
        $auth = Auth::User();
        if (!$auth) {
            return redirect()->route('login'); // or unauthorized view
        }
        $role_id = $auth->role;
        $user_branch_id = $auth->branch_id;

        if ($role_id === 1) {
            $branch_ids = DB::table('branches')->pluck('branch_id')->toArray(); // Get all branch IDs as array
        } else {
            $branch_ids = [$user_branch_id]; // Wrap single branch_id in an array get-branch-fetch-data
        }

        $branch_data_query = DB::table('branches')
        ->select('branches.id', 'branches.branch_id', 'branches.branch_name', 'branches.created_at', 'branches.updated_at')
        ->join('users', 'users.branch_id', '=', 'branches.branch_id')
        ->whereIn('users.branch_id', $branch_ids)
        ->groupBy('branches.id', 'branches.branch_id', 'branches.branch_name', 'branches.created_at', 'branches.updated_at');

        if( $query = $request->get('query')){
            $branch_data_query->where('branches.branch_name','LIKE','%'.$query.'%');      
        } 
        $branch_data = $branch_data_query->get();
        
        // Get distinct role count per branch
        $role_count_per_branch = DB::table('users')
            ->select('users.branch_id', DB::raw('COUNT(DISTINCT users.role) as role_count'))
            ->whereIn('users.branch_id', $branch_ids)
            ->groupBy('users.branch_id')
            ->pluck('role_count', 'branch_id');

        return response()->json([
            'status' => 200,
            'branch_data' => $branch_data,
            'role_count_per_branch' => $role_count_per_branch
        ]);
    }

    // Get Role Data
    public function getFetchRoleData(Request $request , $id)
    {
        $query = $request->input('query');

        $role_data = DB::table('roles')
            ->select('roles.id', 'roles.name', 'roles.created_at', 'roles.updated_at')
            ->join('users', 'users.role', '=', 'roles.id')
            ->whereIn('users.branch_id', (array) $id)
            ->when($query, function ($q) use ($query) {
                $q->where('roles.name', 'like', '%' . $query . '%');
            })
            ->groupBy('roles.id', 'roles.name', 'roles.created_at', 'roles.updated_at')
            ->get();

        $user_count_per_role = DB::table('users')
            ->select('role', DB::raw('COUNT(*) as user_count'))
            ->whereIn('branch_id', (array) $id)
            ->groupBy('role')
            ->pluck('user_count', 'role');

        return response()->json([
            'status' => 200,
            'role_data' => $role_data,
            'user_count_per_role' => $user_count_per_role
        ]);
    }

    // Get User Email Data
    public function getFetchUserEmail(Request $request , $id = null)
    {
        $query= $request->input('query', '');

        // wrap() always returns a flat array
        $roleIds = Arr::wrap($request->input('role_ids', []));
        if ($id !== null) {
            $roleIds[] = $id;
        }
        $roleIds = array_unique(array_filter($roleIds));
        if (empty($roleIds)) {
            return response()->json([ 'status' => 400, 'message' => 'No valid role IDs.', 'email_data' => [] ]);
        }

        $q = DB::table('users')
            ->select('role','login_email','name')
            ->whereNotNull('branch_id')
            ->whereIn('role', $roleIds);

        if ($query !== '') {
            $q->where('login_email', 'like', "%{$query}%");
        }

        return response()->json([
            'status'     => 200,
            'email_data' => $q->get(),
        ]);
    }

    /**
     * Handle PDF Download
    */
    public function pdfDownloadSessionData(Request $request, PdfService $pdfService)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $branch_id = $request->input('branch_id');
        $roles = explode(',', $request->input('role', ''));
        $emails = explode(',', $request->input('email', ''));

        $query = SessionModel::with(['roles', 'users'])
            ->select(
                DB::raw("COUNT(DISTINCT user_id) as total_users"),
                DB::raw("SUM(CASE WHEN payload = 'login' THEN 1 ELSE 0 END) as total_current_login"),
                DB::raw("SUM(CASE WHEN payload IN ('login', 'logout') THEN 1 ELSE 0 END) as total_login"),
                DB::raw("SUM(CASE WHEN payload = 'logout' THEN 1 ELSE 0 END) as total_logout"),
                DB::raw("SUM(CASE WHEN payload IN ('login', 'logout') THEN 1 ELSE 0 END) as total_activity")
            );
        
        // Filter by date
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date)->startOfDay(),
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Filter by branch_id
        if ($branch_id) {
            $query->where('branch_id', $branch_id);
        }

        // Filter by roles (if applicable)
        if (!empty($roles) && $roles[0] !== '') {
            $query->whereIn('role', $roles);
        }

        // Filter by emails (if applicable)
        if (!empty($emails) && $emails[0] !== '') {
            $query->whereIn('email', $emails);
        }

        // Get branch summary data
        $summary = $query->first();

        $login = $summary->total_login ?? 0;
        $logout = $summary->total_logout ?? 0;
        $activity = $summary->total_activity ?? 0;

        // Fetch session log data for table (you can apply the same filters again if needed)
        $logSessionData = SessionModel::with(['roles', 'users'])
        ->when($start_date && $end_date, function ($q) use ($start_date, $end_date) {
            $q->whereBetween('created_at', [
                Carbon::parse($start_date)->startOfDay(),
                Carbon::parse($end_date)->endOfDay()
            ]);
        })
        ->when($branch_id, fn($q) => $q->where('branch_id', $branch_id))
        ->when(!empty($roles) && $roles[0] !== '', fn($q) => $q->whereIn('role', $roles))
        ->when(!empty($emails) && $emails[0] !== '', fn($q) => $q->whereIn('email', $emails))
        ->orderBy('user_id')
        ->get();
        
        // 3. User-wise summary
        $userSummaryData = SessionModel::select(
            'email',
            DB::raw("SUM(CASE WHEN payload IN ('login', 'logout') THEN 1 ELSE 0 END) as total_login"),
            DB::raw("SUM(CASE WHEN payload = 'logout' THEN 1 ELSE 0 END) as total_logout"),
            DB::raw("SUM(CASE WHEN payload IN ('login', 'logout') THEN 1 ELSE 0 END) as total_activity")
        )
        ->when($start_date && $end_date, function ($q) use ($start_date, $end_date) {
            $q->whereBetween('created_at', [
                Carbon::parse($start_date)->startOfDay(),
                Carbon::parse($end_date)->endOfDay()
            ]);
        })
        ->when($branch_id, fn($q) => $q->where('branch_id', $branch_id))
        ->when(!empty($roles) && $roles[0] !== '', fn($q) => $q->whereIn('role', $roles))
        ->when(!empty($emails) && $emails[0] !== '', fn($q) => $q->whereIn('email', $emails))
        ->groupBy('email')
        ->orderBy('email')
        ->get();

        // Get user summary data
        $userSummary = $query->first();

        $login = $userSummary->total_login ?? 0;
        $logout = $userSummary->total_logout ?? 0;
        $logout = $userSummary->total_activity ?? 0;

        // Load additional info
        $companyinformations = ForntEndFooter::get();
        $companylogo = Logodegin::get();
        $imagePath = public_path('image/log/comp-logo.png');
        $imageData = base64_encode(file_get_contents($imagePath)); 

        // Render the PDF
        $html = view('pdf-download.user-log-session-pdf', [
            'logSessionData' => $logSessionData,
            'userSummaryData' => $userSummaryData,
            'userTotalLogin' => $userSummary->total_login,
            'userTotalLogout' => $userSummary->total_logout,
            'userSubTotalActivity' => $userSummary->total_activity,
            'totalCurrentLogin' => $summary->total_current_login,
            'totalLogin' => $summary->total_login,
            'totalLogout' => $summary->total_logout,
            'totalActivity' => $summary->total_activity,
            'total_users' => $summary->total_users,
            'start_date' => Carbon::parse($start_date),
            'end_date' => Carbon::parse($end_date),
            'companyinformations' => $companyinformations,
            'companylogo' => $companylogo,
            'imageData' => $imageData,
        ])->render();

        $pdf = $pdfService->generatePdf($html);

        return response($pdf, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Log-Session-Download-'. date('d-M-Y') .'.pdf"');
    }

    /**
     * Handle Export Excel Download
    */
    public function exportExcelDownloadSessionData(Request $request)
    {
        //
    }

    /**
     * Handle Export Excel CVS Format Download
    */
    public function exportExcelCsvDownloadSessionData(Request $request)
    {
        //
    }

    /**
     * Handle Print Session Data
    */
    public function printSessionData(Request $request)
    {
        //
    }
}
