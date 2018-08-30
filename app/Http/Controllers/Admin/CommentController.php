<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function index(){
        $data=\DB::table("comment")
            ->select("comment.*","user.name","goods.title","goods.img as gimg")
            ->join("user","user.id","=","comment.uid")
            ->join("goods","goods.id","=","comment.gid")->get();
        return view("admin.comment.index")->with("data",$data);
    }

    public function ajaxStatu(Request $request){
        $data=$request->except("_token");

        $sql="update comment set statu=$data[statu] where id = $data[id]";
        if(\DB::update($sql)){
            return 1;
        }else{
            return 0;
        }

    }
}
