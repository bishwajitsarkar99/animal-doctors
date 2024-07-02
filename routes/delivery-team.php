<?php

use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DeliveryTeam\DeliveryTeamController;

Route::group(['middleware' => 'auth'], function (){

    // ********** Accounts Department Routes *********
    Route::group(['prefix' => 'delivery-team', 'middleware' => ['web', 'isDeliveryTeam']], function () {
        Route::get('/dashboard', [DeliveryTeamController::class, 'dashboard'])->name('delivery-team.dashboard');
    });
});