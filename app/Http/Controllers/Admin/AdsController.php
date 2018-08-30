<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    //

    public function index(){
        $data=\DB::table('ads')->paginate(2);
        return view("admin.sys.ads.index")->with("data",$data);
    }

    public function create(){
        return view("admin.sys.ads.add");
    }

    public function store(Request $request){
        $arr=$request->except("_token");
        if(\DB::table("ads")->insert($arr)){
            return redirect("/a/sys/ads");
        }else{
            return back();
        }
    }


}
