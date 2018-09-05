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
                //判断是否邮箱
                if(preg_match('/\w+@\w+\.\w+/',$arr['email'])){
                    //判断邮箱是否注册
                    if(\DB::table('user')->where("email",$arr['email'])->get()){
                        return back()->with("error","邮箱已被注册");
                    }else{
                        //判断密码
                        if($arr['pass']==$arr['repass']){
                            $data=array();
                            $data['email']=$arr['email'];

                        }else{
                            return back()->with("error","两次输入密码不一致");
                        }
                    }
                }else{
                    return back()->with("error","邮箱有误");
                }
            }else{
                return back()->with("error","error");
            }
        }else{
            return back()->with("error","error");
        }
    }
}
