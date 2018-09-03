<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    public function index($id){
        //获取商品相关数据
        $goods=\DB::table('goods')->where("id",$id)->first();
        //商品图片表
        $goodsImg=\DB::table("goodsimg")->where('gid',$id)->get();
        //格式化数据
        $data=array(
          "goods"=>$goods,
            "goodsImg"=>$goodsImg,
        );
        return view("home.goods")->with($data);
    }
}
