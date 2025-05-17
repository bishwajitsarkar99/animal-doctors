<?php

use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Location\UserLocationController;

// ********** User Activity Loaction Routes *********
Route::group(['middleware' => 'auth'], function () {
    Route::middleware(['role:SuperAdmin|Admin|SubAdmin'])->group(function(){
        Route::prefix('application')->group(function () {
            Route::get('/user-log/user-log-activity/log-dashboard', [UserLocationController::class, 'redirectWithRandom'])->name('user.redirect');
            Route::get('/user-log/user-log-activity-{slug}-{user_analycis_authorize}-{user_log_data_authorize}-{user_activity_graph_authorize}/log-dashboard', [UserLocationController::class, 'details'])->name('user.details');
            Route::get('/show-user-activity', [UserLocationController::class, 'activity'])->name('user.activity');
            Route::get('/get-user-activity', [UserLocationController::class, 'getActivity'])->name('user.get_activity');
            Route::get('/user-activity-analytical-chart', [UserLocationController::class, 'userAnalyticalChart'])->name('user.analytical_chart');
        });
    });
});