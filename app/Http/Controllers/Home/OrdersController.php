<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    //生成订单
    public function index(Request $request){

        //接收收获地址ID
        $aid=$request->input("aid");
        //接受商品信息
        $ids=$request->input("ids");
        $nums=$request->input("nums");
        $prices=$request->input("prices");
        //获取用户ID
        $uid=session("lenovoHomeUserInfo.id");
        //订单号生成
        $code="DZ_".time().rand();
        //订单生成时间
        $time=time();
        //生成订单
        for($i=0;$i<count($ids);$i++){
            $data=array();
            $data['code']=$code;
            $data['time']=$time;
            $data['uid']=$uid;
            $data['aid']=$aid;
            $data['sid']=1;
            $data['gid']=$ids[$i];
            $data['num']=$nums[$i];
            $data['price']=$prices[$i];

            \DB::table("orders")->insert($data);
        }
        //删除session中对应的商品
        $shop=session('shop');
        //遍历数据
        foreach ($shop as $key=>$value){
            foreach($ids as $k=>$v){
                if($v==$value['id']){
                    unset($shop[$key]);
                }
            }
        }
        $request->session()->put('shop',$shop);
        return redirect("pay/$code");
    }

    public function pay($code){
        $orders=\DB::table("orders")->where("code",$code)->get();

        return view("home.pay")->with("orders",$orders);
    }
}
