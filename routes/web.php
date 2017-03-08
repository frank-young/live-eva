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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');  // 管理登录首页
    Route::resource('paper', 'PaperController');  // 问卷模块
    Route::resource('module', 'ModuleController');  // 问卷子标题模块
    Route::resource('question', 'QuestionController');  // 问题
});
