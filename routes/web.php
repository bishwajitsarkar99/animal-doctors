<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\NewsleterController;
use App\Http\Controllers\Forntend\Footer\Newsletter\NewsletterController;
use App\Http\Controllers\Forntend\Footer\FooterInformation;
use App\Http\Controllers\Inventory\InventoryAuthorization;
use App\Http\Controllers\Inventory\MedicineInventory;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\PivotTable\OrderPivotTableController;
use App\Http\Controllers\PivotTable\PivotTableController;
use App\Http\Controllers\PivotTable\SalesPivotTableController;
use App\Http\Controllers\PivotTable\SupplierRecordController;
use App\Http\Controllers\Post\CreateCategoryPostController;
use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\MedicinePostController;
use App\Http\Controllers\Post\ProductPostController;
use App\Http\Controllers\Post\VisitorsController;
use App\Http\Controllers\ProductIteam\BrandController;
use App\Http\Controllers\ProductIteam\CategoryController;
use App\Http\Controllers\ProductIteam\GroupController;
use App\Http\Controllers\ProductIteam\MedicineDogsController;
use App\Http\Controllers\ProductIteam\MedicineNameController;
use App\Http\Controllers\ProductIteam\MedicineOrginController;
use App\Http\Controllers\Productiteam\ProductController;
use App\Http\Controllers\ProductIteam\ProductModelController;
use App\Http\Controllers\ProductIteam\SubCategoryController;
use App\Http\Controllers\ProductIteam\UnitController;
use App\Http\Controllers\Setting\PostSettngController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . DIRECTORY_SEPARATOR .'auth.php';

