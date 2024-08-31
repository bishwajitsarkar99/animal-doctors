<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'loadRegister']);

Route::get('/login', function () {
    return redirect('/');
});
Route::get('/', [AuthController::class, 'loadLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('password.forget');
Route::post('reset-password', [AuthController::class, 'sendResetLinkEmail'])->name('passwords.sent');
Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::put('reset-password', [AuthController::class, 'setPassword']);
Route::get('email-verification', [AuthController::class, 'loadLink'])->name('email.verification');
Route::get('send-link', [AuthController::class, 'sendLink'])->name('send.link');
