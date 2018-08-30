<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    //
    public function index(){
        $data=\DB::table('slider')->paginate(2);
        $tot=\DB::table('slider')->count();

        return view('admin.sys.slider.index')->with("data",$data)->with("tot",$tot);
    }

    public function store(Request $request){
       $arr=$request->except("_token");

       $rules=[
         'title'=>'required',
           'href'=>'required',
           'orders'=>'required',
           'img'=>'required',
       ];

       $message=[
           'title.required'=>'标题必须输入',
           'href.required'=>'友情连接必须输入',
           'orders.required'=>'请输入排序',
           'img.required'=>'请选择图片',
       ];

       $validator=\Validator::make($arr,$rules,$message);

       if($validator->passes()){
           if(\DB::table('slider')->insert($arr)){
               return redirect('/a/sys/slider');
           }else{
               return back();
           }
       }else{
           return back()->withInput()->withErrors($validator);
       }



    }
}
