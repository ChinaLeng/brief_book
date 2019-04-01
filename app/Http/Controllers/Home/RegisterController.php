<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Validator;
class RegisterController extends Controller
{
    //注册页面
    public function index(){
        return view('register.index');
    }
    //提交注册
    public function register(Request $request){
        //验证信息
        /*$this->validate(request(),[
            'name'     => 'required|min:3|max:16|unique:users',
            'email'    => 'required|unique:users|email',
            'password' => 'required|min:6|max:18|confirmed'
        ],[
            'required' => ':attribute 为必填项',
            'min'      => ':attribute 最小为三位',
            'max'      => ':attribute 最大为十六位',
            'confirmed'=> ':attribute 两次输入不同',
            'unique'   => ':attribute 已存在',
        ],[
            'name'     => '姓名',
            'email'    => '邮箱',
            'password' => '密码'
        ]);*/
        $validator = Validator::make($request->input(),[
            'name'     => 'required|min:3|max:16|unique:users',
            'email'    => 'required|unique:users|email',
            'password' => 'required|min:6|max:18|confirmed'
        ],[
            'required' => ':attribute 为必填项',
            'min'      => ':attribute 最小为三位',
            'max'      => ':attribute 最大为十六位',
            'confirmed'=> ':attribute 两次输入不同',
            'unique'   => ':attribute 已存在',
        ],[
            'name'     => '姓名',
            'email'    => '邮箱',
            'password' => '密码'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
/*        $name     = request('name');
        $email    = request('email');
        $password = bcrypt(request('password'));
        $user = User::created(compact('name','email','password'));*/
        $user = new User();
        $user->name     = request('name');
        $user->email    = request('email');
        $user->password = bcrypt(request('password'));
        if($user->save()){
            return  redirect('/login')->with('success','注册成功,请登录');
        }else{
            return redirect()->back();
        };
    }
}
