<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Setting\SupplierSetting;

Route::group(['middleware' => 'auth'], function (){
    
    // Supplier Access Permission
    Route::middleware('isSuperAdmin')->group(function () {
        Route::prefix('company-supplier')->group(function (){
            Route::get('/suppliers/access-permission', [SupplierController::class, 'Supplier_Access_Permission'])->name('access-permission.index');
            Route::get('/suppliers/get-email/{selectedUserRole}',[SupplierController::class, 'getUserEmail'])->name('user-permission.email');
            Route::post('/suppliers/store-permission',[SupplierController::class, 'storeUserPermission'])->name('user-permission.store');
            Route::get('/suppliers/edit-permission/{id}',[SupplierController::class, 'editUserPermission'])->name('user-permission.edit');
            Route::put('/suppliers/update-permission/{id}',[SupplierController::class, 'updateUserPermission'])->name('user-permission.update');
            Route::delete('/suppliers/delete-permission/{id}',[SupplierController::class, 'deleteUserPermission'])->name('user-permission.delete');
            Route::post('/suppliers/permission-status-update',[SupplierController::class, 'permissionUserStatusUpdate'])->name('user-permission.status_update');
            Route::post('/suppliers/supplier-module-permission',[SupplierSetting::class, 'supplierSettingUpdate'])->name('module.action');
        });
    });
    // Supplier Create
    Route::middleware('supplierCreate')->group(function () {
        Route::prefix('company-supplier')->group(function (){
            Route::get('/suppliers/index', [SupplierController::class, 'index'])->name('supplier.index');
            Route::get('/get-supplier/{branch_id}', [SupplierController::class, 'getSupplier']);
            Route::post('/add-supplier', [SupplierController::class, 'stroeData'])->name('add_supplier.action');
            Route::get('/branch-fetch/{id}', [SupplierController::class, 'branchFetch'])->name('supplier_branch_fetch.action');
        });
    });
    
    // Supplier Update
    Route::middleware('supplierUpdate')->group(function () {
        Route::get('/edit-supplier/{id}', [SupplierController::class, 'editSupplier']);
        Route::put('/update-supplier/{id}', [SupplierController::class, 'updateSupplier'])->name('supplier.update');
    });
    // Supplier Delete
    Route::middleware('supplierDelete')->group(function () {
        Route::delete('/delete-supplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('delete_supplier.action');
    });
    // Supplier View
    Route::middleware('supplierView')->group(function () {
        Route::get('/view-supplier/{id}', [SupplierController::class, 'viewSupplier'])->name('view_supplier.action');
    });
    
});