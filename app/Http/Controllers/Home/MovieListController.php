<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class MovieListController extends Controller
{
    public function onshow()
    {
        $movieList = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                    ->orderBy('start_time','desc')
                    ->paginate(10);

        foreach($movieList as $k=>$v){
            //类型查询
            $typeId = $v->typeid;
            $typeIdArr = explode(',',$typeId);
            $typeName = DB::table('type')->whereIn('type_id',$typeIdArr)->lists('name');
            $typeNameStr = implode('/',$typeName);
            $movieList[$k]->typeName = $typeNameStr;
            //国家查询
            $state = $v->state;
            $stateArr = explode(',',$state);
            $stateName = DB::table('type')->whereIn('type_id',$stateArr)->lists('name');
            $stateNameStr = implode('/',$stateName);
            $movieList[$k]->stateName = $stateNameStr;

        }
//        dd($movieList);
        return  view('home.onshow',['movieList'=>$movieList]);
    }

    public function upcoming()
    {
        return  view('home.upcoming');
    }
}
