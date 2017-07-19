<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use App\Org\ImageTool;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        return view('home/login');
	}
	public function dologin(Request $request)
    {
    	$info = $request->except('_token');
		$res = DB::table('user')->where('phone',$info['phone'])->where('password',md5($info['password']))->get();
		if($res){
			return redirect('/');
		}
	}
	//生成验证码图片儿
	public function vc(){
		$a = new ImageTool();
		$aa = $a -> captcha();
	}
	public function register(){
		//session_start();
		return view('home/register');
//		echo $_COOKIE['vc'];
	}
	public function doregister(Request $request)
    {
    	//dd($_SESSION['vc']);
//		dd($request->except('_token'));

		//表单验证
        $messages = [
            'name.required'=>'必须填写用户名',
            'phone.required'=>'必须填写手机号',
            'password.required'=>'必须填写密码',
            'rphone.required'=>'确认手机号不能为空',
            'rpassword.required'=>'确认密码不能为空',  
            'question.required'=>'必须选择密保问题',
            'answer.required'=>'必须填写密保答案',
            'vcode.required'=>'验证码为空'
        ];
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'rphone' => 'required',
            'password' => 'required',
            'rpassword' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'vcode'=>'required'
        ],$messages);
		//取得所有表单数据
		$info = $request->except('_token');
		//判断两个确认字段是否满足要求
		if($info['phone'] != $info['rphone']){
			return redirect()->back()->with('msg','手机号与确认手机号不一致');
		}elseif($info['password'] != $info['rpassword']){
			return redirect()->back()->with('msg','密码与确认密码不一致');
		}
		//拼出user表需要的数据
		$user_info = array(
			'name'=>$info['name'],
			'password'=>md5($info['password']),
			'phone'=>$info['phone']
		);
		
		if($res1 = DB::table('user')->insertGetId($user_info)){
			//如果user表入库成功则继续入user_info表
			$userinfo_info = array(
				'userid'=>$res1,
				'question'=>$info['question'],
				'answer'=>$info['answer'],
				'creat_time'=>time(),
				'qq'=>$info['qq'],
				'birthday'=>$info['birthday']
			); 
			$res2 = DB::table('user_info')->insert($userinfo_info);
			if($res2){
				//如果user_info也成功则注册成功跳转登录界面
				return redirect('/login');
			}else{
				return redirect()->back()->with('msg','服务器繁忙稍后再试');
			}
		}else{
			return redirect()->back()->with('msg','手机号码已注册');
		}
		
	}












}
