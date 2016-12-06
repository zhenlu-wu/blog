<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class IndexController extends CommonController
{
    //
    public function index(){
        return view('admin.index');
    }
    public function info(){
        return view('admin.info');
    }
    public function sys(){
       dd($_SERVER);
    }

    public function quit(){
        session(['user'=> null]);
        return redirect('admin/login');
    }
//后台修改管理员密码
    public function pass(){
        if ($input = Input::all()){
            $rules = [
                'password' => 'required|between:6,20|confirmed',//不能为空

            ];

            $message = [
                'password.required'=> '新密码不能为空',
                'password.between'=> '新密码长度要在6-20位之间',
                'password.confirmed' => '新密码和确认密码不一致',
            ];

            $validator = Validator::make($input, $rules, $message);
            //输入合法
            if ($validator->passes()){
                $user = User::first();
                $_password = Crypt::decrypt($user->user_password);
                if ($input['password_o']==$_password){
                    $user->user_password = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('msg','修改成功');
                }
                else{
                    //返回原密码错误信息
                    return back()->withErrors('原密码错误');
                }
            } else{
//                dd($validator);
                return back()->withErrors($validator);//查看报错情况
            }
        }
        return view('admin.pass');
    }

}
