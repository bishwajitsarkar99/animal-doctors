<?php

use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Location\UserLocationController;

// ********** User Activity Loaction Routes *********
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/show-user-activity', [UserLocationController::class, 'activity'])->name('user.activity');
    Route::get('/get-user-activity', [UserLocationController::class, 'getActivity'])->name('user.get_activity');
});