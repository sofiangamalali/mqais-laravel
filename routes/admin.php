<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BestSellerController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["prefix" => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(["prefix" => "admin", "middleware" => 'auth'], function () {


        Route::get('/',[AdminController::class,'Categories'])->name('admin.categories');
        Route::get('/SubCategories',[AdminController::class,'SubCategories'])->name('admin.subCategories');
        Route::get('/products',[AdminController::class,'Products'])->name('admin.products');
        Route::get('/bestSeller',[AdminController::class,'BestSeller'])->name('admin.bestSeller');

        Route::post('/storeCategory',[CategoryController::class,'store'])->name('admin.category.store');
        Route::post('/deleteCategory',[CategoryController::class,'delete'])->name('admin.category.delete');
        Route::post('/editCategory',[CategoryController::class,'edit'])->name('admin.category.edit');

        Route::post('/storeSubCategory',[SubCategoryController::class,'store'])->name('admin.subCategory.store');
        Route::post('/deleteSubCategory',[SubCategoryController::class,'delete'])->name('admin.subCategory.delete');
        Route::post('/editSubCategory',[SubCategoryController::class,'edit'])->name('admin.subCategory.edit');
        Route::get('/getSubCategory/{id?}',[SubCategoryController::class,'get']);

        Route::post('/storeProduct',[productController::class,'store'])->name('admin.product.store');
        Route::post('/deleteProduct',[productController::class,'delete'])->name('admin.product.delete');
        Route::post('/editProduct',[productController::class,'edit'])->name('admin.product.edit');
        
        
        Route::post('/storeBestSeller',[BestSellerController::class,'store'])->name('admin.bestSeller.store');
        Route::post('/deleteBestSeller',[BestSellerController::class,'delete'])->name('admin.bestSeller.delete');
        Route::get('/getProducts/{catId?}/{subCatId?}',[BestSellerController::class,'get']);


        Route::get('/reloadCaptcha',[CaptchaController::class,'reloadCaptcha']);

    });
});
Auth::routes();