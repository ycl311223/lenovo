<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    //
    public function index(){
        $data=\DB::table("orders")
            ->select("orders.*","user.name","orderstatu.name as ssname")
            ->join("user","user.id","=","orders.uid")
            ->join("orderstatu","orderstatu.id","=","orders.sid")
            ->get();
        $newArr=array();
        foreach ($data as $value){
            $newArr[$value->code]=$value;
        }
        return view("admin.orders.index")->with("data",$newArr);
    }

    public function lists(Request $request){
        //获取订单号，Request也可以获取到get方法传过来的数据（在后边附随的），在路径中的数据得不到，只能用$id
        $code=$request->input("code");
        //查询订单下的所有商品
        $data=\DB::table("orders")
            ->select("orders.*","goods.title","goods.img")
            ->join("goods","goods.id","=","orders.gid")
            ->where("code",$code)
            ->get();
        return view("admin.orders.lists")->with("data",$data);
    }

    public function addr(Request $request){
        $aid=$request->input("id");
        $data=\DB::table("addr")->find($aid);
        return view("admin.orders.addr")->with("data",$data);
    }

    public function edit(Request $request){
        //这个是从编辑页面过来的，是真的要修改的。
        if($_POST){
            $sid=$request->input("sid");
            $code=$request->input("code");
            $sql="update orders set sid=$sid where code='$code'";
            if(\DB::update($sql)){
                return redirect("a/orders");
            }else{
                return back();
            }
        }else{
            //点击“修改状态”按钮时的get请求，直接携带数据转发到编辑页面。
            $data=\DB::table("orderstatu")->get();
            return view("admin.orders.edit")->with("data",$data);
        }
    }

    public function statuList(){
        $data=\DB::table("orderstatu")->get();
        return view("admin.orders.statuList")->with("data",$data);
    }

    public function statuEdit(Request $request){
        $id=$request->input("id");
        $name=$request->input("name");
        $sql="update orderstatu set name='$name' where id=$id";
        if(\DB::update($sql)){
            return 1;
        }else{
            return 0;
        }

    }

}
