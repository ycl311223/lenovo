<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function index(){
        //获取上一个页面
        session(['prevPage'=>$_SERVER['HTTP_REFERER']]);

        return view("home.login");
    }
    //处理登录
    public function check(Request $request){
        //接受数据
        $email=$request->input("email");
        $pass=$request->input("pass");
        //从数据库中进行查询
        $data=\DB::table("user")->where("email",$email)->first();
        if($data){
            //判断密码是否正确
            if($pass==\Crypt::decrypt($data->pass)){
                session(['lenovoHomeUserInfo.email'=>$data->email]);
                session(['lenovoHomeUserInfo.name'=>$data->name]);
                session(['lenovoHomeUserInfo.id'=>$data->id]);
                return redirect(session('prevPage'));
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect("/login");
    }
    //找回密码
    public function zhaohui(){
        if($_POST){
            //接受数据
            $email=$_POST['email'];
            $data=\DB::table("user")->where("email",$email)->first();
            //判断数据是否正确
            if ($data){
                \Mail::send('mail.zh',["id"=>$data->id,"token"=>$data->token],function ($message) use($email){
                    $message->to($email);
                    $message->subject("找回密码");
                });
                //加载找回密码的提示页面
                $mailArr=explode("@",$email);
                $href="mail.".$mailArr[1];
                return view("home.zhaohuitishi")->with("href",$href);
            }else{
                return back();
            }
        }else{
            return view("home.zhaohui");
        }

    }

}
