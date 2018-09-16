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


    
});

Route::group(['as'=>'client.','prefix'=>'client','namespace'=>'Client','middleware'=>['auth','client']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    
});
