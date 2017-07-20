<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cinemaId)
    {
        //查询需要的信息
        $cinema = DB::table('cinema')->where('cinema_id',$cinemaId)->first();
        $room = DB::table('room')->where('cid',$cinemaId)->lists('room_id');
        $round = DB::table('round')->whereIn('room_id',$room)->lists('movie_id');
        $movie = DB::table('movie')->whereIn('movie_id',$round)->get();
        // $movies = DB::table('movie')->whereIn('movie_id',$round)->lists('typeid');
        // dd($movie);
        // dd($type);
        foreach ($movie as $key => $value) {

            $typeId = explode(',',$movie[$key]->typeid);
        // dd($typeId);
            $typeName = DB::table('type')->whereIn('type_id',$typeId)->lists('name');
            // dd($typeName);
            $typeName  = implode(',',$typeName);
            $movie[$key]->typeName= $typeName;
        }
        // 加载修改页面并把个人信息传到模板上
        return view('home.cinemadet', ['cinema'=>$cinema,'cinema_id'=>$cinemaId,'movie'=>$movie]);
        // return 1111;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
