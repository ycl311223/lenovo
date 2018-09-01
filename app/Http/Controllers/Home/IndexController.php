<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //分类数据的处理方法
    public function checkTypeData($data,$pid=0){
        //
        $newArr=array();
        foreach ($data as $key => $value){
            if($value->pid==$pid){
                $newArr[$value->id]=$value;
                $newArr[$value->id]->zi=$this->checkTypeData($data,$value->id);
            }
        }
        return $newArr;
    }

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

        //处理左侧数据分类
        $types=\DB::table('types')->get();

        //递归处理数据，处理成分级形式
        $type=$this->checkTypeData($types);

        //处理右侧广告
        foreach ($type as $key => $value){
            $value->rightAds=\DB::table('typesads')->where([['cid','=',$value->id],['type','=','0']])->get();
        }
        dd($type);

        //将数据放到一个键值对数组中，一次性传给视图
        $data=array(
            'slider'=>$slider,
            'ads'=>$ads,
            'type'=>$type,
        );
        return view("home.index")->with($data);

    }
}
