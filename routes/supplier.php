<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Setting\SupplierSetting;

Route::group(['middleware' => 'auth'], function (){
    
    // Supplier Access Permission
    Route::middleware('isSuperAdmin')->group(function () {

        Route::get('/super-admin/supplier/access-permission', [SupplierController::class, 'Supplier_Access_Permission'])->name('access-permission.index');
        Route::get('/super-admin/get-email/{selectedUserRole}',[SupplierController::class, 'getUserEmail'])->name('user-permission.email');
        Route::post('/super-admin/store-permission',[SupplierController::class, 'storeUserPermission'])->name('user-permission.store');
        Route::get('/super-admin/edit-permission/{id}',[SupplierController::class, 'editUserPermission'])->name('user-permission.edit');
        Route::put('/super-admin/update-permission/{id}',[SupplierController::class, 'updateUserPermission'])->name('user-permission.update');
        Route::delete('/super-admin/delete-permission/{id}',[SupplierController::class, 'deleteUserPermission'])->name('user-permission.delete');
        Route::post('/super-admin/permission-status-update',[SupplierController::class, 'permissionUserStatusUpdate'])->name('user-permission.status_update');
        Route::post('/super-admin/supplier-module-permission',[SupplierSetting::class, 'supplierSettingUpdate'])->name('module.action');
    });
    // Supplier Create
    Route::middleware('supplierCreate')->group(function () {
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('/get-supplier', [SupplierController::class, 'getSupplier'])->name('search-supplier.action');
        Route::post('/add-supplier', [SupplierController::class, 'stroeData'])->name('add_supplier.action');
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
    // Supplier MySql Database Permission
    Route::middleware('supplierMySqlData')->group(function () {
        
        Route::prefix('suppliers')->group(function(){
            Route::post('/permission-status-update',[SupplierController::class, 'updatesupplierStatus'])->name('supplier_update_status.action');
        });
    });
    
});