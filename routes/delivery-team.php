<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryTeam\DeliveryTeamController;

// ********** Accounts Department Routes *********
Route::group(['prefix' => 'delivery-team', 'middleware' => ['web', 'isDeliveryTeam']], function () {
    Route::get('/dashboard', [DeliveryTeamController::class, 'dashboard'])->name('delivery-team.dashboard');
});