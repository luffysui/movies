<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roomList = DB::table('room')->where('cid',$request->input('cid'))->get();
//        dd($roomlist);

        return view('admin.roomlist',['roomList'=>$roomList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        //自定义错误消息格式
        $messages = array(
            'name.required' => '影院名称必须填写',
            'cid.required'  => '所属影院必须选择',
            'seats.required'  => '座位信息必须填写',
            'imax.required'  => '是否为IMAX必须填写',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'name' => 'required',
            'cid' => 'required',
            'seats' => 'required',
            'imax' => 'required|boolean',

        ],$messages);

        $arr = $request->except('_token','city');
        $id = DB::table('room')->insertGetId($arr);
        if($id > 0){
            return redirect('/admin/room')->with('msg', '添加成功');
        }
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
        $room = DB::table('room')->where('room_id', $id)->first();
        $cid = $room->cid;
//        dd($cid);
        $cinema = DB::table('cinema')->where('cinema_id',$cid)->first();
//        dd($room);
        return view('admin.roomedit', ['room'=>$room,'cinema'=>$cinema]);
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
//        dd($request);
        //自定义错误消息格式
        $messages = array(
            'name.required' => '影院名称必须填写',
            'seats.required'  => '座位信息必须填写',
            'imax.required'  => '是否为IMAX必须填写',
            'status.required'  => '状态必须填写',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'name' => 'required',
            'seats' => 'required',
            'imax' => 'required|boolean',
            'status' => 'required|boolean',

        ],$messages);
        $arr = $request->except('_token', '_method','cinema_name');
        $res = DB::table('room')->where('room_id',$id)->update($arr);
        if($res > 0){
            return redirect('/admin/room')->with('msg', '修改成功');
        }else{
            return redirect('/admin/room')->with('error', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('room')->where('room_id',$id)->delete();
        if($res > 0){
            return redirect('/admin/room')->with('msg', '删除成功');
        }else{
            return redirect('/admin/room')->with('error', '删除失败');
        }
    }
}
