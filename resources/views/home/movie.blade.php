@extends('home.parent')
@section('title', '影院地图')
@section('content')
<link rel="stylesheet" href="{{ asset('/home/Css/detail_new.css') }}"/>


<div class="wrap990">
    <section class="mv_info_box clearfix">
        {{--<div id="share" class="share" >--}}
        	{{--<div class="share_inner">影片分享到<b></b>--}}
        		{{--<div class="shareDiv" id="shareDiv"></div>--}}
            {{--</div>--}}
        {{--</div>--}}

    	<div class="poster">
                {{--<i class="sanD"></i>--}}
        	<img src="{{ asset('/upload/admin/'.$movie->poster) }}" width="200" height="267"/>
        </div>
        <dl class="mv_info">
        	<dt class="overflow">
            	<span class="mv_name"><h2 >{{ $movie->name }}</h2></span>
	                <span class="star_bg ml10">
	                    <div class="star" style="width:{{ $movie->score*10 }}%"></div>
	                </span>
                    <span class="score_big">{{ $movie->score }}</span>

            </dt>
            <dd class="summary">{{ $movie->description }}</dd>
            <dd class="des">上映：<em class="">{{ $movie->start_time }}</em></dd>
            <dd class="des">导演：{{ $movie->director }}</dd>
            <dd class="des role" id="role">
	            <span style="float:left;">主演：</span>
		            <div class="role_list" id="roleList">
			            	<span>{{ $movie->star }}</span>

		            </div>
            </dd>
            <dd class="other">@if($movie->d3)<span>3D</span>@endif<span>{{ $movie->duration }}</span>
            </dd>
        </dl>
        <script>
			Core.movieId = 48542;
		 </script>
    </section>
    <article  class="mv_body_990 clearfix mt10">
    	<section class="mainContent">
				<div id="pq">
					<ul class="mv_detail_tab" id="mvTabs">
						<li rel="#part2" class="active"><a href="{{ url('/movie').'/'.$movieId }}">影院排期</a></li>
						<li rel="#part1" id="commentTab"><a href="{{ url('/movieReply').'/'.$movieId }}">剧情影评</a></li>
					</ul>
				</div>

	            <div class="mv_comment_box" id="part1" style="display:none;">
				</div>
	          	<div id="part2">

     	        <div class="movieTabC pos_r movieTabC_in clearfix">

	        </div>



<div class="movieTabC"  id="dateContent">

    <div class="movieTabC_in">

     </div>


<div id="areaContent" style="zoom:1;">
    <div class="movieTabC_in" style="padding-bottom:19px;">

    </div>

    <div id="cinemaContent" class="mv_cinema_sch">
        {{--第一个影院--}}
		@if($cinema == null)
			@else
        <div class="orangeLine" id="ticketHead">
            <h3><a><strong>{{ $cinema->cinema_name }}</strong></a>
                	<span class="score" style="vertical-align:middle;">8.<em class="s">6</em></span>
                <span class="icon_z"  ></span>
                <span class="icon_q"  ></span>
                <span class="icon_t" style="display:none;" ></span>
                <span class="mtype_imax" style="display:none;"></span>
            </h3>
            <div class="add">地址：{{ $cinema->cinema_address }}
                <a  title="查看地图" ></a>
            </div>
        </div>
		@endif
        {{--第一个影院--}}



