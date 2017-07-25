<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.verify');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = $request->except('_token');
        $order = DB::table('orderb')->where('code',$code)->first();
        if(!count($order)){
            return redirect('/admin/code')->with('error', '没有该验证码');
        }
        $userName = DB::table('user')->where('user_id',$order->user_id)->value('name');
        $userPhone = DB::table('user')->where('user_id',$order->user_id)->value('phone');
        $order->userName = $userName;
        $order->userPhone = $userPhone;
        $movieName = DB::table('movie')->where('movie_id',$order->movie_id)->value('name');
        $order->movieName = $movieName;
        $roomName = DB::table('room')->where('room_id',$order->room_id)->value('name');
        $order->roomName = $roomName;
        $cinemaName = DB::table('cinema')->where('cinema_id',$order->cinema_id)->value('cinema_name');
        $order->cinemaName = $cinemaName;

        return view('admin.verifylist', ['order'=>$order]);

    }


    public function update(Request $request)
    {
        $arr = $request->except('_token', '_method');
        $res = DB::table('orderb')->where('code',$arr['code'])->whereIn('status',[1,3,8,9,10])->update(['status'=>2]);
        if($res > 0){
            return redirect('/admin/code')->with('msg', '验证成功');
        }else{
            return redirect('/admin/code')->with('error', '验证失败');
        }
    }


}
