<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
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

            $user = User::all();
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
}
