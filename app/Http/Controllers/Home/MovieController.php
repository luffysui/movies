<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use Session;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;


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
            $ch = curlf_init($url);
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

            $cinema = DB::table('cinema')->whereIn('region_code',$regionCode)->orderBy('cinema_score','desc')->first();
        }else{
            $cinema = DB::table('cinema')->where('cinema_id',$cinemaId)->first();
        }

        $movie = DB::table('movie')->where('movie_id',$movieId)->first();
        //所有该地区的影院
        $cinemaList = DB::table('cinema')->whereIn('region_code',$regionCode)->orderBy('cinema_score','desc')->get();

        //找到每家影院的该影院最低价
        foreach ($cinemaList as $k=>$v)
        {
            //这一家影院的影厅
            $room = DB::table('room')->where('cid',$v->cinema_id)->lists('room_id');
            $minPrice = DB::table('round')->where('movie_id',$movie->movie_id)->whereIn('room_id',$room)->orderBy('nprice')->first();

            if(!$minPrice){
                $minP = '暂无排期';
            }else{
                $minP = '最低价：'.($minPrice->nprice/100).'元';
            }
            $cinemaList[$k]->minPrice = $minP;
        }
//        dd($cinemaList);
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
        $movieList = DB::table('movie')->where('start_time','<',time())
                                ->where('stop_time','>',time())
                                ->take(6)
                                ->orderBy('start_time','desc')
                                ->get();
        return  view('home.movie',['movieList'=>$movieList,'movie'=>$movie,'cinema'=>$cinema,'roomList'=>$roomList,'roundList'=>$roundList,'cinemaList'=>$cinemaList,'movieId'=>$movieId]);
    }


    //影评页面
    public function showreply($movieId){
        $count = DB::table('comment')->where('movie_id',$movieId)->count();
        $coms = DB::table('comment')
            ->join('user','user.user_id','=','comment.uid')
            ->where('movie_id',$movieId)->orderBy('time', 'desc')->get();
        $movie = DB::table('movie')->where('movie_id',$movieId)->first();
        return view('home.moviereply',['movie'=>$movie,'movieId'=>$movieId,'count'=>$count,'coms'=>$coms]);
     }


    //添加评论操作
    public function doreply(Request $request, $movieId){

        $arr = $request->except('_token');

        $arr['movie_id']=$movieId;
        $arr['time'] = time();

        $arr['uid'] = Session::get('homeuser')['user_id'];
        $res = DB::table('comment')->insert($arr);
        if($res){
            return redirect()->back();
        }
    }
}
