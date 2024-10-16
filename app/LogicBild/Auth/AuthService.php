<?php
namespace App\LogicBild\Auth;
use Illuminate\Http\Request;
use App\Models\User;
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
        return view('register', compact('company_profiles'));
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

        return redirect(url('/email-verification'))->with('success', 'Your Registration has been completed successfully');
    }
    /**
     * Handle login page.
    */
    public function loginPage()
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();

        if (Auth::user()) {
            $route = $this->redirectDashboard();
            return redirect($route);
        }

        return view('login', compact('company_profiles'));
    }
    /**
     * Handle user login event.
    */
    public function userLogin(Request $request)
    {
        // Validation
        $request->validate([
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

        $userCredential = $request->only('email', 'password');
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

            session(['session_id' => $sessionId]);
               
            return redirect($route);
        } else {
            return back()->with('error', 'Username & Password is incorrect');
        }
    }
    /**
     * Handle password forget page load.
    */
    public function forgetPasswordLoad()
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        return view('forget-password', compact('company_profiles'));
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
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        return view('reset-password', \compact('company_profiles'));
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
            return redirect()->route('login')->with('success', 'Password has changed successfully');
        }
        return back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
    }
    /**
     * Handle user logout.
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
     * Handle email verification page load.
    */
    public function emailVerificationLoad()
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        $email_verifications = EmailVerification::where('status', '=', 0)->orderBy('id', 'desc')->get();
        return view('email-verirication', compact('company_profiles','email_verifications'));
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
}
