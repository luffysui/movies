<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class RoomAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //展示省
    public function index()
    {
        $list = DB::table('region')->where('father_id',0)->get();
        echo json_encode($list);
    }
    //展示市和区
    public function post(Request $request)
    {
        $list = DB::table('region')->where('father_id',$request->input('father_id'))->get();
        echo json_encode($list);
    }
    //展示影院
    public function cinema(Request $request)
    {
        $list = DB::table('cinema')->where('region_code',$request->input('region_code'))->get();
        echo json_encode($list);
    }
    //展示影厅
    //只展示正常状态的影厅
    public function room(Request $request)
    {
        $ob = DB::table('room')->where('cid',$request->input('cid'))->where('status','0')->where('name','like','%'.$request->input('search').'%');
        $imax = $request->input('imax');
        if($imax != 2){
            $ob->where('imax',$imax);
        }
        $roomlist = $ob->get();
        echo json_encode($roomlist);
    }



}
