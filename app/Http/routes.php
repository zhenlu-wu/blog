<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//测试数据库连接
Route::get('/testdb','IndexController@index');

//测试后台登陆
Route::any('/admin/login','Admin\LoginController@login');

////测试后台首页
//Route::get('/admin/index','Admin\IndexController@index');
////测试后台info
//Route::get('/admin/info','Admin\IndexController@info');
//查看系统信息
Route::get('/admin/sys','Admin\IndexController@sys');



//测试验证码
Route::get('/admin/code','Admin\LoginController@code');

//获取验证码
Route::get('/admin/getcode','Admin\LoginController@getCode');

//crypt加密
Route::get('/admin/crypt','Admin\LoginController@crypt');

//后台进入中间件
Route::group(['middleware'=>['admin.login'],'prefix' => 'admin','namespace'=>'Admin'],function(){
    Route::any('index','IndexController@index');
    Route::any('info','IndexController@info');
    Route::any('quit','IndexController@quit');
    Route::any('pass','IndexController@pass');
});

