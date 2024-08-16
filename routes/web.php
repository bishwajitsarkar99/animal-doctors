<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\FileManagerController\FileManagerController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\PivotTable\OrderPivotTableController;
use App\Http\Controllers\PivotTable\PivotTableController;
use App\Http\Controllers\PivotTable\SalesPivotTableController;
use App\Http\Controllers\PivotTable\SupplierRecordController;
use App\Http\Controllers\SettingController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission\InventoryAccessPermission;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . DIRECTORY_SEPARATOR .'auth.php';
require __DIR__ . DIRECTORY_SEPARATOR .'super-admin.php';
require __DIR__ . DIRECTORY_SEPARATOR .'admin.php';
require __DIR__ . DIRECTORY_SEPARATOR .'sub-admin.php';
require __DIR__ . DIRECTORY_SEPARATOR .'user.php';
require __DIR__ . DIRECTORY_SEPARATOR .'accounts.php';
require __DIR__ . DIRECTORY_SEPARATOR .'marketing.php';
require __DIR__ . DIRECTORY_SEPARATOR .'delivery-team.php';
require __DIR__ . DIRECTORY_SEPARATOR .'user-activity.php';
require __DIR__ . DIRECTORY_SEPARATOR .'forntend.php';
require __DIR__ . DIRECTORY_SEPARATOR .'supplier.php';
require __DIR__ . DIRECTORY_SEPARATOR .'product-iteam.php';
require __DIR__ . DIRECTORY_SEPARATOR .'inventory.php';
require __DIR__ . DIRECTORY_SEPARATOR .'stock.php';

Route::group(['middleware' => 'auth'], function () {

    // partial-part(dashboard-pivot table)
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/expenses-pivot-table', [PivotTableController::class, 'index']);
        Route::get('/order-pivot-table', [OrderPivotTableController::class, 'showOrderPivot']);
        Route::get('/sales-pivot-table', [SalesPivotTableController::class, 'showSalesPivot']);
        Route::get('/supplier-summary', [SupplierRecordController::class, 'index']);
        Route::get('/account-holders', [SuperAdminController::class, 'accounts_holders'])->name('get_account-holders.action');
    });
    
    // File - Manager System
    Route::middleware(['role:SuperAdmin|Admin|SubAdmin'])->group(function(){
        Route::get('file-manager/modal-content', [FileManagerController::class, 'modalContent'])->name('file.modalContent');
        Route::post('file-manager/upload-file', [FileManagerController::class, 'uploadFile'])->name('upload.file');
        Route::get('file-manager/get-folders', [FileManagerController::class, 'getFolder'])->name('folder.getFolder');
        Route::get('file-manager/fetch-folders', [FileManagerController::class, 'fetchFolder'])->name('folder.fetchFolder');
        Route::post('file-manager/create-folder', [FileManagerController::class, 'createFolder'])->name('file-manager.create-folder');
        Route::get('/files/{folder}', [FileManagerController::class, 'showFiles'])->name('files.showFiles');
        Route::delete('file-manager/delete/{folder}/{filename}', [FileManagerController::class, 'delete'])->name('file.delete');
        Route::get('file-manager/edit-folders/{id}', [FileManagerController::class, 'editFolder']);
        Route::put('file-manager/update-folders/{id}', [FileManagerController::class, 'updateFolder'])->name('update-folder.action');
        Route::delete('file-manager/folder-delete/{id}', [FileManagerController::class, 'deleteFolder'])->name('folder-delete.action');
        Route::get('file-manager/select-file-folder', [FileManagerController::class, 'getFolderSelect'])->name('getFolder.action');
    });

    // App Setting
    Route::middleware('isSuperAdmin')->group(function(){
        Route::prefix('/settings')->group(function(){
            Route::get('/', [SettingController::class, 'index']);
            Route::put('/', [SettingController::class, 'update']);
        });
    });
    // ->withoutMiddleware('auth')
    // Language
    Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
});

