<html><head>
<link rel="shortcut icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="网易商城,购买电影票,话费充值,点卡直充,网易电影票">
<meta name="description" content="网易商城是一个集电影票、手机话费、游戏点卡的一个生活服务类消费平台，为用户提供便捷的在线购物充值服务">
<title>悦影我的订单</title>
<link rel="canonical" href="http://piao.163.com">
<link rel="stylesheet" href="http://pimg1.126.net//order/css/base.css?v=1">
<link rel="stylesheet" href="http://pimg1.126.net//order/css/core.css?v=1">
<link rel="stylesheet" href="http://pimg1.126.net//order/css/iSelect.css?v=1">
<link rel="stylesheet" href="http://pimg1.126.net//order/css/myorder/myorder.css?v=1">
<script src="http://pimg1.126.net//order/js/jquery-1.4.2.js?v=201205221605"></script>
	
	<script src="http://pimg1.126.net//order/js/easyCore.js?v=1"></script><script src="http://pimg1.126.net//order/js/dialog.js?v=1"></script>
	
	<script src="http://pimg1.126.net//order/js/iSelect.js?v=1"></script><script src="http://pimg1.126.net//order/js/movie/list.js?v=1"></script>

<style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}
body, button, input, select, textarea {
    font: 12px/1.5 arial,\5b8b\4f53;
}
.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
}
</style></head>
<body>
<noscript>&lt;div id="noScript"&gt;
&lt;div&gt;&lt;h2&gt;请开启浏览器的Javascript功能&lt;/h2&gt;&lt;p&gt;亲，没它我们玩不转啊！求您了，开启Javascript吧！&lt;br/&gt;不知道怎么开启Javascript？那就请&lt;a href="
www.baidu.com/s?wd=%E5%A6%82%E4%BD%95%E6%89%93%E5%BC%80Javascript%E5%8A%9F%E8%83%BD" target="_blank"&gt;猛击这里&lt;/a&gt;！&lt;/p&gt;&lt;/div&gt;
&lt;/div&gt;</noscript>
<script>Core.cdnBaseUrl="http://pimg1.126.net/"</script>




<nav id="topNav">
	<div id="topNavWrap">
		<div id="topNavLeft">
			@if(Session::get('homeuser') !== null)
				<a href="{{ url('home/user').'/'.Session::get('homeuser')['user_id'] }}">个人信息</a>
				<a href="{{ url('home/outlogin') }}">退出登录</a>
			@else
				<a href="{{ url('/login') }}">登录</a>
				<a href="{{ url('/register') }}">注册</a>
			@endif
		</div>
		<ul id="topNavRight">
			@if(Session::get('homeuser') !== null)
				<li>

					<a href="{{ url('home/user/order') }}" rel="nofollow"  id="myEpay" >我的订单</a>&nbsp;&nbsp;<span id="topEpayInfo"></span>|</li>
			@endif
			<li><a href="http://feedback.zxkf.163.com/movie/show.html?flag=1" rel="nofollow"  target="_blank">提意见</a>&nbsp;&nbsp;</li>

			</li>
		</ul>
		<script>

		</script>
	</div>
</nav>
<header id="docHead">
	<div id="docMvHeadWrap">
		<a href="{{ url('/') }}" class="logoLnk1" title="网易商城" hidefocus="true">
	    	<img src="http://pimg1.126.net//order/images/logos/mall.png?1" alt="网易商城" title="网易商城">
	    </a>
        <a href="{{ url('/') }}" class="logoLnk2" title="网易电影票" hidefocus="true">
	    	<img src="http://pimg1.126.net//order/images/logos/piao.jpg?1" alt="网易电影票" title="网易电影票">
	    </a>
	</div>
</header>
<div class="ctLocation">
	<div class="topLine"></div>
    <div class="location">您的位置：<a href="{{ url('/') }}">首页</a><em>&gt;</em>我的电影票</div>
</div>
<article class="ctMain clearfix">
    <section class="ctSider mt10">
<ul class="leftNav" id="leftNav">
				<li>
					
                    	<a href="{{ url('home/user/order') }}" class="out">我的电影票</a>
				</li>
				{{--<li class="active">--}}
					{{----}}
                    	{{--<a href="http://order.mall.163.com/movie/list.html" class="out">我的电影票</a>--}}
		                    {{--<dl>--}}
							        	{{--<dd class="active"><a href="http://order.mall.163.com/movie/list.html">我的订单</a></dd>--}}
							        	{{--<dd><a href="http://piao.163.com/order/code_list.html">我的电影票优惠券</a></dd>--}}
							        	{{--<dd><a href="http://i.mall.163.com/point.html">我的电影票积分</a></dd>--}}
		                    {{--</dl>  --}}
				{{--</li>--}}
