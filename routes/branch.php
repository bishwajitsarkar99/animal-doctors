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
            // Branch Create Type
            Route::post('/branch-type-create', [BranchController::class, 'branchTypeStore'])->name('branch_type.store');
            Route::get('/branch-type-search', [BranchController::class, 'searchBranchType'])->name('search-branch-type.action');
            Route::get('/branch-type-edit/{id}', [BranchController::class, 'editBranchType'])->name('edit-branch-type.action');
            Route::put('/branch-type-update/{id}', [BranchController::class, 'updateBranchType'])->name('update_branch_type.action');
            Route::delete('/branch-type-delete/{id}', [BranchController::class, 'deleteBranchType'])->name('branch_type.delete');
            // Branch Create
            Route::get('/branch-activity/branch-create', [BranchController::class, 'redirectWithRandom'])->name('branch.redirect');
            Route::get('/branch-activity/branch-{random}-{page_authorize}/create/index', [BranchController::class, 'index'])->name('branch.index');
            Route::post('/branch-create', [BranchController::class, 'store'])->name('branch.store');
            Route::get('/branch-search', [BranchController::class, 'searchBranch'])->name('search-branch.action');
            Route::get('/branch-edit/{id}', [BranchController::class, 'editBranch'])->name('edit-branch.action');
            Route::put('/branch-update/{id}', [BranchController::class, 'updateBranch'])->name('update_branch.action');
            Route::delete('/branch-delete/{id}', [BranchController::class, 'deleteBranch'])->name('branch.delete');
            // Branch Admin Access
            Route::get('/branch-activity/branch-admin-access', [BranchController::class, 'redirectWithRandomAdminBranchAccess'])->name('branch_access.redirect');
            Route::get('/branch-activity/branch-{random}-{page_authorize}/admin-access/index', [BranchController::class, 'branchAccessView'])->name('branch_access.view');
            Route::post('/branch-admin-permission-store', [BranchController::class, 'branchAcessStore'])->name('branch_access_store.action');
            Route::post('/branch-admin-permission', [BranchController::class, 'accessBranch'])->name('access_status.action');
            Route::get('/branch-admin-change-fetch', [BranchController::class, 'adminBranchChangeFetch'])->name('admin_branch_fetch.action');
            Route::put('/branch-admin-change/{id}', [BranchController::class, 'adminBranchChange'])->name('admin_branch_change.action');
            Route::delete('/branch-admin-change-delete/{id}', [BranchController::class, 'adminBranchDelete'])->name('admin_branch_delete.action');
            // Brach User Access Permission
            Route::get('/branch-activity/branch-user-access', [BranchController::class, 'redirectWithRandomUserBranchAccess'])->name('branch_access_permission.redirect');
            Route::get('/branch-activity/branch-{random}-{page_authorize}/user-access/index', [BranchController::class, 'branchAccessUserPermission'])->name('branch_access_permission.view');
            Route::get('/branch-get-data/{id}', [BranchController::class, 'branchGetData'])->name('branch_get.action');
            Route::get('/branch-data-fetch', [BranchController::class, 'branchDataFetch'])->name('branch_fetch.action');
            Route::get('/user-branch-data-fetch', [BranchController::class, 'userBranchDataFetch'])->name('user_branch_fetch.action');
            Route::get('/branch-user-email-fetch', [BranchController::class, 'branchUserEmail'])->name('branch_user_email_fetch.action');
            Route::get('/branch-specify-name-fetch', [BranchController::class, 'branchSearchSpecify'])->name('branch_specify_search.action');
            Route::get('/branch-name-query/{id}', [BranchController::class, 'branchSearchName'])->name('branch_name_search.action');
            Route::post('/branch-user-permission-create', [BranchController::class, 'permissionCreate'])->name('permission_create.action');
            Route::get('/branch-user-permission-role/{id}', [BranchController::class, 'permission_role'])->name('permission_user_role.action');
            Route::get('/branch-user-permission-email/{id}', [BranchController::class, 'permission_email'])->name('permission_user_email.action');
            Route::get('/branch-user-permission-edit/{id}', [BranchController::class, 'permissionEdit'])->name('permission_edit.action');
            Route::get('/branch-user-change/{id}', [BranchController::class, 'userBranchChange'])->name('user_branch_change.action');
            Route::put('/branch-user-permission-update/{id}', [BranchController::class, 'permissionUpdate'])->name('permission_update.action');
            Route::delete('/branch-user-permission-delete/{id}', [BranchController::class, 'permissionDelete'])->name('permission_delete.action');
            Route::post('/branch-user-permission', [BranchController::class, 'permissionBranch'])->name('permission_status.action');
        });
    });
});