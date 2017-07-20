@extends('home.parent')
@section('title', '影院地图')
@section('content')
<link rel="stylesheet" href="{{ asset('/home/Css/detail_new.css') }}"/>


<div class="wrap990">
    <section class="mv_info_box clearfix">
        <div id="share" class="share" >
        	<div class="share_inner">影片分享到<b></b>
        		<div class="shareDiv" id="shareDiv"></div>   
            </div> 
        </div>
        
    	<div class="poster">
                {{--<i class="sanD"></i>--}}
        	<img src="{{ asset('/upload/admin/'.$movie->poster) }}" width="200" height="267" alt="神偷奶爸3" />
        </div>
        <dl class="mv_info">
        	<dt class="overflow">
            	<span class="mv_name"><h2 >{{ $movie->name }}</h2></span>
	                <span class="star_bg ml10">
	                    <div class="star" style="width:75%"></div>                
	                </span>
                    <span class="score_big">7.<em class="s">5</em></span>
	            
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
						<li rel="#part2" class="active">影院排期</li>
						<li rel="#part1" id="commentTab">剧情影评</li>
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
            <h3><a href="/cinema/3031.html" id="ticketCinemaName"><strong>{{ $cinema->cinema_name }}</strong></a>
                	<span class="score" style="vertical-align:middle;">8.<em class="s">6</em></span>
                <span class="icon_z"  ></span>
                <span class="icon_q"  ></span>
                <span class="icon_t" style="display:none;" ></span>
                <span class="mtype_imax" style="display:none;"></span>
            </h3>
            <div class="add">地址：{{ $cinema->cinema_address }}
                <a href="javascript:;" id='3031' title="查看地图" onClick="Core.cinemaMapDialog(this.id);"></a>
            </div>
        </div>
		@endif
        {{--第一个影院--}}

    

