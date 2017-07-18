<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('home.index',['movieList'=>$movieList,'movieListSec'=>$movieListSec,'movieComingList'=>$movieComingList,'cinemaList'=>$cinemaList]);
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
