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

// Routes cart

Route::get('/home','HomeController@index')->name("home.index");
Route::get('/client/list', 'ProductController@list')->name("client.list");
Route::get('/client/cart/{id}', 'ProductController@add_cart')->name("client.add_cart");
Route::get('/client/show/{id}/{status?}', 'ProductController@show')->name("client.show");
Route::get('/client/show_cart', 'ProductController@show_cart')->name("client.show_cart");
Route::get('/client/delete/{id}', 'ProductController@delete')->name("client.delete");
Route::post('/client/quantity/{id}', 'ProductController@modify_quantity')->name("client.quantity");
Route::get('/client/buy', 'ProductController@buy')->name("client.confirm");



// Routes Admin - Sales
Route::get('/admin/sale/menu', 'Admin\AdminSaleController@menu')->name("admin.sale.menu");
Route::get('/admin/sale/list', 'Admin\AdminSaleController@list')->name("admin.sale.list");
Route::get('/admin/sale/show/{id}', 'Admin\AdminSaleController@show')->name("admin.sale.show");
Route::post('/admin/sale/query1', 'Admin\AdminSaleController@query1')->name("admin.sale.query1");




// Routes admin - product
Route::get('/admin/product/menu', 'Admin\AdminProductController@menu')->name("admin.product.menu");
Route::get('/admin/product/list', 'Admin\AdminProductController@list')->name("admin.product.list");
Route::get('/admin/product/create', 'Admin\AdminProductController@create')->name("admin.product.create");
Route::post('/admin/product/save','Admin\AdminProductController@save')->name("admin.product.save");
Route::get('/admin/product/show/{id}','Admin\AdminProductController@show')->name("admin.product.show");
Route::get('/admin/product/delete/{id}','Admin\AdminProductController@delete')->name("admin.product.delete");
Route::get('/admin/product/update_form/{id}','Admin\AdminProductController@update_form')->name("admin.product.update_form"); // post
Route::post('/admin/product/update','Admin\AdminProductController@update')->name("admin.product.update");




//Routes Categories
Route::get('/admin/category/menu', 'Admin\AdminCategoryController@menu')->name("admin.category.menu");
Route::get('/admin/category/list', 'Admin\AdminCategoryController@list')->name("admin.category.list");
Route::get('/admin/category/show/{id}','Admin\AdminCategoryController@show')->name("admin.category.show");
Route::get('/admin/category/delete/{id}','Admin\AdminCategoryController@delete')->name("admin.category.delete");
Route::get('/admin/category/create', 'Admin\AdminCategoryController@create')->name("admin.category.create");
Route::post('/admin/category/save', 'Admin\AdminCategoryController@save')->name("admin.category.save");



// AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
