<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function index(){
        return view("admin.login");
    }

    public function yzm(){
        require_once("../resources/code/Code.class.php");
        $code=new \Code();
        $code->make();
    }

    public function check(Request $request){
        //获取登录数据
        $name=$request->input("name");
        $pass=$request->input("pass");
        $ucode=$request->input("code");

        //验证验证码是否正确
        require_once("../resources/code/Code.class.php");
        $code=new \Code();
        $ocode=$code->get();


        if(strtoupper($ucode)==$ocode){
            //验证登录数据是否正确

            $data=\DB::table('admin')->where([['name',$name],['status',0]])->first();
            if($data){
                $dpass=\Crypt::decrypt($data->pass);
                if($dpass!=$pass){
                    return back()->with('error','密码错误');
                }else{
                    $arr=[];
                    $arr['lasttime']=time();
                    $arr['count']=++$data->count;
                    $arr['id']=$data->id;
                    //更新登录信息
                    \DB::table('admin')->where('id',$arr['id'])->update($arr);
                    //存session
                    $newArr=[];
                    $newArr['name']=$data->name;
                    $newArr['id']=$data->id;
                    session(['lenovoAdminUserInfo'=>$newArr]);
                    return redirect("/a");
                }
            }else{
                return back()->with('error','用户名错误');
            }
        }else{
            return back()->with('error',"验证码错误");
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect("/a/login");
    }
}
