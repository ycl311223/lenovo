<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    //
    public function index(){
        $data=\DB::table('slider')->paginate(4);
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

    public function destroy($id){
        if(\DB::table('slider')->delete($id)){
            return 1;
        }else{
            return 0;
        }
    }

    public function edit(Request $request){
        if($_POST){
            $id=$request->input("id");
            $title=$request->input("title");
            $orders=$request->input("orders");
            $href=$request->input("href");
            $img=$request->input("img");
            $sql=null;
            if($img){
                $data=\DB::table("slider")->where('id',$id)->first();
                $oimg='../public/Uploads/lun/'.$data->img;

                unlink($oimg);

                $sql="update slider set title=$title,orders=$orders,href=$href,img='$img' where id=$id ";
            }else{
                $sql="update slider set title=$title,orders=$orders,href=$href where id=$id ";
            }

            if(\DB::update($sql)){
                return redirect("/a/sys/slider");
            }else{
                return back();
            }
        }else{
            $id=$request->input("id");
            $data=\DB::table('slider')->where('id',$id)->get();
//            dd($data);
            return view("admin.sys.slider.edit")->with("data",$data);
        }
    }
}
