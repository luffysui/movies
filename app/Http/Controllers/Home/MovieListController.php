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
        //定位城市id
        if(isset($_COOKIE['cityId'])){
            $cityId = $_COOKIE['cityId'];
        }else{
            $ip= $_SERVER["REMOTE_ADDR"];
            $url = 'http://api.map.baidu.com/location/ip?ak=fh6jnG5ZP7soYck3vWuxqPeQLFH8LYjt&coor=bd09ll&ip='.$ip;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//将返回结果进行转换
            $res = curl_exec($ch);//发送请求
            $res = json_decode($res);
            if($res->status){
                $cityId =131;
            }else{
                $cityId = $res->content->address_detail->city_code;
            }
            setcookie('cityId',$cityId,time()+7*24*60*60);
        }

        $cityCode = DB::table('region')->where('city_id',$cityId)->value('region_code');
        $regionCode = DB::table('region')->where('father_id',$cityCode)->lists('region_code');
        $cinemaList = DB::table('cinema')->whereIn('region_code',$regionCode)->get();
        $movieList = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                    ->orderBy('start_time','desc')
                    ->paginate(10);
        $movieCount = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())->count();
        $list = DB::table('movie')->where('start_time','<',time())->where('stop_time','>',time())
                    ->orderBy('score','desc')
                    ->paginate(10);
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
