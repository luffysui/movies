<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CinemaSelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //保存搜索条件
        $where = [];
        //实例化需要的表
        $ob = DB::table('cinema');

        // dd($request);
        // 判断请求中是否含有name字段
        if($request->has('cinema_name')){
            // 获取搜索的条件
            $name = $request->input('cinema_name');
            //添加到将要带到分页中的数组
            $where['cinema_name'] = $name;
            //给查询语句添加where条件
            $ob->where('cinema_name','like','%'.$name.'%');
        }
        //执行分页查询
        $list = $ob->paginate(10);
        // dd($list);
        foreach ($list as $k=>$v){
        $region_name =  DB::table('region')->where('region_code',$v->region_code)->value('region_name');
        $list[$k]->region_name=$region_name;

        }
        // dd($list);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('home.cinemaselect', ['list'=>$list,'where'=>$where]);
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
 // //保存搜索条件
 //        $where = [];
 //        //实例化需要的表
 //        $ob = DB::table('post')->where('uid',$id);
 //        // dd($request);
 //        if($request->has('title')){
 //            // 获取搜索的条件
 //            $title = $request->input('title');
 //            //添加到将要带到分页中的数组
 //            $where['title'] = $title;
 //            //给查询语句添加where条件
 //            $ob->where('title','like','%'.$title.'%');
 //        }
 //        //dd($id);
 //        //执行分页查询
 //        $list = $ob->paginate(5);