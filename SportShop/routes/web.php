<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home','HomeController@index')->name("home.index");
Route::get('/product/list', 'ProductController@list')->name("product.list");




// Routes admin - product
Route::get('/admin/product/list/{success?}', 'Admin\AdminProductController@list')->name("admin.product.list");
Route::get('/admin/product/create', 'Admin\AdminProductController@create')->name("admin.product.create");
Route::post('/admin/product/save','Admin\AdminProductController@save')->name("admin.product.save");
Route::get('/admin/product/show/{id}','Admin\AdminProductController@show')->name("admin.product.show");
Route::get('/admin/product/delete/{id}','Admin\AdminProductController@delete')->name("admin.product.delete");
Route::get('/admin/product/update_form/{id}','Admin\AdminProductController@update_form')->name("admin.product.update_form"); // post
Route::post('/admin/product/update','Admin\AdminProductController@update')->name("admin.product.update");

//Routes Categories
Route::get('/category/list', 'CategoryController@list')->name("category.list");
Route::get('/category/show/{id}','CategoryController@show')->name("category.show");
Route::get('/category/delete/{id}','CategoryController@delete')->name("category.delete");
Route::get('/category/create', 'CategoryController@create')->name("category.create");
Route::post('/category/save', 'CategoryController@save')->name("category.save");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
