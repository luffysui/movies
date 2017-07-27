<?php
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
    $min = DB::table('round')->where('movie_id',$value->movie_id)->orderBy('nprice','asc')->value('nprice');
    $movieList[$key]->min=$min;
    $movieListSec[$key]->min=$min;
    $cinemaList[$key]->min=$min;
    }
    $home['movieList'] = $movieList;
    $home['movieListSec'] = $movieListSec;
    $home['movieComingList'] = $movieComingList;
    $home['cinemaList'] = $cinemaList;

    Cache::forever('staticPageCache_home', $home);

