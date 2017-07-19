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

        $cityId = $_COOKIE['cityId'];
        $cityCode = DB::table('region')->where('city_id',$cityId)->first();

        $regionCode = DB::table('region')->where('father_id',$cityCode->region_code)->lists('region_code');
//        dd($regionCode);
        $cinemaList = DB::table('cinema')->whereIn('region_code',$regionCode)->get();
//        dd($cinemaList);
        return  view('home.cinemalist',['cinemaList'=>$cinemaList,'cityCode'=>$cityCode]);
    }


}
