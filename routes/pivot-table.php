<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PivotTable\OrderPivotTableController;
use App\Http\Controllers\PivotTable\PivotTableController;
use App\Http\Controllers\PivotTable\SalesPivotTableController;
use App\Http\Controllers\PivotTable\SupplierRecordController;

Route::group(['middleware' => 'auth'], function (){

    Route::group(['prefix' => 'business-summary', 'middleware' => ['web', 'isSuperAdmin']], function () {
        // partial-part(dashboard-pivot table)
        Route::get('/pivot-tables/expenses-pivot-table-{slug}/index', [PivotTableController::class, 'index'])->name('expenses_index');
        Route::get('/pivot-tables/order-pivot-table-{slug}/index', [OrderPivotTableController::class, 'showOrderPivot'])->name('showOrder_pivot');
        Route::get('/pivot-tables/sales-pivot-table-{slug}/index', [SalesPivotTableController::class, 'showSalesPivot'])->name('showSales_pivot');
        Route::get('/pivot-tables/supplier-pivot-table-{slug}/index', [SupplierRecordController::class, 'index'])->name('supplier_index');
    });
});