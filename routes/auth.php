<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Email\EmailController;

Route::get('/login-door', function () {
    return redirect('/');
});
Route::get('/login-door', [AuthController::class, 'loginDoor'])->name('login_door.index');
// Super Admin Login Routes with Middleware
Route::get('/login', [AuthController::class, 'loadLogin'])->name('superadmin.login');
// Login Door Open Action Route with Middleware
Route::middleware('loginPage')->group(function () {
    Route::get('/login-page-get', [AuthController::class, 'openLogin'])->name('login_page.action');
});
// User Email Registration Form Route with Middleware
Route::middleware('userRegistration')->group(function () {
    Route::get('/registration-form', [AuthController::class, 'loadingRegistrationForm'])->name('registraion_form.index');
});
// User Email Registration Action Route with Middleware
Route::middleware('registrationAction')->group(function () {
    Route::get('/registration-get', [AuthController::class, 'userEmailRegister'])->name('email_register.action');
});
// Admin Login Routes with Middleware
Route::middleware('adminLoginPage')->group(function () {
    Route::get('/admin-login', [AuthController::class, 'loadAdminLogin'])->name('admin.login');
});
// Accounts Login Routes with Middleware
Route::middleware('accountsLoginPage')->group(function () {
    Route::get('/accounts-login', [AuthController::class, 'loadAccountsLogin'])->name('accounts.login');
});
// Common User Login Routes with Middleware
Route::middleware('commonUserLoginPage')->group(function () {
    Route::get('/common-user-login', [AuthController::class, 'loadCommonUserLogin'])->name('user.login');
});
// User Login Action
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Password Routes with Middleware
Route::middleware('forgetPage')->group(function () {
    Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('password.forget');
});
Route::middleware('resetPage')->group(function () {
    Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'sendResetLinkEmail'])->name('passwords.sent');
    Route::put('reset-password', [AuthController::class, 'setPassword'])->name('password.update');
});
// Email Link Sending Route
Route::post('send-link', [AuthController::class, 'sendLink'])->name('send.link');

// Registration Routes with Middleware
Route::middleware('registerPage')->group(function () {
    Route::get('/register', [AuthController::class, 'loadRegister'])->name('register.loading');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Email Verification Routes with Middleware
Route::middleware('emailVerificationPage')->group(function () {
    Route::get('email-verification', [AuthController::class, 'loadLink'])->name('email.verification');
});

// Send Email
Route::middleware(['role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User'])->group(function(){
    Route::get('/email', [EmailController::class, 'index'])->name('email.index');
    Route::post('/email/send', [EmailController::class, 'sendEmail'])->name('email.send');
    Route::get('/email/send/list', [EmailController::class, 'sendFetchEmail'])->name('email.send_list');
    Route::get('/email/fetch', [EmailController::class, 'inboxFetchEmail'])->name('email.fetch');
    Route::get('/email/forward/{id}', [EmailController::class, 'forwardEmail'])->name('email.forward');
    Route::post('/email/forward/send', [EmailController::class, 'sendForwardedEmail'])->name('email.forward.send');
    Route::get('/email/fetch/drafts', [EmailController::class, 'getDraftFetchEmail'])->name('email.draft');
    Route::post('/email/view/status', [EmailController::class, 'emailView'])->name('email.view_draft');
    Route::delete('/email/delete', [EmailController::class, 'deleteEmail'])->name('email.delete');
    Route::get('/user-email/{selectedRole}', [EmailController::class, 'getUserEmail'])->name('user.email');
});
// Delete Email Setting
Route::middleware(['isSuperAdmin'])->group(function(){
    Route::post('/email-delete-permission/store', [EmailController::class, 'store'])->name('email.store');
    Route::get('/email-delete-permission/edit/{id}', [EmailController::class, 'permissionEdit'])->name('email.permission_edit');
    Route::put('/email-delete-permission/update/{id}', [EmailController::class, 'permissionUpdate'])->name('email.permission_update');
    Route::delete('/email-delete-permission/delete/{id}', [EmailController::class, 'deletePermissionEmail'])->name('email.permission_delete');
    Route::get('/email-record/fetch', [EmailController::class, 'emailRecord'])->name('email.record');
    Route::get('/email-setting', [EmailController::class, 'emailSetting'])->name('email.setting');
    Route::put('/email-setting/update/{id}', [EmailController::class, 'emailSettingUpdate'])->name('email.setting_update');
});
// Super Admin Logout Route (POST is more secure for state-changing operations)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Admin Logout Route (POST is more secure for state-changing operations)
Route::get('/admin-logout', [AuthController::class, 'adminLogout'])->name('adminLogout');
// Accounts Logout Route (POST is more secure for state-changing operations)
Route::get('/accounts-logout', [AuthController::class, 'accountsLogout'])->name('accountsLogout');
// Common User Logout Route (POST is more secure for state-changing operations)
Route::get('/common-user-logout', [AuthController::class, 'commonUserLogout'])->name('commonUserLogout');
// Fetch Role and User Email
Route::group(['middleware' => 'auth'], function (){
    Route::prefix('users')->group(function (){
        Route::get('/fetch-role', [AuthController::class, 'fetchRole'])->name('fetch_role.action');
        Route::get('/fetch-email/{id}', [AuthController::class, 'fetchEmail'])->name('fetch_email.action');
        Route::get('/fetch-role-branch', [AuthController::class, 'fetchBranchRoles'])->name('fetch_branch_role.action');
        Route::get('/fetch-email-branch/{id}', [AuthController::class, 'fetchBranchEmails'])->name('fetch_branch_email.action');
        Route::get('/fetch-email-one/{id}', [AuthController::class, 'fetchEmailOne'])->name('fetch_email_one.action');
        Route::get('/fetch-email-two/{id}', [AuthController::class, 'fetchEmailTwo'])->name('fetch_email_two.action');
        Route::get('/fetch-email-three', [AuthController::class, 'fetchEmailThree'])->name('fetch_email_three.action');
    });
});
