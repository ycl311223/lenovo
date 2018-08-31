<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HuancunController extends Controller
{
    //
    public function index(){
        $data=\DB::table("user")->get();
        //写入缓存
//        \Cache::put("data",$data,1);

        //读取缓存
        dd(\Cache::get("data"));
        //删除缓存
//        \Cache::forget('data');
        //删除所有缓存
//        \Cache::flush();
    }
}
