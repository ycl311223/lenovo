<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesAdsController extends Controller
{
    //
    public function index(){
        $data=\DB::table('typesads')->select("typesads.*","types.name")->join('types','typesads.cid','=','types.id')->paginate(5);
        return view("admin.sys.types.index")->with("data",$data);
    }

    public function create(){
        $data=\DB::table("types")->where("pid",0)->get();
        return view("admin.sys.types.add")->with("data",$data);
    }

    public function store(Request $request){
        $arr=$request->except("_token");
        if(\DB::table('typesads')->insert($arr)){
            return redirect("/a/sys/types");
        }
    }

    public function edit($id){
        $data=\DB::table("typesads")->select("typesads.*","types.name")->join("types","types.id","=","typesads.cid")->where('typesads.id','=',"$id")->get();
        return view('admin.sys.types.edit')->with("data",$data);
    }

    public function destroy($id){
        if(\DB::table("typesads")->delete($id)){
            return 1;
        }else{
            return 0;
        }
    }
}
