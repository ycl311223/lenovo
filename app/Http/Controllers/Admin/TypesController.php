<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{

    //使用递归的方法将分类按级别放到数组中,但是这个方法弄出的数组在前端页面没有，只是在这示意一下。
    public function data1($data,$pid=0){
        $newArr=array();
        foreach ($data as $key => $value){
            if($value->pid==$pid){
                $newArr[$value->id]=$value;
                $newArr[$value->id]->zi=$this->data1($data,$value->id);
            }
        }
        return $newArr;
    }
    //跳转到分类的首页面
    public function index(){
        //查询数据并排序
        $data=\DB::select("select types.*,concat(path,id) p from types order by p");
        //加载页面
        return view("admin.types.index")->with("data",$data);
    }
    //跳转到分类的添加页面
    public function create(){
        return view("admin.types.add");
    }
    public function store(Request $request){
        //处理数据
        $data=$request->except("_token");
        //插入数据
        if(\DB::table('types')->insert($data)){
            return redirect("/a/types");
        }else{
            return back();
        }

    }

    //删除分类
    public function destroy($id){


        //删除操作
        if(\DB::delete("delete from types where id=$id or path like '%,$id,%'")){
            return 1;
        }else{
            return 0;
        }
    }

}
