<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class MovieController extends Controller
{
    public function index($movieId,$cinemaId='a')
    {
        //城市id的获取
        if(isset($_COOKIE['cityId'])){
            $cityId = $_COOKIE['cityId'];
        }else{
            $ip= $_SERVER["REMOTE_ADDR"];
            $url = 'http://api.map.baidu.com/location/ip?ak=fh6jnG5ZP7soYck3vWuxqPeQLFH8LYjt&coor=bd09ll&ip='.$ip;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//将返回结果进行转换
            $res = curl_exec($ch);//发送请求
            $res = json_decode($res);
            if($res->status){
                $cityId =131;
            }else{
                $cityId = $res->content->address_detail->city_code;
            }
            setcookie('cityId',$cityId,time()+7*24*60*60,'/');
            return redirect('/');
        }



        $cityCode = DB::table('region')->where('city_id',$cityId)->value('region_code');
        $regionCode = DB::table('region')->where('father_id',$cityCode)->lists('region_code');
        if($cinemaId == 'a'){

            $cinema = DB::table('cinema')->whereIn('region_code',$regionCode)->first();
        }else{
            $cinema = DB::table('cinema')->where('cinema_id',$cinemaId)->first();
        }

        $movie = DB::table('movie')->where('movie_id',$movieId)->first();
        $cinemaList = DB::table('cinema')->whereIn('region_code',$regionCode)->get();
        //该城市没有影院
        if($cinema==null){
            $roomIdList =[];
            $roomList = [];
            $roundList =[];
        }else{
            $roomIdList = DB::table('room')->where('cid',$cinema->cinema_id)->lists('room_id');
            $roomList = DB::table('room')->where('cid',$cinema->cinema_id)->get();
            $roundList = DB::table('round')->whereIn('room_id',$roomIdList)->where('movie_id',$movieId)->where('starttime','>',time())->get();
            foreach ($roundList as $k=>$v)
            {
                $roomName = DB::table('room')->where('room_id',$v->room_id)->value('name');
                $v->roomName = $roomName;
            }
        }

        return  view('home.movie',['movie'=>$movie,'cinema'=>$cinema,'roomList'=>$roomList,'roundList'=>$roundList,'cinemaList'=>$cinemaList]);
    }


}