</ul>
    </section>
	<form action="" method="post" id="form1">
		<section class="ctCont mt10">
			<div class="ctSearch">
				<div class="left">
					<span>交易时间：</span>
					<div class="ctTimer">
						<a href="#" id="otimeInput" class="iSelect input"><span style="display: block;">所有</span></a>
						<input type="hidden" name="orderTime" id="orderTime" value="">
					</div>
				</div>
				<div class="right">
					<input type="text" value="请输入电影名称、影院名称、订单号" class="text textGray" name="searchValue" id="searchValue">
					<input type="submit" value="搜索" class="sub" id="search">
				</div>		    
			</div>
			<table class="ctTable">
				<thead>
					<tr style="font-size:12px">
						<th width="16%" class="num SimSun">订单号</th>
						<th width="16%">下单日期</th>
						<th width="12%">影片</th>
						<th width="15%">影院</th>
						<th width="13%">票数(张) / 总额(元)</th>
						<th width="28%" colspan="3">

							
						</th>
					</tr>
				</thead>
			</table>




			@foreach( $orderList as $v)
			<dl class="ctList  active  waitPay">
						<dt>
							<table style="font-size:12px">
							<thead>
									<tr>
										<th width="14%" class="num SimSun" sk="1">{{ $v->order_code }}</th>
										<th width="16%" class="SimSun">{{ date('Y-m-d H:i:s',$v->dateline) }}</th>
											<th width="16%" title="{{ $v->movieName }}" sk="1">{{ $v->movieName }}</th>
										
										
										<th width="18%" title="{{ $v->cinemaName }}" sk="1">
											{{ $v->cinemaName }}
										</th>
										<th width="8%">{{ $v->ticket_num }}张/<em class="count">{{ $v->total_money }}</em></th>
										<th width="8%">
											<?php
											switch($v->status){
											case 0:
											echo '未支付';
											break;
											case 1:
											echo '已支付';
											break;
											case 2:
											echo '已出票';
											break;
											case 3:
											echo '已发码';
											break;
											case 4:
											echo '退款中';
											break;
											case 5:
											echo '已退款';
											break;
											case 6:
											echo '已退票';
											break;
											case 7:
											echo '支付失败';
											break;
											case 8:
											echo '出票失败';
											break;
											case 9:
											echo '发码失败';
											break;
											case 10:
											echo '退款被驳回';
											break;
											case 11:
											echo '退款失败';
											break;
											}
												?>



										</th>
										<th width="13%">
											<a href="/">@if($v->status ==0) 去支付 @endif</a>
											<a href="{{ url('home/dosend/'.$v->order_id) }}">@if($v->status == 1 || $v->status == 2|| $v->status == 3  || $v->status == 8 || $v->status == 9 || $v->status == 10) 发送券码@endif</a>
											<a href="{{ url('home/user/order/refund/'.$v->order_id) }}">@if( ($v->status ==1 || $v->status == 3 || $v->status == 8|| $v->status == 9) && $v->starttime > time() ) 退款 @endif</a>

										</th>
										<th width="8%">
										<span class="detail">详情</span></th>
									</tr>
								</thead>
							</table>
						</dt>
						<dd style="font-size:12px">

							<table cellpadding="0" cellspacing="0" border="0" style="font-size:12px">
								<tbody>
									<tr>
										<th></th>
										@if($v->status == 0)
										<td>
											距离交易关闭还有<span id="second_0"><em class="timer">
													{{  floor( (15*60 + $v->dateline -time()) /60 )  }}
												</em>分<em class="timer">
													{{ round( (15*60 + $v->dateline -time())%60)}}
												</em></span>秒，请及时付款！
											<span class="blank">&nbsp;</span>
										</td>
											@endif
									</tr>
										<tr>
											<th><span class="blank">&nbsp;</span>手机号码：</th>
											<td>{{ $v->phone }}<span class="blank">&nbsp;</span></td>
										</tr>
									
										<tr>
											<th><span class="blank">&nbsp;</span>放映时间：</th>
											<td>{{ date("Y-m-d H:i:s",$v->starttime) }} <span class="blank">&nbsp;</span></td>
										</tr>
										<tr>
											<th><span class="blank">&nbsp;</span>影厅信息：</th>
											<td>
												{{ $v->roomName }}
                                                <span class="blank">&nbsp;</span>
											</td>
										</tr>
										<tr>
											<th><span class="blank">&nbsp;</span>座位信息：</th>
											<td>
												{{ $v->seats }}
												<span class="blank">&nbsp;</span>
											</td>
										</tr>
										<tr>
											<th><span class="blank">&nbsp;</span>影院地址：</th>
											<td>{{ $v->cinemaAddress }}<span class="blank">&nbsp;</span>
                                            </td>
										</tr>
									<tr>
										<th><span class="blank">&nbsp;</span>影院电话：</th>
										<td>{{ $v->cinemaPhone }}<span class="blank">&nbsp;</span>
										</td>
									</tr>
									
									
								</tbody>
							</table>
						</dd>
					</dl>

			@endforeach

				<input type="hidden" name="recordPerPage" value="20">  
				<input type="hidden" name="currentPage" id="currentPage">
		</section>
	</form>
