@extends('home.parent')
@section('title', '正在上映')
@section('content')
<div class="movieShow clearfix">
    <a class="fastBuyNav " id="" href="http://47.94.17.109/cinemalist"></a>
  <div class="showLeft">
      <h2 class="showTitle clearfix"><a class="on" href="javascript:;" style="font-size:30px;color:#000; ">正在热映</a><span class="fg">/</span><a href="{{ url('/upcoming') }}">即将上映</a></h2>
      <div class="showMain" id="playListBox">
        <div class="listSort"><span class="listSum">正在热映
      {{ $movieCount }}
      部</span>


          <a class="styleBtn styleBtn_lb_on" href="javascript:;"><i></i>列表</a>
      </div>

<div class="showList">

       @foreach( $movieList as $v)
      <ul class="movie_con">
          <li class="l1">
            <div class="showImg">
                @if( $v->d3)
                    <em class="mvType mvType3d"></em>
                @endif

             <a href="{{ url('/movie/'.$v->movie_id)}}" title="{{ $v->name }}" target="_blank"><img src="{{ asset('upload/admin').'/'.$v->poster }}" alt="{{ $v->name }}" width="220" height="300"/></a>
            </div>
          </li>

          <li class="l2">
            <h3><a href="{{ url('/movie/'.$v->movie_id)}}" title="{{ $v->name }}" target="_blank">{{ $v->name }}</a>

             <span class="star_bg ml20"><b class="star" style="width:{{ ($v->score)*10 }}%"></b></span>
             <em>{{ $v->score }}</em>

            </h3>
            <p class="p1">{{ $v->description }}</p>
            <p class="p2">上映：{{ date('Y年m月d日',$v->start_time) }}</p>
            <p class="p2">导演：{{ $v->director }}</p>
            <p class="p2">主演：{{ $v->star }}  </p>
            <p class="p3">
                @if($v->d3)
                <span>3D</span>
                @endif
                @if($v->imax)
                    <span>IMAX</span>
                @endif
            <span>
            {{ $v->stateName }}</span>
            <span>{{ $v->typeName }}</span>
            <span>{{ floor($v->duration/60)}}小时{{  ($v->duration)%60  }}分钟</span>
            </p>
          </li>

          <li class="l3">
                  <div class="res">
                    <p class="price">
                          @if(isset ($v->min))
                                            {{ ($v->min)/100 }}<i>元起</i>
                                        @else
                                            <i> 暂无排期</i>
                          @endif

                        </p>
                    <a href="{{ url('/movie/'.$v->movie_id)}}" class="showBtn" target="_blank">选座购票</a>
                  </div>
          </li>
      </ul>
      @endforeach
</div>
          <style>
              .showList{
                  padding-bottom: 0;
              }
              .pagination li{

                  font-size: 20px;
                  float: left;
                  line-height:30px;
                  padding: 20px;
              }
              .paginate li a{
                  padding:10px;

              }
              .disabled{
                  background-color: #ffffff;
              }
              .active{
                  color:#E55862;
              }
          </style>
          {!! $movieList->render() !!}


      </div>
  </div>
    <div class="showRight">
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
        {{--<div class="mt15" style="text-overflow: ellipsis;white-space: nowrap;">--}}
                {{--<h2 class="colTitle"><span class="colText">热映排行榜</span></h2>--}}
                    {{--<ul  class="weeklyTop">--}}
                        {{--<li><em class="score fr">{{ $list[0]->score }}</em><b class="b0"></b><a href="{{ url('movie/'.$list[0]->movie_id) }}" target="_blank" title="">{{ $list[0]->name }}</a></li>--}}
                        {{--<li><em class="score fr">{{ $list[1]->score }}</em><b class="b1"></b><a href="{{ url('movie/'.$list[1]->movie_id) }}" target="_blank" title="">{{ $list[1]->name }}</a></li>--}}
                        {{--<li><em class="score fr">{{ $list[2]->score }}</em><b class="b2"></b><a href="{{ url('movie/'.$list[2]->movie_id) }}" target="_blank" title="">{{ $list[2]->name }}</a></li>--}}
                        {{--<li><em class="score fr">{{ $list[3]->score }}</em><b class="b3"></b><a href="{{ url('movie/'.$list[3]->movie_id) }}" target="_blank" title="">{{ $list[3]->name }}</a></li>--}}
                        {{--<li><em class="score fr">{{ $list[4]->score }}</em><b class="b4"></b><a href="{{ url('movie/'.$list[4]->movie_id) }}" target="_blank" title="">{{ $list[4]->name }}....</a></li>--}}

                    {{--</ul>--}}
        {{--</div>--}}
        <div class="mt15">
        </div>
    </div>
</div>



@endsection