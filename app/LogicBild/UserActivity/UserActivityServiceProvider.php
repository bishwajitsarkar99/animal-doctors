<?php
namespace App\LogicBild\UserActivity;
use Illuminate\Http\Request;
use App\Models\SessionModel;
use App\Models\User;
use App\Models\Role;
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
        $slug = Str::random($idRange);
        session([
            'valid_user_log_random' => $slug,
        ]);
        $auth= Auth::User();
        $email = $auth->login_email;
        if($email && $auth->role===1){
            $user_analycis_authorize = 0; // log chart dashboard page authorize
            $user_log_data_authorize = 0; // log data authorize
            $user_activity_graph_authorize = 0; // log user activity graph authorize
        }else if($email && $auth->role===2){
            $user_analycis_authorize = 1; // log chart dashboard page authorize
            $user_log_data_authorize = 1; // log data authorize
            $user_activity_graph_authorize = 1; // log user activity graph authorize
        }else if($email && $auth->role===3){
            $user_analycis_authorize = 1; // log chart dashboard page authorize
            $user_log_data_authorize = 1; // log data authorize
            $user_activity_graph_authorize = 1; // log user activity graph authorize
        }

        return redirect()->route('user.details', [
            'slug' => $slug,
            'user_analycis_authorize' => $user_analycis_authorize,
            'user_log_data_authorize' => $user_log_data_authorize,
            'user_activity_graph_authorize' => $user_activity_graph_authorize,
        ]);
    }
    /**
     * Handle User Details View 
    */
    public function viewUserDetails(Request $request, $slug, $user_analycis_authorize, $user_log_data_authorize, $user_activity_graph_authorize)
    {
        $auth = Auth::User();
        $branch_id = $auth->branch_id;
        $role_id = $auth->role;
        if($branch_id && $role_id === 1){

            // Get Role
            $roles = Role::orderBy('id', 'desc')->get();
    
            // Define the start and end of the current month
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();
            $usersCount = [
                'super_admin' => User::where('role', 1)->count(),
                'admin' => User::where('role', 3)->count(),
                'sub_admin' => User::where('role', 2)->count(),
                'accounts' => User::where('role', 5)->count(),
                'marketing' => User::where('role', 6)->count(),
                'delivery_team' => User::where('role', 7)->count(),
                'users' => User::where('role', 0)->count(),
                'inactive_users' => User::where('status', 1)->count(),
                'active_users' => User::where('status', 0)->count(),
                'users_log_activity' => SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                'total_users' => User::count(),
            ];
    
            $usersActivityCount = [
                'inactive_users_activity' => User::where('status', 1)->count(),
                'active_users_activity' => User::where('status', 0)->count(),
                'users_log_activities' => SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                'total_users_activity' => User::count(),
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
                    'usersActivityCount' => $usersActivityCount,
                    'total_users_percentage' => $total_users_percentage,
                    'authentic_users_percentage' => $authentic_users_percentage,
                    'inactive_users_percentage' => $inactive_users_percentage,
                    'activity_users_percentage' => $activity_users_percentage,
                    'percentageRoles' => $percentageRoles,
                ]);
            }
    
            $storedRandom = session('valid_user_log_random');
            $page_name = 'User Log Activity';
            $user_activity_page_name = 'User Activity';
            $user_activity_graph_page_name = 'User Activity Graph';
            
            if ($storedRandom && $slug === $storedRandom) {
                $user_analycis_authorize = (int) $user_analycis_authorize;
    
                if ($user_analycis_authorize === 1) {
                    return view('super-admin.user-details.details', compact('usersCount','usersActivityCount','total_users','authentic_users','inactive_users','activity_users',
                        'total_users_percentage','authentic_users_percentage','inactive_users_percentage','percentageRoles','activity_users_percentage','roles', 'page_name',
                        'user_log_data_authorize', 'user_activity_graph_authorize', 'user_activity_page_name', 'user_activity_graph_page_name')
                    );
                }else{
                    return view('unauthorize-page.index', compact('page_name'));
                }
            }
            return view('unauthorize-page.page-session-block', compact('page_name'));
        }else if($branch_id && $role_id === 2){
            // Get Role
            $roles = Role::orderBy('id', 'desc')->get();
    
            // Define the start and end of the current month
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();
            $usersCount = [
                'super_admin' => User::where('role', 1)->where('branch_id', $branch_id)->count(),
                'admin' => User::where('role', 3)->where('branch_id', $branch_id)->count(),
                'sub_admin' => User::where('role', 2)->where('branch_id', $branch_id)->count(),
                'accounts' => User::where('role', 5)->where('branch_id', $branch_id)->count(),
                'marketing' => User::where('role', 6)->where('branch_id', $branch_id)->count(),
                'delivery_team' => User::where('role', 7)->where('branch_id', $branch_id)->count(),
                'users' => User::where('role', 0)->where('branch_id', $branch_id)->count(),
                'inactive_users' => User::where('status', 1)->where('branch_id', $branch_id)->count(),
                'active_users' => User::where('status', 0)->where('branch_id', $branch_id)->count(),
                'users_log_activity' => SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('branch_id', $branch_id)->count(),
                'total_users' => User::where('branch_id', $branch_id)->count(),
            ];
    
            $usersActivityCount = [
                'inactive_users_activity' => User::where('status', 1)->where('branch_id', $branch_id)->count(),
                'active_users_activity' => User::where('status', 0)->where('branch_id', $branch_id)->count(),
                'users_log_activities' => SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('branch_id', $branch_id)->count(),
                'total_users_activity' => User::where('branch_id', $branch_id)->count(),
            ];
    
            $total_users = User::where('branch_id', $branch_id)->count();
            $authentic_users = User::where('status', 0)->where('branch_id', $branch_id)->count();
            $inactive_users = User::where('status', 1)->where('branch_id', $branch_id)->count();
    
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
            $intime_or_outtime_activity_users = SessionModel::whereNotNull('id')->where('branch_id', $branch_id)->count();
            $intime_activity_users = SessionModel::where('status', 0)->where('branch_id', $branch_id)->count();
            $activity_users = SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('branch_id', $branch_id)->count();
            // Calculate the percentage of total activity users
            $activity_users_percentage = $intime_or_outtime_activity_users > 0 ? ($intime_activity_users / $intime_or_outtime_activity_users) * 100 : 0;
    
            if ($request->expectsJson()) {
                return response()->json([
                    'total_users' => $total_users,
                    'authentic_users' => $authentic_users,
                    'inactive_users' => $inactive_users,
                    'activity_users' => $activity_users,
                    'usersCount' => $usersCount,
                    'usersActivityCount' => $usersActivityCount,
                    'total_users_percentage' => $total_users_percentage,
                    'authentic_users_percentage' => $authentic_users_percentage,
                    'inactive_users_percentage' => $inactive_users_percentage,
                    'activity_users_percentage' => $activity_users_percentage,
                    'percentageRoles' => $percentageRoles,
                ]);
            }
    
            $storedRandom = session('valid_user_log_random');
            $page_name = 'User Log Activity';
            
            if ($storedRandom && $random === $storedRandom) {
                $page_authorize = (int) $page_authorize;
    
                if ($page_authorize === 1) {
                    return view('super-admin.user-details.details', compact('usersCount','usersActivityCount','total_users','authentic_users','inactive_users','activity_users',
                        'total_users_percentage','authentic_users_percentage','inactive_users_percentage','percentageRoles','activity_users_percentage','roles', 'page_name')
                    );
                }else{
                    return view('unauthorize-page.index', compact('page_name'));
                }
            }
            return view('unauthorize-page.page-session-block', compact('page_name'));

        }else if($branch_id && $role_id === 3){
            // Get Role
            $roles = Role::orderBy('id', 'desc')->get();
    
            // Define the start and end of the current month
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();
            $usersCount = [
                'super_admin' => User::where('role', 1)->where('branch_id', $branch_id)->count(),
                'admin' => User::where('role', 3)->where('branch_id', $branch_id)->count(),
                'sub_admin' => User::where('role', 2)->where('branch_id', $branch_id)->count(),
                'accounts' => User::where('role', 5)->where('branch_id', $branch_id)->count(),
                'marketing' => User::where('role', 6)->where('branch_id', $branch_id)->count(),
                'delivery_team' => User::where('role', 7)->where('branch_id', $branch_id)->count(),
                'users' => User::where('role', 0)->where('branch_id', $branch_id)->count(),
                'inactive_users' => User::where('status', 1)->where('branch_id', $branch_id)->count(),
                'active_users' => User::where('status', 0)->where('branch_id', $branch_id)->count(),
                'users_log_activity' => SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('branch_id', $branch_id)->count(),
                'total_users' => User::where('branch_id', $branch_id)->count(),
            ];
    
            $usersActivityCount = [
                'inactive_users_activity' => User::where('status', 1)->where('branch_id', $branch_id)->count(),
                'active_users_activity' => User::where('status', 0)->where('branch_id', $branch_id)->count(),
                'users_log_activities' => SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('branch_id', $branch_id)->count(),
                'total_users_activity' => User::where('branch_id', $branch_id)->count(),
            ];
    
            $total_users = User::where('branch_id', $branch_id)->count();
            $authentic_users = User::where('status', 0)->where('branch_id', $branch_id)->count();
            $inactive_users = User::where('status', 1)->where('branch_id', $branch_id)->count();
    
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
            $intime_or_outtime_activity_users = SessionModel::whereNotNull('id')->where('branch_id', $branch_id)->count();
            $intime_activity_users = SessionModel::where('status', 0)->where('branch_id', $branch_id)->count();
            $activity_users = SessionModel::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('branch_id', $branch_id)->count();
            // Calculate the percentage of total activity users
            $activity_users_percentage = $intime_or_outtime_activity_users > 0 ? ($intime_activity_users / $intime_or_outtime_activity_users) * 100 : 0;
    
            if ($request->expectsJson()) {
                return response()->json([
                    'total_users' => $total_users,
                    'authentic_users' => $authentic_users,
                    'inactive_users' => $inactive_users,
                    'activity_users' => $activity_users,
                    'usersCount' => $usersCount,
                    'usersActivityCount' => $usersActivityCount,
                    'total_users_percentage' => $total_users_percentage,
                    'authentic_users_percentage' => $authentic_users_percentage,
                    'inactive_users_percentage' => $inactive_users_percentage,
                    'activity_users_percentage' => $activity_users_percentage,
                    'percentageRoles' => $percentageRoles,
                ]);
            }
    
            $storedRandom = session('valid_user_log_random');
            $page_name = 'User Log Activity';
            
            if ($storedRandom && $random === $storedRandom) {
                $page_authorize = (int) $page_authorize;
    
                if ($page_authorize === 1) {
                    return view('super-admin.user-details.details', compact('usersCount','usersActivityCount','total_users','authentic_users','inactive_users','activity_users',
                        'total_users_percentage','authentic_users_percentage','inactive_users_percentage','percentageRoles','activity_users_percentage','roles', 'page_name')
                    );
                }else{
                    return view('unauthorize-page.index', compact('page_name'));
                }
            }
            return view('unauthorize-page.page-session-block', compact('page_name'));
        }
    }
    /**
     * Handle User Activity Get
    */
    public function getActivities(Request $request)
    {
        $auth = Auth::User();
        $branch_id = $auth->branch_id;
        $role_id = $auth->role;

        // Start of the week on Sunday
        //$startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        // End of the week on Saturday
        //$endOfWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY);

        if($branch_id && $role_id === 1){

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
            $total_users = SessionModel::count();
    
            // Start the query for user activities
            $user_activities = SessionModel::whereNotNull('role')->with(['roles', 'users']);
    
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
    
            // Set pagination limit
            $perItem = $request->input('per_item', 10);
            
            // Paginate
            $perItem = $request->input('per_item', 10);
    
            $paginateData = $user_activities->paginate($perItem);
            
            $item_num = $paginateData->count();
            return response()->json([
                'data' => $paginateData->items(),
                'links' => $paginateData->toArray()['links'] ?? [],
                'total' => $paginateData->total(),
                'total_users' => $total_users,
                'per_page' => $perItem,
                'per_item_num' => $item_num,
            ],200);
        }else if($branch_id && $role_id === 2){

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
            $total_users = SessionModel::where('branch_id', $branch_id)->count();
    
            // Start the query for user activities
            $user_activities = SessionModel::whereNotNull('role')->with(['roles', 'users'])->where('branch_id', $branch_id);
    
            // Apply default current month filter if no custom date range provided
            if (!$start_date || !$end_date) {
                $user_activities->whereBetween('created_at', [$startOfDay, $endOfDay])->where('branch_id', $branch_id);
            }
    
            // Apply date range filter
            if ($start_date && $end_date) {
                $start = Carbon::parse($start_date)->startOfDay();
                $end = Carbon::parse($end_date)->endOfDay();
                $user_activities->whereBetween('created_at', [$start, $end])->where('branch_id', $branch_id);
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
            
            // Paginate
            $perItem = $request->input('per_item', 10);
    
            $paginateData = $user_activities->paginate($perItem);
            
            $item_num = $paginateData->count();
            return response()->json([
                'data' => $paginateData->items(),
                'links' => $paginateData->toArray()['links'] ?? [],
                'total' => $paginateData->total(),
                'total_users' => $total_users,
                'per_page' => $perItem,
                'per_item_num' => $item_num,
            ],200);
        }else if($branch_id && $role_id === 3){

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
            $total_users = SessionModel::where('branch_id', $branch_id)->count();
    
            // Start the query for user activities
            $user_activities = SessionModel::whereNotNull('role')->with(['roles', 'users'])->where('branch_id', $branch_id);
    
            // Apply default current month filter if no custom date range provided
            if (!$start_date || !$end_date) {
                $user_activities->whereBetween('created_at', [$startOfDay, $endOfDay])->where('branch_id', $branch_id);
            }
    
            // Apply date range filter
            if ($start_date && $end_date) {
                $start = Carbon::parse($start_date)->startOfDay();
                $end = Carbon::parse($end_date)->endOfDay();
                $user_activities->whereBetween('created_at', [$start, $end])->where('branch_id', $branch_id);
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
            
            // Paginate
            $perItem = $request->input('per_item', 10);
    
            $paginateData = $user_activities->paginate($perItem);
            
            $item_num = $paginateData->count();
            return response()->json([
                'data' => $paginateData->items(),
                'links' => $paginateData->toArray()['links'] ?? [],
                'total' => $paginateData->total(),
                'total_users' => $total_users,
                'per_page' => $perItem,
                'per_item_num' => $item_num,
            ],200);
        }
    }
    /**
     * Handle User Activity Log Show
    */
    public function activities(Request $request)
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
            ->whereNotNull('user_id')->count();

        $current_logout_users = SessionModel::where('payload', 'logout')
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->whereNotNull('user_id')->count();

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
        //dd($current_user_counts_monthly_filled, $login_counts_monthly_filled, $logout_counts_monthly_filled);
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
    }
    /**
     * Handle User Activity Log Analytical Chart
    */
    public function userAnalyticalCharts(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfDay();
            $end = Carbon::parse($end_date)->endOfDay();
        } else {
            $start = Carbon::now()->startOfYear();
            $end = Carbon::now()->endOfMonth();
        }
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

        // Day Basis data 
        $login_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
            ->whereNotNull('user_id')
            ->where('payload', 'login')
            ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray();
            // ->whereNotNull('user_id')
            // ->where('payload', 'login')
            // ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
            // ->groupBy('month')
            // ->pluck('count', 'month')
            // ->toArray();

        $logout_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
            ->whereNotNull('user_id')
            ->where('payload', 'logout')
            ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('count(*) as count'))
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray();
                // ->whereNotNull('user_id')
            // ->where('payload', 'logout')
            // ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
            // ->groupBy('month')
            // ->pluck('count', 'month')
            // ->toArray();

        $current_user_counts_date = SessionModel::whereBetween('created_at', [$start, $end])
            ->whereNotNull('user_id')
            ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'), DB::raw('COUNT(DISTINCT user_id) as count'))
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray();
            // ->whereNotNull('user_id')
            // ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(DISTINCT user_id) as count'))
            // ->groupBy('month')
            // ->pluck('count', 'month')
            // ->toArray();


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
    }

}
