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

    // Fetch Role
    public function fetchRole(Request $request)
    {
        return $this->authService->fetchRoles($request);
    }

    // Fetch Role
    public function fetchEmail(Request $request, $id)
    {
        return $this->authService->fetchEmails($request, $id);
    }

    // Fetch Role For Branch
    public function fetchBranchRoles(Request $request)
    {
        return $this->authService->fetchBranchRole($request);
    }

    // Fetch Email For Branch
    public function fetchBranchEmails(Request $request, $id)
    {
        return $this->authService->fetchBranchEmail($request, $id);
    }

    // Fetch Role One
    public function fetchEmailOne(Request $request, $id)
    {
        return $this->authService->fetchEmailOnes($request, $id);
    }

    // Fetch Role Two
    public function fetchEmailTwo(Request $request, $id)
    {
        return $this->authService->fetchEmailTwos($request, $id);
    }
    
    // Login Door Page View
    public function loginDoor(Request $request)
    {
        return $this->authService->loginDoorPage($request);
    }

    // User Email Registration
    public function loadingRegistrationForm(Request $request)
    {
        return $this->authService->emailRegistrationForm($request);
    }

    // Open Login Page
    public function openLogin(Request $request)
    {
        return $this->authService->openLoginPage($request);
    }

    // load register page
    public function loadRegister(Request $request)
    {
        return $this->authService->register($request);
    }

    // email register
    public function userEmailRegister(Request $request)
    {
        return $this->authService->EmailRegister($request);
    }
    
    // User Register
    public function register(Request $request)
    {
        return $this->authService->create($request);
    }

    // Load Super Admin Login Page View
    public function loadLogin(Request $request)
    {
        return $this->authService->loginPage($request);
    }
    // Load Admin Login Page View
    public function loadAdminLogin(Request $request)
    {
        return $this->authService->viewAdminLoginPage($request);
    }
    // Load Accounts Login Page View
    public function loadAccountsLogin(Request $request)
    {
        return $this->authService->viewAccountsLoginPage($request);
    }
    // Load Common User Login Page View
    public function loadCommonUserLogin(Request $request)
    {
        return $this->authService->viewCommonUserLoginPage($request);
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
    public function forgetPassword(Request $request)
    {
        return $this->authService->forgetPasswordLoad($request);
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

    // Super Admin Logout
    public function logout(Request $request)
    {
        return $this->authService->userLogOut($request);
    }

    // Admin Logout
    public function adminLogout(Request $request)
    {
        return $this->authService->adminLogOuts($request);
    }

    // Accounts Logout
    public function accountsLogout(Request $request)
    {
        return $this->authService->accountsLogouts($request);
    }

    // Common User Logout
    public function commonUserLogout(Request $request)
    {
        return $this->authService->commonUserLogouts($request);
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