<div class="tab_border_bottom"></div>
<div class="movie_s_cont" id="subPart1"  style="display:block;" >  
			    <table class="cinemaAdd" width="100%" id="cnTbl">


                    @if(!$roundList)
                        <div class="c_price"><span><em>{{ $movie->name }}没有场次</em></span></div>
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
                <span class="score" style="vertical-align:middle;">8.<em class="s">6</em></span>
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
							 <li mid="48,542">
								<div class="poster"><a href="/beijing/movie/48542.html#from=cinema.hot" target="_blank" title="神偷奶爸3">
										<em class="mvType mvType3d"></em>
						        <img src="Picture/149672625572711549_70_93_webp.jpg" width="70" height="93" alt="神偷奶爸3" /></a></div>
								<dl>
									<dt>
										<h2><a href="/beijing/movie/48542.html#from=cinema.hot" target="_blank" title="神偷奶爸3">神偷奶爸3</a></h2>
									</dt>
                                    <dd class="mv_star">
							                <span class="star_bg_s"><div style="width:75%" class="star_s"></div></span>
                                    </dd>
									<dd class="summary" title="小黄人激萌归来">小黄人激萌归来</dd>
									<dd class="des" title="史蒂夫·卡瑞尔 克里斯汀·韦格 崔·帕克 米兰达·卡斯格拉夫 拉塞尔·布兰德 迈克尔·贝亚蒂 达纳·盖尔 皮艾尔·柯芬 安迪·尼曼">主演：史蒂夫·卡瑞尔 克里斯汀·韦格 崔·帕克 米兰达·卡斯格拉夫 拉塞尔·布兰德 迈克尔·贝亚蒂 达纳·盖尔 皮艾尔·柯芬 安迪·尼曼</dd>   
								</dl>
							</li>
							 <li mid="48,488">
								<div class="poster"><a href="/beijing/movie/48488.html#from=cinema.hot" target="_blank" title="悟空传">
						        <img src="Picture/149491065767611038_70_93_webp.jpg" width="70" height="93" alt="悟空传" /></a></div>
								<dl>
									<dt>
										<h2><a href="/beijing/movie/48488.html#from=cinema.hot" target="_blank" title="悟空传">悟空传</a></h2>
									</dt>
                                    <dd class="mv_star">
							                <span class="star_bg_s"><div style="width:72%" class="star_s"></div></span>
                                    </dd>
									<dd class="summary" title="这是悟空的故事">这是悟空的故事</dd>
									<dd class="des" title="彭于晏 倪妮 欧豪 余文乐 郑爽 乔杉 杨迪 俞飞鸿">主演：彭于晏 倪妮 欧豪 余文乐 郑爽 乔杉 杨迪 俞飞鸿</dd>   
								</dl>
							</li>
							 <li mid="48,489">
								<div class="poster"><a href="/beijing/movie/48489.html#from=cinema.hot" target="_blank" title="大护法">
						        <img src="Picture/149491098489911051_70_93_webp.jpg" width="70" height="93" alt="大护法" /></a></div>
								<dl>
									<dt>
										<h2><a href="/beijing/movie/48489.html#from=cinema.hot" target="_blank" title="大护法">大护法</a></h2>
									</dt>
                                    <dd class="mv_star">
							                <span class="star_bg_s"><div style="width:70%" class="star_s"></div></span>
                                    </dd>
									<dd class="summary" title="感谢给我逆境的众生">感谢给我逆境的众生</dd>
									<dd class="des" title="无">主演：无</dd>   
								</dl>
							</li>
							 <li mid="42,221">
								<div class="poster"><a href="/beijing/movie/42221.html#from=cinema.hot" target="_blank" title="深夜食堂2">
						        <img src="Picture/1364354066017444317_70_93.jpg" width="70" height="93" alt="深夜食堂2" /></a></div>
								<dl>
									<dt>
										<h2><a href="/beijing/movie/42221.html#from=cinema.hot" target="_blank" title="深夜食堂2">深夜食堂2</a></h2>
									</dt>
                                    <dd class="mv_star">
							                <span class="star_bg_s"><div style="width:77%" class="star_s"></div></span>
                                    </dd>
									<dd class="summary" title="温情，感动，这是一部暖心的电影">温情，感动，这是一部暖心的电影</dd>
									<dd class="des" title="小林薰,安田成美,松重丰,光石研">主演：小林薰,安田成美,松重丰,光石研</dd>   
								</dl>
							</li>
							 <li mid="48,506">
								<div class="poster"><a href="/beijing/movie/48506.html#from=cinema.hot" target="_blank" title="冈仁波齐">
						        <img src="Picture/149560297663311311_70_93_webp.jpg" width="70" height="93" alt="冈仁波齐" /></a></div>
								<dl>
									<dt>
										<h2><a href="/beijing/movie/48506.html#from=cinema.hot" target="_blank" title="冈仁波齐">冈仁波齐</a></h2>
									</dt>
                                    <dd class="mv_star">
							                <span class="star_bg_s"><div style="width:75%" class="star_s"></div></span>
                                    </dd>
									<dd class="summary" title="我们都在朝圣的路上">我们都在朝圣的路上</dd>
									<dd class="des" title="杨培 尼玛扎堆 斯朗卓嘎 仁曲珍">主演：杨培 尼玛扎堆 斯朗卓嘎 仁曲珍</dd>   
								</dl>
							</li>
							 <li mid="48,522">
								<div class="poster"><a href="/beijing/movie/48522.html#from=cinema.hot" target="_blank" title="变形金刚5：最后的骑士">
						            <i class="imax"></i>
						        <img src="Picture/149577630154811512_70_93_webp.jpg" width="70" height="93" alt="变形金刚5：最后的骑士" /></a></div>
								<dl>
									<dt>
										<h2><a href="/beijing/movie/48522.html#from=cinema.hot" target="_blank" title="变形金刚5：最后的骑士">变形金刚5：最后的骑士</a></h2>
									</dt>
                                    <dd class="mv_star">
							                <span class="star_bg_s"><div style="width:80%" class="star_s"></div></span>
                                    </dd>
									<dd class="summary" title="擎天柱对战“宇宙大帝”">擎天柱对战“宇宙大帝”</dd>
									<dd class="des" title="马克·沃尔伯格 彼特·库伦 伊莎贝拉·莫奈 乔什·杜哈明 泰瑞斯·吉布森 安东尼·霍普金斯 劳拉·哈德克 约翰·古德曼 斯坦利·图齐 桑地亚哥·卡布瑞拉 吉尔·伯明翰 让·杜雅尔丹 渡边谦 约翰·迪·玛吉欧 弗兰克·维尔克 米彻·佩勒吉">主演：马克·沃尔伯格 彼特·库伦 伊莎贝拉·莫奈 乔什·杜哈明 泰瑞斯·吉布森 安东尼·霍普金斯 劳拉·哈德克 约翰·古德曼 斯坦利·图齐 桑地亚哥·卡布瑞拉 吉尔·伯明翰 让·杜雅尔丹 渡边谦 约翰·迪·玛吉欧 弗兰克·维尔克 米彻·佩勒吉</dd>   
								</dl>
							</li>
					</ul>	
                </dd>
            </dl>
        </section>
    </article>
</div>
<form id="formTest" action="http://www.baidu.com" method="get" target="_blank"></form>
<script>
    //用来计算评论时间
    Core.nowTime ='2017/07/19 11:41:54';
</script>
<script type="text/javascript" src="Scripts/e97c654c2f564150b740aa8f34593c9a.js"></script>



@endsection