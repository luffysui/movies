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
            <div id="topNavLeft"><script>Core.navInit("http://pimg1.126.net/movie","","1495696381","")</script></div>
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
                <span class="cityName myCityBar" id="myCity" pid="1006" pspell="beijing">北京</span>
                <i class="triangle2"></i>
                <input id="cityUrl" class="cityUrl" type="hidden" value="/beijing/movie/page-1-type-0.html">
                    <div class="cityList" id="cityTopList">
                        <div class="title">
                            <a href="javascript:;" class="close"></a>
                            <input type="text" class="cityTopSearch textGray" value="请输入城市或城市拼音" autocomplete="off" maxlength="15">
                            <input type="button" title="" class="cityTopSearchBtn" value="">
                            <ul class="titleChar">
                                <li class="on first" rel="#cityList_0">热门</li>
                                <li class="" rel="#cityList_1">A~G</li>
                                <li class="" rel="#cityList_2">H~L</li>
                                <li class="" rel="#cityList_3">M~T</li>
                                <li class="" rel="#cityList_4">W~Z</li>
                            </ul>
                        </div>
                        <div id="cityListBox" class="cityListBox">
                            <div  id="cityList_0" class="cityListGroup hotCity">
                                <dl>
                                    <dd>
                                        <a href="/beijing/movie/page-1-type-0.html" rel="nofollow">北京</a>
                                        <a href="/shanghai/movie/page-1-type-0.html" rel="nofollow">上海</a>
                                        <a href="/guangzhou/movie/page-1-type-0.html" rel="nofollow">广州</a>
                                        <a href="/shenzhen/movie/page-1-type-0.html" rel="nofollow">深圳</a>
                                        <a href="/hangzhou/movie/page-1-type-0.html" rel="nofollow">杭州</a>
                                        <a href="/nanjing/movie/page-1-type-0.html" rel="nofollow">南京</a>
                                        <a href="/chengdu/movie/page-1-type-0.html" rel="nofollow">成都</a>
                                        <a href="/chongqing/movie/page-1-type-0.html" rel="nofollow">重庆</a>
                                    </dd>
                                </dl>
                            </div>
                            <div  id="cityList_1" class="cityListGroup none">                                
                                        <dl>
                                            <dt>A</dt>
                                            <dd>
                                                    <a href="/anlu/movie/page-1-type-0.html" rel="nofollow">安陆</a>
                                                    <a href="/anning/movie/page-1-type-0.html" rel="nofollow">安宁</a>
                                                    <a href="/ankang/movie/page-1-type-0.html" rel="nofollow">安康</a>
                                                    <a href="/anshun/movie/page-1-type-0.html" rel="nofollow">安顺</a>
                                                    <a href="/anyang/movie/page-1-type-0.html" rel="nofollow">安阳</a>
                                                    <a href="/anqing/movie/page-1-type-0.html" rel="nofollow">安庆</a>
                                                    <a href="/anshan/movie/page-1-type-0.html" rel="nofollow">鞍山</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>B</dt>
                                            <dd>
                                                    <a href="/bayinguoleng/movie/page-1-type-0.html" rel="nofollow">巴音郭楞</a>
                                                    <a href="/beian/movie/page-1-type-0.html" rel="nofollow">北安市</a>
                                                    <a href="/baicheng/movie/page-1-type-0.html" rel="nofollow">白城</a>
                                                    <a href="/bijie/movie/page-1-type-0.html" rel="nofollow">毕节</a>
                                                    <a href="/bazhou/movie/page-1-type-0.html" rel="nofollow">霸州</a>
                                                    <a href="/bazhong/movie/page-1-type-0.html" rel="nofollow">巴中</a>
                                                    <a href="/baishan/movie/page-1-type-0.html" rel="nofollow">白山</a>
                                                    <a href="/baoshan/movie/page-1-type-0.html" rel="nofollow">保山</a>
                                                    <a href="/baise/movie/page-1-type-0.html" rel="nofollow">百色</a>
                                                    <a href="/bayannaoer/movie/page-1-type-0.html" rel="nofollow">巴彦淖尔</a>
                                                    <a href="/baiyin/movie/page-1-type-0.html" rel="nofollow">白银</a>
                                                    <a href="/bozhou/movie/page-1-type-0.html" rel="nofollow">亳州</a>
                                                    <a href="/beihai/movie/page-1-type-0.html" rel="nofollow">北海</a>
                                                    <a href="/benxi/movie/page-1-type-0.html" rel="nofollow">本溪</a>
                                                    <a href="/bangbu/movie/page-1-type-0.html" rel="nofollow">蚌埠</a>
                                                    <a href="/baoding/movie/page-1-type-0.html" rel="nofollow">保定</a>
                                                    <a href="/binzhou/movie/page-1-type-0.html" rel="nofollow">滨州</a>
                                                    <a href="/baotou/movie/page-1-type-0.html" rel="nofollow">包头</a>
                                                    <a href="/baoji/movie/page-1-type-0.html" rel="nofollow">宝鸡</a>
                                                    <a href="/beijing/movie/page-1-type-0.html" rel="nofollow">北京</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>C</dt>
                                            <dd>
                                                    <a href="/chaoyang/movie/page-1-type-0.html" rel="nofollow">朝阳</a>
                                                    <a href="/chongzuo/movie/page-1-type-0.html" rel="nofollow">崇左</a>
                                                    <a href="/conghua/movie/page-1-type-0.html" rel="nofollow">从化</a>
                                                    <a href="/changge/movie/page-1-type-0.html" rel="nofollow">长葛</a>
                                                    <a href="/chibi/movie/page-1-type-0.html" rel="nofollow">赤壁</a>
                                                    <a href="/chengde/movie/page-1-type-0.html" rel="nofollow">承德</a>
                                                    <a href="/changji/movie/page-1-type-0.html" rel="nofollow">昌吉</a>
                                                    <a href="/chizhou/movie/page-1-type-0.html" rel="nofollow">池州</a>
                                                    <a href="/chaohu/movie/page-1-type-0.html" rel="nofollow">巢湖</a>
                                                    <a href="/changzhi/movie/page-1-type-0.html" rel="nofollow">长治</a>
                                                    <a href="/chifeng/movie/page-1-type-0.html" rel="nofollow">赤峰</a>
                                                    <a href="/chaozhou/movie/page-1-type-0.html" rel="nofollow">潮州</a>
                                                    <a href="/chuzhou/movie/page-1-type-0.html" rel="nofollow">滁州</a>
                                                    <a href="/cangzhou/movie/page-1-type-0.html" rel="nofollow">沧州</a>
                                                    <a href="/changshu/movie/page-1-type-0.html" rel="nofollow">常熟</a>
                                                    <a href="/chenzhou/movie/page-1-type-0.html" rel="nofollow">郴州</a>
                                                    <a href="/changde/movie/page-1-type-0.html" rel="nofollow">常德</a>
                                                    <a href="/changzhou/movie/page-1-type-0.html" rel="nofollow">常州</a>
                                                    <a href="/changchun/movie/page-1-type-0.html" rel="nofollow">长春</a>
                                                    <a href="/changsha/movie/page-1-type-0.html" rel="nofollow">长沙</a>
                                                    <a href="/chuxiong/movie/page-1-type-0.html" rel="nofollow">楚雄</a>
                                                    <a href="/cixi/movie/page-1-type-0.html" rel="nofollow">慈溪</a>
                                                    <a href="/chengdu/movie/page-1-type-0.html" rel="nofollow">成都</a>
                                                    <a href="/chongqing/movie/page-1-type-0.html" rel="nofollow">重庆</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>D</dt>
                                            <dd>
                                                    <a href="/dongfang/movie/page-1-type-0.html" rel="nofollow">东方</a>
                                                    <a href="/danzhou/movie/page-1-type-0.html" rel="nofollow">儋州</a>
                                                    <a href="/dongtai/movie/page-1-type-0.html" rel="nofollow">东台</a>
                                                    <a href="/dunhuang/movie/page-1-type-0.html" rel="nofollow">敦煌</a>
                                                    <a href="/dafeng/movie/page-1-type-0.html" rel="nofollow">大丰</a>
                                                    <a href="/duyun/movie/page-1-type-0.html" rel="nofollow">都匀</a>
                                                    <a href="/dongyang/movie/page-1-type-0.html" rel="nofollow">东阳</a>
                                                    <a href="/donggang/movie/page-1-type-0.html" rel="nofollow">东港</a>
                                                    <a href="/diqing/movie/page-1-type-0.html" rel="nofollow">迪庆</a>
                                                    <a href="/danjiangkou/movie/page-1-type-0.html" rel="nofollow">丹江口</a>
                                                    <a href="/dashiqiao/movie/page-1-type-0.html" rel="nofollow">大石桥</a>
                                                    <a href="/danyang/movie/page-1-type-0.html" rel="nofollow">丹阳</a>
                                                    <a href="/dingxi/movie/page-1-type-0.html" rel="nofollow">定西</a>
                                                    <a href="/dujiangyan/movie/page-1-type-0.html" rel="nofollow">都江堰</a>
                                                    <a href="/dazhou/movie/page-1-type-0.html" rel="nofollow">达州</a>
                                                    <a href="/datong/movie/page-1-type-0.html" rel="nofollow">大同</a>
                                                    <a href="/daqing/movie/page-1-type-0.html" rel="nofollow">大庆</a>
                                                    <a href="/dandong/movie/page-1-type-0.html" rel="nofollow">丹东</a>
                                                    <a href="/dezhou/movie/page-1-type-0.html" rel="nofollow">德州</a>
                                                    <a href="/deyang/movie/page-1-type-0.html" rel="nofollow">德阳</a>
                                                    <a href="/dongying/movie/page-1-type-0.html" rel="nofollow">东营</a>
                                                    <a href="/dali/movie/page-1-type-0.html" rel="nofollow">大理</a>
                                                    <a href="/dalian/movie/page-1-type-0.html" rel="nofollow">大连</a>
                                                    <a href="/dongguan/movie/page-1-type-0.html" rel="nofollow">东莞</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>E</dt>
                                            <dd>
                                                    <a href="/eerduosi/movie/page-1-type-0.html" rel="nofollow">鄂尔多斯</a>
                                                    <a href="/ezhou/movie/page-1-type-0.html" rel="nofollow">鄂州</a>
                                                    <a href="/enshi/movie/page-1-type-0.html" rel="nofollow">恩施</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>F</dt>
                                            <dd>
                                                    <a href="/fengcheng2/movie/page-1-type-0.html" rel="nofollow">丰城</a>
                                                    <a href="/fujian2/movie/page-1-type-0.html" rel="nofollow">福建</a>
                                                    <a href="/fuqing/movie/page-1-type-0.html" rel="nofollow">福清</a>
                                                    <a href="/fuyang1/movie/page-1-type-0.html" rel="nofollow">阜阳</a>
                                                    <a href="/fuzhou1/movie/page-1-type-0.html" rel="nofollow">抚州</a>
                                                    <a href="/fangchenggang/movie/page-1-type-0.html" rel="nofollow">防城港</a>
                                                    <a href="/fuxin/movie/page-1-type-0.html" rel="nofollow">阜新</a>
                                                    <a href="/fushun/movie/page-1-type-0.html" rel="nofollow">抚顺</a>
                                                    <a href="/fuyang/movie/page-1-type-0.html" rel="nofollow">富阳</a>
                                                    <a href="/foshan/movie/page-1-type-0.html" rel="nofollow">佛山</a>
                                                    <a href="/fuzhou/movie/page-1-type-0.html" rel="nofollow">福州</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>G</dt>
                                            <dd>
                                                    <a href="/gannan/movie/page-1-type-0.html" rel="nofollow">甘南</a>
                                                    <a href="/guangan/movie/page-1-type-0.html" rel="nofollow">广安市</a>
                                                    <a href="/guangyuan/movie/page-1-type-0.html" rel="nofollow">广元</a>
                                                    <a href="/guixi/movie/page-1-type-0.html" rel="nofollow">贵溪</a>
                                                    <a href="/ganzi/movie/page-1-type-0.html" rel="nofollow">甘孜</a>
                                                    <a href="/gaizhou/movie/page-1-type-0.html" rel="nofollow">盖州</a>
                                                    <a href="/guyuan/movie/page-1-type-0.html" rel="nofollow">固原</a>
                                                    <a href="/gaoyou/movie/page-1-type-0.html" rel="nofollow">高邮</a>
                                                    <a href="/guanghan/movie/page-1-type-0.html" rel="nofollow">广汉</a>
                                                    <a href="/guigang/movie/page-1-type-0.html" rel="nofollow">贵港</a>
                                                    <a href="/ganzhou/movie/page-1-type-0.html" rel="nofollow">赣州</a>
                                                    <a href="/guiyang/movie/page-1-type-0.html" rel="nofollow">贵阳</a>
                                                    <a href="/guilin/movie/page-1-type-0.html" rel="nofollow">桂林</a>
                                                    <a href="/guangzhou/movie/page-1-type-0.html" rel="nofollow">广州</a>
                                            </dd>
                                        </dl>
                            </div>                            
                            <div id="cityList_2" class="cityListGroup none">
                                        <dl>
                                            <dt>H</dt>
                                            <dd>
                                                    <a href="/hainan/movie/page-1-type-0.html" rel="nofollow">海南</a>
                                                    <a href="/heihe/movie/page-1-type-0.html" rel="nofollow">黑河</a>
                                                    <a href="/haiyan/movie/page-1-type-0.html" rel="nofollow">海盐</a>
                                                    <a href="/hulin/movie/page-1-type-0.html" rel="nofollow">虎林</a>
                                                    <a href="/huaying/movie/page-1-type-0.html" rel="nofollow">华蓥</a>
                                                    <a href="/houma/movie/page-1-type-0.html" rel="nofollow">侯马</a>
                                                    <a href="/heshan/movie/page-1-type-0.html" rel="nofollow">鹤山</a>
                                                    <a href="/honghu/movie/page-1-type-0.html" rel="nofollow">洪湖</a>
                                                    <a href="/huaihua/movie/page-1-type-0.html" rel="nofollow">怀化</a>
                                                    <a href="/huaibei/movie/page-1-type-0.html" rel="nofollow">淮北</a>
                                                    <a href="/hengshui/movie/page-1-type-0.html" rel="nofollow">衡水</a>
                                                    <a href="/hechi/movie/page-1-type-0.html" rel="nofollow">河池</a>
                                                    <a href="/hegang/movie/page-1-type-0.html" rel="nofollow">鹤岗</a>
                                                    <a href="/haimen/movie/page-1-type-0.html" rel="nofollow">海门</a>
                                                    <a href="/hebi/movie/page-1-type-0.html" rel="nofollow">鹤壁</a>
                                                    <a href="/haian/movie/page-1-type-0.html" rel="nofollow">海安</a>
                                                    <a href="/huanggang/movie/page-1-type-0.html" rel="nofollow">黄冈</a>
                                                    <a href="/hanzhong/movie/page-1-type-0.html" rel="nofollow">汉中</a>
                                                    <a href="/hezhou/movie/page-1-type-0.html" rel="nofollow">贺州</a>
                                                    <a href="/hulunbeier/movie/page-1-type-0.html" rel="nofollow">呼伦贝尔</a>
                                                    <a href="/huangshi/movie/page-1-type-0.html" rel="nofollow">黄石</a>
                                                    <a href="/heyuan/movie/page-1-type-0.html" rel="nofollow">河源</a>
                                                    <a href="/huangshan/movie/page-1-type-0.html" rel="nofollow">黄山</a>
                                                    <a href="/huainan/movie/page-1-type-0.html" rel="nofollow">淮南</a>
                                                    <a href="/handan/movie/page-1-type-0.html" rel="nofollow">邯郸</a>
                                                    <a href="/huaian/movie/page-1-type-0.html" rel="nofollow">淮安</a>
                                                    <a href="/haikou/movie/page-1-type-0.html" rel="nofollow">海口</a>
                                                    <a href="/huludao/movie/page-1-type-0.html" rel="nofollow">葫芦岛</a>
                                                    <a href="/heze/movie/page-1-type-0.html" rel="nofollow">菏泽</a>
                                                    <a href="/hengyang/movie/page-1-type-0.html" rel="nofollow">衡阳</a>
                                                    <a href="/hefei/movie/page-1-type-0.html" rel="nofollow">合肥</a>
                                                    <a href="/huzhou/movie/page-1-type-0.html" rel="nofollow">湖州</a>
                                                    <a href="/haerbin/movie/page-1-type-0.html" rel="nofollow">哈尔滨</a>
                                                    <a href="/honghe/movie/page-1-type-0.html" rel="nofollow">红河</a>
                                                    <a href="/huizhou/movie/page-1-type-0.html" rel="nofollow">惠州</a>
                                                    <a href="/huhehaote/movie/page-1-type-0.html" rel="nofollow">呼和浩特</a>
                                                    <a href="/hangzhou/movie/page-1-type-0.html" rel="nofollow">杭州</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>J</dt>
                                            <dd>
                                                    <a href="/jinchang/movie/page-1-type-0.html" rel="nofollow">金昌市</a>
                                                    <a href="/jiangshan/movie/page-1-type-0.html" rel="nofollow">江山</a>
                                                    <a href="/jiangyou/movie/page-1-type-0.html" rel="nofollow">江油</a>
                                                    <a href="/jinjinag/movie/page-1-type-0.html" rel="nofollow">晋江</a>
                                                    <a href="/jilin/movie/page-1-type-0.html" rel="nofollow">吉林</a>
                                                    <a href="/jintan/movie/page-1-type-0.html" rel="nofollow">金坛</a>
                                                    <a href="/jimo/movie/page-1-type-0.html" rel="nofollow">即墨</a>
                                                    <a href="/jian/movie/page-1-type-0.html" rel="nofollow">吉安</a>
                                                    <a href="/jinzhong/movie/page-1-type-0.html" rel="nofollow">晋中</a>
                                                    <a href="/jurong/movie/page-1-type-0.html" rel="nofollow">句容</a>
                                                    <a href="/jiuquan/movie/page-1-type-0.html" rel="nofollow">酒泉</a>
                                                    <a href="/jiaozhou/movie/page-1-type-0.html" rel="nofollow">胶州</a>
                                                    <a href="/jiayuguan/movie/page-1-type-0.html" rel="nofollow">嘉峪关</a>
                                                    <a href="/jixi/movie/page-1-type-0.html" rel="nofollow">鸡西</a>
                                                    <a href="/jingmen/movie/page-1-type-0.html" rel="nofollow">荆门</a>
                                                    <a href="/jingzhou/movie/page-1-type-0.html" rel="nofollow">荆州</a>
                                                    <a href="/jiyuan/movie/page-1-type-0.html" rel="nofollow">济源</a>
                                                    <a href="/jinzhou/movie/page-1-type-0.html" rel="nofollow">锦州</a>
                                                    <a href="/jiaozuo/movie/page-1-type-0.html" rel="nofollow">焦作</a>
                                                    <a href="/jieyang/movie/page-1-type-0.html" rel="nofollow">揭阳</a>
                                                    <a href="/jiangyin/movie/page-1-type-0.html" rel="nofollow">江阴</a>
                                                    <a href="/jingdezhen/movie/page-1-type-0.html" rel="nofollow">景德镇</a>
                                                    <a href="/jincheng/movie/page-1-type-0.html" rel="nofollow">晋城</a>
                                                    <a href="/jiangmen/movie/page-1-type-0.html" rel="nofollow">江门</a>
                                                    <a href="/jinan/movie/page-1-type-0.html" rel="nofollow">济南</a>
                                                    <a href="/jiamusi/movie/page-1-type-0.html" rel="nofollow">佳木斯</a>
                                                    <a href="/jining/movie/page-1-type-0.html" rel="nofollow">济宁</a>
                                                    <a href="/jiujiang/movie/page-1-type-0.html" rel="nofollow">九江</a>
                                                    <a href="/jingjiang/movie/page-1-type-0.html" rel="nofollow">靖江</a>
                                                    <a href="/jiande/movie/page-1-type-0.html" rel="nofollow">建德</a>
                                                    <a href="/jinhua/movie/page-1-type-0.html" rel="nofollow">金华</a>
                                                    <a href="/jiaxing/movie/page-1-type-0.html" rel="nofollow">嘉兴</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>K</dt>
                                            <dd>
                                                    <a href="/kelamayi/movie/page-1-type-0.html" rel="nofollow">克拉玛依</a>
                                                    <a href="/kashi/movie/page-1-type-0.html" rel="nofollow">喀什</a>
                                                    <a href="/kaili/movie/page-1-type-0.html" rel="nofollow">凯里</a>
                                                    <a href="/kaiping/movie/page-1-type-0.html" rel="nofollow">开平</a>
                                                    <a href="/kaifeng/movie/page-1-type-0.html" rel="nofollow">开封</a>
                                                    <a href="/kunshan/movie/page-1-type-0.html" rel="nofollow">昆山</a>
                                                    <a href="/kunming/movie/page-1-type-0.html" rel="nofollow">昆明</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>L</dt>
                                            <dd>
                                                    <a href="/ledong/movie/page-1-type-0.html" rel="nofollow">乐东</a>
                                                    <a href="/lingaoxian/movie/page-1-type-0.html" rel="nofollow">临高县</a>
                                                    <a href="/laibin/movie/page-1-type-0.html" rel="nofollow">来宾</a>
                                                    <a href="/linzhi/movie/page-1-type-0.html" rel="nofollow">林芝</a>
                                                    <a href="/linxia2/movie/page-1-type-0.html" rel="nofollow">临夏</a>
                                                    <a href="/lianjiang/movie/page-1-type-0.html" rel="nofollow">廉江</a>
                                                    <a href="/lianzhou/movie/page-1-type-0.html" rel="nofollow">连州</a>
                                                    <a href="/laizhou/movie/page-1-type-0.html" rel="nofollow">莱州</a>
                                                    <a href="/luquanshi/movie/page-1-type-0.html" rel="nofollow">鹿泉市</a>
                                                    <a href="/liling/movie/page-1-type-0.html" rel="nofollow">醴陵</a>
                                                    <a href="/lichuan/movie/page-1-type-0.html" rel="nofollow">利川</a>
                                                    <a href="/leping/movie/page-1-type-0.html" rel="nofollow">乐平</a>
                                                    <a href="/linqing/movie/page-1-type-0.html" rel="nofollow">临清</a>
                                                    <a href="/longkou/movie/page-1-type-0.html" rel="nofollow">龙口</a>
                                                    <a href="/longquan/movie/page-1-type-0.html" rel="nofollow">龙泉</a>
                                                    <a href="/lvliang/movie/page-1-type-0.html" rel="nofollow">吕梁</a>
                                                    <a href="/lasa/movie/page-1-type-0.html" rel="nofollow">拉萨</a>
                                                    <a href="/lijiang/movie/page-1-type-0.html" rel="nofollow">丽江</a>
                                                    <a href="/lincang/movie/page-1-type-0.html" rel="nofollow">临沧</a>
                                                    <a href="/longnan/movie/page-1-type-0.html" rel="nofollow">陇南</a>
                                                    <a href="/luohe/movie/page-1-type-0.html" rel="nofollow">漯河</a>
                                                    <a href="/liaoyang/movie/page-1-type-0.html" rel="nofollow">辽阳</a>
                                                    <a href="/laiyang/movie/page-1-type-0.html" rel="nofollow">莱阳</a>
                                                    <a href="/linhai/movie/page-1-type-0.html" rel="nofollow">临海</a>
                                                    <a href="/liupanshui/movie/page-1-type-0.html" rel="nofollow">六盘水</a>
                                                    <a href="/leiyang/movie/page-1-type-0.html" rel="nofollow">耒阳</a>
                                                    <a href="/liaoyuan/movie/page-1-type-0.html" rel="nofollow">辽源</a>
                                                    <a href="/liuan/movie/page-1-type-0.html" rel="nofollow">六安</a>
                                                    <a href="/linan/movie/page-1-type-0.html" rel="nofollow">临安</a>
                                                    <a href="/liyang/movie/page-1-type-0.html" rel="nofollow">溧阳</a>
                                                    <a href="/luzhou/movie/page-1-type-0.html" rel="nofollow">泸州</a>
                                                    <a href="/longyan/movie/page-1-type-0.html" rel="nofollow">龙岩</a>
                                                    <a href="/lishui/movie/page-1-type-0.html" rel="nofollow">丽水</a>
                                                    <a href="/lianyungang/movie/page-1-type-0.html" rel="nofollow">连云港</a>
                                                    <a href="/linyi/movie/page-1-type-0.html" rel="nofollow">临沂</a>
                                                    <a href="/liuzhou/movie/page-1-type-0.html" rel="nofollow">柳州</a>
                                                    <a href="/laiwu/movie/page-1-type-0.html" rel="nofollow">莱芜</a>
                                                    <a href="/liaocheng/movie/page-1-type-0.html" rel="nofollow">聊城</a>
                                                    <a href="/leshan/movie/page-1-type-0.html" rel="nofollow">乐山</a>
                                                    <a href="/linfen/movie/page-1-type-0.html" rel="nofollow">临汾</a>
                                                    <a href="/luoyang/movie/page-1-type-0.html" rel="nofollow">洛阳</a>
                                                    <a href="/langfang/movie/page-1-type-0.html" rel="nofollow">廊坊</a>
                                                    <a href="/loudi/movie/page-1-type-0.html" rel="nofollow">娄底</a>
                                                    <a href="/lanzhou/movie/page-1-type-0.html" rel="nofollow">兰州</a>
                                            </dd>
                                        </dl>
                            </div>
                            <div id="cityList_3" class="cityListGroup none">
                                        <dl>
                                            <dt>M</dt>
                                            <dd>
                                                    <a href="/maerkang/movie/page-1-type-0.html" rel="nofollow">马尔康</a>
                                                    <a href="/mangshi/movie/page-1-type-0.html" rel="nofollow">芒市</a>
                                                    <a href="/mianzhu/movie/page-1-type-0.html" rel="nofollow">绵竹</a>
                                                    <a href="/macheng/movie/page-1-type-0.html" rel="nofollow">麻城</a>
                                                    <a href="/meishan/movie/page-1-type-0.html" rel="nofollow">眉山</a>
                                                    <a href="/meizhou/movie/page-1-type-0.html" rel="nofollow">梅州</a>
                                                    <a href="/maoming/movie/page-1-type-0.html" rel="nofollow">茂名</a>
                                                    <a href="/mudanjiang/movie/page-1-type-0.html" rel="nofollow">牡丹江</a>
                                                    <a href="/mianyang/movie/page-1-type-0.html" rel="nofollow">绵阳</a>
                                                    <a href="/maanshan/movie/page-1-type-0.html" rel="nofollow">马鞍山</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>N</dt>
                                            <dd>
                                                    <a href="/ningguo/movie/page-1-type-0.html" rel="nofollow">宁国</a>
                                                    <a href="/nanping/movie/page-1-type-0.html" rel="nofollow">南平</a>
                                                    <a href="/ningde/movie/page-1-type-0.html" rel="nofollow">宁德</a>
                                                    <a href="/neijiang/movie/page-1-type-0.html" rel="nofollow">内江</a>
                                                    <a href="/nanchong/movie/page-1-type-0.html" rel="nofollow">南充</a>
                                                    <a href="/nanyang/movie/page-1-type-0.html" rel="nofollow">南阳</a>
                                                    <a href="/nanchang/movie/page-1-type-0.html" rel="nofollow">南昌</a>
                                                    <a href="/nanjing/movie/page-1-type-0.html" rel="nofollow">南京</a>
                                                    <a href="/nanning/movie/page-1-type-0.html" rel="nofollow">南宁</a>
                                                    <a href="/ningbo/movie/page-1-type-0.html" rel="nofollow">宁波</a>
                                                    <a href="/nantong/movie/page-1-type-0.html" rel="nofollow">南通</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>P</dt>
                                            <dd>
                                                    <a href="/puer/movie/page-1-type-0.html" rel="nofollow">普洱</a>
                                                    <a href="/pizhou/movie/page-1-type-0.html" rel="nofollow">邳州</a>
                                                    <a href="/pingliang/movie/page-1-type-0.html" rel="nofollow">平凉</a>
                                                    <a href="/panzhihua/movie/page-1-type-0.html" rel="nofollow">攀枝花</a>
                                                    <a href="/pingxiang/movie/page-1-type-0.html" rel="nofollow">萍乡</a>
                                                    <a href="/panjin/movie/page-1-type-0.html" rel="nofollow">盘锦</a>
                                                    <a href="/puyang/movie/page-1-type-0.html" rel="nofollow">濮阳</a>
                                                    <a href="/pingdingshan/movie/page-1-type-0.html" rel="nofollow">平顶山</a>
                                                    <a href="/putian/movie/page-1-type-0.html" rel="nofollow">莆田</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>Q</dt>
                                            <dd>
                                                    <a href="/qianxinan2/movie/page-1-type-0.html" rel="nofollow">黔西南</a>
                                                    <a href="/qiannan2/movie/page-1-type-0.html" rel="nofollow">黔南州</a>
                                                    <a href="/qingyang/movie/page-1-type-0.html" rel="nofollow">庆阳</a>
                                                    <a href="/qingzhou/movie/page-1-type-0.html" rel="nofollow">青州</a>
                                                    <a href="/qionghai/movie/page-1-type-0.html" rel="nofollow">琼海</a>
                                                    <a href="/qujing/movie/page-1-type-0.html" rel="nofollow">曲靖</a>
                                                    <a href="/qianjiang/movie/page-1-type-0.html" rel="nofollow">潜江</a>
                                                    <a href="/qinzhou/movie/page-1-type-0.html" rel="nofollow">钦州</a>
                                                    <a href="/qianan/movie/page-1-type-0.html" rel="nofollow">迁安</a>
                                                    <a href="/qidong/movie/page-1-type-0.html" rel="nofollow">启东</a>
                                                    <a href="/qiqihaer/movie/page-1-type-0.html" rel="nofollow">齐齐哈尔</a>
                                                    <a href="/qinhuangdao/movie/page-1-type-0.html" rel="nofollow">秦皇岛</a>
                                                    <a href="/quanzhou/movie/page-1-type-0.html" rel="nofollow">泉州</a>
                                                    <a href="/qingyuan/movie/page-1-type-0.html" rel="nofollow">清远</a>
                                                    <a href="/qingdao/movie/page-1-type-0.html" rel="nofollow">青岛</a>
                                                    <a href="/quzhou/movie/page-1-type-0.html" rel="nofollow">衢州</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>R</dt>
                                            <dd>
                                                    <a href="/renhuai/movie/page-1-type-0.html" rel="nofollow">仁怀</a>
                                                    <a href="/rugao/movie/page-1-type-0.html" rel="nofollow">如皋</a>
                                                    <a href="/rizhao/movie/page-1-type-0.html" rel="nofollow">日照</a>
                                                    <a href="/ruian/movie/page-1-type-0.html" rel="nofollow">瑞安</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>S</dt>
                                            <dd>
                                                    <a href="/shuangyashan/movie/page-1-type-0.html" rel="nofollow">双鸭山</a>
                                                    <a href="/shuozhou/movie/page-1-type-0.html" rel="nofollow">朔州</a>
                                                    <a href="/sihong/movie/page-1-type-0.html" rel="nofollow">泗洪</a>
                                                    <a href="/shifang/movie/page-1-type-0.html" rel="nofollow">什邡</a>
                                                    <a href="/shangzhi/movie/page-1-type-0.html" rel="nofollow">尚志</a>
                                                    <a href="/shouguang/movie/page-1-type-0.html" rel="nofollow">寿光</a>
                                                    <a href="/sanhe/movie/page-1-type-0.html" rel="nofollow">三河市</a>
                                                    <a href="/shaoshan/movie/page-1-type-0.html" rel="nofollow">韶山</a>
                                                    <a href="/shangyu/movie/page-1-type-0.html" rel="nofollow">上虞</a>
                                                    <a href="/suzhou1/movie/page-1-type-0.html" rel="nofollow">宿州</a>
                                                    <a href="/shanwei/movie/page-1-type-0.html" rel="nofollow">汕尾</a>
                                                    <a href="/shangluo/movie/page-1-type-0.html" rel="nofollow">商洛</a>
                                                    <a href="/sheyang/movie/page-1-type-0.html" rel="nofollow">射阳</a>
                                                    <a href="/suihua/movie/page-1-type-0.html" rel="nofollow">绥化</a>
                                                    <a href="/suizhou/movie/page-1-type-0.html" rel="nofollow">随州</a>
                                                    <a href="/sanmenxia/movie/page-1-type-0.html" rel="nofollow">三门峡</a>
                                                    <a href="/shizuishan/movie/page-1-type-0.html" rel="nofollow">石嘴山</a>
                                                    <a href="/siping/movie/page-1-type-0.html" rel="nofollow">四平</a>
                                                    <a href="/suining/movie/page-1-type-0.html" rel="nofollow">遂宁</a>
                                                    <a href="/shihezi/movie/page-1-type-0.html" rel="nofollow">石河子</a>
                                                    <a href="/songyuan/movie/page-1-type-0.html" rel="nofollow">松原</a>
                                                    <a href="/shangrao/movie/page-1-type-0.html" rel="nofollow">上饶</a>
                                                    <a href="/shaoguan/movie/page-1-type-0.html" rel="nofollow">韶关</a>
                                                    <a href="/sanya/movie/page-1-type-0.html" rel="nofollow">三亚</a>
                                                    <a href="/shiyan/movie/page-1-type-0.html" rel="nofollow">十堰</a>
                                                    <a href="/shangqiu/movie/page-1-type-0.html" rel="nofollow">商丘</a>
                                                    <a href="/suqian/movie/page-1-type-0.html" rel="nofollow">宿迁</a>
                                                    <a href="/shantou/movie/page-1-type-0.html" rel="nofollow">汕头</a>
                                                    <a href="/shaoyang/movie/page-1-type-0.html" rel="nofollow">邵阳</a>
                                                    <a href="/sanming/movie/page-1-type-0.html" rel="nofollow">三明</a>
                                                    <a href="/shaoxing/movie/page-1-type-0.html" rel="nofollow">绍兴</a>
                                                    <a href="/suzhou/movie/page-1-type-0.html" rel="nofollow">苏州</a>
                                                    <a href="/shijiazhuang/movie/page-1-type-0.html" rel="nofollow">石家庄</a>
                                                    <a href="/shenzhen/movie/page-1-type-0.html" rel="nofollow">深圳</a>
                                                    <a href="/shenyang/movie/page-1-type-0.html" rel="nofollow">沈阳</a>
                                                    <a href="/shanghai/movie/page-1-type-0.html" rel="nofollow">上海</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>T</dt>
                                            <dd>
                                                    <a href="/taixing/movie/page-1-type-0.html" rel="nofollow">泰兴</a>
                                                    <a href="/tongren/movie/page-1-type-0.html" rel="nofollow">铜仁</a>
                                                    <a href="/tongliao/movie/page-1-type-0.html" rel="nofollow">通辽</a>
                                                    <a href="/tongchuan/movie/page-1-type-0.html" rel="nofollow">铜川</a>
                                                    <a href="/tieling/movie/page-1-type-0.html" rel="nofollow">铁岭</a>
                                                    <a href="/tianmen/movie/page-1-type-0.html" rel="nofollow">天门</a>
                                                    <a href="/tonghua/movie/page-1-type-0.html" rel="nofollow">通化</a>
                                                    <a href="/tianshui/movie/page-1-type-0.html" rel="nofollow">天水</a>
                                                    <a href="/tengzhou/movie/page-1-type-0.html" rel="nofollow">滕州</a>
                                                    <a href="/tongling/movie/page-1-type-0.html" rel="nofollow">铜陵</a>
                                                    <a href="/tongxiang/movie/page-1-type-0.html" rel="nofollow">桐乡</a>
                                                    <a href="/taian/movie/page-1-type-0.html" rel="nofollow">泰安</a>
                                                    <a href="/taizhou2/movie/page-1-type-0.html" rel="nofollow">泰州</a>
                                                    <a href="/taizhou/movie/page-1-type-0.html" rel="nofollow">台州</a>
                                                    <a href="/tangshan/movie/page-1-type-0.html" rel="nofollow">唐山</a>
                                                    <a href="/taiyuan/movie/page-1-type-0.html" rel="nofollow">太原</a>
                                                    <a href="/tianjin/movie/page-1-type-0.html" rel="nofollow">天津</a>
                                            </dd>
                                        </dl>
                            </div>
                            <div id="cityList_4" class="cityListGroup none">
                                        <dl>
                                            <dt>W</dt>
                                            <dd>
                                                    <a href="/wenchang/movie/page-1-type-0.html" rel="nofollow">文昌</a>
                                                    <a href="/wuzhong/movie/page-1-type-0.html" rel="nofollow">吴忠</a>
                                                    <a href="/wanning/movie/page-1-type-0.html" rel="nofollow">万宁</a>
                                                    <a href="/wulanchabu/movie/page-1-type-0.html" rel="nofollow">乌兰察布</a>
                                                    <a href="/wenshan/movie/page-1-type-0.html" rel="nofollow">文山</a>
                                                    <a href="/wulanhaote/movie/page-1-type-0.html" rel="nofollow">乌兰浩特</a>
                                                    <a href="/wuhai/movie/page-1-type-0.html" rel="nofollow">乌海</a>
                                                    <a href="/wuwei/movie/page-1-type-0.html" rel="nofollow">武威</a>
                                                    <a href="/weinan/movie/page-1-type-0.html" rel="nofollow">渭南</a>
                                                    <a href="/wulumuqi/movie/page-1-type-0.html" rel="nofollow">乌鲁木齐</a>
                                                    <a href="/wuhu/movie/page-1-type-0.html" rel="nofollow">芜湖</a>
                                                    <a href="/wenzhou/movie/page-1-type-0.html" rel="nofollow">温州</a>
                                                    <a href="/wujiang/movie/page-1-type-0.html" rel="nofollow">吴江</a>
                                                    <a href="/weifang/movie/page-1-type-0.html" rel="nofollow">潍坊</a>
                                                    <a href="/weihai/movie/page-1-type-0.html" rel="nofollow">威海</a>
                                                    <a href="/wuxi/movie/page-1-type-0.html" rel="nofollow">无锡</a>
                                                    <a href="/wuzhou/movie/page-1-type-0.html" rel="nofollow">梧州</a>
                                                    <a href="/wuhan/movie/page-1-type-0.html" rel="nofollow">武汉</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>X</dt>
                                            <dd>
                                                    <a href="/xichong/movie/page-1-type-0.html" rel="nofollow">西充县</a>
                                                    <a href="/xinzhou/movie/page-1-type-0.html" rel="nofollow">忻州</a>
                                                    <a href="/xilinhaote/movie/page-1-type-0.html" rel="nofollow">锡林浩特</a>
                                                    <a href="/xinghua/movie/page-1-type-0.html" rel="nofollow">兴化</a>
                                                    <a href="/xiangxiang/movie/page-1-type-0.html" rel="nofollow">湘乡</a>
                                                    <a href="/xichang/movie/page-1-type-0.html" rel="nofollow">西昌</a>
                                                    <a href="/xingcheng/movie/page-1-type-0.html" rel="nofollow">兴城</a>
                                                    <a href="/xiangxi/movie/page-1-type-0.html" rel="nofollow">湘西</a>
                                                    <a href="/xishuangbanna/movie/page-1-type-0.html" rel="nofollow">西双版纳</a>
                                                    <a href="/xiantao/movie/page-1-type-0.html" rel="nofollow">仙桃</a>
                                                    <a href="/xianning/movie/page-1-type-0.html" rel="nofollow">咸宁</a>
                                                    <a href="/xuchang/movie/page-1-type-0.html" rel="nofollow">许昌</a>
                                                    <a href="/xiaogan/movie/page-1-type-0.html" rel="nofollow">孝感</a>
                                                    <a href="/xuancheng/movie/page-1-type-0.html" rel="nofollow">宣城</a>
                                                    <a href="/xinyu/movie/page-1-type-0.html" rel="nofollow">新余</a>
                                                    <a href="/xinyang/movie/page-1-type-0.html" rel="nofollow">信阳</a>
                                                    <a href="/xianyang/movie/page-1-type-0.html" rel="nofollow">咸阳</a>
                                                    <a href="/xining/movie/page-1-type-0.html" rel="nofollow">西宁</a>
                                                    <a href="/xiangtan/movie/page-1-type-0.html" rel="nofollow">湘潭</a>
                                                    <a href="/xinxiang/movie/page-1-type-0.html" rel="nofollow">新乡</a>
                                                    <a href="/xiangyang/movie/page-1-type-0.html" rel="nofollow">襄阳</a>
                                                    <a href="/xingtai/movie/page-1-type-0.html" rel="nofollow">邢台</a>
                                                    <a href="/xiamen/movie/page-1-type-0.html" rel="nofollow">厦门</a>
                                                    <a href="/xuzhou/movie/page-1-type-0.html" rel="nofollow">徐州</a>
                                                    <a href="/xian/movie/page-1-type-0.html" rel="nofollow">西安</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>Y</dt>
                                            <dd>
                                                    <a href="/yichun2/movie/page-1-type-0.html" rel="nofollow">伊春</a>
                                                    <a href="/yaan/movie/page-1-type-0.html" rel="nofollow">雅安</a>
                                                    <a href="/yongan/movie/page-1-type-0.html" rel="nofollow">永安</a>
                                                    <a href="/yongkang/movie/page-1-type-0.html" rel="nofollow">永康</a>
                                                    <a href="/yanzhou/movie/page-1-type-0.html" rel="nofollow">兖州</a>
                                                    <a href="/yuyao/movie/page-1-type-0.html" rel="nofollow">余姚</a>
                                                    <a href="/yiwu/movie/page-1-type-0.html" rel="nofollow">义乌</a>
                                                    <a href="/yulin1/movie/page-1-type-0.html" rel="nofollow">玉林</a>
                                                    <a href="/yunfu/movie/page-1-type-0.html" rel="nofollow">云浮</a>
                                                    <a href="/yingtan/movie/page-1-type-0.html" rel="nofollow">鹰潭</a>
                                                    <a href="/yangzhong/movie/page-1-type-0.html" rel="nofollow">扬中</a>
                                                    <a href="/yuxi/movie/page-1-type-0.html" rel="nofollow">玉溪</a>
                                                    <a href="/yiyang/movie/page-1-type-0.html" rel="nofollow">益阳</a>
                                                    <a href="/yongzhou/movie/page-1-type-0.html" rel="nofollow">永州</a>
                                                    <a href="/yanan/movie/page-1-type-0.html" rel="nofollow">延安</a>
                                                    <a href="/yibin/movie/page-1-type-0.html" rel="nofollow">宜宾</a>
                                                    <a href="/yichun/movie/page-1-type-0.html" rel="nofollow">宜春</a>
                                                    <a href="/yanbian/movie/page-1-type-0.html" rel="nofollow">延边</a>
                                                    <a href="/yulin/movie/page-1-type-0.html" rel="nofollow">榆林</a>
                                                    <a href="/yueyang/movie/page-1-type-0.html" rel="nofollow">岳阳</a>
                                                    <a href="/yixing/movie/page-1-type-0.html" rel="nofollow">宜兴</a>
                                                    <a href="/yuncheng/movie/page-1-type-0.html" rel="nofollow">运城</a>
                                                    <a href="/yinchuan/movie/page-1-type-0.html" rel="nofollow">银川</a>
                                                    <a href="/yancheng/movie/page-1-type-0.html" rel="nofollow">盐城</a>
                                                    <a href="/yili/movie/page-1-type-0.html" rel="nofollow">伊犁</a>
                                                    <a href="/yingkou/movie/page-1-type-0.html" rel="nofollow">营口</a>
                                                    <a href="/yangquan/movie/page-1-type-0.html" rel="nofollow">阳泉</a>
                                                    <a href="/yichang/movie/page-1-type-0.html" rel="nofollow">宜昌</a>
                                                    <a href="/yangzhou/movie/page-1-type-0.html" rel="nofollow">扬州</a>
                                                    <a href="/yangjiang/movie/page-1-type-0.html" rel="nofollow">阳江</a>
                                                    <a href="/yizheng/movie/page-1-type-0.html" rel="nofollow">仪征</a>
                                                    <a href="/yantai/movie/page-1-type-0.html" rel="nofollow">烟台</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>Z</dt>
                                            <dd>
                                                    <a href="/zhaotong/movie/page-1-type-0.html" rel="nofollow">昭通</a>
                                                    <a href="/zhuji/movie/page-1-type-0.html" rel="nofollow">诸暨</a>
                                                    <a href="/zoucheng/movie/page-1-type-0.html" rel="nofollow">邹城</a>
                                                    <a href="/zhongwei/movie/page-1-type-0.html" rel="nofollow">中卫</a>
                                                    <a href="/zhangye/movie/page-1-type-0.html" rel="nofollow">张掖</a>
                                                    <a href="/zhangjiajie/movie/page-1-type-0.html" rel="nofollow">张家界</a>
                                                    <a href="/zhucheng/movie/page-1-type-0.html" rel="nofollow">诸城</a>
                                                    <a href="/ziyang/movie/page-1-type-0.html" rel="nofollow">资阳</a>
                                                    <a href="/zunyi/movie/page-1-type-0.html" rel="nofollow">遵义</a>
                                                    <a href="/zhoushan/movie/page-1-type-0.html" rel="nofollow">舟山</a>
                                                    <a href="/zhangjiakou/movie/page-1-type-0.html" rel="nofollow">张家口</a>
                                                    <a href="/zhangjiagang/movie/page-1-type-0.html" rel="nofollow">张家港</a>
                                                    <a href="/zhangzhou/movie/page-1-type-0.html" rel="nofollow">漳州</a>
                                                    <a href="/zaozhuang/movie/page-1-type-0.html" rel="nofollow">枣庄</a>
                                                    <a href="/zhuhai/movie/page-1-type-0.html" rel="nofollow">珠海</a>
                                                    <a href="/zibo/movie/page-1-type-0.html" rel="nofollow">淄博</a>
                                                    <a href="/zigong/movie/page-1-type-0.html" rel="nofollow">自贡</a>
                                                    <a href="/zhumadian/movie/page-1-type-0.html" rel="nofollow">驻马店</a>
                                                    <a href="/zhuzhou/movie/page-1-type-0.html" rel="nofollow">株洲</a>
                                                    <a href="/zhaoqing/movie/page-1-type-0.html" rel="nofollow">肇庆</a>
                                                    <a href="/zhenjiang/movie/page-1-type-0.html" rel="nofollow">镇江</a>
                                                    <a href="/zhongshan/movie/page-1-type-0.html" rel="nofollow">中山</a>
                                                    <a href="/zhengzhou/movie/page-1-type-0.html" rel="nofollow">郑州</a>
                                                    <a href="/zhanjiang/movie/page-1-type-0.html" rel="nofollow">湛江</a>
                                                    <a href="/zhoukou/movie/page-1-type-0.html" rel="nofollow">周口</a>
                                            </dd>
                                        </dl>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    	<ul class="shift">  
            <li>
                <a  class="active" href="/beijing/movie/page-1-type-0.html" rel="nofollow">首页</a>
            </li>  		
    		<li class="movie" id="movieLink">
				<a  class="" href="javascript:;">电影<i class="triangle2"></i></a>
			     <dl  id="movieMenu">
                    <dd><a href="{{ url('onshow') }}" rel="nofollow">正在热映</a></dd>
                    <dd><a href="{{ url('upcoming') }}" rel="nofollow">即将上映</a></dd>
                </dl>
            </li>
    		<li>
				<a  class=""  href="/beijing/cinema/category-ALL-area-0-type-0.html?keywords=#from=cinema" rel="nofollow">影院</a>
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
