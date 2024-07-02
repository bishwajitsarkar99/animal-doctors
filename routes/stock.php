<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stock\StockController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'auth'], function (){
    // Stock
    Route::middleware(['role:SuperAdmin|Admin'])->group( function(){
        Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
        Route::post('/stock', [StockController::class, 'storeStock'])->name('stock.store');
        Route::get('/stock-edit-get', [StockController::class, 'getData'])->name('seach-stock.action');
        Route::get('/stock-edit/{id}', [StockController::class, 'editStock']);
        Route::put('/stock-update/{id}', [StockController::class, 'updateStock'])->name('update_stock.action');
        Route::get('/stock-details', [StockController::class, 'getStock'])->name('stock-details.action');

    });
    
});