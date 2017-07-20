<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use DB;
class UserController extends Controller
{

    public function index($id)
    {
        $in = DB::table('user')->where('user_id',$id)->first();
        $fo = DB::table('user_info')->where('userid',$id)->first();
        return view('home/userinfo',['in'=>$in,'fo'=>$fo,'id'=>$id]);
    }


    public function userpost(Request $request){
        //基本表单验证
        $messages = [
            'name.required'=>'必须填写用户名',
            'phone.required'=>'必须填写手机号',
            'password.required'=>'必须填写原密码',
//            'question.required'=>'必须选择密保问题',
//            'answer.required'=>'必须填写密保答案',
            'npass.required'=>'必须填写新密码',
            'rnpass.required'=>'必须填写新密码',
        ];
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
//            'question' => 'required',
//            'answer' => 'required',
            'npass' => 'required',
            'rnpass' => 'required'
        ],$messages);
        //验证原密码
        $info = $request->except('_token');
        //判断两个确认字段是否满足要求
        if($info['npass'] != $info['rnpass']){
            return redirect()->back()->with('msg','密码与确认密码不一致');
        }
        //用户id
        $uid = Session::get('homeuser')['user_id'];

        $old = DB::table('user')->where('user_id',$uid)->get();
//        dd(md5($info['pass']));
//        dd($old);
        if(md5($info['password']) != $old[0]->password){
            return redirect()->back()->with('msg','原密码验证失败');
        }
        //拼出user表需要的数据
        $user_info = array(
            'name'=>$info['name'],
            'password'=>md5($info['npass']),
            'phone'=>$info['phone']
        );
        if($res1 = DB::table('user')->where('user_id',$uid)->update($user_info)){
            //如果user表入库成功则继续入user_info表
            $userinfo_info = [
                'userid'=>$uid,
//                'question'=>$info['question'],
//                'answer'=>$info['answer'],
                'qq'=>$info['qq'],
                'sex'=>$info['sex']
            ];
            $res2 = DB::table('user_info')->where('userid',$uid)->update($userinfo_info);
            if($res2){
                //如果user_info也成功则注册成功跳转登录界面
                return redirect('/')->with('msg','修改成功');
            }else{
                return redirect()->back()->with('msg','服务器繁忙请重试');
            }
        }else{
            return redirect()->back()->with('msg','手机号码已经注册');
        }
    }
}
