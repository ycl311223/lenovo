<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigsController extends Controller
{
    //

    public function index(){

        return view("admin.sys.config.index");
    }

    public function store(Request $request){
        //获取数据
        $arr=$request->except("_token");
        //将数组中的数据放到array(xxxx)中
        $str1=var_export($arr,true);
        //拼接处固定格式的字符串
        $str="<?php return ".$str1." ?>";
        //写入到指定文件
        file_put_contents('../config/web.php',$str);
        return back();
    }
}
