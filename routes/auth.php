<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return redirect('/');
});
// Authentication Routes with Middleware
Route::middleware('loginPage')->group(function () {
    Route::get('/', [AuthController::class, 'loadLogin']);
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
// Logout Route (POST is more secure for state-changing operations)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
