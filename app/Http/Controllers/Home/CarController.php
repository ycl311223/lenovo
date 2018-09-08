<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    //
    public function index(){
        //把session中的所有商品获取到
        $shop=session('shop');
        return view("home.car")->with("shop",$shop);
    }

    //加入购物车
    public function addCar(Request $request){
        //数据处理,每一次往购物车中加东西时都会累积到sessions中
        $data=session('shop')?session('shop'):array();
        //标志位，
        $a=0;
        if($data){
            foreach ($data as $key => &$value){
                if($value['id']==$_GET['id']){
                    $value['num']+=$_GET['num'];
                    $a=1;
                    break;
                }
            }
        }
        //每次添加的时候都会将商品信息从数据库中查出来处理好
        if(!$a){
            $data[]=array(
                "id"=>$_GET['id'],
                "num"=>$_GET['num'],
                "goodsInfo"=>\DB::table("goods")->where("id",$_GET['id'])->first(),
            );
        }

        //通过HTTP请求存储session...
        $request->session()->put('shop',$data);

        return redirect("car");
    }

    public function CarAdd(Request $request){
        //获取修改的id
        $id=$request->input("id");
        //获取session中的商品
        $shop=session('shop');
        //遍历数据
        foreach ($shop as $key=>$value){
            if($value['id']==$id){
                $shop[$key]['num']=++$shop[$key]['num'];
            }
        }
        //重新写入session
        $request->session()->put('shop',$shop);
        echo 1;

    }
    public function CarJian(Request $request){
        //获取修改的id
        $id=$request->input("id");
        //获取session中的商品
        $shop=session('shop');
        //遍历数据
        foreach ($shop as $key=>$value){
            if($value['id']==$id){
                $shop[$key]['num']=--$shop[$key]['num'];
            }
        }
        //重新写入session
        $request->session()->put('shop',$shop);
        echo 1;
    }
    public function CarDel(Request $request){
       $id=$request->input('id');
       //获取购物车中的所有商品
        $shop=session('shop');
        //遍历数据
        foreach ($shop as $key=>$value){
            //判断需要删除的数据
            if($value['id']==$id){
                unset($shop[$key]);
            }
        }
        $request->session()->put('shop',$shop);
        //返回
        echo 1;
    }

    public function jiesuan(Request $request){
        //查询当前登录者的收货地址信息
        $uid=session('lenovoHomeUserInfo.id');
        //查询数据
        $addr=\DB::table("addr")->where("uid",$uid)->get();

        //接受到商品数据
        $idArr=$request->input('goods');
        //读取session
        $shop=session('shop');
        //声明新数组
        $newArr=array();
        //遍历购物车中的所有商品
        foreach ($idArr as $key=>$value){
            foreach ($shop as $k=>$v){
                //判断是否是用户选择的商品
                if($v['id']==$value){
                    $newArr[]=$v;
                }
            }
        }

        return view("home.jiesuan")->with("newShop",$newArr)->with("addr",$addr);
    }
}
