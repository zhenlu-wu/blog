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

//测试验证码
Route::get('/admin/code','Admin\LoginController@code');

//获取验证码
Route::get('/admin/getcode','Admin\LoginController@getCode');

//crypt加密
Route::get('/admin/crypt','Admin\LoginController@crypt');

