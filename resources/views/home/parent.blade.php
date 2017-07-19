<!DOCTYPE HTML>
<html>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<link rel="shortcut icon" href="/favicon.ico"/>
<title>@yield('title')</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="悦影电影,买电影票,在线购票,影讯,热映影片"/>
<meta name="description" content="悦影电影是一个能够让您在线购买电影票的在线选座平台，同时网易电影还提供电影排期，影院信息查询等服务，方便您足不出户，在家中在线购票。看电影，来网易电影选座"/>
<meta name="baidu-site-verification" content="JbG7IdK46dmV88mo" />
<meta name="baidu-site-verification" content="YikRVdr4Vs" />
<meta http-equiv="X-Frame-Options" content="DENY"/>


<link rel="stylesheet" href="{{ asset('home/Css/base.css') }}"/>
<link rel="stylesheet" href="{{ asset('home/Css/core.css') }}"/>
<link rel="stylesheet" href="{{ asset('home/Css/index2014.css') }}"/>
<link rel="stylesheet" href="{{ asset('home/Css/mv_list.css') }}"/>
{{--地图--}}

    {{--地图--}}

<script src="{{ asset('home/Scripts/jquery-1.4.2.js') }}"></script>

	<script src="{{ asset('home/Scripts/easycore.js') }}"></script><script src="{{ asset('home/Scripts/dialog.js') }}"></script><script src="{{ asset('home/Scripts/autocomplete.js') }}"></script>
<script src="{{ asset('home/Scripts/wb.js') }}" type="text/javascript" charset="utf-8"></script>

  <script>
    if(!!window.Core){
        Core.cdnBaseUrl="http://pimg1.126.net/movie";
        Core.cdnFileVersion="1495696381";
        Core.curCity={'name':'北京','id':'1006','spell':'beijing'};
    }
  </script>




	<script src="{{ asset('home/Scripts/xframe.js') }}"></script>
</head>
<body>
<noscript><div id="noScript">
<div><h2>请开启浏览器的Javascript功能</h2><p>亲，没它我们玩不转啊！求您了，开启Javascript吧！<br/>不知道怎么开启Javascript？那就请<a href="http://www.baidu.com/s?wd=%E5%A6%82%E4%BD%95%E6%89%93%E5%BC%80Javascript%E5%8A%9F%E8%83%BD" target="_blank">猛击这里</a>！</p></div>
</div></noscript>
    <nav id="topNav">
        <div id="topNavWrap">
             <div id="topNavLeft">
                <a href="{{ url('/login') }}">登录</a>
                <a href="{{ url('/register') }}">注册</a>
            </div>
            <ul id="topNavRight">
                <li><a href="http://order.mall.163.com/movie/list.html" rel="nofollow"  id="myEpay" notice="false" user="y" target="_blank">我的订单</a>&nbsp;&nbsp;<span id="topEpayInfo"></span>|</li>
                <li><a href="http://piao.163.com/order/code_list.html" rel="nofollow"  target="_blank" user="y" rel="nofollow">我的优惠券</a>&nbsp;&nbsp;|</li>
                <li><a href="http://mall.163.com/help/movie.html" rel="nofollow"  target="_blank">帮助</a>&nbsp;&nbsp;|</li>
                <li><a href="http://feedback.zxkf.163.com/movie/show.html?flag=1" rel="nofollow"  target="_blank">提意见</a>&nbsp;&nbsp;|</li>
                <li class="last"><a href="javascript:;" rel="nofollow"  target="_blank" onMouseOver="$(this).parent().addClass('kf');" onMouseOut="$(this).parent().removeClass('kf');">联系客服</a>&nbsp;&nbsp;
                    <div class="none">客服电话：0571-26201163</div>
                </li>
            </ul>
            <script>

            </script>
        </div>
    </nav>

