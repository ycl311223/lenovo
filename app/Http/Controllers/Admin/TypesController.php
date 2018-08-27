<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    //跳转到分类的首页面
    public function index(){
        //查询数据
        $data=\DB::table('types')->orderBy("sort","desc")->get();
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
