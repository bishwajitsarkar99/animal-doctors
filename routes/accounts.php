<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accounts\AccountsController;

// ********** Accounts Department Routes *********
Route::group(['prefix' => 'accounts', 'middleware' => ['web', 'isAccounts']], function () {
    Route::get('/dashboard', [AccountsController::class, 'dashboard'])->name('accounts.dashboard');
});