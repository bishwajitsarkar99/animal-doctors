<?php
namespace App\LogicBild\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Email\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Password;
use App\Mail\AdminEmail;
use Illuminate\Support\Facades\Mail;

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
            $redirect = '/accounts/dashboard';
        }else if(Auth::user() && Auth::user()->role == 6) {
            $redirect = '/marketing/dashboard';
        }else if(Auth::user() && Auth::user()->role == 7) {
            $redirect = '/delivery-team/dashboard';
        }
        else{
            $redirect = '/doctors/home';
        }

        return $redirect; 
    }
    /**
     * Handle register page.
    */
    public function register()
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        if (Auth::user()) {
            $route = $this->redirectDashboard();
            return redirect($route);
        }
        return view('auth.register', compact('company_profiles'));
    }
    /**
     * Handle create user register.
    */
    public function create(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'string|required|max:120',
            'contract_number' => 'required|numeric|digits:11',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:6|max:30',
            'image' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->contract_number = $request->contract_number;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('image/', $filename);
            $user->image = $filename;
        }

        $user->save();

        // Insert into email_verifications table
        DB::table('email_verifications')->insert([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $request->role ?? 0,
            'account_create_session' => now(),
        ]);

        return redirect(url('auth.email-verification'))->with('success', 'Your Registration has been completed successfully');
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
            'email' => 'required|email',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        $user_email = $request->input('email');
        $user = User::where('email', $user_email)->first();

        if ($user) {
            session(['email' => $user_email]);
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
        } else {
            return response()->json([
                'status' => 400,
                'error' => 'User email does not exist.',
            ]);
        }
    }
    /**
     * Handle Super Admin Login View page.
    */
    public function loginPage(Request $request)
    {
        $email = session('email');
        if($email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $roles = Role::whereIn('name', ['Super Admin'])->get();
    
            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
            return view('auth.login', compact('company_profiles', 'roles', 'email'));
        }else{
            return redirect(route('login_door.index'));
        }
    }
    /**
     * Handle Admin Login View page.
    */
    public function viewAdminLoginPage(Request $request)
    {
        $email = session('email');
        if($email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $roles = Role::whereIn('name', ['Admin', 'Sub Admin'])->get();
    
            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
    
            return view('auth.admin-login', compact('company_profiles', 'roles', 'email'));
        }else{
            return redirect(route('login_door.index'));
        }
    }
    /**
     * Handle Accounts Login View page.
    */
    public function viewAccountsLoginPage(Request $request)
    {
        $email = session('email');
        if($email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $roles = Role::whereIn('name', ['Accounts'])->get();
    
            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
    
            return view('auth.accounts-login', compact('company_profiles', 'roles', 'email'));
        }else{
            return redirect(route('login_door.index'));
        }
    }
    /**
     * Handle Common-User Login View page.
    */
    public function viewCommonUserLoginPage(Request $request)
    {
        $email = session('email');
        if($email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $roles = Role::whereIn('name', ['User','Marketing','Delivery Team'])->get();
    
            if (Auth::user()) {
                $route = $this->redirectDashboard();
                return redirect($route);
            }
    
            return view('auth.common-user-login', compact('company_profiles', 'roles', 'email'));
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
            'email' => 'string|email|required|max:100|exists:users',
            'password' => 'required|min:6|max:30',
        ], [
            'email.exists' => 'This email is not exists on users table',
        ]);

        // Check if the email of the user attempting to log in is verified
        $user_email_verification = EmailVerification::where('email', $request->email)
        ->where('status', 1)
        ->first();

        if (!$user_email_verification) {
            return back()->with('error', 'Email verification is required.');
        }

        $userCredential = $request->only('role', 'email', 'password');
        if (Auth::attempt($userCredential)) {
            $route = $this->redirectDashboard();

            // Get the authenticated user's details
            $user = Auth::user();

            if($user){
                $sessionId = Str::random(40);
                DB::table('sessions')->insert([
                    'id' => $sessionId,
                    'user_id' => $user->id,
                    'ip_address' => $request->ip(),
                    'name' => $user->name,
                    'email' => $user->email,
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
            $request->session()->forget('email');

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
        $email = session('email');
        if($email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $user_image = User::where('email', $email)->first();
            return view('auth.forget-password', compact('company_profiles', 'email', 'user_image'));
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
        if($email){
            $company_profiles = companyProfile::where('id', '=', 1)->get();
            $user_image = User::where('email', $email)->first();
            return view('auth.reset-password', \compact('company_profiles', 'user_image'));
        }else{
            return redirect(route('login_door.index'));  
        }
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
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        $email_verifications = EmailVerification::where('status', '=', 0)->orderBy('id', 'desc')->get();
        return view('auth.email-verirication', compact('company_profiles','email_verifications'));
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
            $userVerification->update([
                '	email_verified_at' => now(),
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
        $roles = Role::all();

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
     * Handle User Role Fetch For Branch.
    */
    public function fetchBranchRole(Request $request)
    {
        $excludedRoles = ['Super Admin', 'Admin', 'Sub Admin'];
        $branch_roles = Role::whereNotIn('name', $excludedRoles)->get();

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
