<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    public function index(){
        $data=\DB::table('goods')->orderBy("id","desc")->paginate(4);
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
            //这里炸开字符串，比如"0,"炸开就是两位，0和null
            $arr=explode(',',$value->path);
            $size=count($arr);
            //这里是筛选出三级分类
            $value->size=$size-2;
            //三级分类的给添加"|---"格式
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

    public function edit(Request $request){
        if($_POST){
            $arr=$request->except("_token");
            $id=$request->input('id');
            if($arr['img']!=null){
                $nimg=$request->input('img');
                $oimg=\DB::table('goods')->where('id',$id)->value('img');
                //删除老图片
                unlink('../public/Uploads/goods/'.$oimg);
            }else if($arr['imgs']!=null){
                //商品多图片暂时还不能进行精细修改，只能增加，不能删除
                $imgs=$request->input('imgs');
                $imgsArr=explode(",",$imgs);
                foreach ($imgsArr as $key=>$value){
                    $brr=array();
                    $brr['gid']=$id;
                    $brr['img']=$value;
                    \DB::table('goodsimg')->insert($brr);
                }
            }else{
                unset($arr['img']);
                unset($arr['imgs']);
            }

            $dd=\DB::table('goods')->where('id',$id)->update($arr);

             return redirect("/a/goods");


        }else{
            $id=$request->input("id");
            $data=\DB::table('goods')->where('id',$id)->get();
            $imgs=\DB::table('goodsimg')->select("goodsimg.img")->where('gid',$id)->get();
            $arr=array();
            //将从数据库查询出来的对象（好像是个集合）放到数组中。
            foreach ($imgs as $key=>$value){
                $arr[$key]=$value;
            }
            //将多图放到商品对象中。
            $data[0]->imgs=$arr;

            $types=\DB::select("select types.*,concat(path,id) p from types order by p");
            foreach ($types as $key=>$value){
                //这里炸开字符串，比如"0,"炸开就是两位，0和null
                $arr=explode(',',$value->path);
                $size=count($arr);
                //这里是筛选出三级分类
                $value->size=$size-2;
                //三级分类的给添加"|---"格式
                $value->html=str_repeat('|---',$size-2).$value->name;
            }
            return view("admin.goods.edit")->with("data",$data)->with("types",$types);
        }
    }
}
