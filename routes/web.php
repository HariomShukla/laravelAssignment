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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/','ProductController@index');

Route::resource('products','ProductController');
Route::resource('orders','OrderController');
Route::resource('category','CategoryController');
Route::resource('subcategory','SubcategoryController');

Route::get('Api/get_item_price','ApiController@getItemPrice');
Route::get('Api/get_item_profit','ApiController@getItemProfit');
Route::get('Api/getReports','ApiController@getReports');

Route::get('reports/link','ReportController@index');
Route::post('reports/linkproduct','ReportController@linkproduct');
Route::get('reports/report','ReportController@report');
Route::get('reports/candidate','ReportController@candidate');
