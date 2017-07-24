<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class RoundController extends Controller
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
        $ob = DB::table('round');
        // 判断请求中是否含有movie字段
        if($request->has('movie')){
            // 获取搜索的条件
            $movie = $request->input('movie');
            //查出影片的id 数组 [0=>'10']
            $movie_id = DB::table('movie')->where('name','like','%'.$movie.'%')->lists('movie_id');
            //添加到将要带到分页中的数组
            $where['movie'] = $movie;
            //给查询语句添加where条件
            $ob->whereIn('movie_id',$movie_id);
        }
        //判断请求中是否有cinema字段
        if($request->has('cinema')){
            // 获取搜索的条件
            $cinema = $request->input('cinema');
            //查处影院的id 数组 [0=>'10']
            $cinema_id = DB::table('cinema')->where('cinema_name','like','%'.$cinema.'%')->lists('cinema_id');
            //查处影厅id 数组
            $room_id = DB::table('room')->whereIn('cid',$cinema_id)->lists('room_id');
            //添加到将要带到分页中的数组
            $where['cinema'] = $cinema;
            //给查询语句添加where条件
            $ob->whereIn('room_id',$room_id);
        }
        //判断请求中是否有status字段
        if($request->input('status') !=4){
            //
            if($request->input('status') ==1 ){
                $ob->where('starttime','>',time());
                $where['status'] = $request->input('status');
            }elseif($request->input('status') ==3 ){
                $ob->where('overtime','<',time());
                $where['status'] = $request->input('status');
            }elseif($request->input('status') ==2 ){
                $ob->where('starttime','<',time())->where('overtime','>',time());
                $where['status'] = $request->input('status');
            }

        }

        $roundList = $ob->orderBy('starttime','desc')->paginate(10);
        foreach ($roundList as $k=>$v)
        {
            $movieName = DB::table('movie')->where('movie_id',$v->movie_id)->value('name');
            $roundList[$k]->movieName = $movieName;
            $roomName = DB::table('room')->where('room_id',$v->room_id)->value('name');
            $roundList[$k]->roomName = $roomName;
            $cid = DB::table('room')->where('room_id',$v->room_id)->value('cid');
            $cinemaName = DB::table('cinema')->where('cinema_id',$cid)->value('cinema_name');
            $roundList[$k]->cinemaName = $cinemaName;
        }
//        dd($roundList);
        return view('admin.roundlist',['roundList'=>$roundList,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = DB::table('movie')->where('stop_time','>',time())->get();
        return view('admin.roundadd',['movie'=>$movie]);
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
        $messages = array(
            'movie_id.required' => '影片必须填写',
            'startdate.required'  => '开场日期必须填写',
            'starttime.required'  => '开场时间必须填写',
            'room_id.required'  => '影厅必须填写',
            'overdate.required'  => '闭场日期必须填写',
            'overtime.required'  => '闭场时间必须填写',
            'oprice.required'  => '原价必须填写',
            'nprice.required'  => '现价必须填写',
            'nprice.integer'  => '现价必须为整数',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'movie_id' => 'required',
            'startdate' => 'required',
            'starttime' => 'required',
            'overdate' => 'required',
            'overtime' => 'required',
            'oprice' => 'required|integer',
            'nprice' => 'required|integer',
            'room_id'=>'required'

        ],$messages);

        $arr = $request->except('_token','city','startdate','starttime','overdate','overtime');
        //标准化日期和事件
        $start = $request->input('startdate').' '.$request->input('starttime');
        $over = $request->input('overdate').' '.$request->input('overtime');
        //时间戳
        $starttime = strtotime($start);
        $overtime = strtotime($over);
        $arr['starttime'] =$starttime;
        $arr['overtime'] =$overtime;
        $id = DB::table('round')->insertGetId($arr);
        if($id > 0){
            return redirect('/admin/round')->with('msg', '添加成功');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $round = DB::table('round')->where('round_id',$id)->first();
        $movie_id = $round->movie_id;
        $room_id = $round->room_id;
        $movieName = DB::table('movie')->where('movie_id',$movie_id)->value('name');
        $roomName = DB::table('room')->where('room_id',$room_id)->value('name');
        $cinema_id = DB::table('room')->where('room_id',$room_id)->value('cid');
        $cinemaName = DB::table('cinema')->where('cinema_id',$cinema_id)->value('cinema_name');
        $round->startdate  =  date('Y-m-d',$round->starttime);
        $round->starttime  =  date('H:i',$round->starttime);
        $round->overdate  =  date('Y-m-d',$round->overtime);
        $round->overtime  =  date('H:i',$round->overtime);
//        echo $roomName;
        return view('admin.roundedit', ['round'=>$round,'movieName'=>$movieName,'roomName'=>$roomName,'cinemaName'=>$cinemaName]);
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
        $messages = array(
            'startdate.required'  => '开场日期必须填写',
            'starttime.required'  => '开场时间必须填写',
            'overdate.required'  => '闭场日期必须填写',
            'overtime.required'  => '闭场时间必须填写',
            'oprice.required'  => '原价必须填写',
            'nprice.required'  => '现价必须填写',
            'nprice.integer'  => '现价必须为整数',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'startdate' => 'required',
            'starttime' => 'required',
            'overdate' => 'required',
            'overtime' => 'required',
            'oprice' => 'required|integer',
            'nprice' => 'required|integer',

        ],$messages);
        //去掉请求中令牌,伪造方法,开始结束的日期和时间
        $arr = $request->except('_token','_method','startdate','starttime','overdate','overtime');
        //拼接日期和时间
        $start = $request->input('startdate').' '.$request->input('starttime');
        $over = $request->input('overdate').' '.$request->input('overtime');
        //把日期和事件改为时间戳
        $starttime = strtotime($start);
        $overtime = strtotime($over);
        //将时间戳存入数组中
        $arr['starttime'] =$starttime;
        $arr['overtime'] =$overtime;
        $res = DB::table('round')->where('round_id',$id)->update($arr);
        if($res > 0){
            return redirect('/admin/round')->with('msg', '修改成功');
        }else{
            return redirect('/admin/round')->with('error', '修改失败');
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
        $res = DB::table('round')->where('round_id',$id)->delete();
        if($res > 0){
            return redirect('/admin/round')->with('msg', '删除成功');
        }else{
            return redirect('/admin/round')->with('error', '删除失败');
        }
    }
}
