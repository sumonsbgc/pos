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
    Route::post('/update_data/{id}','ProductsController@unique_items_update');
    Route::post('/delete_data/{id}','ProductsController@unique_items_delete');

    Route::resource('/users', 'UsersController');
    Route::resource('/expenses','ExpensesCtrl');

    Route::resource('/servicing', 'servicing_controller');

    Route::get('/my_account','UsersController@user_profile');
    Route::post('/update_password','UsersController@update_password')->name('update_password');
    Route::post('/update_profile','UsersController@user_update')->name('update_profile');

    Route::get('/create_purchase','PurchaseController@show_purchase_form');
    Route::post('/store_purchase_notes','PurchaseController@store_purchase_notes')->name('store_purchase_notes');
    Route::get('/show_purchase_notes','PurchaseController@show_purchase_notes')->name('show_purchase_notes');

    Route::get('/sales_entries_create','SalesController@show_sales_form');

    Route::post('/sale','SalesController@store')->name('sale_store');
    Route::get('/saleProduct/{id}','SalesController@saleProduct');
    Route::get('/sales_history','SalesController@sales_history');
    Route::get('/product_invoice/{receipt_no}','InvoiceController@product_invoice');


    Route::get('/reports','ReportsController@default');



});



Auth::routes();


