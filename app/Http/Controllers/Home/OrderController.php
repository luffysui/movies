<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Redis;
use Session;

//发送短信
use App\Org\Send;
use App\Org\REST;


class OrderController extends Controller
{
    public function showRound($roundId)
    {
        //城市id的获取
        if (isset($_COOKIE['cityId'])) {
            $cityId = $_COOKIE['cityId'];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
            $url = 'http://api.map.baidu.com/location/ip?ak=fh6jnG5ZP7soYck3vWuxqPeQLFH8LYjt&coor=bd09ll&ip=' . $ip;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//将返回结果进行转换
            $res = curl_exec($ch);//发送请求
            $res = json_decode($res);
            if ($res->status) {
                $cityId = 131;
            } else {
                $cityId = $res->content->address_detail->city_code;
            }
            setcookie('cityId', $cityId, time() + 7 * 24 * 60 * 60, '/');
            return redirect('/');
        }
        $round = DB::table('round')->where('round_id', $roundId)->first();
        $room = DB::table('room')->where('room_id', $round->room_id)->first();
        $cinema = DB::table('cinema')->where('cinema_id', $room->cid)->first();
        $movie = DB::table('movie')->where('movie_id', $round->movie_id)->first();
        $arr = explode(',', $room->seats);
        foreach ($arr as $key => $v) {
            $arr[$key] = explode('-', $v);
        }
        foreach ($arr as $key=>$v){
            $hang[$key] = $v[0];
            $lie[$key] = $v[1];
        }
        rsort($hang);
        rsort($lie);
        $maxhang = $hang[0];
        $maxlie = $lie[0];
        $hangStr = '';
        //获取一排最多的座位
        for($i =0;$i< $maxlie ;$i++ ) {
            $hangStr .='_';
        }
        //获取排数
        for($i= 0;$i < $maxhang;$i++){
            $r[$i] = $hangStr;
        }
        //$r为座位表
        foreach ($arr as $key => $seat)
        {
            for($i = 1;$i<$maxlie;$i++){
                for($j = 1;$j<$maxhang+1;$j++){
                    if($seat[0] == $j){
                        $r[$seat[0]-1] = substr_replace($r[$seat[0]-1],'a',$seat[1]-1,1);
                    }
                }
            }
        }
        return  view('home.order',['room'=>$room,'round'=>$round,'cinema'=>$cinema,'movie'=>$movie,'r'=>$r]);
    }



    public function doOrder(Request $request)
    {

        //这个无序集合叫‘seats-round’
        //这个队列叫‘list-seats’
//        $roundId = $request->round;
        $tmpseats = rtrim($request->sid,',');
        $seats = explode(',', $tmpseats);
        $ticketNum = count($seats);
        $order = date('YmdHis',time()).rand(100,999);
        $roundDetail = DB::table('round')->where('round_id',$request->round)->first();
        $movieId = $roundDetail->movie_id;
        $roomId = $roundDetail->room_id;
        $cinemaId= DB::table('room')->where('room_id',$roomId)->value('cid');
        $totalMoney = $ticketNum * $roundDetail->nprice;
//        dd($totalMoney);
        $list = array(
            'seats'=>$seats,
            'order'=>$order,
            'round'=>$request->round,
            'userId'=>Session::get('homeuser')['user_id'],
            'movieId'=>$movieId,
            'cinemaId'=>$cinemaId,
            'roomId'=>$roomId,
            'ticketNum'=>$ticketNum,
            'totalMoney'=>$totalMoney
//            'userId'=>Session::get('homeuser')['user_id']
        );
        $listStr = serialize($list);
        Redis::lpush('list-seats',$listStr);


        $flag = true;
        while ($flag) {
            if(Redis::get('result-'.$order)==false){
                sleep(2);
            }else{
                $flag = false;
                if(Redis::get('result-'.$order)==3){
                    echo '成功';
                }else{
                    echo '失败';

                }
            }
        }
    }

    //已卖出座位详情的获取
    public  function checkOrder(Request $request)
    {
//        echo  $request->round;
        $round = 'seats_'.$request->round;
        $seats = Redis::smembers($round);
        echo json_encode($seats);
    }

    //用户订单页面
    public function userIndex()
    {
        $userId = Session::get('homeuser')['user_id'];
        $orderList = DB::table('orderb')->where('user_id',$userId)->orderBy('dateline', 'desc')->get();
        foreach ($orderList as $key=>$v){
            $orderList[$key]->phone = DB::table('user')->where('user_id',$v->user_id)->value('phone');
            $orderList[$key]->movieName = DB::table('movie')->where('movie_id',$v->movie_id)->value('name');
            $cinema = DB::table('cinema')->where('cinema_id',$v->cinema_id)->first();
            $orderList[$key]->seats = str_replace('_','排',$orderList[$key]->seats);
            $orderList[$key]->seats = substr_replace($orderList[$key]->seats,'座 ',strlen($orderList[$key]->seats),1);
            $orderList[$key]->roomName = DB::table('room')->where('room_id',$v->room_id)->value('name');
            $orderList[$key]->cinemaName = $cinema->cinema_name;
            $orderList[$key]->cinemaAddress = $cinema->cinema_address;
            $orderList[$key]->cinemaPhone = $cinema->cinema_phone;
            $orderList[$key]->starttime = DB::table('round')->where('round_id',$v->round_id)->value('starttime');
        }
        return view('home.userorder',['orderList'=>$orderList]);
    }

    //用户申请退款
    public function userRefund($orderId)
    {
        //判断现在订单的状态
        $orderDetail = DB::table('orderb')->where('order_id',$orderId)->first();

        $status = $orderDetail->status;
        $startTime = DB::table('round')->where('round_id',$orderDetail->round_id)->value('starttime');
        if($status == 1 || $status == 3 || $status == 8 ||$status == 9 ){
            $res = DB::table('orderb')->where('order_id',$orderId)->update(['status'=>'4']);
            if($res > 0){
                return redirect('/home/user/order')->with('msg', '申请退款成功');
            }else{
                return redirect('/home/user/order')->with('msg', '处理失败');
            }
        }else{
            return redirect('/home/user/order')->with('msg', '处理失败');
        }

    }

    //发送短信
    public function doSend($orderId)
    {
        $orderDetail = DB::table('orderb')->where('order_id',$orderId)->first();
        //用户手机号
        $userPhone = DB::table('user')->where('user_id',$orderDetail->user_id)->value('phone');
        $sendMess = new Send();
        $res = $sendMess->sendTemplateSMS($userPhone,array($orderDetail->code,'1000'),"1");
        if($res == 0){
            return redirect('/home/user/order')->with('msg', '发送成功');
        }else{
            return redirect('/home/user/order')->with('msg', '发送失败');
        }

    }

    public function userPay($orderId)
    {
        $res = DB::table('orderb')->where('order_id',$orderId)->update(['status'=>'1']);
        if($res > 0){
            //发送券码
            $this->doSend($orderId);
            return redirect('/home/user/order')->with('msg', '支付成功请查收短信');
        }else{
            return redirect('/home/user/order')->with('msg', '支付失败');
        }
    }

}
