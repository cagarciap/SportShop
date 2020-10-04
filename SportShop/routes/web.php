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
Route::get('/', 'User\HomeController@home')->name("");
Route::get('/', 'User\ProductController@list')->name("home");
Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index");

// Routes cart
Route::get('/home','User\ProductController@list')->name("home.index");
Route::get('/client/cart_delete', 'User\SaleController@delete_cart')->name("client.delete.cart");
Route::get('/client/list', 'User\ProductController@list')->name("client.list");
Route::post('/client/filter/list', 'User\ProductController@list')->name("client.filter.product");
Route::get('/client/cart/{id}', 'User\SaleController@add_cart')->name("client.add_cart");
Route::get('/client/show/{id}/{status?}', 'User\ProductController@show')->name("client.show");
Route::get('/client/show_cart', 'User\SaleController@show_cart')->name("client.show_cart");
Route::get('/client/delete/{id}', 'User\SaleController@delete')->name("client.delete");
Route::post('/client/quantity/{id}', 'User\SaleController@modify_quantity')->name("client.quantity");
Route::get('/client/buy/{credits}', 'User\SaleController@buy')->name("client.confirm");

// Routes Admin - Sales
Route::get('/admin/sale/menu', 'Admin\AdminSaleController@menu')->name("admin.sale.menu");
Route::get('/admin/sale/list', 'Admin\AdminSaleController@list')->name("admin.sale.list");
Route::get('/admin/sale/show/{id}', 'Admin\AdminSaleController@show')->name("admin.sale.show");
Route::post('/admin/sale/query1', 'Admin\AdminSaleController@query1')->name("admin.sale.query1");
Route::get('/admin/sale/export', 'Admin\AdminSaleController@export')->name("admin.sale.export");

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
Route::get('/admin/category/update_form/{id}','Admin\AdminCategoryController@update_form')->name("admin.category.update_form"); // post
Route::post('/admin/category/update','Admin\AdminCategoryController@update')->name("admin.category.update");

//Routes Routines
Route::get('/admin/routine', 'Admin\AdminRoutineController@menu')->name("admin.routine.menu");
Route::get('/admin/routine/create', 'Admin\AdminRoutineController@create')->name("admin.routine.create");
Route::get('/admin/routine/list', 'Admin\AdminRoutineController@list')->name("admin.routine.list");
Route::post('/admin/routine/save', 'Admin\AdminRoutineController@save')->name("admin.routine.save");
Route::get('/admin/routine/show/{id}', 'Admin\AdminRoutineController@show')->name("admin.routine.show");
Route::get('/admin/routine/delete/{id}', 'Admin\AdminRoutineController@delete')->name("admin.routine.delete");
Route::get('/admin/routine/update_form/{id}','Admin\AdminRoutineController@update_form')->name("admin.routine.update_form"); // post
Route::post('/admin/routine/update','Admin\AdminRoutineController@update')->name("admin.routine.update");

Route::get('/user/routine', 'User\RoutineController@menu')->name("user.routine.menu");
Route::get('/user/routine/recommend', 'User\RoutineController@recommend')->name("user.routine.recommend");
Route::post('/user/routine/calculate', 'User\RoutineController@calculate')->name("user.routine.calculate");
Route::get('/user/routine/list', 'User\RoutineController@list')->name("user.routine.list");
Route::get('/user/routine/show/{id}', 'User\RoutineController@show')->name("user.routine.show");
Route::get('/user/routine/myroutine', 'User\RoutineController@myroutine')->name("user.routine.myroutine");


// AUTH
Auth::routes();

