<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    public function index(){
        $data=\DB::table('goods')->orderBy("id","desc")->paginate(2);
        //将小图数据一并放到$data中
        foreach($data as $key=>$value){
            $value->tupian=\DB::table("goodsimg")->where("gid",$value->id)->get();
        }
        //加载页面
        return view("admin.goods.index")->with("data",$data);
    }

    public function create(){
        $data=\DB::select("select types.*,concat(path,id) p from types order by p");
        //数据处理
        foreach ($data as $key=>$value){
            $arr=explode(',',$value->path);
            $size=count($arr);
            $value->size=$size-2;
            $value->html=str_repeat('|---',$size-2).$value.name;
        }
        //加载添加页面
        return view('admin.goods.add')->with("data",$data);
    }
}
