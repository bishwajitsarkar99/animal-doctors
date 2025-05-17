<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Module\ModuleController;

Route::group(['middleware' => 'auth'], function (){

    Route::middleware(['isSuperAdmin'])->group(function(){
        Route::prefix('application')->group(function () {
            // Module Category
            Route::get('/modules/module-category-index', [ModuleController::Class, 'moduleCategoryView'])->name('module_category_view.action');
            Route::post('/module-category-store', [ModuleController::Class, 'moduleCategoryStore'])->name('module_category_store.action');
            Route::get('/module-category-edit/{id}', [ModuleController::Class, 'moduleCategoryEdit'])->name('module_category_edit.action');
            Route::put('/module-category-update/{id}', [ModuleController::Class, 'moduleCategoryUpdate'])->name('module_category_update.action');
            Route::delete('/module-category-delete/{id}', [ModuleController::Class, 'moduleCategoryDelete'])->name('module_category_delete.action');
            Route::get('/module-category-search', [ModuleController::Class, 'moduleCategorySearch'])->name('module_category_search.action');
            // Module Name
            Route::get('/modules/module-name-index', [ModuleController::Class, 'moduleNameView'])->name('module_name_view.action');
            Route::post('/module-name-store', [ModuleController::Class, 'ModuleNameStore'])->name('module_name_store.action');
            Route::get('/module-name-edit/{id}', [ModuleController::Class, 'ModuleNameEdit'])->name('module_name_edit.action');
            Route::put('/module-name-update/{id}', [ModuleController::Class, 'ModuleNameUpdate'])->name('module_name_update.action');
            Route::delete('/module-name-delete/{id}', [ModuleController::Class, 'ModuleNameDelete'])->name('module_name_delete.action');
            Route::get('/module-name-search', [ModuleController::Class, 'moduleNameSearch'])->name('module_name_search.action');
            // Module
            Route::get('/modules/module-index', [ModuleController::Class, 'index'])->name('module.index');
            Route::get('/module-name-get', [ModuleController::Class, 'moduleNameGet'])->name('module_name_get.action');
            Route::get('/module-category-get', [ModuleController::Class, 'moduleCategoryGet'])->name('module_category_get.action');
            Route::post('/module-store', [ModuleController::Class, 'store'])->name('module.store');
            Route::get('/module-edit/{id}', [ModuleController::Class, 'edit'])->name('module.edit');
            Route::put('/module-update/{id}', [ModuleController::Class, 'update'])->name('module.update');
            Route::delete('/module-delete/{id}', [ModuleController::Class, 'delete'])->name('module.delete');
            Route::get('/module-search/{id}', [ModuleController::Class, 'moduleSearch'])->name('module.search');
            
        });
    });
});