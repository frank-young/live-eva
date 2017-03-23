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
    Route::get('paper/produce/{paper}', 'PaperController@produce');  // 生成问卷
    Route::get('paper/edit/{paper}', 'PaperController@edit');  // 问卷修改 - 修改了原来的修改页面
    Route::resource('module', 'ModuleController');  // 问卷子标题模块
    Route::get('module/edit/{module}', 'ModuleController@edit');  // 类目修改 - 修改了原来的修改页面

    Route::resource('question', 'QuestionController');  // 问题
    Route::post('question/update', 'QuestionController@update');  // 编辑问题的ajax提交

    Route::resource('report', 'ReportController');  // 报告模块
    Route::get('report/list/{report}', 'ReportController@list');  // 报告列表展示
    Route::post('report/update', 'ReportController@update');  // 编辑报告的ajax提交

});

Route::post('paper/ctrl', 'Admin\PaperController@reportCtrl');  // 问卷提交处理
