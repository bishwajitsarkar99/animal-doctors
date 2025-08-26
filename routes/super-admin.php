<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Setting\PostSettngController;
use App\Http\Controllers\Inventory\InventoryAuthorization;
use App\Http\Controllers\Inventory\InventoryDetailsRecord;

Route::group(['middleware' => 'auth'], function (){
    
    // ********** Super Admin Routes *********
    // User and Role Permission
    Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
        // Dashboard Route
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('super-admin.dashboard');
        // User Management Routes
        Route::get('/users/user-authorization-{slug}/index', [SuperAdminController::class, 'users'])->name('superAdminUsers');
        Route::get('/get-users', [SuperAdminController::class, 'getusers'])->name('search_users.action');
        Route::post('/status-users', [SuperAdminController::class, 'update_status'])->name('update_status.action');
        Route::get('/user-accounts/account-holder/account-history-{slug}/index', [SuperAdminController::class, 'accounts_holders'])->name('get_account-holders.action');
        // Role Management Routes
        Route::get('/roles/role-index-{slug}/index', [SuperAdminController::class, 'roleIndex'])->name('role_index');
        Route::post('/role-create', [SuperAdminController::class, 'roleCreate'])->name('role_create.action');
        Route::get('/role-get', [SuperAdminController::class, 'roleGet'])->name('role_get.action');
        Route::get('/role-search', [SuperAdminController::class, 'roleSearch'])->name('role_search.action');
        Route::put('/role-update/{id}', [SuperAdminController::class, 'roleUpdate'])->name('role_update.action');
        Route::delete('/role-delete/{id}', [SuperAdminController::class, 'roleDelete'])->name('role_delete.action');
        Route::post('/role-promot', [SuperAdminController::class, 'rolePromotIndex'])->name('role_promot.action');
        Route::get('/roles/manage-role-{slug}/index', [SuperAdminController::class, 'manageRole'])->name('manageRole');
        Route::post('/update-role', [SuperAdminController::class, 'updateRole'])->name('updateRole');
        // Branch Access
        Route::get('/branch-data-get/{selectedBranch}', [SuperAdminController::class, 'user_emailFetch'])->name('users_email_fetch.action');
        // Role Permission
        Route::get('/role-data-get', [SuperAdminController::class, 'user_roleFetch'])->name('users_role_fetch.action');
        Route::get('/roles/role-permission-{slug}/index', [SuperAdminController::class, 'rolePermission'])->name('role_permission.index');
        Route::post('/role-permission-create', [SuperAdminController::class, 'rolePermissionCreate'])->name('role_permission_create.action');
        Route::get('/role-permission-fetch', [SuperAdminController::class, 'rolePermissionFetch'])->name('role_permission_fetch.action');
        Route::get('/role-permission-edit/{id}', [SuperAdminController::class, 'rolePermissionEdit'])->name('role_permission_edit.action');
        Route::put('/role-permission-update/{id}', [SuperAdminController::class, 'rolePermissionUpdate'])->name('role_permission_update.action');
        Route::delete('/role-permission-delete/{id}', [SuperAdminController::class, 'rolePermissionDelete'])->name('role_permission_delete.action');
        Route::get('/role-permission-get', [SuperAdminController::class, 'rolePermissionGet'])->name('role_permission_get.action');
        // Application Settings Routes
        Route::get('/app-setting-{slug}/index', [SuperAdminController::class, 'appSetting'])->name('appSetting');
         // Email Verification Routes
        Route::get('/register-emails/email-verification-{slug}/index', [SuperAdminController::class, 'loadEmailVerification'])->name('emailVerification');
        Route::post('/email-verification-status', [SuperAdminController::class, 'updateEmailStatus'])->name('email_update_status.action');
        // Authentication Page Management Routes
        Route::get('/auth-pages/auth-page-permission-{slug}/index', [SuperAdminController::class, 'loadAuthPage'])->name('authPageLoad');
        Route::get('/auth-page-filter/{page_id}', [SuperAdminController::class, 'pageItemFilter'])->name('filter.action');
        Route::post('/update-auth-page/{id}', [SuperAdminController::class, 'authManagePage'])->name('update_auth_page.action');
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
        Route::get('super-admin/post-setting-{slug}/index', [PostSettngController::class, 'index'])->name('post_setting.index');
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