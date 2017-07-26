@extends('home.parent')
@section('title', '影片评论')
@section('content')
    <link rel="stylesheet" href="{{ asset('home/Css/detail_new.css') }}"/>
    <style>
        .hide{
            display:none;
        }
        .show{
            display: block;
        }
    </style>


    <div class="wrap990">
        <section class="mv_info_box clearfix">
            <div id="share" class="share" >
                {{--<div class="share_inner">影片分享到<b></b>--}}
                    {{--<div class="shareDiv" id="shareDiv"></div>--}}
                {{--</div>--}}
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
        <article class="mv_body_990 clearfix mt10">
            <section class="mainContent">
                <div id="pq">
                    <ul class="mv_detail_tab" id="mvTabs">
                        <li rel="#part2"><a href="{{ url('/movie').'/'.$movieId }}">影院排期</a></li>
                        <li rel="#part1" id="commentTab" class="active"><a href="{{ url('/movieReply').'/'.$movieId }}">剧情影评</a></li>
                    </ul>
                </div>

                <div class="mv_comment_box" id="part1" style="display: block;">
                    <div class="mv_comm_plot">
                        <div class="title">
                            <h2>剧情简介：</h2>
                        </div>
                        <p>{{ $movie->description }}</p>
                    </div>
                    <div class="mv_comm_short">
                        <div class="title clearfix">
                            <h2>影评</h2>
                            <span id="commCount_S" class="tip">（共 <em>{{ $count }}</em> 条）</span>
                            <a href="javascript:show();" id="writeScommt" class="btn_e34551 btn_89_29">发表新影评</a>
                        </div>

<div class="iDialogBody">
    <div class="iDialogMain" style="height: auto;">
        <div class="commDialog">
            <a href="javascript:hide();" class="close"></a>
            <ul id="typeTab" class="typeTab">
                <li class="active" rel="#commDialog_S">发表新影评</li>
            </ul>
            <div id="commDialog_S" class="commDialog_S">
                <form action="{{ url('/home/doReply/').'/'.$movieId }}" method="post">
                    {{ csrf_field() }}
                    选择评分
                    <input type="radio" name="star_level" value="1">1分
                    <input type="radio" name="star_level" value="2">2分
                    <input type="radio" name="star_level" value="3">3分
                    <input type="radio" name="star_level" value="4">4分
                    <input type="radio" name="star_level" value="5">5分
                    <input type="radio" name="star_level" value="6">6分
                    <input type="radio" name="star_level" value="7">7分
                    <input type="radio" name="star_level" value="8">8分
                    <input type="radio" name="star_level" value="9">9分
                    <input type="radio" name="star_level" value="10">10分

                    <textarea class="comm_area textGray" rows="" cols="" name="content" maxlength="300" onkeyup="this.value = this.value.substring(0,300)"></textarea>
                    <div class="note">
                        <button><a class="sub">发表</a></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<Script>
    $('.iDialogBody').addClass('hide');
    function show(){
        $('.iDialogBody').removeClass('hide');
        $('.iDialogBody').addClass('show');
    }
    function hide(){
        $('.iDialogBody').removeClass('show');
        $('.iDialogBody').addClass('hide');
    }
