@extends('home.parent')
@section('title', '影院详情')
@section('content')

<script language="JavaScript">
         function change(val,obj) {
             obj.style.backgroundColor="#E34551";
             if(val=='subPart1'){
                 subPart1.style.display='block';
                 subPart2.style.display='none';
             }else if(val=='subPart2'){
                 subPart1.style.display='none';
                 subPart2.style.display='block';
             }
         }
        function change2(val) {
            val.style.backgroundColor="silver";
        }
</script>

<div class="wrap cinema">
    <section class="box_gray cinemaInfo">
        <span class="title" cid="1448">
            <div class="mv_name" title=""><h1>{{ $cinema->cinema_name}}</h1><i class="icon_q"></i></div>
                <span class="star_bg">
                    <em class="star" style="width: 83%;"></em>
                </span>
                <span class="score_big">8.<em class="s">3</em></span>
                <a href="#none" class="collect" id="collect_cinema" rel="nofollow">收藏</a>
        </span>
            <a href="#none" class="feedback" id="feedback_cinema" rel="nofollow">影院信息纠错</a>
        <div class="details clearfix">
            <div class="poster"><img src="{{ asset('/home/Images/135350675516110095.jpg') }}" alt="{{ $cinema->cinema_name}}" title="{{ $cinema->cinema_name}}"></div>
            <dl>
                <dd class="des">{{ $cinema->cinema_address }}</dd>
                <dd class="des">{{ $cinema->cinema_phone}}</dd>
                <dd class="des traffic">
                    交通：<p title="{{ $cinema->cinema_travel }}"> {{ $cinema->cinema_travel }}</p>
                    <script>/* Code removed by ScrapBook */</script>
                </dd>
                <dd class="des more">
                    <span>更多信息：</span>
                        <a href="#pq" class="commentSub" title="影院介绍"><i></i><h2>影院介绍</h2></a>
                        <a href="#info2" class="commentSub" title="取票机信息"><i class="ticket"></i><h2>取票机信息</h2></a>
                        <a href="#info3" class="commentSub" title="特色信息"><i class="special"></i><h2>特色信息</h2></a>
                        <a href="#info5" class="commentSub" title="优惠信息"><i class="coupon"></i><h2>优惠信息</h2></a>
                </dd>
            </dl>

        </div>
    </section>


    <div class="docBody clearfix">
        <section id="mainContent" class="mainContent">
                <div class="groupCoupon" t="2" >
<!--                 <div class="c_detail_movie">
                      <div class="c_detail_title clearfix">
                          <h2><span class="fb">优惠信息</span></h2>
                      </div>
                 </div> -->
                    <div class="boxWrap clearfix">
<!--                         <div class="boxs box_gray">


                                <div class="box   box_noborderB  ">
                                    <i></i>
                                    <p class="title" title="2D票">
                                            2D票
                                                (90天)
                                            <span style="color: rgb(84, 84, 84); font-size: 12px;">¥<span style="text-decoration: line-through;">90 </span></span>
                                            <span style="font-size: 16px; color: rgb(227, 69, 81);">¥43.2</span>
                                            <span class="couponHelp" title="" partnerid="27" cid="1448"></span>
                                    </p>
                                    <span class="desc" title="购买前请点击黄色问号，阅读使用说明">
                                            购买前请点击黄色问号，阅读使用说明
                                            <a href="http://piao.163.com/order/buy_coupon.html?coupon_id=28008" class="btn" title="" target="_blank">购买</a>
                                    </span>
                                </div>


                                <div class="box  box_right box_noborderB  ">
                                    <i></i>
                                    <p class="title" title="3D票">
                                            3D票
                                                (90天)
                                            <span style="color: rgb(84, 84, 84); font-size: 12px;">¥<span style="text-decoration: line-through;">120&nbsp;</span></span><span style="font-size: 16px; color: rgb(227, 69, 81);">213</span><span style="font-size: 16px; color: rgb(227, 69, 81);"></span>
                                            <span class="couponHelp" title="" partnerid="27" cid="1448"></span>
                                    </p>
                                    <span class="desc" title="购买前请点击黄色问号，阅读使用说明">
                                            购买前请点击黄色问号，阅读使用说明
                                            <a href="http://piao.163.com/order/buy_coupon.html?coupon_id=28009" class="btn" title="" target="_blank">购买</a>
                                    </span>
                                </div>
                        </div> -->
                        <div class="couponIntro hide">
                            <p>使用说明：</p>
                            <ul>
                                <li class="first">部分电影或场次的放映类型为3D，请您购买时谨慎选择类型，避免错买或需要加价观影的情况发生</li>
                                <li>凭对应类型的兑换券，在有效期内观看影院对应类型（2D/3D/IMAX）的电影场次</li>
                                <li>支付成功后，凭手机接收的验证码短信，在影院前台选座出票</li>
                                    <li>应部分限价影片要求，兑票时需要补交几元差价，请以该影院具体公告为准</li>
                                <li>情人节、圣诞节、平安夜、VIP厅以及首映式等特殊场次的使用情况，请以该影院具体公告为准</li>
                            </ul>
                            <i></i>
                        </div>
                    </div>

                </div>
            <div class="box_gray seatArea">



