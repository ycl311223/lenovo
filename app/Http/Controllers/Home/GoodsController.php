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

        //查询商品对应的评论
        $commonTot=\DB::table('comment')->where('gid',$id)->count();
        $goodTot=\DB::table('comment')->where('start','>',4)->count();
        $chaTot=\DB::table('comment')->where('start','<=',2)->count();
        $zhongTot=$commonTot-$goodTot-$chaTot;

        $arr=array(
            "commonTot"=>$commonTot,
            "goodTot"=>$goodTot,
            "chaTot"=>$chaTot,
            "zhongTot"=>$zhongTot,
        );
        $comment=\DB::table('comment')->where('gid',$id)->get();
        //格式化数据
        $data=array(
          "goods"=>$goods,
            "goodsImg"=>$goodsImg,
            "arr"=>$arr,
            "comment"=>$comment,
        );
        return view("home.goods")->with($data);
    }
}
