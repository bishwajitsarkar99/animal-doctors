<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Email\EmailController;

Route::get('/login', function () {
    return redirect('/');
});
// Super Admin Login Routes with Middleware
Route::middleware('loginPage')->group(function () {
    Route::get('/', [AuthController::class, 'loadLogin'])->name('superadmin.login');
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
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Registration Routes with Middleware
Route::middleware('registerPage')->group(function () {
    Route::get('/register', [AuthController::class, 'loadRegister']);
});
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Password Routes with Middleware
Route::middleware('forgetPage')->group(function () {
    Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('password.forget');
});
Route::middleware('resetPage')->group(function () {
    Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'sendResetLinkEmail'])->name('passwords.sent');
    Route::put('reset-password', [AuthController::class, 'setPassword'])->name('password.update');
});
// Email Verification Routes with Middleware
Route::middleware('emailVerificationPage')->group(function () {
    Route::get('email-verification', [AuthController::class, 'loadLink'])->name('email.verification');
});
// Email Link Sending Route
Route::post('send-link', [AuthController::class, 'sendLink'])->name('send.link');
// Send Email
Route::middleware(['role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User'])->group(function(){
    Route::get('/email', [EmailController::class, 'index'])->name('email.index');
    Route::post('/email/send', [EmailController::class, 'sendEmail'])->name('email.send');
    Route::get('/email/send/list', [EmailController::class, 'sendFetchEmail'])->name('email.send_list');
    Route::get('/email/fetch', [EmailController::class, 'inboxFetchEmail'])->name('email.fetch');
    Route::get('/email/forward/{id}', [EmailController::class, 'forwardEmail'])->name('email.forward');
    Route::get('/email/fetch/drafts', [EmailController::class, 'getDraftFetchEmail'])->name('email.draft');
    Route::post('/email/view/status', [EmailController::class, 'emailView'])->name('email.view_draft');
    Route::delete('/email/delete/{id}', [EmailController::class, 'deleteEmail'])->name('email.delete');
});
// Super Admin Logout Route (POST is more secure for state-changing operations)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Admin Logout Route (POST is more secure for state-changing operations)
Route::get('/admin-logout', [AuthController::class, 'adminLogout'])->name('adminLogout');
// Accounts Logout Route (POST is more secure for state-changing operations)
Route::get('/accounts-logout', [AuthController::class, 'accountsLogout'])->name('accountsLogout');
// Common User Logout Route (POST is more secure for state-changing operations)
Route::get('/common-user-logout', [AuthController::class, 'commonUserLogout'])->name('commonUserLogout');
