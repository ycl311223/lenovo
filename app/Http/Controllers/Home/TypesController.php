<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    //
    public function index($id){

        //查询所有的顶级分类
        $types=\DB::table('types')->where("pid",0)->get();
        //查询当前分类
        $type=\DB::table('types')->where("id",$id)->first();
        //将当前分类的path路径处理为数组
        $arr=explode(",",$type->path);
        //数出是几级分类
        $size=count($arr)-1;
        switch ($size){
            case '1':
                $erClass=\DB::table("types")->where("pid",$id)->get();
                $newArr=array();
                foreach ($erClass as $key => $value){
                    $sanClass=\DB::table("types")->where("pid",$value->id)->get();
                    foreach ($sanClass as $key => $val){
                        $newArr[]=$val->id;
                    }
                }

                $goods=\DB::table("goods")->whereIn("cid",$newArr)->get();

                break;
            case '2':
                //获取pid为二级分类的id的所有三级分类
                $sanClass=\DB::table("types")->where("pid",$id)->get();
                $newArr=array();
                //将对应的三级分类的id放到一个数组中
                foreach ($sanClass as $key =>$value){
                    $newArr[]=$value->id;;
                }
                $goods=\DB::table("goods")->whereIn("cid",$newArr)->get();

                break;
            case '3':
                $goods=\DB::table("goods")->where("cid",$id)->get();
                break;
        }

        //顶级分类
        $ding=$arr[1]?$arr[1]:$id;

        //格式化数据
        $data=array(
            "types"=>$types,
            "ding"=>$ding,
            "goods"=>$goods,
        );

        return view("home.types")->with($data);
    }
}
