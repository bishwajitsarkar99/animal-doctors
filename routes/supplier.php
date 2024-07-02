<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Supplier\SupplierController;

Route::group(['middleware' => 'auth'], function (){
    
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