<div id="pq" style="height: 42px;">
    <ul id="mvTabs" class="mv_detail_tab tab_fixed">
        <li class="active" rel="#subPart1" onmouseover="change('subPart1',this)" onmouseout="change2(this)">
            <h2> 热映电影</h2>
        </li>
        <li id="commentTab" onmouseover="change('subPart2',this)" onmouseout="change2(this)"><h2>影院详情</h2></li>
    </ul>
</div>
<div class="movieTabC pos_r " id="today">
    <div id="subPart1" style="display: block;">
            <div class="recentMovie">
<!--                 <div class="noTicket">
                    <i></i>
                    <p>影院暂未提供排期，可参考近期热映电影<br>更多详情可咨询影院</p>
                </div> -->
                <div class="c_detail_movie">
                      <div class="c_detail_title clearfix">
                          <h2><span class="fb">近期热映电影</span></h2>
                      </div>
                 </div>
                    @foreach($movie as $v )
                     <dl class="movie_detail clearfix ">
                        <dt>
                            <h2><a href="http://piao.163.com/beijing/movie/48542.html">{{ $v->name }} </a>
                                <span class="star_bg ml10">
                                    <div class="star" style="width: 75%;"></div>
                                </span>
                                <span class="score_big">7.<em class="s">5</em></span>
                            </h2>
                        </dt>
                        <div style="float: left;">
                            <img src="{{ asset('upload/admin').'/'.$v->poster }}" alt="{{ $v->name }}" width="100" height="150"/>
                        </div>
                       <div style="margin-left: 130px;margin-top: 30px;margin-right:20px;">
                            <div style="font-size:200px;"><dd class="summary">{{ $v->description }}</dd></div>
                            <dd class="des left">导演：{{ $v->director }}</dd>
                            <dd class="des">上映：{{ $v->start_time }}</dd>
                            <dd class="des left">主演： {{ $v->star }}</dd>

                            <dd class="des">类型：{{ $v->typeName }}</dd>

                        </div>
                    </dl>
                    @endforeach

            </div>
    </div>

<div id="subPart2" class="mv_comment_box" style="display: none;">

    <div class="mv_comm_plot mv_comm_plot_first" id="info1" >
        <div class="title">
            <strong>影院介绍：</strong>
        </div>
        <p>五星级数字影院——{{ $cinema->cinema_name}}位于在北京南城的南三环，{{ $cinema->cinema_name}}是继成功运营深圳、佛山、郑州、重庆等影城项目之后，在京建设的五星级影院旗舰店，也填补了北京影院发展不平衡的空白。&nbsp;{{ $cinema->cinema_name}}在2010年8月28日正式开业，“75231828”八位视听密码的开启环节是影城最大亮点，其中，“7”代表影城7个顶级的独立观影厅，可同时容纳近1500人观影；“5”是其南城首家五星级影院的象征；“2”彰显了影院作为{{ $cinema->cinema_name}}的重要地位；“3”则展示了保利影城紧邻南3环的便捷交通位置。</p>
    </div>
    <div class="mv_comm_plot" id="info2">
        <div class="title">
            <strong>取票机信息：</strong>
        </div>
        <p>大堂会员区内</p>
    </div>
    <div class="mv_comm_plot special" id="info3">
        <div class="title">
            <strong>特色信息：</strong>
        </div>
                <p class="p2"><b></b>3D眼镜：免押金</p>
                <p class="p5"><b></b>{{ $cinema->cinema_features}}</p>
    </div>
    <div class="mv_comm_plot" id="info4">
        <div class="title">
            <strong>交通信息：</strong>
        </div>
        <p>{{ $cinema->cinema_travel }}</p>
    </div>
    <div class="mv_comm_plot couponInfo" id="info5">
        <div class="title">
            <strong>优惠信息：</strong>
        </div>
        <div class="couponInfo">1：23周岁以下的学生、老年人、军人，持有效证件购买普通影片半价。3D影片特价。贵宾厅不参加此优惠。<br>2：每天12点之前、22点之后开始放映的电影，普通电影现金购票40元/张，3D电影现金购票60元张。<br>3：会员充值送可乐一杯。<br><br>会员政策：<br>8折银卡充值300元，有效期1年。<br>7折金卡充值500元，有效期1年，送电影票1张。<br>6折钻石卡充值1000元，有效期1年半，送电影票2张。<br>5折至尊算是卡3000元，有效期2年，送电影票4张。<br>注： 会员卡在正价票的基础上享受以上折扣。特价票不再享受相应的折扣。<br>特殊会员优惠（国家规定的节假日或部分特殊节日除外）
        </div>

    </div>
