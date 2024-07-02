<?php

use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Marketing\MarketingController;

Route::group(['middleware' => 'auth'], function (){

    // ********** Accounts Department Routes *********
    Route::group(['prefix' => 'marketing', 'middleware' => ['web', 'isMarketing']], function () {
        Route::get('/dashboard', [MarketingController::class, 'dashboard'])->name('marketing.dashboard');
    });
});