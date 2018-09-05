<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegController extends Controller
{
    //
    public function index(){
        return view("home.reg");
    }

    //验证码
    public function yzm(){
        //相当于将Code.class.php的代码搬到这里供使用。
        require_once("../resources/code/Code.class.php");
        //生成当前路径下的Code类，因为已经引进来了
        $code=new \Code();
        //下边这个代码就会生成验证码并保存到session中
        $code->make();
    }
    //处理注册操作
    public function check(Request $request){
        $arr=$request->except("_token");
        //检测验证码是否正确
        require_once("../resources/code/Code.class.php");
        $code=new \Code();
        $ocode=$code->get();
        if(strtoupper($arr['code'])==$ocode){
            //验证密码位数
            if(strlen($arr['pass'])>=6 && strlen($arr['pass'])<=12){

            }else{
                return back()->with("error","密码长度不对");
            }
        }else{
            return back()->with("error","验证码错误");
        }
    }
}
