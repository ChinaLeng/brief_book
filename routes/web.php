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
//Home模块
/*Route::namespace('Home')->group(['middleware'=>['web']],function (){

});*/
Route::namespace('Home')->group(function (){
    //文章列表
    Route::get('/', 'PostController@index');
    //注冊頁面
    Route::get('/register', 'RegisterController@index');
    //提交注册
    Route::post('/register', 'RegisterController@register');
    //登录页面
    Route::get('/login', 'LoginControllerler@index');
    //登录
    Route::post('/login', 'LoginControllerler@login');
    //退出
    Route::get('/loginout', 'LoginControllerler@loginout');
});