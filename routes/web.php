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
});