</div>

</div>




            </div>
        </section>
        <section class="siderBox ">
            <dl class="sider_hot box_gray">
                <dt class="titleLine"><h2>全部影院</h2></dt>
                <dd>
                @foreach ($cinemaList as $v)
                    <div class="sHotMovie">
                        <ul>
                                <li>
                                    <div class="name">
                                        <a href="http://piao.163.com/cinema/5621.html" title="北京马家堡影城">{{ $v->cinema_name}}</a>
                                            <span class="score_big"><em class="s">{{ $v->cinema_score}}</em></span>
                                    </div>
                                    <div class="add">地址：{{ $v->cinema_address }}</div>
                                    <div class="tel">电话：{{$v->cinema_phone }}</div>
                                </li>
                        </ul>
                    </div>
            @endforeach
                </dd>



            </dl>
        </section>
    </div>
    <section class="aboutBox ti mt10">
        悦影电影是一个能够让您在线购买电影票的在线选座平台，这里有{{ $cinema->cinema_name}}<span class="aLine">
            <a href="/onshow" class="seatSub" title="热映电影">热映电影</a>
            <i>、</i><a href="" class="commentSub" title="影院列表">影院详情</a>
            <i>、</i><a  class="commentSub" title="特色信息">特色信息</a>
            <i>、</i><a  class="commentSub" title="优惠信息">优惠信息</a>
            <i>、</i><a  class="commentSub" title="交通信息">交通信息</a>
        </span>
        等，便捷的购票系统，第一时间更新北京保利国际影城(首地大峡谷店)影讯、排期表、团购优惠券信息。
    </section>
        <section class="aboutBox mt10">
            <div class="relTitle">
                <!-- <a hidefocus="true" class="relCinemaBar" data-show="0"></a> -->相关影院：
            </div>
            <div class="relCinemaBox">
                <div class="relCinema">
                        <a href="#" target="_blank">广安门电影院</a>、
                        <a href="" target="_blank">北京市工人俱乐部</a>、
                        <a href="l# target="_blank">耀莱成龙国际影城(马连道店)</a>、
                        <a href="#" target="_blank">首都国际影城天桥店</a>、
                        <a href="#“ target="_blank">中华电影娱乐宫影城</a>、
                        <a href="#" target="_blank">博纳国际影城(方庄店)</a>、
                        <a href="#" target="_blank">繁星戏剧村</a>..
                        <a href="#" target="_blank">糖人街影院</a>、
                        <a href="#" target="_blank">大观楼影城</a>、
                        <a href="#" target="_blank">西单文化广场电影院</a>、
                        <a href="#" target="_blank">摩威秀影城</a>、
                        <a href="#" target="_blank">iMovie视听馆</a>、
                        <a href="#" target="_blank">星博正华影城</a>、
                        <a href="#" target="_blank">世茂国际影城(羊坊店路店)</a>、
                        <a href="#" target="_blank">首都电影院(西单店)</a>、
                        <a href="#" target="_blank">北京搜秀影城</a>、
                </div>
            </div>
        </section>
</div>





@endsection