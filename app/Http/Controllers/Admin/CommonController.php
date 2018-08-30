<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    //
    public function upload(Request $request){
        $file=$request->file('Filedata');
        $dir=$request->input('files');
        if(file_exists("./Uploads/{$dir}")){

        }else{
            mkdir("./Uploads/{$dir}");
        }
        if ($file->isValid()) {
            // 获取后缀

            $ext=$file->getClientOriginalExtension();

            // 生成新的文件名

            $newFile=time().rand().'.'.$ext;

            // 移动到指定目录

            $request->file('Filedata')->move('./Uploads/'.$dir,$newFile);

            echo $newFile;
        }

    }




}
