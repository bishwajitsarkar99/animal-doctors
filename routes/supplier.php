<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Supplier\SupplierController;

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
    });
    // Supplier
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
        Route::post('/add-supplier', [SupplierController::class, 'stroeData'])->name('add_supplier.action');
        Route::get('/get-supplier', [SupplierController::class, 'getSupplier'])->name('search-supplier.action');
        Route::get('/edit-supplier/{id}', [SupplierController::class, 'editSupplier']);
        Route::put('/update-supplier/{id}', [SupplierController::class, 'updateSupplier'])->name('supplier.update');
        Route::post('/status-supplier', [SupplierController::class, 'updatesupplierStatus'])->name('supplier_update_status.action');
        Route::delete('delete-supplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('delete_supplier.action');
    });
});