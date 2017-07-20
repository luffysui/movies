<?php
namespace App\Http\Middleware;

use Closure;
use DB;
use Cookie;

class GetCityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(isset($_COOKIE['cityId'])){
            return $next($request);
        }else{
            $ip= $_SERVER["REMOTE_ADDR"];
            $url = 'http://api.map.baidu.com/location/ip?ak=fh6jnG5ZP7soYck3vWuxqPeQLFH8LYjt&coor=bd09ll&ip='.$ip;
//            $url = 'http://api.map.baidu.com/location/ip?ak=fh6jnG5ZP7soYck3vWuxqPeQLFH8LYjt&coor=bd09ll&ip=13.124.88.106';
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
            $city_Id = $cityId;
            $request->attributes->add(compact('city_Id'));
            return $next($request);
        }

    }

}
