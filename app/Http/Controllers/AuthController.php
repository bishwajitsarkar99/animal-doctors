<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Password;


class AuthController extends Controller
{
    //
    public function loadRegister()
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register', compact('company_profiles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:120',
            'contract_number' => 'string|required|min:11',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:6',
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

        return back()->with('success', 'Your Registration has been completed successfully');
    }

    public function loadLogin()
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();

        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }

        return view('login', compact('company_profiles'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|email|required|max:100|exists:users',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'This email is not exists on users table',
        ]);

        $userCredential = $request->only('email', 'password');
        if (Auth::attempt($userCredential)) {

            $route = $this->redirectDash();
            return redirect($route);
        } else {
            return back()->with('error', 'Username & Password is incorrect');
        }
    }

    public function loadDashboard()
    {
        return view('user.dashboard');
    }


    public function redirectDash()
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

    

    public function forgetPassword()
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        return view('forget-password', compact('company_profiles'));
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );


        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('success', "Check you meail for reset password");
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Fail to send meail. try agine latter']);
    }

    public function resetPassword(Request $request)
    {
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        
        return view('reset-password', \compact('company_profiles'));
    }

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
            return redirect()->route('login')->with('success', 'ho passwoed chnage hioiceh');
        }

        return back()->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);

    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
