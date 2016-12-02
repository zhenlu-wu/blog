<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once '\resources\org\code\Code.class.php';

class LoginController extends CommonController
{
    //
    public function login(){
        if ($input = Input::all()){
            //dd($input);
            $code = new \Code;
            $_code = $code->get();
            if ($_code != strtoupper($input['code'])){
                return back()->with('msg','验证码错误');
            }
//            $pdo = DB::connection()->getPdo();
//            dd($pdo);
            $user = User::first();
//            dd($user);
            if ($user->user_name != $input['username'] || decrypt($user->user_password) != $input['password']){
                return back()->with('msg','用户名或密码错误');
            }
            dd($user);


        }else{
            return view('admin.login');
        }

    }

    public function code()
    {
        $code = new \Code;
        $code->make();
        dd($code);
    }
    public function getCode()
    {
        $code = new \Code;
        echo $code->get();

    }
    public function crypt()
    {
        $str = '123456';
        $code_str = encrypt($str);
        $str1 = decrypt($code_str);
        echo $code_str;
        echo '</br>';
        echo $str1;


    }
}
