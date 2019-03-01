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
	dump( '4444444444444444');
    return view('welcome');
});

// 后台首页的路由 
Route::get('admin','Admin\IndexController@index');
// Route::get('admin/users/setdata','Admin\UsersController@setdata');
// 后台 用户管理
Route::resource('admin/users','Admin\UsersController');


Route::get('admin/cates/info','Admin\CatesController@info');
Route::get('admin/cates/create/{id}','Admin\CatesController@create');
// 后台 分类管理路由
Route::resource('admin/cates','Admin\CatesController');




// 前台首页 -- 分类
Route::resource('home/index','Home\IndexController');
// 前台 注册页面
Route::get('home/register/changestatus/{id}/{token}','Home\RegisterController@changeStatus');
Route::resource('home/register','Home\RegisterController');