<section class="searchBoxInd clearfix2">
	<div class="searchWrap">
        <a href="http://piao.163.com" class="logo2014" title="网易电影"  style="float:left;"></a>
        <div id="switchTopCity" class="switchTopCity">
            <div class="curCity  "  id="curCity" pid="1006" pspell="beijing">
                <span class="cityName myCityBar" id="myCity" pid="1006" pspell="beijing">
            <?php
                $cityList1 = DB::table('region')->where('city_id','!=','0')->take(100)->get();
                $cityList2 = DB::table('region')->where('city_id','!=','0')->skip(100)->take(100)->get();
                $cityList3 = DB::table('region')->where('city_id','!=','0')->skip(200)->take(100)->get();
                $cityList4 = DB::table('region')->where('city_id','!=','0')->skip(300)->take(100)->get();
                if(isset($_COOKIE['cityId'])){
                    $cityId = $_COOKIE['cityId'];
                }else{
                    $cityId = $request->get('city_Id');
                }
                $city = DB::table('region')->where('city_id',$cityId)->first();
                    echo $city->region_name;
            ?>
                    </span>
                <i class="triangle2"></i>
                <input id="cityUrl" class="cityUrl" type="hidden" value="/beijing/movie/page-1-type-0.html">
                    <div class="cityList" id="cityTopList">
                        <div class="title">
                            <ul class="titleChar">
                                <li class="on first" rel="#cityList_0">热门</li>
                                <li class="" rel="#cityList_1">A</li>
                                <li class="" rel="#cityList_2">B</li>
                                <li class="" rel="#cityList_3">C</li>
                                <li class="" rel="#cityList_4">D</li>
                            </ul>
                        </div>
                        <div id="cityListBox" class="cityListBox">
                            <div  id="cityList_0" class="cityListGroup hotCity">
                                <dl>
                                    <dd>
                                        <a href="{{ url('/changeCity/131') }}" rel="nofollow">北京</a>
                                        <a href="{{ url('/changeCity/289') }}" rel="nofollow">上海</a>
                                        <a href="{{ url('/changeCity/257') }}" rel="nofollow">广州</a>
                                        <a href="{{ url('/changeCity/340') }}" rel="nofollow">深圳</a>
                                        <a href="{{ url('/changeCity/179') }}" rel="nofollow">杭州</a>
                                        <a href="{{ url('/changeCity/315') }}" rel="nofollow">南京</a>
                                        <a href="{{ url('/changeCity/75') }}" rel="nofollow">成都</a>
                                        <a href="{{ url('/changeCity/132') }}" rel="nofollow">重庆</a>
                                    </dd>
                                </dl>
                            </div>
                            <div  id="cityList_1" class="cityListGroup none">
                                    <dl>
                                        <dt></dt>
                                        <dd>@foreach($cityList1 as $v)
                                                <a href="{{ url('/changeCity/'.$v->city_id) }}" rel="nofollow"><?php $str = $v->region_name;
                                                echo substr($str,0,strlen($str)-3);
                                                ?></a>
                                                @endforeach
                                        </dd>
                                    </dl>
                            </div>
                            <div id="cityList_2" class="cityListGroup none">
                                <dl>
                                    <dt></dt>
                                    <dd>@foreach($cityList2 as $v)
                                            <a href="{{ url('/changeCity/'.$v->city_id) }}" rel="nofollow"><?php $str = $v->region_name;
                                                echo substr($str,0,strlen($str)-3);
                                                ?></a>
                                        @endforeach
                                    </dd>
                                </dl>
                            </div>
                            <div id="cityList_3" class="cityListGroup none">
                                <dl>
                                    <dt></dt>
                                    <dd>@foreach($cityList3 as $v)
                                            <a href="{{ url('/changeCity/'.$v->city_id) }}" rel="nofollow"><?php $str = $v->region_name;
                                                echo substr($str,0,strlen($str)-3);
                                                ?></a>
                                        @endforeach
                                    </dd>
                                </dl>
                            </div>
                            <div id="cityList_4" class="cityListGroup none">
                                <dl>
                                    <dt></dt>
                                    <dd>@foreach($cityList4 as $v)
                                            <a href="{{ url('/changeCity/'.$v->city_id) }}" rel="nofollow"><?php $str = $v->region_name;
                                                echo substr($str,0,strlen($str)-3);
                                                ?></a>
                                        @endforeach
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    	<ul class="shift">
            <li>
                <a  class="active" href="{{ url('/') }}" rel="nofollow">首页</a>
            </li>
    		<li class="movie" id="movieLink">
				<a  class="" href="javascript:;">电影<i class="triangle2"></i></a>
			     <dl  id="movieMenu">
                    <dd><a href="{{ url('onshow') }}" rel="nofollow">正在热映</a></dd>
                    <dd><a href="{{ url('upcoming') }}" rel="nofollow">即将上映</a></dd>
                </dl>
            </li>
    		<li>
				<a  class=""  href="{{ url('cinemalist') }}" rel="nofollow">影院</a>
			</li>
            <li>
            	<a target="_blank" class="" href="/beijing/client.html#from=daohang" rel="nofollow">客户端</a>
            </li>
    	</ul>
        <div class="search">
            <div class="ie6">
                <form action="/search.html#from=search" id="top_sform">
                    <input type="text" value="请输入影片或影院" class="text textGray" name="keywords" id="mvTopSearch" autocomplete="off" maxlength="20"/>
                    <input type="hidden" name="city" value="beijing" />
                    <input type="submit" value=""  class="sub" id="topSearchBtn" title=""/>
                </form>
            </div>
        </div>
    </div>
