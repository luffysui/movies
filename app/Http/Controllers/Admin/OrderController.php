<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\Org\Send;
use App\Org\REST;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //订单页面列表
    public function index(Request $request)
    {
        //保存搜索条件
        $where = [];
        //实例化需要的表
        $ob = DB::table('order');

        // 判断请求中是否含有user字段
        if($request->has('user')){
            // 获取搜索的条件
            $user = $request->input('user');
            //查出用户的id 数组 [0=>'10']
            $user_id = DB::table('user')->where('name','like','%'.$user.'%')->lists('user_id');
            //添加到将要带到分页中的数组
            $where['user'] = $user;
            //给查询语句添加where条件
            $ob->whereIn('user_id',$user_id);
        }

        //判断请求中是否有orser_id字段
        if($request->has('order_code')){
            // 获取搜索的条件
            $order_code = $request->input('order_code');
            //添加到将要带到分页中的数组
            $where['order_code'] = $order_code;
            //给查询语句添加where条件
            $ob->where('order_code','like','%'.$order_code.'%');
        }

        //判断请求中是否有status字段
        if($request->has('status')){
            $status = $request->input('status');
            if(!in_array('all',$status)){
                $where['status'] = $request->input('status');
                $ob->whereIn('status',$status);
            }
        }

        $orderList = $ob->orderBy('dateline','desc')->paginate(10);
        foreach ($orderList as $k=>$v)
        {
            $userName = DB::table('user')->where('user_id',$v->user_id)->value('name');
            $userPhone = DB::table('user')->where('user_id',$v->user_id)->value('phone');
            $orderList[$k]->userName = $userName;
            $orderList[$k]->userPhone = $userPhone;
            $movieName = DB::table('movie')->where('movie_id',$v->movie_id)->value('name');
            $orderList[$k]->movieName = $movieName;
            $roomName = DB::table('room')->where('room_id',$v->room_id)->value('name');
            $orderList[$k]->roomName = $roomName;
            $cinemaName = DB::table('cinema')->where('cinema_id',$v->cinema_id)->value('cinema_name');
            $orderList[$k]->cinemaName = $cinemaName;
        }
        return view('admin.orderlist',['orderList'=>$orderList,'where'=>$where]);
    }

    //退款页面列表
    public function show(Request $request)
    {
        //保存搜索条件
        $where = [];
        //实例化需要的表
        $ob = DB::table('order');

        // 判断请求中是否含有user字段
        if($request->has('user')){
            // 获取搜索的条件
            $user = $request->input('user');
            //查出用户的id 数组 [0=>'10']
            $user_id = DB::table('user')->where('name','like','%'.$user.'%')->lists('user_id');
            //添加到将要带到分页中的数组
            $where['user'] = $user;
            //给查询语句添加where条件
            $ob->whereIn('user_id',$user_id);
        }

        //判断请求中是否有orser_id字段
        if($request->has('order_code')){
            // 获取搜索的条件
            $order_code = $request->input('order_code');
            //添加到将要带到分页中的数组
            $where['order_code'] = $order_code;
            //给查询语句添加where条件
            $ob->where('order_code','like','%'.$order_code.'%');
        }
        $refundList = $ob->where('status','4')->orderBy('dateline','asc')->paginate(10);
        foreach ($refundList as $k=>$v)
        {
            $userName = DB::table('user')->where('user_id',$v->user_id)->value('name');
            $refundList[$k]->userName = $userName;
            $movieName = DB::table('movie')->where('movie_id',$v->movie_id)->value('name');
            $refundList[$k]->movieName = $movieName;
            $roomName = DB::table('room')->where('room_id',$v->room_id)->value('name');
            $refundList[$k]->roomName = $roomName;
            $cinemaName = DB::table('cinema')->where('cinema_id',$v->cinema_id)->value('cinema_name');
            $refundList[$k]->cinemaName = $cinemaName;
        }
        return view('admin.refundlist',['refundList'=>$refundList,'where'=>$where]);
    }

    public function update(Request $request, $id)
    {
        if($request->input('type') =='1'){
            $res = DB::table('order')->where('order_id',$id)->update(['status'=>'5']);
        }else{
            $res = DB::table('order')->where('order_id',$id)->update(['status'=>'10']);
        }
        if($res > 0){
            return redirect('/admin/order/refund')->with('msg', '处理成功');
        }else{
            return redirect('/admin/order/refund')->with('error', '处理失败');
        }
    }

    public function send(Request $request)
    {
        $userCode = $request->input('user_code');
        $userPhone = DB::table('user')->where('user_id',$request->input('user_id'))->value('phone');
        $sendMess = new Send();
        $res = $sendMess->sendTemplateSMS($userPhone,array($userCode,'3'),"1");
        if($res == 0){
            return redirect('/admin/order')->with('msg', '发送成功');
        }else{
            return redirect('/admin/order')->with('error', '发送失败');
        }

    }


}
