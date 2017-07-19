<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;

use Session;

use App\Org\ImageTool;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        Session::put('homeuser','');
        return view('home/login');
	}
	public function dologin(Request $request)
    {
        //表单验证
    	$messages = [
            'password.required'=>'必须填写用户名',
            'phone.required'=>'必须填写手机号'
        ];
        $this->validate($request, [
            'password' => 'required',
            'phone' => 'required'
        ],$messages);
		
    	$info = $request->except('_token');
		$res = DB::table('user')->where('phone',$info['phone'])->where('password',md5($info['password']))->get();
		if($res){
		    //登录成功存入session数组
		    $session = array(
		        'user_id'=>$res[0]->user_id,
                'phone'=>$info['phone'],
                'password'=>md5($info['password'])
            );
		    Session::put('homeuser',$session);
//		    跳转首页
			return redirect('/');
		}else{
			return redirect('/login')->with('msg','登录失败');
		}
	}
	//生成验证码图片儿
	public function vc(){
		$a = new ImageTool();
	}
	public function register(){
        return view('home/register');
//        $a = Session:get('vc');
//        dd($a);
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
            'vc.required'=>'验证码为空'
        ];
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'rphone' => 'required',
            'password' => 'required',
            'rpassword' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'vc'=>'required'
        ],$messages);
        //取得所有表单数据
        $info = $request->except('_token');
        if(Session::get('vc') != $info['vc']){
            return redirect()->back()->with('msg','验证码不对');
        }
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
