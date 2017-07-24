<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IdeaController extends Controller
{
    //wocaonimashujuku
    //用户反馈列表
    public function index(Request $request)
    {
//        $array_idea = array();
//        $idea = DB::table('idea')->join('user','idea.userid','=','user.user_id')->get();
//        foreach ($idea as $k=>$v){
//            foreach($v as $key=>$val){
//                $array_idea[$k][$key] = $val;
//            }
//        }
//
//
//        $array_toidea = array();
//        $toidea = DB::table('idea')
//            ->join('user','idea.userid','=','user.user_id')
//            ->join('ridea','ridea.toid','=','idea.idea_id')->get();
//        foreach ($toidea as $k=>$v){
//            foreach($v as $key=>$val){
//                $array_toidea[$k][$key] = $val;
//            }
//        }
//        $all = array_merge($array_toidea,$array_idea);
//        $all = array_diff($array_toidea,$all);
//        dd($all);
        //清除数组中的重复数据
//                    $id = array();
//                    foreach($all as $k=>$v){
//                        if(!in_array($v['idea_id'],$id)){
//                            array_push($id,$v['idea_id']);
//                        }else{
//                            unset($all[$k]);
//                        }
//                    }
        $idea = DB::table('idea')
            ->join('user','idea.userid','=','user.user_id')
            ->where('status',0)
            ->orderBy('zan','desc')
            ->get();
        return view('admin.idealist',['idea'=>$idea]);
    }

    public function edit($id)
    {
        $idea = DB::table('idea')->join('user','idea.userid','=','user.user_id')->where('idea_id',$id)->get();
        return view('admin.ridea',['idea'=>$idea[0],'toid'=>$id]);
    }

    public function update(Request $request, $id){
        //id是反馈人的id
        $arr = $request->except('_token','_method');
        $arr['admin_id']=Session::get('adminUser')->admin_id;
        $arr['time']=time();
        $arr['toid']=$id;
        DB::table('idea')->where('idea_id',$id)->update(['status'=>1]);
        if(DB::table('ridea')->insert($arr)){
            return redirect('admin/idea');
        }
    }
}
