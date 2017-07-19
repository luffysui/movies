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

});

//前台修改城市
Route::get('/changeCity/{cityId}', 'Home\IndexController@changeCity');
