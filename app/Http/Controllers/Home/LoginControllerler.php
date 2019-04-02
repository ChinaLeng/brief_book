<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
class LoginControllerler extends Controller
{
    //登录页面
    public function index(){
        return view('login.index');
    }
    //实现登录
    public function login(Request $request){
        $validator = Validator::make($request->input(),[
            'email'    => 'required|email',
            'password' => 'required|min:6|max:18'
        ],[
            'required' => ':attribute 为必填项',
            'min'      => ':attribute 最小为三位',
            'max'      => ':attribute 最大为十六位',
        ],[
            'email'    => '邮箱',
            'password' => '密码'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember'));
        if(Auth::attempt($user,$is_remember)){
            return redirect('/');
        }
        return redirect()->back()->withErrors('邮箱和密码不匹配')->withInput();
    }
    //退出
    public function loginout(){
        Auth::logout();
        return redirect('/');
    }
}
