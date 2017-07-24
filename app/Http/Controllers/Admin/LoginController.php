<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admin;

class LoginController extends Controller
{
    //后台登录页面展示
    public function showLogin(){
        return view('admin.login');
    }
    //后台登录页面操作
    public function doLogin(Request $request)
    {
        //实例化一个模型
        $admin = new Admin();
        //调用模型中的index验证用户登录
        $ob = $admin->index($request);
        if($ob){
            //如果用户登录成功，保存用户登录信息
            session(['adminUser'=>$ob]);
            //跳转到后台首页
            return redirect('/admin/index');
        }else{
            return back()->with('msg', '用户名或密码错误');
        }
    }

    //后台推出登录
    public function logout()
    {
        session()->flush();
        return redirect('admin/login');
    }


}
