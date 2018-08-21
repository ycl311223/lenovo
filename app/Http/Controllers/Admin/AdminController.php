<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index(){
        $data=\DB::table('admin')->paginate(3);
        return view("admin.admin.index")->with("data",$data);
    }

    public function store(Request $request){
        parse_str($_POST['str'],$arr);
        $rules=[
            'name'  => 'required|unique:admin|between:2,4',
            'pass'  => 'required|same:repass',

        ];

        $message=[
            "name.required" => "请输入用户名",
            "name.unique"   => "用户名已经存在",
            "name.between"  => "用户名长度需要在2~4之间",
            "pass.required" => "密码必须输入",
            "pass.same"     => "两次输入的密码不一致",
        ];

        $validator=\Validator::make($arr,$rules,$message);


        if($validator->passes()){
            unset($arr['repass']);
            $arr['time']=time();

            $admin=new admin();
            $admin->name=$arr['name'];
            $admin->pass=\Crypt::encrypt($arr['pass']);
            $admin->status=$arr['status'];
            $admin->time=$arr['time'];

            if($admin->save()){
                return 1;
            }else{
                return 0;
            }
        }else{
            return $validator->getMessageBag()->getMessages();
        }
    }

    public function destroy($id){
        if(\DB::table('admin')->delete($id)){
            return 1;
        }else{
            return 0;
        }
    }

    public function edit($id){
        $data=\DB::table('admin')->find($id);
        $data->pass=\Crypt::decrypt($data->pass);
        return view("admin.admin.edit")->with("data",$data);
    }

    public function update(){
        parse_str($_POST['str'],$arr);

        $rules=[
            'pass'=>'required|same:repass',
        ];

        $message=[
            'pass.required'=>'密码必须填写',
            'pass.same'=>'两次密码不一致',
        ];

        $validator=\Validator::make($arr,$rules,$message);

        if($validator->passes()){
            $pass=\Crypt::encrypt($arr['pass']);
            $sql="update admin set pass='$pass',status=$arr[status] where id=$arr[id]";
            if(\DB::update($sql)){
                return 1;
            }else{
                return 0;
            }
        }else{
            return $validator->getMessageBag()->getMessages();
        }
    }
    public function changeSta(){
        $id=$_POST['id'];
        $data=\DB::table('admin')->find($id);

        if($data->status==1){
            $data->status=0;
        }else{
            $data->status=1;
        }
        if(\DB::update("update admin set status=$data->status where id=$id")){
            return 1;
        }else{
            return 0;
        };
    }
}
