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
    return view('web.index');
});

//发布项目
Route::get('/projects/release','Web\ReleaseController@show');

//了解企业
Route::get('/companies/vip','Web\CompanyController@vip');

//项目大厅
Route::get('/projects/sala','Web\ProjectController@sala');

//项目详情
Route::get('/project/detail/{id}','Web\ProjectController@detail');

//企业/团队
Route::get('/companies','Web\CompanyController@companies');

//找航哥
Route::get('/hang-brother','Web\CompanyController@boat');
