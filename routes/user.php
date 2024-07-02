<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

Route::group(['middleware' => 'auth'], function (){
    
    // ********** Doctors Routes *********
    Route::group(['prefix' => 'doctors', 'middleware' => ['web', 'isUser']], function () {
        Route::get('/home', [UserController::class, 'dashboard'])->name('doctors.dashboard');
        Route::get('/users', [UserController::class, 'users'])->name('Users');
    });
    Route::middleware('isUser')->group(function () {
        Route::get('/get-users', [UserController::class, 'getusers']);
        //Route::get('/edit-users/{id}',[UserController::class,'edituser']);
    });

});