<?php

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


Route::middleware('auth')->group(function (){

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/create_user', 'Auth\RegisterController@showRegistrationForm')->name('create_user');

    Route::resource('/brands', 'BrandsController');
    Route::resource('/categories', 'CategoriesController');

    Route::post('/finding_sub_categories/{id}', 'CategoriesController@changingSubCat');
    Route::post('/finding_brands/{id}', 'CategoriesController@changingProductBrands');

    Route::resource('/supplier', 'SupplierController');
    Route::resource('/products', 'ProductsController');
    Route::resource('/users', 'UsersController');
    


});



Auth::routes();


