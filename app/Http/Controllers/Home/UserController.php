<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use DB;
class UserController extends Controller
{


    public function index()
    {
        $in = DB::table('user')->where('user_id',Session::get('homeuser')['user_id'])->first();
        $fo = DB::table('user_info')->where('userid',Session::get('homeuser')['user_id'])->first();
        return view('home/userinfo',['in'=>$in,'fo'=>$fo,'id'=>Session::get('homeuser')['user_id']]);
    }



    public function userpost(Request $request){
        //基本表单验证
        $messages = [
            'name.required'=>'必须填写用户名',
            'phone.required'=>'必须填写手机号',
            'password.required'=>'必须填写原密码',
            'npass.required'=>'必须填写新密码',
            'rnpass.required'=>'必须填写新密码',
        ];
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
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


    //用户反馈界面
    public function idea(){
        //所有的建议和反馈
        $allidea = DB::table('idea')
            ->join('user','user.user_id','=','idea.userid')
            ->get();
//        dd($allidea);
        //用户自己的建议和反馈s
        $useridea = DB::table('idea')
            ->join('ridea','ridea.toid','=','idea.idea_id')
            ->where('userid',Session::get('homeuser')['user_id'])
            ->select('idea.*','ridea.content','ridea.time as rtime')
            ->get();
//        dd($useridea);
        return view('home.idea',['allidea'=>$allidea,'useridea'=>$useridea]);
    }
    //提交反馈
    public function doidea(Request $request){
        $idea = $request->except('_token');
        $idea['userid'] = Session::get('homeuser')['user_id'];
        $idea['time'] = time();
        $idea['zan'] = 0;
        $res = DB::table('idea')->insert($idea);
        if($res){
            return redirect()->back()->with('msg','提交意见成功，请等待官方回复');
        }
    }

    public function zan(){
        $zan = DB::table('idea')->where('idea_id',$_GET['ideaid'])->value('zan');
        $res = DB::table('idea')->where('idea_id',$_GET['ideaid'])->update(['zan'=>$zan+1]);
        if($res){
            return 'ok';
        }else{
            return 'no';
        }
    }
}
