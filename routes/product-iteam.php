<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductIteam\CategoryController;
use App\Http\Controllers\ProductIteam\SubCategoryController;
use App\Http\Controllers\ProductIteam\GroupController;
use App\Http\Controllers\ProductIteam\MedicineNameController;
use App\Http\Controllers\ProductIteam\MedicineDogsController;
use App\Http\Controllers\ProductIteam\UnitController;
use App\Http\Controllers\ProductIteam\MedicineOrginController;
use App\Http\Controllers\ProductIteam\BrandController;
use App\Http\Controllers\ProductIteam\ProductModelController;
use App\Http\Controllers\Productiteam\ProductController;

Route::group(['middleware' => 'auth'], function (){
    
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
    
});