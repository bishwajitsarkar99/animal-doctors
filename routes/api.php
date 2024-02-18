<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//
use App\Http\Controllers\Api\Forntend\Footer\FooterInformation;
use App\Http\Controllers\Api\NewsleterController;
use App\Http\Controllers\Api\ProductController;

Route::get('/get-blog-post', [BlogPostController::class, 'index']);
Route::get('/get-blog-category-post', [BlogPostController::class, 'blogCategory']);

// Public Routes
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/send-reset-password-email', [PasswordResetController::class, 'send_reset_password_email']);
// Route::post('/reset-password/{token}', [PasswordResetController::class, 'reset']);

// Protected Routes
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/loggeduser', [AuthController::class, 'logged_user']);
    Route::post('/changepassword', [AuthController::class, 'change_password']);
});

// Route::middleware('auth:sanctum')->get('/normal-user', function (Request $request) {
//     return $request->normaluser();
// });


Route::post('newsleter', [NewsLeterController::class, 'store'])->name('newsleter.store');
Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::prefix('super-admin')->group(function () {
    Route::apiResource('forntend-footer-information', FooterInformation::class);
});