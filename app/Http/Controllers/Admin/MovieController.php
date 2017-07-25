<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;

use Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{
    //电影列表
    public function index(Request $request)
    {
        $where = [];
        $ob = DB::table('movie');
        if($request->has('name')){
            // 获取搜索的条件
            $name = $request->input('name');
            //添加到将要带到分页中的数组
            $where['name'] = $name;
            //给查询语句添加where条件
            $ob->where('name','like','%'.$name.'%');
        }
//        if($request->status==3){
//
//        }elseif($request->status==0){
//            $ob->where('stop_time','<',time());
//        }elseif($request->status==2){
//            $ob->where('start_time','>',time());
//        }elseif($request->status==1){
//            $ob->where('start_time','<',time());
//            $ob->where('stop_time','>',time());
//        }
        //执行分页查询
        $movies = $ob->orderBy('movie_id', 'desc')->paginate(5);
        //查询type
        //修改数组内容
        foreach($movies as $key=>$v){
            //类型的id字符串
            $typeStr = $v->typeid;
            //类型id的数组
            $typeArr = explode(',',$typeStr);
            //国家id的数组
            $typeArr2 = DB::table('type')->where('display',1)->whereIn('type_id',$typeArr)->lists('name');
            //类型名称的字符串
            $typeRes = implode(',',$typeArr2);
            //修改数组->type的内容
            $movies[$key]->type=$typeRes;

            //国家的id字符串
            $stateStr = $v->state;
            $stateArr = explode(',',$stateStr);
            //类型名称的数组
            //国家名称的数组
            $stateArr2 = DB::table('type')->where('display',1)->whereIn('type_id',$stateArr)->lists('name');
            //国家名称的字符串
            $stateRes = implode(',',$stateArr2);
            //修改数组->state的内容
            $movies[$key]->state=$stateRes;

            //转化时间格式
            $movies[$key]->start_time = date('Y-m-d',$movies[$key]->start_time);
            $movies[$key]->stop_time = date('Y-m-d',$movies[$key]->stop_time);
        }

        return view('admin/movielist',['movies'=>$movies,'where'=>$where]);
    }
    //添加电影页面
    public function create()
    {
        //查询类型
        $type = DB::table('type')->where('display',1)->where('status',0)->get();
        //查询国家
        $state = DB::table('type')->where('display',1)->where('status',1)->get();
        //显示页面
        return view('admin/movieadd',['type'=>$type,'state'=>$state]);
    }
    //添加电影操作
    public function store(Request $request)
    {
        //表单验证
        $messages = [
            'name.required'=>'必须填写影片名',
            'director.required'=>'必须填写导演',
            'state.required'=>'必须填写国家',
            'star.required'=>'必须填写主演',
            'typeid.required'=>'必须填写类别',
            'description.required'=>'必须填写描述',
            'language.required'=>'必须填写语言',
            'duration.required'=>'必须填写时长',
            'start_time.required'=>'必须填写上映时间',
            'stop_time.required'=>'必须填写下档时间',
            'd3.required'=>'必须选择是否3D',
            'imax.required'=>'必须选择是否IMAX',
            'poster.required'=>'必须选择文件'
        ];
        $this->validate($request, [
            'name' => 'required',
            'director' => 'required',
            'star' => 'required',
            'state' => 'required',
            'typeid' => 'required',
            'description' => 'required',
            'language' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
            'stop_time' => 'required',
            'd3' => 'required',
            'imax' => 'required',
            'poster'=>'required'
        ],$messages);

        if ($request->hasFile('poster')) {
            // 判断文件是否有效
            if ($request->file('poster')->isValid()) {
                //生成上传文件对象
                $file = $request->file('poster');
            }
            //获取源文件的后缀
            $ext = $file->getClientOriginalExtension();
            //生成一个新文件名
            $picname = time().rand(1000,9999).'.'.$ext;
            //移动文件
            $file->move('./upload/admin/', $picname);
            //如果有错误
            if($file->getError() > 0){
                 return redirect('admin/movie/create')->with('msg', '上传失败');
            }else{
                //没有错误则入库
//                dd(time($request->start_time));
                if( time($request->start_time) > time($request->stop_time) ){
                    return redirect('admin/movie/create')->with('msg', '时间选择有冲突');
                }
                //入库前将数据格式转换

                $arr = $request->except('_token');
                //去掉前后空格
                $arr['description']=trim($arr['description']);
                //将上传文件的名字写入数组
                $arr['poster']=$picname;
//                将国家数组转化为逗号分隔的字符串
                $arr['state']=implode(',',$arr['state']);
                //将类型属组转化为逗号分隔的字符串
                $arr['typeid']=implode(',',$arr['typeid']);
                //将格式时间转化为时间戳
                $arr['start_time']=strtotime($arr['start_time']);
                $arr['stop_time']=strtotime($arr['stop_time']);
                //写入数据
                $res = DB::table('movie')->insert($arr);
                if($res){
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

                    $home['movieList'] = $movieList;
                    $home['movieListSec'] = $movieListSec;
                    $home['movieComingList'] = $movieComingList;
                    $home['cinemaList'] = $cinemaList;

//                    dd($home);
                    Cache::forever('staticPageCache_home', $home);
                    return redirect('admin/movie')->with('msg','添加成功');
                }else{
                    return redirect('admin/movie')->with('msg','添加失败');
                }
            }
        }else{
            return redirect()->back()->with('msg','no poster');
        }

    }

    public function show($id)
    {

    }

//修改电影页面
    public function edit($id)
    {
        $info = DB::table('movie')->where('movie_id',$id)->get();
        foreach($info as $k=>$v){
            //类型的id字符串
            $typeStr = $v->typeid;
            //类型id的数组
            $typeArr = explode(',',$typeStr);
            $info[$k]->type=$typeArr;
            //国家的id字符串
            $typeStr = $v->state;
            //国家id的数组
            $typeArr = explode(',',$typeStr);
            $info[$k]->state=$typeArr;
        }
        //所有type
        $type = DB::table('type')->where('display',1)->where('status',0)->get();
        //所有国家
        $state = DB::table('type')->where('display',1)->where('status',1)->get();
        //电影的type id数组 state id数组
        $movietypeidarr=$info[0]->type;
        $moviestateidarr=$info[0]->state;
        //////////////////////////////取出所有该电影有的类型信息
        $movietypearr = DB::table('type')->where('display',1)->whereIn('type_id',$movietypeidarr)->get();
        $moviestatearr = DB::table('type')->where('display',1)->whereIn('type_id',$moviestateidarr)->get();
        /////////////////////////////将所有类型中本电影已经有的删掉，剩下的都是这个电影没有的类型
        foreach($type as $k=>$v){
            foreach($movietypeidarr as $kk=>$vv){
                if($v->type_id == $vv){
                    unset($type[$k]);
                }
            }
        }
        foreach($type as $k=>$v){
            foreach($moviestateidarr as $kk=>$vv){
                if($v->type_id == $vv){
                    unset($state[$k]);
                }
            }
        }
//        dd($movietypearr)
//        foreach ($state as $k=>$v){
//            $my[$k] = $v->type_id;
//        }
        //此电影类型id数组
        $infotype = $info[0]->type;
        //此电影国家id属组
        $infostate = $info[0]->state;
        //dd($infostate);
        //显示页面
        return view('admin/movieedit',['id'=>$id,'state'=>$state,'type'=>$type,'movietypearr'=>$movietypearr,'moviestatearr'=>$moviestatearr,'info'=>$info[0],'infotype'=>$infotype,'infostate'=>$infostate,]);
    }






//修改电影操作
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required'=>'必须填写影片名',
            'director.required'=>'必须填写导演',
            'state.required'=>'必须填写国家',
            'star.required'=>'必须填写主演',
            'typeid.required'=>'必须填写类别',
            'description.required'=>'必须填写描述',
            'language.required'=>'必须填写语言',
            'duration.required'=>'必须填写时长',
            'start_time.required'=>'必须填写上映时间',
            'stop_time.required'=>'必须填写下档时间',
            'd3.required'=>'必须选择是否3D',
            'imax.required'=>'必须选择是否IMAX',
            'poster.required'=>'必须选择文件'
        ];
        $this->validate($request, [
            'name' => 'required',
            'director' => 'required',
            'star' => 'required',
            'state' => 'required',
            'typeid' => 'required',
            'description' => 'required',
            'language' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
            'stop_time' => 'required',
            'd3' => 'required',
            'imax' => 'required'
        ],$messages);

        $arr = $request->except('_token','_method','poster');
        $arr['description']=trim($arr['description']);

        $arr['state']=implode(',',$arr['state']);
        $arr['typeid']=implode(',',$arr['typeid']);
        $arr['start_time']=strtotime($arr['start_time']);
        $arr['stop_time']=strtotime($arr['stop_time']);

        if($request->hasFile('poster')){
            // 判断文件是否有效
            if ($request->file('poster')->isValid()) {
                //生成上传文件对象
                $file = $request->file('poster');
            }
            //获取源文件的后缀
            $ext = $file->getClientOriginalExtension();
            //生成一个新文件名
            $picname = time().rand(1000,9999).'.'.$ext;
            //移动文件
            $file->move('./upload/admin/', $picname);
            $arr['poster']=$picname;

            //获取旧文件名
            $poster = DB::table('movie')->where('movie_id',$id)->value('poster');
            //删除旧文件
        $a = Storage::delete('admin/'.$poster);
        }

        //修改数据库
        $res = DB::table('movie')->where('movie_id',$id)->update($arr);

        if($res){
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

            $home['movieList'] = $movieList;
            $home['movieListSec'] = $movieListSec;
            $home['movieComingList'] = $movieComingList;
            $home['cinemaList'] = $cinemaList;

//                    dd($home);
            Cache::forever('staticPageCache_home', $home);
            return redirect('admin/movie')->with('msg','修改成功');
        }else{
            return redirect('admin/movie')->with('msg','修改失败，内容没有改变');
        }
    }

    public function destroy($id)
    {
        $round = DB::table('round')->where('movie_id',$id)->get();
        if($round){
            return redirect('admin/movie')->with('msg', '有相关场次，不能删除电影');
        }else{
            $res = DB::table('movie')->where('movie_id',$id)->delete();
            if($res > 0){
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

                $home['movieList'] = $movieList;
                $home['movieListSec'] = $movieListSec;
                $home['movieComingList'] = $movieComingList;
                $home['cinemaList'] = $cinemaList;

//                    dd($home);
                Cache::forever('staticPageCache_home', $home);
                return redirect('admin/movie')->with('msg', '删除成功');
            }else{
                return redirect('admin/movie')->with('msg', '删除失败');
            }
        }

    }
}
