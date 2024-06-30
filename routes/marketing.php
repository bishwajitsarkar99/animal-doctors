<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Marketing\MarketingController;

// ********** Accounts Department Routes *********
Route::group(['prefix' => 'marketing', 'middleware' => ['web', 'isMarketing']], function () {
    Route::get('/dashboard', [MarketingController::class, 'dashboard'])->name('marketing.dashboard');
});