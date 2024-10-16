<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogicBild\Auth\AuthService;

class AuthController extends Controller
{
    protected $authService;
    
    // inject AuthService
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    // load register page
    public function loadRegister()
    {
        return $this->authService->register();
    }
    
    // User Register
    public function register(Request $request)
    {
        return $this->authService->create($request);
    }

    // Load Login Page
    public function loadLogin()
    {
        return $this->authService->loginPage();
    }
    // User Login
    public function login(Request $request)
    {
        return $this->authService->userLogin($request);
    }

    // view dashboard
    public function loadDashboard()
    {
        return view('user.dashboard');
    }

    // redirect dashboard
    public function redirectDash()
    {
        return $this->authService->redirectDashboard();
    }

    // password forget page laod
    public function forgetPassword()
    {
        return $this->authService->forgetPasswordLoad();
    }

    // Send ResetLink In Email
    public function sendResetLinkEmail(Request $request)
    {
        return $this->authService->sendResetLink($request);
    }

    // Reset Page Load
    public function resetPassword(Request $request)
    {
        return $this->authService->resetPasswordLoad($request);
    }

    // Set Password
    public function setPassword(Request $request)
    {
        return $this->authService->setPassword($request);
    }

    // User Logout
    public function logout(Request $request)
    {
        return $this->authService->userLogOut($request);
    }

    // Email Verification page load
    public function loadLink()
    {
        return $this->authService->emailVerificationLoad();
    }

    // Send Email Verification
    public function sendLink(Request $request)
    {     
        return $this->authService->sendEmailVerification($request);
    }
}
