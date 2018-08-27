<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index()
    {
        //
        $data = \DB::table('user')->select('user.*','userinfo.nickname')
                ->join('userinfo','user.id','=','userinfo.uid')
                ->paginate(1);

        return view("admin.user.index")->with("data", $data);
    }


    public function store(Request $request){
        $img=$request->input('imgs');
        $data=$request->except('imgs');
        dd($data);
        $rules=[
            'name'=>"required",
            'pass'=>"required|same:repass",
            'tel'=>'required',
        ];

        $message=[
            'name.required'=>'昵称必须填写',
            'pass.required'=>'密码必须填写',
            'pass.same'=>'两次密码输入不一致',
            'tel.required'=>'电话必填',
        ];

//        $validator=\Validator::make($arr,$rules,$message);
//        if($validator){
//            \DB::table('user')
        
    }

}