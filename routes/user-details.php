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
            Route::get('/user-log/user-log-activity-{slug}/log-dashboard', [UserLocationController::class, 'details'])->name('user.details');
            Route::get('/show-user-activity', [UserLocationController::class, 'activity'])->name('user.activity');
            Route::get('/get-user-activity', [UserLocationController::class, 'getActivity'])->name('user.get_activity');
            Route::get('/user-activity-analytical-chart', [UserLocationController::class, 'userAnalyticalChart'])->name('user.analytical_chart');
            Route::get('/get-branch-fetch-data', [UserLocationController::class, 'getBranch'])->name('branch.fetch');
            Route::get('/get-fetch-role-data/{id}', [UserLocationController::class, 'fetchRoleData'])->name('role.fetch');
            Route::get('/get-user-fetch-email/{id}', [UserLocationController::class, 'fetchUserEmail'])->name('user_email.fetch');
            Route::get('/session-data-download/export-pdf', [UserLocationController::class, 'pdfDownloadSession'])->name('pdf_session_data.fetch');
            Route::get('/session-data-download/export-excel', [UserLocationController::class, 'exportExcelDownloadSession'])->name('session-record_excel.action');
            Route::get('/session-data-download/export-cvs-format', [UserLocationController::class, 'exportExcelCsvDownloadSession'])->name('session-record_cvs_file.action');
            Route::get('/session-data-download/print', [UserLocationController::class, 'printSession'])->name('session-record.print');
            Route::get('/user-session-single-data-download/pdf', [UserLocationController::class, 'pdfDownloadUserLogged'])->name('details-session-record.pdf');
            Route::get('/user-session-single-data-download/print', [UserLocationController::class, 'printDownloadUserLogged'])->name('details-session-record.print');
        });
    });
});