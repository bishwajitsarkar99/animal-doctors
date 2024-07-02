<?php
use Illuminate\Support\Facades\Route;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Post\CreateCategoryPostController;
use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\MedicinePostController;

Route::group(['middleware' => 'auth'], function (){
    
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
});

