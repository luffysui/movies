@extends('home.parent')
@section('title', '影院地图')
@section('content')
<link rel="stylesheet" href="{{ asset('home/Css/cinemaselect/base.css') }}"/>
<link rel="stylesheet" href="{{ asset('home/Css/cinemaselect/core.css') }}"/>
<link rel="stylesheet" href="{{ asset('home/Css/cinemaselect/detail.css') }}"/>

<div class="wrap">

<ul class="cinemaList">

        @foreach( $list as $v)
        <li class="clearfix">
            <ol class="left">
                <li class="name"><a href="" target="_blank" class="cinema_name"><em>{{ $v->cinema_name }}</em></a></li>
                <li class="add" style="height: 25px;">详细地址：{{ $v->cinema_address }}
                    <a id="3031" class="mapIcon" title="查看地图"></a>

                </li>
                <li class="add">联系电话：{{ $v->cinema_phone }}</li>

            </ol>
            <ol class="right">
                    <li class="cinema_btn" rel="all">
                            <a href="{{ url('/cinema/'.$v->cinema_id) }}" class="btn_orange61 btn_orange76" target="_blank">购&nbsp;&nbsp;票</a>
                            <dl>
                                <b class="arr01"><b class="arr02"></b></b>
                                    <dd><a href="http://piao.163.com/cinema/3031.html?ticketType=0#pq=1&amp;from=searchout.cinema" target="_blank">在线选座</a></dd>
                                    <dd><a href="http://piao.163.com/cinema/3031.html?ticketType=1#pq=1&amp;from=searchout.cinema" target="_blank">购买兑换券</a></dd>
                            </dl>
                    </li>
            </ol>
        </li>
@endforeach
            <style>
                .pagination li{
                    font-size: 20px;
                    float: left;
                    line-height:30px;
                    padding-left: 20px;
                    height:10px;
                }

            </style>
            <div id="page" style="height:10px;">
                {!! $list->render() !!}

            </div>

</ul>
</div>
@endsection