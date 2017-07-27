<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use Cookie;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{

    //展示首页
    public function index(Request $request)
    {
//        if(!Cache::has('staticPageCache_home')){
            $movieList = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                ->orderBy('start_time','desc')
                ->take(2)->get();
            $movieListSec = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                ->orderBy('start_time','desc')
                ->skip(2)->take(4)->get();
            $movieComingList = DB::table('movie')->where('start_time','>',time())
                ->orderBy('start_time','asc')
                ->take(4)->get();
            $cinemaList = DB::table('cinema')->take(5)->get();

			 foreach ($movieList as $key => $value)
			{
				//按照现价正序排列取最小值
				$min = DB::table('round')->where('starttime','>',time())->where('movie_id',$value->movie_id)->orderBy('nprice','asc')->value('nprice');
				$movieList[$key]->min=$min;

			}


            foreach ($movieListSec as $key => $value)
            {
                //按照现价正序排列取最小值
                $min = DB::table('round')->where('starttime','>',time())->where('movie_id',$value->movie_id)->orderBy('nprice','asc')->value('nprice');
                $movieListSec[$key]->min=$min;

            }

            foreach ($cinemaList as $k=>$v)
            {
                $room = DB::table('room')->where('cid',$v->cinema_id)->lists('room_id');
                $min = DB::table('round')->whereIn('room_id',$room)->orderBy('nprice')->first();
                $cinemaList[$k]->min=$min->nprice;
            }


        $home['movieList'] = $movieList;
            $home['movieListSec'] = $movieListSec;
            $home['movieComingList'] = $movieComingList;
            $home['cinemaList'] = $cinemaList;

            Cache::forever('staticPageCache_home', $home);

//        }

		//轮播图
		$car = DB::table('carousel')->where('display',1)->get();
        $home = Cache::get('staticPageCache_home');
        return view('home.index',['home'=>$home,'request'=>$request,'car'=>$car]);
    }

    public function changeCity($cityId)
    {
        setcookie('cityId',$cityId,time()+7*24*60*60,'/');
        return redirect()->back();
    }

}
