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
            $value->html=str_repeat('|---',$size-2).$value->name;
        }
        //加载添加页面
        return view('admin.goods.add')->with("data",$data);
    }

    public function store(Request $request){
        //取出多图
        $imgs=$request->input("imgs");
        //除掉token和多图，剩下的数据就全是商品的数据，可以直接存到数据库
        $data=$request->except("_token","imgs");
        if($id=\DB::table('goods')->insertGetId($data)){
            $arr=explode(',',$imgs);
            foreach ($arr as $key =>$value){
                $brr=array();
                $brr['gid']=$id;
                $brr['img']=$value;
                \DB::table('goodsimg')->insert($brr);
            }
            return redirect('a/goods');
        }else{
            return back();
        }
    }
    //Request $request可以获取到post里面的数据
    public function destroy($id){
        if(\DB::table('goods')->delete($id)){
            return 1;
        }else{
            return 0;
        }
    }
}