Route::group(['middleware' => 'auth'], function () {

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
        Route::get('/create-permission',[PermissionController::class, 'createPermission'])->name('permission.create');
        Route::post('/store-permission',[PermissionController::class, 'storePermission'])->name('permission.store');
        Route::get('/edit-permission/{id}',[PermissionController::class, 'editPermission'])->name('permission.edit');
        Route::post('/update-permission/{id}',[PermissionController::class, 'updatePermission'])->name('permission.update');
        Route::get('/delete-permission/{id}',[PermissionController::class, 'deletePermission'])->name('permission.delete');
        Route::post('/permission-status-update',[PermissionController::class, 'permissionStatusUpdate'])->name('permission.status_update');
    });
    //Admin-Panel partial-part(dashboard-pivot table)
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/expenses-pivot-table', [PivotTableController::class, 'index']);
        Route::get('/order-pivot-table', [OrderPivotTableController::class, 'showOrderPivot']);
        Route::get('/sales-pivot-table', [SalesPivotTableController::class, 'showSalesPivot']);
        Route::get('/supplier-summary', [SupplierRecordController::class, 'index']);
        Route::get('/account-holders', [SuperAdminController::class, 'accounts_holders'])->name('get_account-holders.action');
    });
    // ********** Medicnie Routes *********
    // Category
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/add-category', [CategoryController::class, 'storeData'])->name('add.action');
        Route::get('/get-category', [CategoryController::class, 'getCategory'])->name('search-category.action');
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory']);
        Route::put('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
        Route::post('/status-category', [CategoryController::class, 'updateCategoryStatus'])->name('category_status.action');
        Route::delete('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete_category.action');
    });
    // Sub-Category
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('sub-category.index');
        Route::get('/get-data-category', [SubCategoryController::class, 'getCategories'])->name('get-categories.action');
        Route::post('/add-sub-category', [SubCategoryController::class, 'storeData'])->name('add_subcategory.action');
        Route::get('/get-sub-category', [SubCategoryController::class, 'getSubCategory'])->name('search-subcategory.action');
        Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'editSubCategory']);
        Route::put('/update-sub-category/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('subcategory.update');
        Route::post('/status-sub-category', [SubCategoryController::class, 'updateSubCategoryStatus'])->name('subcategory_status.action');
        Route::delete('delete-sub-category/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete_subcategory.action');
    });
    // Medicine-Group
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/medicine-group', [GroupController::class, 'index'])->name('medicine-group.index');
        Route::post('/add-medicine-group', [GroupController::class, 'storeData'])->name('add_medicinegroup.action');
        Route::get('/get-medicine-group', [GroupController::class, 'getmedicinegroup'])->name('search-medicinegroup.action');
        Route::get('/edit-medicine-group/{id}', [GroupController::class, 'editmedicinegroup']);
        Route::put('/update-medicine-group/{id}', [GroupController::class, 'updatemedicinegroup'])->name('medicinegroup.update');
        Route::post('/status-medicine-group', [GroupController::class, 'updatemedicinegroupStatus'])->name('medicinegroup_status.action');
        Route::delete('delete-medicine-group/{id}', [GroupController::class, 'deletemedicinegroup'])->name('delete_medicinegroup.action');
    });
    // Medicine-Name
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/medicine-name', [MedicineNameController::class, 'index'])->name('medicine-name.index');
        Route::get('/get-group', [MedicineNameController::class, 'getGroup'])->name('group.action');
        Route::post('/add-medicine-name', [MedicineNameController::class, 'storeData'])->name('add_medicinename.action');
        Route::get('/get-medicine-name', [MedicineNameController::class, 'getmedicinename'])->name('search-medicinename.action');
        Route::get('/edit-medicine-name/{id}', [MedicineNameController::class, 'editmedicinename']);
        Route::put('/update-medicine-name/{id}', [MedicineNameController::class, 'updatemedicinename'])->name('medicinename.update');
        Route::post('/status-medicine-name', [MedicineNameController::class, 'updatemedicinenameStatus'])->name('medicinename_status.action');
        Route::delete('delete-medicine-name/{id}', [MedicineNameController::class, 'deletemedicinename'])->name('delete_medicinename.action');
    });
    // Medicine-Dosage
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/medicine-dosage', [MedicineDogsController::class, 'index'])->name('medicine-dogs.index');
        Route::get('/get-medicine', [MedicineDogsController::class, 'get_medicine'])->name('medicine_name.action');
        Route::post('/add-medicine-dosage', [MedicineDogsController::class, 'storeData'])->name('add_medicinedogs.action');
        Route::get('/get-medicine-dosage', [MedicineDogsController::class, 'getmedicinedogs'])->name('search-medicinedogs.action');
        Route::get('/edit-medicine-dosage/{id}', [MedicineDogsController::class, 'editmedicinedogs']);
        Route::put('/update-medicine-dosage/{id}', [MedicineDogsController::class, 'updatemedicinedogs'])->name('medicinedogs.update');
        Route::post('/status-medicine-dosage', [MedicineDogsController::class, 'updatemedicinedogsStatus'])->name('medicinedogs_status.action');
        Route::delete('delete-medicine-dosage/{id}', [MedicineDogsController::class, 'deletemedicinedogs'])->name('delete_medicinedogs.action');
    });
    // Units
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/units', [UnitController::class, 'index'])->name('units.index');
        Route::post('/add-units', [UnitController::class, 'storeData'])->name('add_units.action');
        Route::get('/get-units', [UnitController::class, 'getunits'])->name('search-units.action');
        Route::get('/edit-units/{id}', [UnitController::class, 'editunits']);
        Route::put('/update-units/{id}', [UnitController::class, 'updateunits'])->name('units.update');
        Route::post('/status-units', [UnitController::class, 'updateunitsStatus'])->name('units_status.action');
        Route::delete('delete-units/{id}', [UnitController::class, 'deleteunits'])->name('delete_units.action');
    });
    // Origin
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/origin', [MedicineOrginController::class, 'index'])->name('origin.index');
        Route::post('/add-origin', [MedicineOrginController::class, 'storeData'])->name('add_origin.action');
        Route::get('/get-origin', [MedicineOrginController::class, 'getorigin'])->name('search-origin.action');
        Route::get('/edit-origin/{id}', [MedicineOrginController::class, 'editorigin']);
        Route::put('/update-origin/{id}', [MedicineOrginController::class, 'updateorigin'])->name('origin.update');
        Route::post('/status-origin', [MedicineOrginController::class, 'updateoriginStatus'])->name('origin_status.action');
        Route::delete('delete-origin/{id}', [MedicineOrginController::class, 'deleteorigin'])->name('delete_origin.action');
    });
    // Brand
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/get-data-origin', [BrandController::class, 'getDataOrigin'])->name('get_origin.action');
        Route::post('/add-brand', [BrandController::class, 'storeData'])->name('add_brand.action');
        Route::get('/get-brand', [BrandController::class, 'getbrand'])->name('search-brand.action');
        Route::get('/edit-brand/{id}', [BrandController::class, 'editbrand']);
        Route::put('/update-brand/{id}', [BrandController::class, 'updatebrand'])->name('brand.update');
        Route::post('/status-brand', [BrandController::class, 'updatebrandStatus'])->name('brand_status.action');
        Route::delete('delete-brand/{id}', [BrandController::class, 'deletebrand'])->name('delete_brand.action');
    });
    // Model
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/model', [ProductModelController::class, 'index'])->name('model.index');
        Route::get('/get-data-product', [ProductModelController::class, 'getDataProduct'])->name('get_product.action');
        Route::post('/add-model', [ProductModelController::class, 'storeData'])->name('add_model.action');
        Route::get('/get-model', [ProductModelController::class, 'getmodel'])->name('search-model.action');
        Route::get('/edit-model/{id}', [ProductModelController::class, 'editmodel']);
        Route::put('/update-model/{id}', [ProductModelController::class, 'updatemodel'])->name('model.update');
        Route::post('/status-model', [ProductModelController::class, 'updatemodelStatus'])->name('model_status.action');
        Route::delete('delete-model/{id}', [ProductModelController::class, 'deletemodel'])->name('delete_model.action');
    });
    // Product
    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::post('/add-product', [ProductController::class, 'storeData'])->name('add_product.action');
        Route::get('/get-product', [ProductController::class, 'getproduct'])->name('search-product.action');
        Route::get('/edit-product/{id}', [ProductController::class, 'editproduct']);
        Route::put('/update-product/{id}', [ProductController::class, 'updateproduct'])->name('product.update');
        Route::post('/status-product', [ProductController::class, 'updateproductStatus'])->name('product_status.action');
        Route::delete('delete-product/{id}', [ProductController::class, 'deleteproduct'])->name('delete_product.action');
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
    // setting
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
        Route::get('super-admin/inventory-get', [InventoryAuthorization::class, 'getInventoryData'])->name('search-inventory.action');
        Route::post('super-admin/inventory-status', [InventoryAuthorization::class, 'inventoryAuthorize'])->name('inventory-authorize.action');
        Route::get('super-admin/get-inventory-delete-data', [InventoryAuthorization::class, 'getInventoryDeleteData'])->name('get_inventory_data.action');
        Route::delete('super-admin/inventory-delete', [InventoryAuthorization::class, 'inventoryDelete'])->name('delete-inventory');
    });
    // Fornt-End Page(Footer)
    Route::middleware('isSuperAdmin')->group(function() {
        // Footer
        Route::get('super-admin/forntend-footer-information', [FooterInformation::class, 'index'])->name('forntend_footer.index');
        Route::get('super-admin/forntend-footer-get-information', [FooterInformation::class, 'get_information'])->name('get_information.action');
        Route::post('super-admin/forntend-footer-update-information', [FooterInformation::class, 'update'])->name('update.action');
        // New Letter
        Route::get('super-admin/forntend-footer-newletter', [NewsletterController::class, 'index'])->name('forntend_footer_newletter.index');
        Route::get('super-admin/forntend-footer-get-newletter', [NewsletterController::class, 'get_newsletter'])->name('forntend_footer_get_newsletter.action');
        Route::get('super-admin/forntend-footer-filter-newletter', [NewsletterController::class, 'filter_newsletter'])->name('newsletter_filter.action');
        Route::delete('super-admin/forntend-footer-newletter/{id}', [NewsletterController::class, 'deletenewsletter'])->name('forntend_footer_newletter_delete.action');
        Route::get('super-admin/forntend-footer-newletter-pdf', [NewsletterController::class, 'pdf_newsletter'])->name('forntend_footer_newletter_pdf.action');
        Route::get('super-admin/forntend-footer-newletter/export-excel', [NewsletterController::class, 'export'])->name('forntend_footer_newletter_excel.action');
        Route::get('super-admin/fontend-footer-newsletter/export-cvs-format', [NewsletterController::class, 'exportCsv'])->name('forntend_footer_newletter_cvs_file.action');
    });
    // ********** Sub Admin Routes *********
    Route::group(['prefix' => 'sub-admin', 'middleware' => ['web', 'isSubAdmin']], function () {
        Route::get('/dashboard', [SubAdminController::class, 'dashboard'])->name('sub-admin.dashboard');
    });

    // ********** Admin Routes *********
    Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isAdmin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // ********** Blog-Post *********
        Route::middleware('isAdmin')->group(function () {
            // Category-Post
            Route::get('/categories-list', [CreateCategoryPostController::class, 'index'])->name('categories.index');
            Route::get('/add-category-post', [CreateCategoryPostController::class, 'createCategoryPost'])->name('create.category');
            Route::post('/add-category-post', [CreateCategoryPostController::class, 'storeData'])->name('add_category.action');
            Route::get('/edit-category-post/{id}', [CreateCategoryPostController::class, 'editCateg']);
            Route::put('/update-category-post/{id}', [CreateCategoryPostController::class, 'updateCateg'])->name('categ.update');
            
            // Create-Post
            Route::get('/post-list', [CreatePostController::class, 'index'])->name('post.index');
            Route::get('/add-post', [CreatePostController::class, 'createPost'])->name('create.post');
            Route::post('/add-post', [CreatePostController::class, 'storeData'])->name('add_post.action');
            Route::get('/edit-post/{id}', [CreatePostController::class, 'editPost']);
            Route::put('/update-post/{id}', [CreatePostController::class, 'updatePost'])->name('post.update');

            // ********** Doctor-Post *********
            Route::get('/doctors', [MedicinePostController::class, 'index'])->name('doctors.index');
            Route::get('/add-doctors', [MedicinePostController::class, 'createDoctorPost'])->name('create.doctorpost');
            Route::post('/add-doctors', [MedicinePostController::class, 'storageMedicinePost'])->name('add_doctors.action');
        });
    });
    // ********** Doctors Routes *********
    Route::group(['prefix' => 'doctors', 'middleware' => ['web', 'isUser']], function () {
        Route::get('/home', [UserController::class, 'dashboard'])->name('doctors.dashboard');
        Route::get('/users', [UserController::class, 'users'])->name('Users');
    });
    Route::middleware('isUser')->group(function () {
        Route::get('/get-users', [UserController::class, 'getusers']);
        //Route::get('/edit-users/{id}',[UserController::class,'edituser']);
    });
    
    // ************Common URL for Super-admin & Admin (Inventory and Stock)******************
    Route::middleware(['role:SuperAdmin|Admin'])->group( function(){

        // ********** (Common-data)Post for admin and superadmin *********
        Route::get('/request-data/{id}', [MedicinePostController::class, 'requestSubcategory']);
        Route::get('/request-medicine-name/{id}', [MedicinePostController::class, 'requestMedicineName']);
        Route::get('/request-medicine-dogs/{id}', [MedicinePostController::class, 'requestMedicineDogs']);
        // Medicine-Inventory
        Route::get('admin/inventories', [MedicineInventory::class, 'index'])->name('medicine-inventory.index');
        Route::post('admin/inventories', [MedicineInventory::class, 'store'])->name('medicine-inventory.store');
        Route::get('admin/inventories-edit-get',[MedicineInventory::class, 'getData'])->name('search-inv.action');
        Route::get('admin/inventories-edit/{medicine_group_id}',[MedicineInventory::class, 'editInventory']);
        Route::put('admin/inventories-update/{medicine_group_id}', [MedicineInventory::class, 'updateInventory'])->name('update_inventory.action');
        Route::get('admin/inventories-unauthorized-data',[MedicineInventory::class, 'unauthorizedData'])->name('search-unauthorized.action');
        // Stock
        Route::get('admin/stock', [StockController::class, 'index'])->name('stock.index');
        Route::post('admin/stock', [StockController::class, 'storeStock'])->name('stock.store');
        Route::get('admin/stock-edit-get', [StockController::class, 'getData'])->name('seach-stock.action');
        Route::get('admin/stock-edit/{id}', [StockController::class, 'editStock']);
        Route::put('admin/stock-update/{id}', [StockController::class, 'updateStock'])->name('update_stock.action');
        Route::get('admin/stock-details', [StockController::class, 'getStock'])->name('stock-details.action');

    });

    Route::middleware(['role:SuperAdmin|Admin|SubAdmin|User'])->group(function(){
        
    });

    // Setting
    Route::prefix('/settings')->group(function(){
        Route::get('/', [SettingController::class, 'index'])->withoutMiddleware('auth');
        Route::put('/', [SettingController::class, 'update']);
    });

    // Language
    Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
});

