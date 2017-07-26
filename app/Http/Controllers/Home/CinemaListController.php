<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CinemaListController extends Controller
{
    public function index(Request $request)
    {

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
            setcookie('cityId',$cityId,time()+7*24*60*60);
        }
        $cityCode = DB::table('region')->where('city_id',$cityId)->first();

        $regionCode = DB::table('region')->where('father_id',$cityCode->region_code)->lists('region_code');
//        dd($regionCode);
        $cinemaList = DB::table('cinema')->whereIn('region_code',$regionCode)->get();

        foreach ($cinemaList as $k => $v) {
            $room = DB::table('room')->where('cid',$v->cinema_id)->lists('room_id');
            $min = DB::table('round')
                ->where('starttime','>',time())
                ->whereIn('room_id',$room)->orderBy('nprice','asc')->lists('nprice');
//            dd($min[0]);
            if (count($min) <=0 ){
                $cinemaList[$k]->min='暂无排期';
            }else{
                $cinemaList[$k]->min=($min[0]/100).'起';
            }
        }
//        dd($cinemaList);
        return  view('home.cinemalist',['cinemaList'=>$cinemaList,'cityCode'=>$cityCode,'request'=>$request]);
    }


}
