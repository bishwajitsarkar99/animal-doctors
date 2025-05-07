<?php

use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Accounts\AccountsController;

Route::group(['middleware' => 'auth'], function (){
    
    // ********** Accounts Department Routes *********
    Route::group(['prefix' => 'accounts', 'middleware' => ['web', 'isAccounts']], function () {
        Route::get('/accounts-home-page', [AccountsController::class, 'dashboard'])->name('accounts.dashboard');
    });
});