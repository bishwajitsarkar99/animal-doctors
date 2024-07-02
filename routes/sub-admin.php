<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SubAdminController;

Route::group(['middleware' => 'auth'], function (){
    // ********** Sub Admin Routes *********
    Route::group(['prefix' => 'sub-admin', 'middleware' => ['web', 'isSubAdmin']], function () {
        Route::get('/dashboard', [SubAdminController::class, 'dashboard'])->name('sub-admin.dashboard');
    });
    
});