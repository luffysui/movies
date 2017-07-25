@extends('home.parent')
@section('title', '悦影')
@section('content')
 <div class="photo_box">
        <script>Core.autoBanner=true;</script>
        <a class="photo_big_bar photo_big_left"><b style="display: inline;"></b></a>
        <a class="photo_big_bar photo_big_right"><b style="display: block;"></b></a>
    <div class="photo_b_box">
        <ul class="photo_b_list ">
            @foreach($car as $v)
                <li  style="background-image: url('{{ asset('upload/carousel').'/'.$v->photo }}');background-size:1500px 500px;background-color: #070709;">
                    <a href="{{ url('movie').'/'.$v->movie_id }}" target="_blank"></a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<section class="bodyMain mainCont1">
<a class="fastBuyNav " id="" href="{{ url('/cinemalist')}}"></a>
    <section class="mainCont clearfix">
            <div class="mainLeft">
                <h2 class="colTitle">
                    <span class="colText">热映电影推荐</span>
                    {{--<span class="colTip">北京共有25部热映电影，104家影院支持购票</span>--}}
                    <a href="{{ url('/onshow')}}" rel="nofollow" target="_blank" class="colMore">全部热映电影&gt;</a>
                </h2>
                <div class="hotMovie clearfix">
                    <ul class="movie_con" >
                        <li class="l1">
                            <div class="showImg">
                                @if( $home['movieList'][0]->d3)
                                    <em class="mvType mvType3d"></em>
                                @endif
                                <a target="_blank" title="{{ $home['movieList'][0]->name }}" href="/beijing/movie/48488.html" rel="nofollow"><img width="220" height="300" alt="{{ $home['movieList'][0]->name }}" src="{{ asset('upload/admin').'/'.$home['movieList'][0]->poster }}"></a>
                            </div>
                        </li>
                        <li class="l2"  >
                            <h3>
                                <a target="_blank" title="{{ $home['movieList'][0]->name }}" href="/beijing/movie/48488.html" rel="nofollow">{{ $home['movieList'][0]->name }}</a>
                            </h3>
                            <p class="p2">
                                <span class="star_bg"><b style="width:72%" class="star"></b></span>
                                <em>7.2</em>
                            </p>
                            <p class="p2">{{ date('m',$home['movieList'][0]->start_time) }}月{{ date('d',$home['movieList'][0]->start_time) }}日上映</p>
                            <p class="p2" style="font-size:12px;">{{ $home['movieList'][0]->description }}</p>

                            <span class="lowPrice">
                            @if(isset ($home['movieList'][0]->min))
                                {{ $home['movieList'][0]->min }}<i>元起</i>
                            @else
                                <i> 暂无排期</i>
                            @endif</span>
                            <a target="_blank" class="showBtn" href="{{ url('/movie/'.$home['movieList'][0]->movie_id)}}" rel="nofollow">选座购票</a>
                        </li>
                    </ul>
                    <ul class="movie_con"  style="width:452px;">
                        <li class="l1">
                            <div class="showImg">
                                @if( $home['movieList'][1]->d3)
                                <em class="mvType mvType3d"></em>
                                @endif
                                <a target="_blank" title="{{ $home['movieList'][1]->name }}" href="/beijing/movie/48542.html" rel="nofollow"><img width="220" height="300" alt="{{ $home['movieList'][1]->name }}" src="{{ asset('upload/admin').'/'.$home['movieList'][1]->poster }}"></a>
                            </div>
                        </li>
                        <li class="l2"  style="width:212px;padding-right:0;" >
                            <h3>
                                <a target="_blank" title="{{ $home['movieList'][1]->name }}" href="/beijing/movie/48542.html" rel="nofollow">{{ $home['movieList'][1]->name }}</a>
                            </h3>
                            <p class="p2">
                                <span class="star_bg"><b style="width:75%" class="star"></b></span>
                                <em>7.5</em>
                            </p>
                            <p class="p2">{{ date('m',$home['movieList'][1]->start_time) }}月{{ date('d',$home['movieList'][1]->start_time) }}日上映</p>
                            <p class="p2" style="font-size:12px;">{{ $home['movieList'][1]->description }}</p>

                            <span class="lowPrice">
                            @if(isset ($home['movieList'][0]->min))
                                {{ $home['movieList'][0]->min }}<i>元起</i>
                            @else
                               <i> 暂无排期</i>
                            @endif</span>
                            <a target="_blank" class="showBtn" href="{{ url('/movie/'.$home['movieList'][1]->movie_id)}}" rel="nofollow">选座购票</a>
                        </li>
                    </ul>
                </div>
                <div class="hotMovie2 clearfix">
                    <ul class="posterStyle clearfix">
                        @foreach($home['movieListSec'] as $v)
                        <li>
                            <div class="showImg">
                                @if( $home['movieListSec'][1]->d3)
                                    <em class="mvType mvType3d"></em>
                                @endif
                                <a target="_blank" title="{{ $v->name }}" href="{{ url('/movie/'.$v->movie_id)}}" rel="nofollow"><img width="220" height="300" alt="{{ $v->name }}" src="{{ asset('upload/admin').'/'.$v->poster }}"></a>
                            </div>
                            <div class="m_con"><div class="cName"><strong>{{ $v->name }} </strong></div>
                                <em>7.0</em>
                                    <strong>
                                    @if(isset ($v->min))
                                            {{ $v->min }}<i>元起</i>
                                        @else
                                            <i>暂无排期</i>
                                        @endif
                                    </strong>
                            </div>
                            <p>
                                    <a target="_blank" class="showBtn" href="{{ url('/movie/'.$v->movie_id)}}" rel="nofollow">选座购票</a>
                            </p>
                        </li>
                        @endforeach

                   </ul>
                </div>
            </div>

            <div class="mainRight">
