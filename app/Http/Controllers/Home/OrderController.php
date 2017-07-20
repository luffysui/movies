<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Redis;
use Session;

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
//        dd($room);
        $arr = explode(',', $room->seats);
//        dd($arr);
//        echo '<pre>';
        $row = '';
        foreach ($arr as $key => $v) {
            $arr[$key] = explode('-', $v);
        }
//        dd($arr);
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
//        dd($r);
//        echo $maxhang;
//        dd($arr);
        //$r为座位表
        foreach ($arr as $key => $seat)
        {
            for($i = 1;$i<$maxlie;$i++){

                for($j = 1;$j<$maxhang+1;$j++){
                    if($seat[0] == $j){
                        $r[$seat[0]-1] = substr_replace($r[$seat[0]-1],'a',$seat[1]-1,1);
//                        break;
                    }
                }



            }
        }
//dd($r);

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
            'userId'=>17,
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
    public  function checkOrder(Request $request){


//        echo  $request->round;
        $round = 'seats_'.$request->round;
        $seats = Redis::smembers($round);

        echo json_encode($seats);

    }

}
