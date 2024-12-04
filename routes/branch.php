<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Branch\BranchController;

Route::group(['middleware' => 'auth'], function (){
    // Get Division,District and Upazila
    Route::get('/get-division', [BranchController::class, 'getDivision'])->name('division.get');
    Route::get('/get-district/{selectedDivision}', [BranchController::class, 'getDistrict'])->name('district.get');
    Route::get('/get-upazila/{selectedDistrict}', [BranchController::class, 'getUpazila'])->name('upazila.get');
    // Branch
    Route::middleware(['role:SuperAdmin|Admin|SubAdmin'])->group(function(){
        Route::prefix('company')->group(function () {
            Route::get('/branch', [BranchController::class, 'index'])->name('branch.index');
            Route::post('/branch-create', [BranchController::class, 'store'])->name('branch.store');
            Route::get('/branch-search', [BranchController::class, 'searchBranch'])->name('search-branch.action');
            Route::get('/branch-edit/{id}', [BranchController::class, 'editBranch'])->name('edit-branch.action');
            Route::put('/branch-update/{id}', [BranchController::class, 'updateBranch'])->name('update_branch.action');
            Route::delete('/branch-delete/{id}', [EmailController::class, 'deleteBranch'])->name('branch.delete');
            Route::post('/branch-status', [EmailController::class, 'statusBranch'])->name('status.action');
            Route::post('/branch-user-access', [EmailController::class, 'accessBranch'])->name('branch.access');
        });
    });
});