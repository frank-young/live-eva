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
    Route::get('paper/produce/{paper}', 'PaperController@produce');  // 问卷模块
    Route::resource('module', 'ModuleController');  // 问卷子标题模块
    Route::resource('question', 'QuestionController');  // 问题
    Route::post('question/update', 'QuestionController@update');  // 编辑问题的ajax提交
});

Route::post('paper/ctrl', 'Admin\PaperController@reportCtrl');  // 问卷提交处理
