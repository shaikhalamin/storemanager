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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@welcome')->name('welcome');


Auth::routes();

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    /* Category Routes */
    Route::get('category/create','CategoryController@index')->name('createcategory');
    Route::post('category/create','CategoryController@create')->name('createcategory');
    Route::get('category/list','CategoryController@categoryList')->name('categorylist');
    Route::get('category/list/datatables','CategoryController@categoryDatatables')->name('ajaxcategory');
    Route::get('category/edit/{id}','CategoryController@categoryedit')->name('categoryedit');
    Route::post('category/update','CategoryController@updatecategory')->name('updatecategory');
    Route::get('category/delete/{id}','CategoryController@categorydelete')->name('categorydelete');

    /*Product Routes*/
    Route::get('product/create','ProductController@index')->name('createproduct');
    Route::post('product/create','ProductController@create')->name('createproduct');
    Route::get('product/list','ProductController@productList')->name('productlist');
    Route::get('product/list/datatables','ProductController@productDatatables')->name('ajaxproduct');
    Route::get('product/view/{id}','ProductController@viewproduct')->name('viewproduct');
    Route::get('product/edit/{id}','ProductController@editproduct')->name('editproduct');
    Route::post('product/update','ProductController@updateproduct')->name('updateproduct');
    Route::get('product/delete/{id}','ProductController@deleteproduct')->name('deleteproduct');

    /* Product Unit Routes */
    Route::get('productunit/create','ProductUnitController@index')->name('createunit');
    Route::post('productunit/create','ProductUnitController@create')->name('createunit');
    Route::get('productunit/list','ProductUnitController@unitList')->name('unitlist');
    Route::get('productunit/list/datatables','ProductUnitController@unitDatatables')->name('ajaxunit');
    Route::get('productunit/edit/{id}','ProductUnitController@unitedit')->name('unitedit');
    Route::post('productunit/update','ProductUnitController@updateunit')->name('updateunit');
    Route::get('productunit/delete/{id}','ProductUnitController@unitdelete')->name('unitdelete');

    /* Supplier Routes */
    Route::get('supplier/create','SupplierController@create')->name('createsupplier');
    Route::post('supplier/create','SupplierController@store')->name('createsupplier');
    Route::get('supplier/list','SupplierController@supplierList')->name('supplierlist');
    Route::get('supplier/list/datatables','SupplierController@supplierDatatables')->name('ajaxsupplier');
    Route::get('supplier/view/{id}','SupplierController@viewsupplier')->name('viewsupplier');
    Route::get('supplier/edit/{id}','SupplierController@editsupplier')->name('editsupplier');
    Route::post('supplier/update','SupplierController@updatesupplier')->name('updatesupplier');
    Route::get('supplier/delete/{id}','SupplierController@deletesupplier')->name('deletesupplier');

    /* Customer Routes */
    Route::get('customer/create','CustomerController@create')->name('createcustomer');
    Route::post('customer/create','CustomerController@store')->name('createcustomer');
    Route::get('customer/list','CustomerController@customerList')->name('customerlist');
    Route::get('customer/list/datatables','CustomerController@customerDatatables')->name('ajaxcustomer');

    Route::get('customer/view/{id}','CustomerController@viewcustomer')->name('viewcustomer');
    Route::get('customer/edit/{id}','CustomerController@editcustomer')->name('editcustomer');
    Route::post('customer/update','CustomerController@updatecustomer')->name('updatecustomer');
    Route::get('customer/delete/{id}','CustomerController@deletecustomer')->name('deletecustomer');


    
});

Route::group(['as'=>'client.','prefix'=>'client','namespace'=>'Client','middleware'=>['auth','client']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    
});
