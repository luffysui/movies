@extends('home.parent')
@section('title', '影院详情')
@section('content')
    <style type="text/css">
        /* Code tidied up by ScrapBook */
        @keyframes loginPopAni {
            0% { opacity: 0; transform: scale(0); }
            15% { transform: scale(0.667); }
            25% { transform: scale(0.867); }
            40% { transform: scale(1); }
            55% { transform: scale(1.05); }
            70% { transform: scale(1.08); }
            85% { opacity: 1; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }
        @keyframes loginPopAni {
            0% { opacity: 0; transform: scale(0); }
            15% { transform: scale(0.667); }
            25% { transform: scale(0.867); }
            40% { transform: scale(1); }
            55% { transform: scale(1.05); }
            70% { transform: scale(1.08); }
            85% { opacity: 1; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>
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
    <section class="cinemaInfo">
        <span class="title" cid="1448">
            <div class="mv_name" title=""><h1>{{ $cinema->cinema_name}}</h1><i class="icon_q"></i></div>
                <span class="star_bg">
                    <em class="star" style="width: {{ $cinema->cinema_score*10 }}%;"></em>
                </span>
                <span class="score_big">{{ $cinema->cinema_score }}</span>
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

                    <div class="boxWrap clearfix">

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
                            <h2><a href="{{ url('/movie/'.$v->movie_id)}}">{{ $v->name }} </a>
                                <span class="star_bg ml10">
                                    <div class="star" style="width: {{ $v->score*10 }}%;"></div>
                                </span>
                                <span class="score_big">{{ $v->score }}</span>
                            </h2>
                        </dt>
                        <div style="float: left;">
                            <img src="{{ asset('upload/admin').'/'.$v->poster }}" alt="{{ $v->name }}" width="100" height="150"/>
                        </div>
                       <div style="margin-left: 130px;margin-top: 30px;margin-right:20px;">
                            <div style="font-size:200px;"><dd class="summary">{{ $v->description }}</dd></div>
                            <dd class="des left">导演：{{ $v->director }}</dd>
                            <dd class="des">上映：{{ date('m-d',$v->start_time) }}</dd>
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
        <p>{{ $cinema->cinema_desc }}</p>
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
        <section class="">
            <dl class=" ">
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
                                <div class="tel">电话：{{ $v->cinema_phone }}</div>
                            </li>
                        </ul>
                    </div>
            @endforeach
                </dd>
            </dl>
        </section>
    </div>
</div>





@endsection