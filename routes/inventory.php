<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Inventory\MedicineInventory;
use App\Http\Controllers\Post\MedicinePostController;

Route::group(['middleware' => 'auth'], function (){
    
    // Create Inventory
    Route::middleware(['inventoryPermission'])->group(function () {
        Route::get('/request-data/{id}', [MedicinePostController::class, 'requestSubcategory']);
        Route::get('/request-medicine-name/{id}', [MedicinePostController::class, 'requestMedicineName']);
        Route::get('/request-medicine-dogs/{id}', [MedicinePostController::class, 'requestMedicineDogs']);
        
        // Medicine-Inventory
        Route::prefix('medicine')->group(function () {
            Route::get('/inventories', [MedicineInventory::class, 'index'])->name('medicine-inventory.index');
            Route::post('/inventories', [MedicineInventory::class, 'store'])->name('medicine-inventory.store');
            Route::get('/inventories-edit-get', [MedicineInventory::class, 'getData'])->name('search-inv.action');
            Route::get('/inventories-edit/{inventory_id}', [MedicineInventory::class, 'editInventory']);
            Route::put('/inventories-update/{inventory_id}', [MedicineInventory::class, 'updateInventory'])->name('update_inventory.action');
            Route::get('/inventories-unauthorized-data', [MedicineInventory::class, 'unauthorizedData'])->name('search-unauthorized.action');
        });
        
    });
    
});