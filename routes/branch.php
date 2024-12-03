<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Branch\BranchController;

Route::group(['middleware' => 'auth'], function (){
    // Branch
    Route::middleware(['role:SuperAdmin|Admin|SubAdmin'])->group(function(){
        Route::prefix('company')->group(function () {
            Route::get('/branch', [BranchController::class, 'index'])->name('branch.index');
            Route::post('/branch-create', [BranchController::class, 'store'])->name('branch.store');
            Route::get('/branch-edit', [BranchController::class, 'getBranch'])->name('search-branch.action');
            Route::get('/branch-edit/{id}', [BranchController::class, 'editBranch'])->name('branch.edit');
            Route::put('/branch-update/{id}', [BranchController::class, 'updateBranch'])->name('update_branch.action');
            Route::delete('/branch-delete', [EmailController::class, 'deleteBranch'])->name('branch.delete');
        });
    });
});