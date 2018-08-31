<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){

        //查询轮播图
        if($slider=\Cache::get('slider')){

        }else{
            $slider=\DB::table('slider')->orderBy('orders','desc')->get();
            \Cache::put("slider",$slider);
        }


        //查询广告

        if($ads=\Cache::get('ads')){

        }else{
            $ads=\DB::table('ads')->orderBy('sort','desc')->get();
            \Cache::put("ads",$ads);
        }

        //
        $data=array(
            'slider'=>$slider,
            'ads'=>$ads,
        );
        return view("home.index")->with($data);

    }
}
