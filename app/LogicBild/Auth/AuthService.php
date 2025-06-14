<?php
namespace App\LogicBild\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Email\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Password;
use App\Mail\AdminEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Support\Setting;
use App\Models\Branch\UserBranchAccessPermission;
use App\Models\Branch\AdminBranchAccessPermission;
use App\cacheStorage\CacheManage;
class AuthService
{
    /**
     * Handle redirect dashboard.
    */
    public function redirectDashboard()
    {
        $redirect = '';

        if (Auth::user() && Auth::user()->role == 1) {
            $redirect = '/super-admin/dashboard';
        } else if (Auth::user() && Auth::user()->role == 2) {
            $redirect = '/sub-admin/dashboard';
        } else if (Auth::user() && Auth::user()->role == 3) {
            $redirect = '/admin/dashboard';
        } else if(Auth::user() && Auth::user()->role == 5) {
            $redirect = '/accounts/accounts-home-page';
        }else if(Auth::user() && Auth::user()->role == 6) {
            $redirect = '/marketing/dashboard';
        }else if(Auth::user() && Auth::user()->role == 7) {
            $redirect = '/delivery-team/dashboard';
        }
        else{
            $redirect = '/default-user/home';
        }

        return $redirect; 
    }
    /**
     * Handle user email registration page.
    */
    public function emailRegistrationForm(Request $request)
    {
        $request->session()->flush();
        return view('registration');
    }
    /**
     * Handle send user email registration form.
    */
    public function EmailRegister(Request $request)
    {
        // Validate the email input
        $request->validate([
            'valid_email' => 'required|email',
        ], [
            'valid_email.required' => 'Email is required.',
            'valid_email.email' => 'Please enter a valid email address.',
        ]);

        $valid_email = $request->input('valid_email');
        $valid_user = User::where('login_email', $valid_email)->first();
        if (!$valid_user) {
            // Save valid email to session
            session(['valid_email' => $valid_email]);
            $redirect = route('register.loading');
            return response()->json([
                'status' => 200,
                'redirect' => $redirect,
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'errors' => 'This email has already taken.',
            ]);
            $redirect = route('registraion_form.index');
        }
    }
    /**
     * Handle register page loading.
    */
    public function register(Request $request)
    {
        $valid_email = session('valid_email');
        if($valid_email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $register_form_url = null;
            $register_form_url = route('registraion_form.index');

            return view('auth.register', compact('company_profiles', 'valid_email', 'register_form_url'));
        }else{
            return redirect(route('registraion_form.index'));  
        }
        
    }
    /**
     * Handle create user register.
    */
    public function create(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'string|required|min:4',
            'last_name' => 'string|required|max:120',
            'contract_number' => 'required',
            'email' => 'string|email|required|max:100|unique:users',
            'reference_email' => 'string|required|max:100',
            'password' => 'string|required|confirmed|min:6|max:30',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'email.unique' => 'The email has already taken.',
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'password.required' => 'The password is required.',
            'reference_email.required' => 'The reference email is required.',
        ]);

        // Reference email
        $reference_email = $request->input('reference_email');
        $userRoles = Role::whereIn('id', [1, 3])->pluck('id');
        $reference_user = User::where('email', $reference_email)->whereIn('role', $userRoles)->first();

        if (!$reference_user) {
            return redirect(url('register'))
                ->withErrors([
                    'reference_email' => 'This reference email is not authenticated.',
                ])
                ->withInput();
        }
        // Generate user login email
        $company_name = Setting('company_name');
        $email_extension = '@gmail.com';
        $user_first_name = $request->first_name;
        $user_last_name = $request->last_name;
        $login_email = $this->userLoginEmailGenerator(
            new User,
            'login_email',
            2, // Generate a 4-digit random number
            $user_first_name,
            $company_name,
            $email_extension
        );

        // Generate user mailing email
        $mailing_email = $this->userMailingEmailGenerator(
            new User,
            'mailing_email',
            2, // Generate a 4-digit random number
            $user_first_name,
            $user_last_name,
            $email_extension
        );

        // Concatenate first name and last name
        $user_name = "{$request->first_name} {$request->last_name}";
        // Create new user
        $user = new User;
        $user->name = $user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->contract_number = $request->contract_number;
        $user->login_email = $login_email;
        $user->mailing_email = $mailing_email;
        $user->reference_email = $request->reference_email;

        // Process image upload
        $this->handleImageUpload($request, $user);

        $isSaved = false;

        // Transaction to save user and related data
        try {
            DB::transaction(function () use ($user, $request, &$isSaved) {
                if ($user->save()) {
                    DB::table('email_verifications')->insert([
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $request->role ?? 0,
                        'account_create_session' => now(),
                    ]);
                    $isSaved = true;
                }
            });
        } catch (\Exception $e) {
            Log::error('Error during registration: ' . $e->getMessage());
            return redirect(url('register'))
                ->with('error', 'An unexpected error occurred. Please try again.')
                ->withInput();
        }

        // Redirect based on the save status
        if ($isSaved) {
            return redirect(url('email-verification'))->with('success', 'Your Registration has been completed successfully');
        } else {
            return redirect(url('register'))
                ->with('error', 'An error occurred while processing your registration. Please try again.')
                ->withInput();
        }
    }
    private function handleImageUpload(Request $request, User $user)
    {
        // Check if a new image file is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Generate file name and hash for duplicate check
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $fileHash = md5_file($file->getRealPath());

            // Define storage path for images
            $storagePath = 'public/image/user-image/';
            $filesInStorage = Storage::files($storagePath);

            // Check for duplicates in the storage directory
            $duplicateFound = false;
            foreach ($filesInStorage as $storedFile) {
                if (md5_file(Storage::path($storedFile)) === $fileHash) {
                    $duplicateFound = true;
                    $filename = basename($storedFile); // Use the existing file name
                    break;
                }
            }

            // Store the file if no duplicate is found
            if (!$duplicateFound) {
                $file->storeAs($storagePath, $filename);
            }

            // Update the user's image field
            $user->image = $filename;
        }
    }
    private function userLoginEmailGenerator($model, $trow, $length = 5, $user_first_name, $company_name, $email_extension)
    {
        // Generate a random number of the specified length
        $random_number = str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);

        // Format all inputs to lowercase
        $formatted_name = strtolower(str_replace(' ', '', $user_first_name));
        $formatted_company = strtolower(str_replace(' ', '', $company_name));

        // Concatenate components to create the email
        return "{$formatted_name}{$formatted_company}{$random_number}{$email_extension}";
    }
    private function userMailingEmailGenerator($model, $trow, $length = 5, $user_first_name, $user_last_name, $email_extension)
    {
        // Generate a random number of the specified length
        $random_number = str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);

        // Format all inputs to lowercase
        $formatted_first_name = strtolower(str_replace(' ', '', $user_first_name));
        $formatted_last_name = strtolower(str_replace(' ', '', $user_last_name));

        // Concatenate components to create the email
        return "{$formatted_first_name}{$formatted_last_name}{$random_number}{$email_extension}";
    }
    /**
     * Handle Login Door View page.
    */
    public function loginDoorPage(Request $request)
    {
        $request->session()->flush();
        return view('login-door');
    }
    /**
     * Handle Open Login page.
    */
    public function openLoginPage(Request $request)
    {
        // Validate the email input
        $request->validate([
            'login_email' => 'required|email',
        ], [
            'login_email.required' => 'Email is required.',
            'login_email.email' => 'Please enter a valid email address.',
        ]);

        // Get User ID
        $user_email = $request->input('login_email');
        $user = User::where('login_email', $user_email)->first();

        if (!$user) {
            return response()->json([
                'status' => 400,
                'error' => 'User email does not exist.',
            ]);
        }

        $user_id = $user->id;

        // Get User Branch Permission
        $user_branch = UserBranchAccessPermission::where('email_id', $user_id)->first();

        // Get Admin Branch Permission
        $admin_branch = AdminBranchAccessPermission::where('user_email_id', $user_id)->first();

        if (
            ($user_branch && ($user_branch->admin_approval_status == 1 || $user_branch->super_admin_approval_status == 1)) ||
            ($admin_branch && $admin_branch->status == 1)
        ) {
            // Store login email in session
            session([
                'login_email' => $user_email,
                'user_branch' => $user_branch,
                'admin_branch' => $admin_branch,
            ]);
            
            // Determine the login route
            $redirect = match ($user->role) {
                1 => route('superadmin.login'),
                2, 3 => route('admin.login'),
                5 => route('accounts.login'),
                6, 7, 0 => route('user.login'),
                default => route('login_door.index'),
            };

            return response()->json([
                'status' => 200,
                'redirect' => $redirect,
            ]);
        }

        return response()->json([
            'status' => 403,
            'error' => 'Access denied. Your branch has not been approved.',
        ]);
    }
    /**
     * Handle Super Admin Login View page.
    */
    public function loginPage(Request $request)
    {
        $login_email = session('login_email');
        if($login_email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            // Role Promote
            $roles = Role::whereIn('name', ['Super Admin'])->get();

            $home_url = null;
            $register_form_url = null;
            $home_url = route('login_door.index');
            $register_form_url = route('registraion_form.index');
            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
            return view('auth.login', compact('company_profiles', 'roles', 'login_email', 'home_url', 'register_form_url'));
        }else{
            return redirect(route('login_door.index'));
        }
    }
    /**
     * Handle Admin Login View page.
    */
    public function viewAdminLoginPage(Request $request)
    {
        $login_email = session('login_email');
        if($login_email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $roles = Role::whereIn('name', ['Admin', 'Sub Admin'])->get();
            
            $home_url = null;
            $register_form_url = null;
            $forget_password_url = null;
            $home_url = route('login_door.index');
            $register_form_url = route('registraion_form.index');
            $forget_password_url = route('password.forget');

            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
    
            return view('auth.admin-login', compact('company_profiles', 'roles', 'login_email', 'home_url', 'register_form_url', 'forget_password_url'));
        }else{
            return redirect(route('login_door.index'));
        }
    }
    /**
     * Handle Accounts Login View page.
    */
    public function viewAccountsLoginPage(Request $request)
    {
        $login_email = session('login_email');
        if($login_email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $roles = Role::whereIn('name', ['Accounts'])->get();
            
            $home_url = null;
            $forget_password_url = null;
            $home_url = route('login_door.index');
            $forget_password_url = route('password.forget');

            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
    
            return view('auth.accounts-login', compact('company_profiles', 'roles', 'login_email', 'home_url', 'forget_password_url'));
        }else{
            return redirect(route('login_door.index'));
        }
    }
    /**
     * Handle Common-User Login View page.
    */
    public function viewCommonUserLoginPage(Request $request)
    {
        $login_email = session('login_email');
        if($login_email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $roles = Role::whereIn('name', ['User','Marketing','Delivery Team'])->get();
    
            $home_url = null;
            $home_url = route('login_door.index');
            $forget_password_url = null;
            $forget_password_url = route('password.forget');

            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
    
            return view('auth.common-user-login', compact('company_profiles', 'roles', 'login_email', 'home_url', 'forget_password_url'));
        }else{
            return redirect(route('login_door.index')); 
        }
    }
    /**
     * Handle user login event.
    */
    public function userLogin(Request $request)
    {
        // Validation
        $request->validate([
            'role' => 'string|required',
            'login_email' => 'string|email|required|max:100|exists:users',
            'password' => 'required|min:6|max:30',
        ], [
            'login_email.exists' => 'This email is not exists on users table',
        ]);

        $user_login_email = $request->login_email;

        // Clear any existing login session for this user
        DB::table('sessions')
        ->where('email', $user_login_email)
        ->where('payload', 'login')
        ->update([
            'payload' => 'logout',
            //'updated_at' => now()
        ]);

        $user = User::where('login_email', $user_login_email)->value('email');
        if (!$user) {
            return back()->with('error', 'User not found.');
        }
        // Check if the email of the user attempting to log in is verified
        $user_email_verification = EmailVerification::where('email', $user)
        ->where('status', 1)
        ->first();

        if (!$user_email_verification) {
            return back()->with('error', 'Email verification is required.');
        }

        $userCredential = $request->only('role', 'login_email', 'password');
        if (Auth::attempt($userCredential)) {
            $route = $this->redirectDashboard();

            // Get the authenticated user's details
            $user = Auth::user();
            // Clear cache redis data
            $prefixes = [
                'branch_log_session_data',
                'usersActivityCount',
                'userBranchBarChart',
            ];
            CacheManage::clearMultiple($prefixes, $user->branch_id);

            if($user){
                $sessionId = Str::random(40);
                DB::table('sessions')->insert([
                    'id' => $sessionId,
                    'branch_id' => $user->branch_id,
                    'user_id' => $user->id,
                    'ip_address' => $request->ip(),
                    'name' => $user->name,
                    'email' => $user->login_email,
                    'role' => $user->role ?? '-',
                    'email_verified_at' => $user->email_verified_at,
                    'contract_number' => $user->contract_number ?? '-',
                    'image' => $user->image ?? '-',
                    'status' => $user->status ?? '-',
                    'account_create' => $user->created_at,
                    'account_last_update' => $user->updated_at,
                    'user_agent' => $request->userAgent(),
                    'payload' => 'login',
                    'last_activity' => now()->timestamp,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Clear the 'login_completed' session flag
            Session::forget('login_completed');
            // Login Door Clear the session after retrieving the email
            $request->session()->forget('login_email');

            session(['session_id' => $sessionId]);
               
            return redirect($route);
        } else {
            return back()->with('error', 'User, Email & Password is incorrect');
        }
    }
    /**
     * Handle password forget page load.
    */
    public function forgetPasswordLoad(Request $request)
    {
        $email = session('login_email');
        if($email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $user_image = User::where('login_email', $email)->first();
            // Define the default URL as null
            $url = null;
            if($user_image){
                $url = match($user_image->role){
                    1 => route('superadmin.login'),
                    2, 3 => route('admin.login'),
                    5 => route('accounts.login'),
                    6, 7, 0 => route('user.login'),
                    default => null,
                };
            }
            return view('auth.forget-password', compact('company_profiles', 'email', 'user_image', 'url'));
        }else{
            return redirect(route('login_door.index'));  
        }
    }
    /**
     * Handle send resetlink in email.
    */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );


        if ($response == Password::RESET_LINK_SENT) {
            // Store the email in the session
            session(['email' => $request->email, 'reset_link_sent' => true]);
            return back()->with('success', "Check you email for reset password");
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Fail to send email, try agine latter']);
    }
    /**
     * Handle send reset page laod.
    */
    public function resetPasswordLoad(Request $request)
    {
        $email = session('email');
        $resetLinkSent = session('reset_link_sent', false);
        if($email && $resetLinkSent){
            session()->forget('reset_link_sent'); // Clear the flag
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $user_image = User::where('email', $email)->first();
            
            if($user_image){
                $home_url = null;
                $home_url = route('login_door.index');
                return view('auth.reset-password', \compact('company_profiles', 'user_image', 'home_url'));
            }
            return redirect(route('password.forget'));  
        }
        return redirect(route('login_door.index')); 
    }
    /**
     * Handle set passord.
    */
    public function setPassword(Request $request)
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required|string',
        ]);
        
        $response = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        if($response == Password::PASSWORD_RESET){
            return redirect()->route('auth.login')->with('success', 'Password has changed successfully');
        }
        return back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
    }
    /**
     * Handle super admin logout.
    */
    public function userLogOut(Request $request)
    {
        $sessionId = session('session_id');
        DB::table('sessions')
        // ->where('user_id', Auth::id())
        ->where('id', $sessionId)
        ->update([
            'payload' => 'logout',
            'updated_at' => now()
        ]);

        $request->session()->flush();

        Auth::logout();
        return redirect('/');
    }
    /**
     * Handle admin logout.
    */
    public function adminLogOuts(Request $request)
    {
        $sessionId = session('session_id');
        DB::table('sessions')
        // ->where('user_id', Auth::id())
        ->where('id', $sessionId)
        ->update([
            'payload' => 'logout',
            'updated_at' => now()
        ]);

        $request->session()->flush();

        Auth::logout();
        return redirect('/');
    }
    /**
     * Handle accounts logout.
    */
    public function accountsLogouts(Request $request)
    {
        $sessionId = session('session_id');
        DB::table('sessions')
        // ->where('user_id', Auth::id())
        ->where('id', $sessionId)
        ->update([
            'payload' => 'logout',
            'updated_at' => now()
        ]);

        $request->session()->flush();

        Auth::logout();
        return redirect('/');
    }
    /**
     * Handle common user logout.
    */
    public function commonUserLogouts(Request $request)
    {
        $sessionId = session('session_id');
        DB::table('sessions')
        // ->where('user_id', Auth::id())
        ->where('id', $sessionId)
        ->update([
            'payload' => 'logout',
            'updated_at' => now()
        ]);

        $request->session()->flush();

        Auth::logout();
        return redirect('/');
    }
    /**
     * Handle email verification page load.
    */
    public function emailVerificationLoad()
    {
        $valid_email = session('valid_email');
        if($valid_email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $email_verifications = EmailVerification::where('status', '=', 0)->orderBy('id', 'desc')->get();
            $users = User::where('email', $valid_email)->first();
            if($users !== null){
                $register_url = null;
                $register_url = route('register.loading');
                return view('auth.email-verification', compact('company_profiles','email_verifications', 'users', 'register_url'));
            }else if($users == null){
                return redirect(route('register.loading'));  
            }
        }else{
            return redirect(route('registraion_form.index'));  
        }
    }
    /**
     * Handle send email verification.
    */
    public function sendEmailVerification(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email|exists:email_verifications,email',
        ]);
        
        try {
            $userEmail = $request->email;
            Mail::to($userEmail)->send(new AdminEmail());
            
            $emailVerification = EmailVerification::where('email', $userEmail)->firstOrFail();
            $emailVerification->update([
                'email_verified_session' => now(),
                'status' => !$emailVerification->status,
            ]);

            $userVerification = User::where('email', $userEmail)->firstOrFail();
            $userVerification->refresh();
            $userVerification->update([
                'email_verified_at' => now(),
            ]);

            return back()->with('success', 'Verification link has been sent to your email.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send verification email. Please try again.');
        }
    }
    /**
     * Handle User Role Fetch.
    */
    public function fetchRoles(Request $request)
    {
        // $roles = Role::all();
        $includedRoles = ['Super Admin', 'Admin', 'Sub Admin'];
        $roles = Role::where('status', 1)->whereIn('name', $includedRoles)->get();

        return response()->json([
            'roles' => $roles,
        ], 200);
    }
    /**
     * Handle User Email Fetch.
    */
    public function fetchEmails(Request $request, $id)
    {
        $users = User::whereHas('roles', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return response()->json([
            'users' => $users,
        ], 200);
    }

    /**
     * Handle User Email Fetch.
    */
    public function fetchEmailOnes(Request $request, $id)
    {
        $users = User::whereHas('roles', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return response()->json([
            'users' => $users,
        ], 200);
    }

    /**
     * Handle User Email Fetch.
    */
    public function fetchEmailTwos(Request $request, $id)
    {
        $users = User::whereHas('roles', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return response()->json([
            'users' => $users,
        ], 200);
    }
    /**
     * Handle User Email Fetch. fetchEmailsThree
    */
    public function fetchEmailsThree(Request $request)
    {
        $user_emails = User::where('login_email')->orWhere('status', 1)->get();

        return response()->json([
            'user_emails' => $user_emails,
        ], 200);
    }

    /**
     * Handle User Role Fetch For Branch.
    */
    public function fetchBranchRole(Request $request)
    {
        $excludedRoles = ['Super Admin', 'Admin', 'Sub Admin'];
        $branch_roles = Role::where('status', 1)->whereNotIn('name', $excludedRoles)->get();

        return response()->json([
            'branch_roles' => $branch_roles,
        ], 200);
    }

    /**
     * Handle User Email Fetch For Branch.
    */
    public function fetchBranchEmail(Request $request, $id)
    {
        $users = User::whereHas('roles', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return response()->json([
            'users' => $users,
        ], 200);
    }
}
