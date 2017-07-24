<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class MovieListController extends Controller
{
    public function onshow(Request $request)
    {
        $movieList = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                    ->orderBy('start_time','desc')
                    ->paginate(10);
        $movieCount = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())->count();
        $list = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                    ->orderBy('score','desc')
                    ->paginate(10);
        // dd($movieList);
        // dd($min);
        foreach($movieList as $k=>$v){
            //类型查询
            $min = DB::table('round')->where('movie_id',$v->movie_id)->orderBy('nprice','asc')->value('nprice');
            $typeId = $v->typeid;
            $typeIdArr = explode(',',$typeId);
            $typeName = DB::table('type')->whereIn('type_id',$typeIdArr)->lists('name');
            $typeNameStr = implode('/',$typeName);
            $movieList[$k]->typeName = $typeNameStr;
            $movieList[$k]->min = $min;
            //国家查询
            $state = $v->state;
            $stateArr = explode(',',$state);
            $stateName = DB::table('type')->whereIn('type_id',$stateArr)->lists('name');
            $stateNameStr = implode('/',$stateName);
            $movieList[$k]->stateName = $stateNameStr;
            $movieList[$k]->min = $min;
        }
        // dd($movieList);
        return  view('home.onshow',['movieList'=>$movieList,'movieCount'=>$movieCount,'request'=>$request,'list'=>$list]);
    }

    public function upcoming(Request $request)
    {
        $movieList = DB::table('movie')->where('start_time','>',time())
            ->orderBy('start_time')
            ->paginate(10);
        $movieCount = DB::table('movie')->where('start_time','>',time())->count();
        $list = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
            ->orderBy('score','desc')
            ->paginate(10);

        foreach($movieList as $k=>$v){
            $min = DB::table('round')->where('movie_id',$v->movie_id)->orderBy('nprice','asc')->value('nprice');
            //类型查询
            $typeId = $v->typeid;
            $typeIdArr = explode(',',$typeId);
            $typeName = DB::table('type')->whereIn('type_id',$typeIdArr)->lists('name');
            $typeNameStr = implode('/',$typeName);
            $movieList[$k]->typeName = $typeNameStr;
            $movieList[$k]->min = $min;
            //国家查询
            $state = $v->state;
            $stateArr = explode(',',$state);
            $stateName = DB::table('type')->whereIn('type_id',$stateArr)->lists('name');
            $stateNameStr = implode('/',$stateName);
            $movieList[$k]->stateName = $stateNameStr;
            $movieList[$k]->min = $min;

        }
        return  view('home.upcoming',['movieList'=>$movieList,'movieCount'=>$movieCount,'request'=>$request,'list'=>$list]);
    }
}
