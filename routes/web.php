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

    //订单列表
    Route::get("orders","OrdersController@index");
    //根据订单号查询订单的详情（订单下有那些商品）
    Route::get("orders/list","OrdersController@lists");
    //收货人地址信息
    Route::get("orders/addr","OrdersController@addr");
    //为什么要用any
    Route::any("orders/edit","OrdersController@edit");

    Route::get("orders/statuList","OrdersController@statuList");
    Route::post("orders/statu/edit","OrdersController@statuEdit");

    //评论列表
    Route::get("comment","CommentController@index");
    Route::post("comment/ajaxStatu","CommentController@ajaxStatu");


});
//这里的控制器为啥必须要用反斜杠呢？
Route::any('/admin/shangchuan',"Admin\CommonController@upload");