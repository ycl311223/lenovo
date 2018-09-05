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

        if($adss=\Cache::get('ads')){

        }else{
            $adss=\DB::table('ads')->orderBy('sort','desc')->get();
            \Cache::put("ads",$adss);
        }

        //处理左侧数据分类
        $types=\DB::table('types')->get();

        //递归处理数据，处理成分级形式
        $type=$this->checkTypeData($types);

        //处理右侧广告
        foreach ($type as $key => $value){
            $value->rightAds=\DB::table('typesads')->where([['cid','=',$value->id],['type','=',0]])->limit(2)->get();
            $value->leftAds=\DB::table('typesads')->where([['cid','=',$value->id],['type','=',1]])->first();
        }
        //处理楼层的商品

        //遍历一级分类
        foreach($type as $key => $value){
            $newArr=array();
            //遍历二级分类
            foreach($value->zi as $two ){
                //遍历三级分类
                foreach($two->zi as $three){
                    $newArr[]=$three->id;
                }
            }
            //查询对应的商品
            $value->goods=\DB::table("goods")->whereIn("cid",$newArr)->limit(8)->get();

        }


        //明星单品
        $goods=\DB::table("goods")->limit(6)->orderBy("id","desc")->get();

        //将数据放到一个键值对数组中，一次性传给视图
        $data=array(
            'slider'=>$slider,
            'adss'=>$adss,
            'type'=>$type,
            'goods'=>$goods,
        );
        return view("home.index")->with($data);

    }
}
