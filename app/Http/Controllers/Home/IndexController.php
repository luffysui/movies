<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use Cookie;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $movieList = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                    ->orderBy('start_time','desc')
                    ->take(2)->get();
        $movieListSec = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                        ->orderBy('start_time','desc')
                        ->skip(2)->take(4)->get();
        $movieComingList = DB::table('movie')->where('start_time','>',time())
                        ->orderBy('start_time','desc')
                        ->take(4)->get();
        $cinemaList = DB::table('cinema')->take(5)->get();
        // dd($movieComingList);
         foreach ($movieList as $key => $value)
        {

            //按照现价正序排列取最小值
            $min = DB::table('round')->where('movie_id',$value->movie_id)->orderBy('nprice','asc')->value('nprice');
            $movieList[$key]->min=$min;
            $movieListSec[$key]->min=$min;
            $cinemaList[$key]->min=$min;
            // $cinemList[$key]->movie_id=$movieId;
        }
        // dd($movieListSec);
        // dd($movieList);
        // dd($min);
        return  view('home.index',['movieList'=>$movieList,'movieListSec'=>$movieListSec,'movieComingList'=>$movieComingList,'cinemaList'=>$cinemaList,'request'=>$request,'min'=>$min]);
    }

    public function changeCity($cityId)
    {
        setcookie('cityId',$cityId,time()+7*24*60*60,'/');
        return redirect()->back();
    }

}
