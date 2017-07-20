<?php

namespace App\Http\Middleware;

use Closure;

class HomeMiddleware
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
        if(session()->has('homeuser')){
            return $next($request);
        }
//        dd($_SERVER['HTTP_REFERER']);
        $str = str_replace('/','_',$_SERVER['HTTP_REFERER']);
        $str = str_replace($_SERVER['HTTP_HOST'],'',$str);
        $str = str_replace('http:___','',$str);
//        dd($str);

        return redirect('/login/'.$str);
    }
}