<div class="side1">
    <div class="side1Client"></div>
    <dl class="side1Pro">
        <dt>购票流程</dt>
        <dd><b class="b1"></b>1.选择影院和场次</dd>
        <dd><b class="b2"></b>2.在线选座位并支付</dd>
        <dd><b class="b3"></b>3.短信获取取票码</dd>
        <dd><b class="b4"></b>4.凭码自助取票</dd>
    </dl>
</div>
            </div>
    </section>
    <section class="mainCont clearfix mt15">
        <div class="mainLeft upIndex">
            <h2 class="showTitle clearfix">
                <a href="{{ url('/upcoming')}}" rel="nofollow" class="colMore" target="_blank">全部即将上映电影&gt;</a>
                <a href="javascript:;" class="upMovieTab" rel="upMovie2">即将上映</a>
            </h2>

            <div class="upMovie" id="upMovie1">
                <ul class="posterStyle clearfix">
                    @foreach( $home['movieComingList'] as $v)
                    <li>
                        <i class="dot"></i>
                        <div class="wantNum">{{ date('m',$v->start_time) }}月{{ date('d',$v->start_time) }}日上映</div>
                        <div class="showImg">
                            @if( $home['movieList'][1]->d3)
                                <em class="mvType mvType3d"></em>
                            @endif
                            <a target="_blank" title="{{ $v->name }}" href="{{ url('/movie/'.$v->movie_id)}}" rel="nofollow"><img width="220" height="300" alt="{{ $v->name }}" src="{{ asset('upload/admin').'/'.$v->poster }}"></a>
                        </div>
                        <div class="title">
                            <span class="playTime2">{{ date('m',$v->start_time) }}月{{ date('d',$v->start_time) }}日上映</span>
                            <p class="t1">
                                <a target="_blank" title="{{ $v->name }}" href="{{ url('/movie/'.$v->movie_id)}}" rel="nofollow">{{ $v->name }}</a>
                            </p>
                        </div>
                        <p>
                        <b  class="showBtn " >想看</b></p>
                    </li>
                    @endforeach
                </ul>

            </div>

        </div>
        <div class="mainRight" style="">
            <h2 class="colTitle"><span class="colText">广告位</span></h2>
            <div class="followMe">
                <a href="#" target="_blank" class="followTitle">广告微博</a>
                <span class="followBtn"><wb:follow-button uid="3084971975" type="red_1" width="67" height="24"></wb:follow-button></span>
            </div>
        </div>

    </section>
    <section class="mainCont clearfix mt15">
        <div class="mainLeft" style="height:556px;">
            <h2 class="colTitle"><span class="colText">热门影院</span><a class="colMore" target="_blank" href=" /cinemalist " rel="nofollow">全部影院&gt;</a></h2>
            <ul class="hotCinema">
                @foreach( $home['cinemaList'] as $v)
                <li >
                    <a href="{{ url('/cinema/'.$v->cinema_id)}}l" rel="nofollow" class="showBtn btnView" target="_blank">查看</a>
                    <span class="lowPrice">
                            @if(isset ($v->min))
                                {{ $v->min }}<i>元起</i>
                            @else
                                <i>暂无排期</i>
                            @endif
                    <i>元起</i></span>
                    <div class="cName"><a href="{{ url('/cinema/'.$v->cinema_id)}}" target="_blank">{{ $v->cinema_name }}</a>
                        <em class="score ml20">{{ $v->cinema_score }}</em><em class="icon_z ml10">座</em><em class="icon_q ml10">券</em>
                    </div>
                    <div class="cAdd"><b></b>地址：{{ $v->cinema_address }}电话：{{ $v->cinema_phone }}</div>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="mainRight">
            <h2 class="colTitle"><span class="colText">关注我们</span></h2>
            <div class="followMe">
                <a href="#" target="_blank" class="followTitle">官方微博</a>
                <span class="followBtn"><wb:follow-button uid="3084971975" type="red_1" width="67" height="24"></wb:follow-button></span>
            </div>
        </div>
    </section>
    <section class="mainCont clearfix mt15">
        <dl class="partner">
            <dt>智能挑选价最低</dt>
            <dd>
                <img src="{{ asset('home/Picture/logo_1.jpg') }}" width="128" height="48" alt="">
                <img src="{{ asset('home/Picture/logo_2.jpg') }}" width="128" height="48" alt="">
                <img src="{{ asset('home/Picture/logo_3.jpg') }}" width="128" height="48" alt="">
                <img src="{{ asset('home/Picture/logo_4.jpg') }}" width="128" height="48" alt="">
                <img src="{{ asset('home/Picture/logo_5.jpg') }}" width="128" height="48" alt="">
                <img src="{{ asset('home/Picture/logo_6.jpg') }}" width="128" height="48" alt="">
            </dd>
        </dl>
    </section>
</section>
    @endsection