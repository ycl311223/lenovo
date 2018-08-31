<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){
        return view("admin.index");
    }

    public function delDir($path){
        $arr=scandir($path);
        foreach ($arr as $val){
            if(strpos("$val",".")!=0){
                unlink($path.'/'.$val);
            }
        }
    }
    public function flush()
    {
        $this->delDir("../storage/framework/cache");
        $this->delDir("../storage/framework/views");
        return redirect("/a");
    }
}