</section>






    @yield('content')











<footer id="docFoot">
	<div class="foot-wap">
		<div class="footCont">
			<div class="footLeft">
				<a href="http://piao.163.com" class="logo"></a>
			</div>
			<div class="footRight">
				<ul class="footRightTop">
					<li><b class="b1"></b>订好座，不排队</li>
					<li><b class="b2"></b>优惠多，价格低</li>
					<li><b class="b3"></b>渠道多，影院多</li>
				</ul>
				<div class="footRightBot">
					<span>• <a href="http://mall.163.com/help/movie.html" target="_blank" rel="nofollow">常见问题</a></span>
					<span>• <a href="http://feedback.zxkf.163.com/movie/show.html?flag=1" target="_blank" rel="nofollow">提提意见</a></span>
					<span>• 商务合作：010-82558368</span>
					<span>• 客服电话：0571-26201163</span>
				</div>
			</div>
		</div>
    </div>
	<div id="aboutNEST">
<a href="http://corp.163.com/eng/about/overview.html" rel="nofollow" target="_blank">About NetEase</a> - <a href="http://gb.corp.163.com/gb/about/overview.html" rel="nofollow"  target="_blank">公司简介</a> - <a href="http://gb.corp.163.com/gb/contactus.html" rel="nofollow"  target="_blank">联系方法</a> - <a href="http://corp.163.com/gb/job/job.html" rel="nofollow" target="_blank">招聘信息</a> - <a href="http://help.163.com/" rel="nofollow" target="_blank">客户服务</a> - <a href="http://gb.corp.163.com/gb/legal.html" rel="nofollow" target="_blank">相关法律</a> - <a href="http://emarketing.biz.163.com/" rel="nofollow" target="_blank">网络营销</a> - <a href="http://piao.163.com/" target="_blank">网易电影</a><br />
  增值电信业务经营许可证：浙B2-20110418&nbsp;|&nbsp;<a href="http://www.lede.com/prove.html" target="_blank">网站相关资质证明</a><br />
  网易乐得科技有限公司版权所有 &copy;2011-2017

	</div>
</footer>
	<div id="sideBar">
		<a id="feedback" href="http://feedback.zxkf.163.com/movie/show.html?flag=1" rel="nofollow" target="_blank" title="提意见" hidefocus="true"></a>
	    <a id="toTop" href="javascript:;" rel="nofollow" title="回到顶部" hidefocus="true"></a>
	</div>

	<script src="{{ asset('home/Scripts/imgscroll.js') }}"></script><script src="{{ asset('home/Scripts/mvcommon.js') }}"></script><script src="{{ asset('home/Scripts/index2014.js') }}"></script>
<script>Core && Core.fastInit && Core.fastInit("1");</script>
<script type="text/javascript">
    Core.statistics_adsage("ca");
</script>

<script src="{{ asset('home/Scripts/ntes.js') }}"></script>
<script>_ntes_nacc = "dianying";neteaseTracker();</script>
<script>neteaseClickStat();</script>
</body>
</html>
