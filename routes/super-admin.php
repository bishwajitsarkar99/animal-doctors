<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Setting\PostSettngController;
use App\Http\Controllers\Inventory\InventoryAuthorization;
use App\Models\Permission\InventoryAccessPermission;
use App\Http\Controllers\Inventory\InventoryDetailsRecord;

Route::group(['middleware' => 'auth'], function (){
    
    // ********** Super Admin Routes *********
    // User and Role Permission
    Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('super-admin.dashboard');
        Route::get('/users', [SuperAdminController::class, 'users'])->name('superAdminUsers');
        Route::get('/get-users', [SuperAdminController::class, 'getusers'])->name('search_users.action');
        Route::post('/status-users', [SuperAdminController::class, 'update_status'])->name('update_status.action');
        Route::get('/manage-role', [SuperAdminController::class, 'manageRole'])->name('manageRole');
        Route::post('/update-role', [SuperAdminController::class, 'updateRole'])->name('updateRole');
        Route::get('/app-setting', [SuperAdminController::class, 'appSetting'])->name('appSetting');
    });
    // User and company profile update 
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/show-users/{id}', [SuperAdminController::class, 'showUsers'])->name('users.show');
        Route::get('/edit-users/{id}', [SuperAdminController::class, 'editUsers']);
        Route::post('/update-users/{id}', [SuperAdminController::class, 'updateUsers'])->name('users.update');
        Route::delete('/delete-users/{id}', [SuperAdminController::class, 'deleteUsers'])->name('users.delete');
        Route::post('/update-app-setting', [SuperAdminController::class, 'appSettingUpdate'])->name('updateappSetting');
    });
    // Permission
    Route::middleware('isSuperAdmin')->group(function(){
        Route::get('/all-permission',[PermissionController::class, 'index'])->name('permission.show');
        Route::get('/get-email/{selectedRole}',[PermissionController::class, 'getEmail'])->name('permission.email');
        Route::post('/store-permission',[PermissionController::class, 'storePermission'])->name('permission.store');
        Route::get('/edit-permission/{id}',[PermissionController::class, 'editPermission'])->name('permission.edit');
        Route::put('/update-permission/{id}',[PermissionController::class, 'updatePermission'])->name('permission.update');
        Route::delete('/delete-permission/{id}',[PermissionController::class, 'deletePermission'])->name('permission.delete');
        Route::post('/permission-status-update',[PermissionController::class, 'permissionStatusUpdate'])->name('permission.status_update');
    });
    // Permission setting
    Route::middleware('isSuperAdmin')->group(function () {
        // setting blog-post
        Route::get('super-admin/post-setting', [PostSettngController::class, 'index'])->name('post_setting.index');
        Route::get('super-admin/get-post-setting', [PostSettngController::class, 'getPost'])->name('search_category_post.action');
        Route::post('super-admin/post-category-status', [PostSettngController::class, 'updatepostCategoryStatus'])->name('post_category_status.action');
        Route::delete('super-admin/delete-post-category/{id}', [PostSettngController::class, 'deletePostCategory'])->name('delete_post_category.action');
        Route::get('super-admin/get-main-post-setting', [PostSettngController::class, 'getMainPost'])->name('search_main_post.action');
        Route::post('super-admin/main-post-status', [PostSettngController::class, 'updateMainPostStatus'])->name('main_post_status.action');
        Route::delete('super-admin/delete-main-post/{id}', [PostSettngController::class, 'deleteMainPost'])->name('delete_main_post.action');
        // inventory authorize
        Route::get('super-admin/inventory-authorize', [InventoryAuthorization::class, 'index'])->name('inventory-auth');
        Route::get('super-admin/inventory-authorize-user/{selectedRole}', [InventoryAuthorization::class, 'getSelectRole'])->name('auth-role.action');
        Route::get('super-admin/inventory-data-request', [InventoryAuthorization::class, 'searchInventory'])->name('inventory-search.action');
        Route::get('super-admin/inventory-get', [InventoryAuthorization::class, 'getInventoryData'])->name('search-inventory.action');
        Route::post('super-admin/inventory-status', [InventoryAuthorization::class, 'inventoryAuthorize'])->name('inventory-authorize.action');
        // inventory permission
        Route::post('super-admin/inventory-permission-update', [InventoryAuthorization::class, 'inventoryPermissionStatusUpdate'])->name('inventory_permission_status.action');
        Route::delete('super-admin/delete-inventory-permission/{id}', [InventoryAuthorization::class, 'inventoryPermissionDelete'])->name('inventory_permission_delete.action');
       
    });
    // Invntory Token Permission
    Route::middleware(['role:SuperAdmin|Admin'])->group(function(){
        Route::post('super-admin/inventory-permission', [InventoryAuthorization::class, 'inventoryPermission'])->name('action.inventory-permission');
        Route::get('super-admin/get-inventory-permission', [InventoryAuthorization::class, 'inventoryPermissionGet'])->name('search-inventory-permission.action');
        Route::put('super-admin/token-inventory-permission/{inventory_id}', [InventoryAuthorization::class, 'inventoryToken'])->name('inventory-token.action');
    });
});