</article>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script><script type="text/javascript" src="http://api.map.baidu.com/getscript?v=1.2&amp;ak=&amp;services=&amp;t=20130716024057"></script><link rel="stylesheet" type="text/css" href="http://api.map.baidu.com/res/12/bmap.css">
<script type="text/javascript">
	window.onload=function(){
   		//统计页面加载完成
        try{
            neteaseTracker(true,"http://order.mall.163.com/movie/list.html#from=jzcg","我的订单",null);
        }catch(e){}
   }
</script>

<footer id="docFoot">
		<div class="foot-wap">
	    	<ul id="guideList" class="clearfix">
				<li class="first"><a href="http://mall.163.com" target="_blank"><img title="网易商城" src="http://pimg1.126.net//order/images/logos/shop163-bottom-logo.png?v=1"></a>
		        </li>
				<li><em class="guide_2"><b></b>客服电话</em><span>
					·<a href="javascript:;" class="noLink">话费/点卡&nbsp;0571-26201163</a><br>
					·<a href="javascript:;" class="noLink">彩票&nbsp;0571-26201163</a><br>
					·<a href="javascript:;" class="noLink">保险&nbsp;0571-26201163</a><br>
				</span></li>
		        <li><em class="guide_3"><b></b>支付相关</em><span>
					·<a target="_blank" href="http://mall.163.com/help/pay.html#Q2">网易宝余额支付</a><br> 
					·<a target="_blank" href="http://mall.163.com/help/pay.html#Q3">网银/支付宝支付</a><br>
					·<a target="_blank" href="http://mall.163.com/help/pay.html#Q5">手机充值卡支付</a><br>
					·<a target="_blank" href="http://mall.163.com/help/payProblem.html">支付异常</a>	
		        </span></li>
				<li><em class="guide_4"><b></b>商务合作</em><span>
					·<a target="_blank" href="http://mall.163.com/contactUs.html" rel="nofollow">合作联系</a><br>
					·<a target="_blank" href="http://emarketing.163.com" rel="nofollow">广告加盟</a><br>
				</span></li>
		        <li><em class="guide_5"><b></b>友情链接</em><span>
					·<a target="_blank" href="http://epay.163.com">网易宝</a>&nbsp;
		            <a target="_blank" href="http://quan.163.com/">优惠券</a><br>
		            ·<a target="_blank" href="http://ecard.163.com">网易购卡直通车</a><br>
			        ·<a target="_blank" href="http://ecard.warcraftchina.com">魔兽在线购卡</a><br>
		            ·<a target="_blank" href="http://mm.163.com/">美美</a>
				</span></li>
			</ul>
	    </div>	
	<div id="aboutNEST">
<a href="http://corp.163.com/eng/about/overview.html" rel="nofollow" target="_blank">About NetEase</a> - <a href="http://gb.corp.163.com/gb/about/overview.html" rel="nofollow" target="_blank">公司简介</a> - <a href="http://gb.corp.163.com/gb/contactus.html" rel="nofollow" target="_blank">联系方法</a> - <a href="http://corp.163.com/gb/job/job.html" rel="nofollow" target="_blank">招聘信息</a> - <a href="http://help.163.com/" rel="nofollow" target="_blank">客户服务</a> - <a href="http://gb.corp.163.com/gb/legal.html" rel="nofollow" target="_blank">相关法律</a> - <a href="http://emarketing.biz.163.com/" rel="nofollow" target="_blank">网络营销</a><br>
  网络文化经营许可证：浙网文[2011]0759-089号&nbsp;|&nbsp;增值电信业务经营许可证：浙B2-20110418&nbsp;|&nbsp;<a href="http://www.lede.com/prove.html" target="_blank">网站相关资质证明</a><br>
  网易乐得科技有限公司版权所有 ©2011-2017
	</div>
</footer>
	
	
<script>Core && Core.fastInit && Core.fastInit("1");</script>
<script src="http://analytics.163.com/ntes.js"></script>
<script>_ntes_nacc = "shop";neteaseTracker();</script>

<script>
    if( "{{ session('msg') }}" ){
        alert("{{ session('msg') }}");
    }
</script>
<div id="iOptions"></div></body></html>