<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Permission\UserPermission;

Route::group(['middleware' => 'auth'], function (){
    // Add Permission
    Route::middleware(['role:SuperAdmin'])->group(function(){
        Route::prefix('permission')->group(function () {
            // Add Permission
            Route::get('/user-permission-index', [UserPermission::Class, 'index'])->name('user_permission.index');
            Route::post('/user-permission-store', [UserPermission::Class, 'store'])->name('user_permission.store');
            Route::get('/user-permission-edit/{id}', [UserPermission::Class, 'edit'])->name('user_permission.edit');
            Route::put('/user-permission-update/{id}', [UserPermission::Class, 'update'])->name('user_permission.update');
            Route::delete('/user-permission-delete/{id}', [UserPermission::Class, 'delete'])->name('user_permission.delete');
            Route::get('/user-permission-search/{id}', [UserPermission::Class, 'search'])->name('user_permission.search');
            
        });
    });
    // Access Permission
    Route::middleware(['role:SuperAdmin|Admin|SubAdmin'])->group(function(){
        Route::prefix('permission')->group(function () {
            // Access Permission
            
        });
    });
});