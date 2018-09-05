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

//后台登录页面
Route::get("/a/login","Admin\LoginController@index");

//验证码获取
Route::get('/a/yzm',"Admin\LoginController@yzm");

//这里的控制器为啥必须要用反斜杠呢？
Route::any('/admin/shangchuan',"Admin\CommonController@upload");
//登录的检查处理操作
Route::post('/a/check',"Admin\LoginController@check");
//后台登出
Route::get('/a/logout',"Admin\LoginController@logout");


Route::group(['namespace'=>'Admin','prefix'=>'a','middleware'=>'adminLogin'],function(){
    Route::get('/','IndexController@index');
    Route::resource('admin',"AdminController");
    Route::post('admin/changeSta',"AdminController@changeSta");

    Route::resource('types',"TypesController");

    Route::resource('user',"UserController");
    //商品管理
    Route::resource('goods',"GoodsController");
    //商品编写
    Route::any('goods/good/edit',"GoodsController@edit");

    //后台的系统管理
        //系统管理
        Route::resource("sys/config","ConfigsController");
        //轮播图管理
        Route::resource("sys/slider","SliderController");
        //轮播图修改
        Route::any("sys/edit","SliderController@edit");

        //广告管理
        Route::resource("sys/ads","AdsController");
        //分类广告管理
    Route::resource("sys/types","TypesAdsController");

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

    //学习缓存写的路由
    Route::get("huancun","HuancunController@index");

    //清楚缓存路由
    Route::get('flush',"IndexController@flush");

});

//前台路由

    //主页
    Route::get('/',"Home\IndexController@index");

    //商品详情路由
    Route::get('/goods/{id}',"Home\GoodsController@index");
    //商品分类页面
    Route::get('/types/{id}',"Home\TypesController@index");
    //商品登录页面
    Route::get('/login',"Home\LoginController@index");
    //商品注册页面
    Route::get('/reg',"Home\RegController@index");
    //验证码
    Route::get('/yzm',"Home\RegController@yzm");
    //处理注册操作
    Route::post('/regCheck',"Home\RegController@check");