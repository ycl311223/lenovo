<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function index(){
        //获取上一个页面
        if(isset($_SERVER['HTTP_REFERER'])){
            session(['prevPage'=>$_SERVER['HTTP_REFERER']]);
        }

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
                //给邮箱发送一个页面，页面上带有找回密码的链接
                \Mail::send('mail.zh',["id"=>$data->id,"token"=>$data->token],function ($message) use($email){
                    $message->to($email);
                    $message->subject("找回密码");
                });
                //加载找回密码的提示页面
                $mailArr=explode("@",$email);
                $href="mail.".$mailArr[1];
                //跳到找回提示的页面（含有跳转到邮箱的链接的页面）
                return view("home.zhaohuitishi")->with("href",$href);
            }else{
                return back();
            }
        }else{
            return view("home.zhaohui");
        }

    }


    //修改密码
    public function savePass($id,$token){
        if($_POST){
            //判断密码是否一致
            if($_POST['pass']==$_POST['repass']){
                //判断密码长度是否符合要求
                if(strlen($_POST['pass'])>=6 && strlen($_POST['pass'])<=12){
                    $data=array();
                    $data['token']=str_random(50);
                    $data['pass']=\Crypt::encrypt($_POST['pass']);
                    if(\DB::table("user")->where("id",$id)->update($data)){
                        return redirect("/login");
                    }else{
                        return back();
                    }
                }else{
                    return back();
                }
            }else{
                return back();
            }
        }else{
            return view("home.savePass");
        }

    }

}
