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
    return view('welcome');
});


// Route::get('/b',function(){
//     return view('admin.index');
// });

Route::group(['namespace'=>'Admin','prefix'=>'a'],function(){
    Route::get('/','IndexController@index');
    Route::resource('admin',"AdminController");
    Route::post('admin/changeSta',"AdminController@changeSta");

    Route::resource('types',"TypesController");

    Route::resource('user',"UserController");
    Route::resource('goods',"GoodsController");

    //后台的系统管理
        //系统管理
        Route::resource("sys/config","ConfigsController");
        //轮播图管理
        Route::resource("sys/slider","SliderController");

        //广告管理
        Route::resource("sys/ads","AdsController");
        //分类广告管理

});
//这里的控制器为啥必须要用反斜杠呢？
Route::any('/admin/shangchuan',"Admin\CommonController@upload");