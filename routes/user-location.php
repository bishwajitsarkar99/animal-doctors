<?php

use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Location\UserLocationController;

// ********** User Loaction Routes *********
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/show-user-loaction', [UserLocationController::class, 'location'])->name('user.loaction');
});