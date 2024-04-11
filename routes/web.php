<?php

use App\Http\Controllers\CaptchaController;
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

*/



Route::group(["prefix"=>LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],function () {
    
    Route::get('/','App\Http\Controllers\homeController@index')->name("home");
    
    Route::get('/aboutUs','App\Http\Controllers\aboutUsController@index')->name("aboutUs");

    Route::get('/contactUs','App\Http\Controllers\contactUsController@index')->name("contactUs");
    Route::post('/contactUs','App\Http\Controllers\contactUsController@sendMail')->name("contactUs.send");

    Route::get('/products','App\Http\Controllers\productController@index')->name("products");
    Route::get('/products/{category?}/{subCategory?}','App\Http\Controllers\productController@showCategoryProducts')->name("showCategory");

    Route::get('/product/{id?}','App\Http\Controllers\productController@showProduct')->name("product");
    
    Route::get('/reloadCaptcha',[CaptchaController::class,'reloadCaptcha']);
    Route::get('/reloadCaptcha',[CaptchaController::class,'reloadCaptcha'])->name('recaptcha');

});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