</Script>
                        <dl class="list clearfix" id="sCommentList">
                            @foreach($coms as $v)
                            <dd sid="{{ $v->comment_id }}">
                                <div class="infor">
                                    <div class="name">
                                        {{ $v->name }}
                                    </div>
                                    <div class="time">{{ date('Y-m-d H:i:s',$v->time) }}</div>
                                </div>
                                <div class="detail">{{ $v->content }}</div>
                            </dd>
                                @endforeach
                        </dl>
                        
                        
                        <div class="no_short_warp" id="noShortPart">
                            <div class="no_short_box">
                                <b class="icon_no"></b>
                                <span class="text">
						<span class="h">还木有影评！你来说两句吧！</span>
				   </span>
                            </div>
                        </div>

                        <dl class="list clearfix" id="sCommentList">

                        </dl>
                        <div id="moreScommt" class="more hide">
                            <a href="javascript:;">再显示<em>20</em>条影评</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="siderBox">
                <dl class="sider_hot_box">
                    <dt class="title">正在热映</dt>
                    <dd>
                        <ul class="sider_hot_mv clearfix">
                            <li mid="48,542">
                                <div class="poster"><a href="/beijing/movie/48542.html#from=cinema.hot" target="_blank" title="神偷奶爸3">
                                        <i class="sanD"></i>
                                        <img src="http://pimg1.126.net/movie/product/movie/149672625572711549_70_93_webp.jpg" width="70" height="93" alt="神偷奶爸3"></a></div>
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
                            <li mid="48,620">
                                <div class="poster"><a href="/beijing/movie/48620.html#from=cinema.hot" target="_blank" title="绣春刀II：修罗战场">
                                        <img src="http://pimg1.126.net/movie/product/movie/149880944266310011_70_93_webp.jpg" width="70" height="93" alt="绣春刀II：修罗战场"></a></div>
                                <dl>
                                    <dt>
                                    <h2><a href="/beijing/movie/48620.html#from=cinema.hot" target="_blank" title="绣春刀II：修罗战场">绣春刀II：修罗战场</a></h2>
                                    </dt>
                                    <dd class="mv_star">
                                        <span class="star_bg_s"><div style="width:70%" class="star_s"></div></span>
                                    </dd>
                                    <dd class="summary" title="一个黑暗年代的锦衣卫特工">一个黑暗年代的锦衣卫特工</dd>
                                    <dd class="des" title="张震 杨幂 张译 雷佳音">主演：张震 杨幂 张译 雷佳音</dd>
                                </dl>
                            </li>
                            <li mid="48,488">
                                <div class="poster"><a href="/beijing/movie/48488.html#from=cinema.hot" target="_blank" title="悟空传">
                                        <img src="http://pimg1.126.net/movie/product/movie/149491065767611038_70_93_webp.jpg" width="70" height="93" alt="悟空传"></a></div>
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
                            <li mid="48,585">
                                <div class="poster"><a href="/beijing/movie/48585.html#from=cinema.hot" target="_blank" title="闪光少女">
                                        <img src="http://pimg1.126.net/movie/product/movie/149846584412012007_70_93_webp.jpg" width="70" height="93" alt="闪光少女"></a></div>
                                <dl>
                                    <dt>
                                    <h2><a href="/beijing/movie/48585.html#from=cinema.hot" target="_blank" title="闪光少女">闪光少女</a></h2>
                                    </dt>
                                    <dd class="mv_star">
                                        <span class="star_bg_s"><div style="width:70%" class="star_s"></div></span>
                                    </dd>
                                    <dd class="summary" title="不一样，又怎样">不一样，又怎样</dd>
                                    <dd class="des" title="徐璐 彭昱畅 刘泳希 骆明劼">主演：徐璐 彭昱畅 刘泳希 骆明劼</dd>
                                </dl>
                            </li>
                            <li mid="48,494">
                                <div class="poster"><a href="/beijing/movie/48494.html#from=cinema.hot" target="_blank" title="父子雄兵">
                                        <img src="http://pimg1.126.net/movie/product/movie/149491274945511180_70_93_webp.jpg" width="70" height="93" alt="父子雄兵"></a></div>
                                <dl>
                                    <dt>
                                    <h2><a href="/beijing/movie/48494.html#from=cinema.hot" target="_blank" title="父子雄兵">父子雄兵</a></h2>
                                    </dt>
                                    <dd class="mv_star">
                                        <span class="star_bg_s"><div style="width:70%" class="star_s"></div></span>
                                    </dd>
                                    <dd class="summary" title="啼笑皆非生死考验消隔阂">啼笑皆非生死考验消隔阂</dd>
                                    <dd class="des" title="大鹏 范伟 张天爱 乔杉 邬君梅 任达华 梁龙 马书良">主演：大鹏 范伟 张天爱 乔杉 邬君梅 任达华 梁龙 马书良</dd>
                                </dl>
                            </li>
                            <li mid="48,489">
                                <div class="poster"><a href="/beijing/movie/48489.html#from=cinema.hot" target="_blank" title="大护法">
                                        <img src="http://pimg1.126.net/movie/product/movie/149491098489911051_70_93_webp.jpg" width="70" height="93" alt="大护法"></a></div>
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
                        </ul>
                    </dd>
                </dl>
            </section>
    </article>
</div>

@endsection