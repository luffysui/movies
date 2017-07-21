<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
////前台登录路由
//Route::get('/', function () {
//    return view('welcome');
//});

//后台登录路由
Route::get('admin/login', 'Admin\LoginController@showLogin');
Route::post('admin/login', 'Admin\LoginController@doLogin');

//后台路由群组
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    //后台首页
    Route::get('/index', 'Admin\AdminController@index');
    //普通用户管理
    Route::resource('/user', 'Admin\UserController');
    //影片管理
    Route::resource('/movie', 'Admin\MovieController');
    //类型管理s
    Route::resource('/type', 'Admin\TypeController');
    //后台管理员管理
    Route::resource('/ad', 'Admin\AdController');
    //排期管理
    Route::resource('/round', 'Admin\RoundController');
    //影厅管理
    Route::resource('/room', 'Admin\RoomController');
    //订单管理
    Route::resource('/order', 'Admin\OrderController');
    //订单发送验证码
    Route::post('/order/send', 'Admin\OrderController@send');
    //影厅省份ajax
    Route::get('/roomajax', 'Admin\RoomAjaxController@index');
    //影厅ajax联动
    Route::post('/roomajax/post', 'Admin\RoomAjaxController@post');
    //影厅ajax搜索影院
    Route::get('/roomajax/cinema', 'Admin\RoomAjaxController@cinema');
    //影厅ajax查询
    Route::post('/roomajax/room', 'Admin\RoomAjaxController@room');
    //轮播管理
    Route::resource('/carousel', 'Admin\CarouselController');
    //退出登录
    Route::get('/logout', 'Admin\LoginController@logout');


    //影院管理
    Route::resource('/cinema', 'Admin\CinemaController');
    //榜单管理
    Route::resource('/list', 'Admin\ListController');

});

//获取所在城市的路由群组
Route::group(['middleware' => 'getCity'], function(){
    //前台首页
    Route::get('/', 'Home\IndexController@index');
    //正在热映影片
    Route::get('/onshow', 'Home\MovieListController@onshow');
    //即将上映影片
    Route::get('/upcoming', 'Home\MovieListController@upcoming');
    //影院列表页面
    Route::get('/cinemalist', 'Home\CinemaListController@index');
    //影院详情页面
    Route::get('/cinema/{cinemaId}', 'Home\CinemaController@index');
    //影片详情+影院详情页面---第一家影院
    Route::get('/movie/{movieId}', 'Home\MovieController@index');
    //影片详情+影院详情页面---不同影院
    Route::get('/movie/{movieId}/{cinemaId}', 'Home\MovieController@index');
    //展示下订单页面
    Route::get('/order/{roundId}', 'Home\OrderController@showRound');




    //影评页面
    Route::get('/movieReply/{movieId}','Home\MovieController@showreply');



});
//检查座位情况
Route::post('/check', 'Home\OrderController@checkOrder');

//前台修改城市
Route::get('/changeCity/{cityId}', 'Home\IndexController@changeCity');

//前台登陆
Route::get('/login','Home\LoginController@login');
Route::get('/login/{url}','Home\LoginController@login');
//注册
Route::get('/register','Home\LoginController@register');

        //找回密码界面
        Route::get('/forgetpwd','Home\LoginController@forgetpwd');
        //获取密保问题
        Route::get('/getquestion','Home\LoginController@getquestion');
        //取得答案是否正确
        Route::get('/getanswer','Home\LoginController@getanswer');
        //找回密码表单提交
        Route::post('/findpwd','Home\LoginController@findpwd');

//执行登陆
Route::post('/dologin','Home\LoginController@dologin');
//执行注册
Route::post('/doregister','Home\LoginController@doregister');
//验证码
Route::get('/vc','Home\LoginController@vc');
//前台中间件

Route::group(['prefix' => 'home', 'middleware' => 'home'], function(){
    //用户修改个人资料页面
    Route::get('/user','Home\UserController@index');
    //修稿用户资料操作
    Route::post('/userpost','Home\UserController@userpost');
    //提交评论
    Route::post('/doReply/{movieId}','Home\MovieController@doreply');
    //退出登陆
    Route::get('/outlogin','Home\LoginController@outlogin');
    //用户订单页面
    Route::get('user/order','Home\OrderController@userIndex');
    //用户申请退款操作
    Route::get('user/order/refund/{orderId}','Home\OrderController@userRefund');
    //处理订单
    Route::post('/doorder','Home\OrderController@doOrder');
    //前台用户发送券码
    Route::get('/dosend/{orderId}','Home\OrderController@doSend');
});