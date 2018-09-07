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
                //判断邮箱格式是否正确
                if(preg_match('/\w+@\w+\.\w+/',$arr['email'])){
                    //判断邮箱是否注册,这里从数据库查要用first，不能用get,因为get尽管查不存在的数据也会返回一个空的对象，还是真。
                    if(\DB::table('user')->where("email",$arr['email'])->first()){
                        return back()->with("error","邮箱已被注册");
                    }else{
                        //判断密码
                        if($arr['pass']==$arr['repass']){
                            $data=array();
                            $data['email']=$arr['email'];
                            $email=$arr['email'];
                            $data['time']=time();
                            $data['status']=0;
                            $data['token']=str_random(50);
                            $data['pass']=\Crypt::encrypt($arr['pass']);

                            if($id=\DB::table("user")->insertGetID($data)){
                                //使用的是一个闭包函数，所以$data['email']在里边无法使用
                                \Mail::send('mail.index',["id"=>$id,"token"=>$data['token']],function ($message) use($email){
                                    $message->to($email);
                                    $message->subject("亲爱的用户，恭喜您注册成功");
                                });
                                //加载立即激活的提示页面
                                $mailArr=explode("@",$email);
                                $href="mail.".$mailArr[1];

                                return view("home.jihuo")->with("href",$href);
                            }else{
                                return back()->with("error","注册失败");
                            }
                        }else{
                            return back()->with("error","两次输入密码不一致");
                        }
                    }
                }else{
                    dd("邮箱有误");
                    return back()->with("error","");
                }
            }else{
                return back()->with("error","密码长度必须介于6-12之间");
            }
        }else{
            return back()->with("error","验证码输入错误");
        }
    }
    //激活账户
    public function jihuo($id,$token){
        //
        $data=\DB::table('user')->where("id",$id)->first();
        //判断token
        if($token==$data->token){
            $arr=array();
            $arr['status']=1;
            $arr["token"]=str_random(50);
            //进行数据库状态的修改，激活成功，跳转到登陆页面
            if(\DB::table('user')->where("id",$id)->update($arr)){
                return redirect("/login");
            };
        }else{
            echo "您的token已经过期";
        }
    }


}