<div class="tab_border_bottom"></div>
<div class="movie_s_cont" id="subPart1"  style="display:block;" >
			    <table class="cinemaAdd" width="100%" id="cnTbl">


                    @if(!$roundList)
                        <div class="c_price"><span><em>《{{ $movie->name }}》没有场次</em></span></div>
                    @else
                        <thead>
                        <tr>
                            <th width="18%">放映时间</th>
                            <th width="10%">
			                <span class="copy" id="dmspan">版本
			                    <ul class="sel_copy" id="dmFilter">
			                        <li><a href="javascript:;"><span class="mtype_imax"></span></a></li>
			                        <li><a href="javascript:;"><span class="mtype mtype_2d"></span></a></li>
			                        <li><a href="javascript:;"><span class="mtype mtype_3d"></span></a></li>
			                        <li><a href="javascript:;"><span class="mtype mtype_4d"></span></a></li>
			                        <li><a href="javascript:;"><span class="mtype mtype_num"></span></a></li>
			                        <li><a href="javascript:;"><span class="mtype mtype_jp"></span></a></li>
			                    </ul>
			                </span></th>
                            <th width="14%">语言</th>
                            <th width="17%">放映厅</th>
                            {{--<th width="10%">选座预览</th>--}}
                            <th width="16%">原价/优惠价</th>
                            <th width="15%">选座购票</th>
                        </tr>
                        </thead><tbody id="movieTbody" class="movieTbodyAct">
                    @foreach($roundList as $v)

			                     <tr dm="3D" >
			                        <td class="time">{{ date('Y-m-d H:i:s',$v->starttime) }}<br /><span class="time_end">{{ date('Y-m-d H:i:s',$v->overtime) }}</span></td>
			                        <td>@if($v->imax)
                                            IMAX
                                        @elseif($movie->d3)
                                        3D
                                        @endif
			                        </td>

			                        <td>{{ $movie->language }}</td>
			                        <td>{{ $v->roomName}}</td>

                                    <td>¥<em class="old">{{ $v->oprice/100 }}</em><em class="fav ml10"><i>¥</i>{{ $v->nprice/100 }}</em></td>
			                        <td>
			                                <a href="{{ url('order/'.$v->round_id) }}" class="btn_e34551 btn_89_29"  rBtn="buy">选座购票</a>
			                        </td>
			                    </tr>
                    @endforeach

                    @endif




	                            	{{--<tr class="evening_sch">--}}
	                                	{{--<td colspan="7"><b></b>夜场</td>--}}
	                                {{--</tr>--}}

			        </tbody>
			    </table>
</div>
{{--影院列表--}}
@foreach($cinemaList as $v )
        <div class="orangeLine" id="ticketHead">
            <h3><a href="{{ url('/movie/'.$movie->movie_id.'/'.$v->cinema_id) }}" id="ticketCinemaName"><strong>{{ $v->cinema_name }}</strong></a>
                <span class="score" style="vertical-align:middle;">{{ $v->cinema_score }}</span>
                <span class="icon_z"></span>
                <span class="icon_q"></span>
                <span class="icon_t" style="display:none;"></span>
                <span class="mtype_imax" style="display:none;"></span>
            </h3>
            <div class="add">地址：{{ $v->cinema_address }}
                <a href="javascript:;" id="3031" title="查看地图" onclick="Core.cinemaMapDialog(this.id);"></a>
            </div>
        </div>
        <hr>
@endforeach
{{--影院列表--}}


<div id="subPart2" class="movie_s_cont"  >
</div>
<script type="text/javascript">
	(function(window,$){
		if(Core.isInFrame){
			//邮箱应用链接增加前缀
			var len=$("#cinemaContent").find("a[rBtn]").length;
			var rBtn=$("a[rBtn]");
			$("#cinemaContent").find(".groupBtn").attr("target","_blank");//特惠新窗口跳到主站
			for(var i=0;i<len;i++){
				$(rBtn[i]).attr("href","/mailapp"+$(rBtn[i]).attr("href").replace("http://piao.163.com", ""));
			}
		}
	})(window,jQuery);
</script>    </div>
    <script type="text/javascript">
		//126邮箱应用没有影院相关页面，删除链接
		(function(window,$){
			if(Core.isInFrame){
				//邮箱应用链接增加前缀
				$("#ticketCinemaName").attr("href","javascript:;").css({"cursor":"default","text-decoration":"none"});
			}
		})(window,jQuery);
	</script>
</div>
</div>    		            </div>

        </section>
        <section class="siderBox">
            <dl class="sider_hot_box">
            	<dt class="title">正在热映</dt>
                <dd>
                    <ul class="sider_hot_mv clearfix" >
@foreach($movieList as $v)
	 <li mid="48,542">
		<div class="poster">
            <a href="{{ url('movie').'/'.$v->movie_id }}" target="_blank" >
				<em class="mvType mvType3d"></em>
		        <img src="{{ asset('upload/admin').'/'.$v->poster }}" width="70" height="93" />
            </a>
        </div>
		<dl>
			<dt>
				<h2><a href="" target="_blank">{{ $v->name }}</a></h2>
			</dt>
			<dd class="mv_star">
                <span class="star_bg_s">
                    <div style="width:{{ $v->score*10 }}%" class="star_s"></div>
                </span></dd>
			<dd class="summary">{{ $v->description }}</dd>
			<dd class="des">主演：{{ $v->star }}</dd>
		</dl>
	</li>
@endforeach

					</ul>
                </dd>
            </dl>
        </section>
    </article>
</div>
<form id="formTest" action="" method="get" target="_blank"></form>
<script>
    //用来计算评论时间
    Core.nowTime ='2017/07/19 11:41:54';
</script>
<script type="text/javascript" src="{{ asset('home/Scripts/e97c654c2f564150b740aa8f34593c9a.js') }}"></script>



@endsection