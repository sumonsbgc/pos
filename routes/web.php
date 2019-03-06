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
    Route::get('/unique_items/{name}','ProductsController@unique_items');

    Route::resource('/users', 'UsersController');
    Route::resource('/expenses','ExpensesCtrl');

    Route::get('/my_account','UsersController@user_profile');
    Route::post('/update_password','UsersController@update_password')->name('update_password');
    Route::post('/update_profile','UsersController@user_update')->name('update_profile');

    Route::get('/create_purchase','PurchaseController@show_purchase_form');
    Route::post('/store_purchase_notes','PurchaseController@store_purchase_notes')->name('store_purchase_notes');
    Route::get('/show_purchase_notes','PurchaseController@show_purchase_notes')->name('show_purchase_notes');

    Route::get('/sales_entries_create','SalesController@show_sales_form');



});



Auth::routes();


