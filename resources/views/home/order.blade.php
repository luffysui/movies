<!DOCTYPE HTML>
<html>

<head>
<link rel="shortcut icon" href="/favicon.ico"/>
<title>网易电影-选座购票,购买电影票,电影排期,电影院查询</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="网易电影,选座购票,买电影票,在线购票,影讯,热映影片"/>
<meta name="description" content="网易电影是一个能够让您在线购买电影票的在线选座平台，同时网易电影还提供电影排期，影院信息查询等服务，方便您足不出户，在家中在线购票。看电影，来网易电影选座"/>
<meta http-equiv="X-Frame-Options" content="DENY"/>


<link rel="stylesheet" href="Css/base.css"/>
<link rel="stylesheet" href="Css/core.css"/>
<link rel="stylesheet" href="Css/detail.css"/>
<link rel="stylesheet" href="Css/jquery.jscrollpane.codrops.css"/>
<script src="Scripts/jquery-1.4.2.js"></script>
	
	<script src="Scripts/easycore.js"></script><script src="Scripts/dialog.js"></script><script src="Scripts/autocomplete.js"></script>


  <script>
    if(!!window.Core){
        Core.cdnBaseUrl="http://pimg1.126.net/movie";
        Core.cdnFileVersion="1495696265";
        Core.curCity={'name':'北京','id':'1006','spell':'beijing'};
    }  	
  </script>

	
	
	
	<script src="Scripts/xframe.js"></script>
</head>
<body>
<noscript><div id="noScript">
<div><h2>请开启浏览器的Javascript功能</h2><p>亲，没它我们玩不转啊！求您了，开启Javascript吧！<br/>不知道怎么开启Javascript？那就请<a href="http://www.baidu.com/s?wd=%E5%A6%82%E4%BD%95%E6%89%93%E5%BC%80Javascript%E5%8A%9F%E8%83%BD" target="_blank">猛击这里</a>！</p></div>
</div></noscript>
<style type="text/css">
.searchBoxInd{margin-bottom:20px;}

#seat_area  .jspDrag{
	background:url('Images/scroll_h_bar.gif') no-repeat scroll center center #666;
}
#seat_area  .jspPane{left:0;top:0;}
</style>
    <nav id="topNav">
        <div id="topNavWrap">
            <div id="topNavLeft"><script>Core.navInit("http://pimg1.126.net/movie","","1495696265","")</script></div>
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
                <input id="cityUrl" class="cityUrl" type="hidden" value="/beijing">
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
                                        <a href="/beijing" rel="nofollow">北京</a>
                                        <a href="/shanghai" rel="nofollow">上海</a>
                                        <a href="/guangzhou" rel="nofollow">广州</a>
                                        <a href="/shenzhen" rel="nofollow">深圳</a>
                                        <a href="/hangzhou" rel="nofollow">杭州</a>
                                        <a href="/nanjing" rel="nofollow">南京</a>
                                        <a href="/chengdu" rel="nofollow">成都</a>
                                        <a href="/chongqing" rel="nofollow">重庆</a>
                                    </dd>
                                </dl>
                            </div>
                            <div  id="cityList_1" class="cityListGroup none">                                
                                        <dl>
                                            <dt>A</dt>
                                            <dd>
                                                    <a href="/anlu" rel="nofollow">安陆</a>
                                                    <a href="/anning" rel="nofollow">安宁</a>
                                                    <a href="/ankang" rel="nofollow">安康</a>
                                                    <a href="/anshun" rel="nofollow">安顺</a>
                                                    <a href="/anyang" rel="nofollow">安阳</a>
                                                    <a href="/anqing" rel="nofollow">安庆</a>
                                                    <a href="/anshan" rel="nofollow">鞍山</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>B</dt>
                                            <dd>
                                                    <a href="/bayinguoleng" rel="nofollow">巴音郭楞</a>
                                                    <a href="/beian" rel="nofollow">北安市</a>
                                                    <a href="/baicheng" rel="nofollow">白城</a>
                                                    <a href="/bijie" rel="nofollow">毕节</a>
                                                    <a href="/bazhou" rel="nofollow">霸州</a>
                                                    <a href="/bazhong" rel="nofollow">巴中</a>
                                                    <a href="/baishan" rel="nofollow">白山</a>
                                                    <a href="/baoshan" rel="nofollow">保山</a>
                                                    <a href="/baise" rel="nofollow">百色</a>
                                                    <a href="/bayannaoer" rel="nofollow">巴彦淖尔</a>
                                                    <a href="/baiyin" rel="nofollow">白银</a>
                                                    <a href="/bozhou" rel="nofollow">亳州</a>
                                                    <a href="/beihai" rel="nofollow">北海</a>
                                                    <a href="/benxi" rel="nofollow">本溪</a>
                                                    <a href="/bangbu" rel="nofollow">蚌埠</a>
                                                    <a href="/baoding" rel="nofollow">保定</a>
                                                    <a href="/binzhou" rel="nofollow">滨州</a>
                                                    <a href="/baotou" rel="nofollow">包头</a>
                                                    <a href="/baoji" rel="nofollow">宝鸡</a>
                                                    <a href="/beijing" rel="nofollow">北京</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>C</dt>
                                            <dd>
                                                    <a href="/chaoyang" rel="nofollow">朝阳</a>
                                                    <a href="/chongzuo" rel="nofollow">崇左</a>
                                                    <a href="/conghua" rel="nofollow">从化</a>
                                                    <a href="/changge" rel="nofollow">长葛</a>
                                                    <a href="/chibi" rel="nofollow">赤壁</a>
                                                    <a href="/chengde" rel="nofollow">承德</a>
                                                    <a href="/changji" rel="nofollow">昌吉</a>
                                                    <a href="/chizhou" rel="nofollow">池州</a>
                                                    <a href="/chaohu" rel="nofollow">巢湖</a>
                                                    <a href="/changzhi" rel="nofollow">长治</a>
                                                    <a href="/chifeng" rel="nofollow">赤峰</a>
                                                    <a href="/chaozhou" rel="nofollow">潮州</a>
                                                    <a href="/chuzhou" rel="nofollow">滁州</a>
                                                    <a href="/cangzhou" rel="nofollow">沧州</a>
                                                    <a href="/changshu" rel="nofollow">常熟</a>
                                                    <a href="/chenzhou" rel="nofollow">郴州</a>
                                                    <a href="/changde" rel="nofollow">常德</a>
                                                    <a href="/changzhou" rel="nofollow">常州</a>
                                                    <a href="/changchun" rel="nofollow">长春</a>
                                                    <a href="/changsha" rel="nofollow">长沙</a>
                                                    <a href="/chuxiong" rel="nofollow">楚雄</a>
                                                    <a href="/cixi" rel="nofollow">慈溪</a>
                                                    <a href="/chengdu" rel="nofollow">成都</a>
                                                    <a href="/chongqing" rel="nofollow">重庆</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>D</dt>
                                            <dd>
                                                    <a href="/dongfang" rel="nofollow">东方</a>
                                                    <a href="/danzhou" rel="nofollow">儋州</a>
                                                    <a href="/dongtai" rel="nofollow">东台</a>
                                                    <a href="/dunhuang" rel="nofollow">敦煌</a>
                                                    <a href="/dafeng" rel="nofollow">大丰</a>
                                                    <a href="/duyun" rel="nofollow">都匀</a>
                                                    <a href="/dongyang" rel="nofollow">东阳</a>
                                                    <a href="/donggang" rel="nofollow">东港</a>
                                                    <a href="/diqing" rel="nofollow">迪庆</a>
                                                    <a href="/danjiangkou" rel="nofollow">丹江口</a>
                                                    <a href="/dashiqiao" rel="nofollow">大石桥</a>
                                                    <a href="/danyang" rel="nofollow">丹阳</a>
                                                    <a href="/dingxi" rel="nofollow">定西</a>
                                                    <a href="/dujiangyan" rel="nofollow">都江堰</a>
                                                    <a href="/dazhou" rel="nofollow">达州</a>
                                                    <a href="/datong" rel="nofollow">大同</a>
                                                    <a href="/daqing" rel="nofollow">大庆</a>
                                                    <a href="/dandong" rel="nofollow">丹东</a>
                                                    <a href="/dezhou" rel="nofollow">德州</a>
                                                    <a href="/deyang" rel="nofollow">德阳</a>
                                                    <a href="/dongying" rel="nofollow">东营</a>
                                                    <a href="/dali" rel="nofollow">大理</a>
                                                    <a href="/dalian" rel="nofollow">大连</a>
                                                    <a href="/dongguan" rel="nofollow">东莞</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>E</dt>
                                            <dd>
                                                    <a href="/eerduosi" rel="nofollow">鄂尔多斯</a>
                                                    <a href="/ezhou" rel="nofollow">鄂州</a>
                                                    <a href="/enshi" rel="nofollow">恩施</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>F</dt>
                                            <dd>
                                                    <a href="/fengcheng2" rel="nofollow">丰城</a>
                                                    <a href="/fujian2" rel="nofollow">福建</a>
                                                    <a href="/fuqing" rel="nofollow">福清</a>
                                                    <a href="/fuyang1" rel="nofollow">阜阳</a>
                                                    <a href="/fuzhou1" rel="nofollow">抚州</a>
                                                    <a href="/fangchenggang" rel="nofollow">防城港</a>
                                                    <a href="/fuxin" rel="nofollow">阜新</a>
                                                    <a href="/fushun" rel="nofollow">抚顺</a>
                                                    <a href="/fuyang" rel="nofollow">富阳</a>
                                                    <a href="/foshan" rel="nofollow">佛山</a>
                                                    <a href="/fuzhou" rel="nofollow">福州</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>G</dt>
                                            <dd>
                                                    <a href="/gannan" rel="nofollow">甘南</a>
                                                    <a href="/guangan" rel="nofollow">广安市</a>
                                                    <a href="/guangyuan" rel="nofollow">广元</a>
                                                    <a href="/guixi" rel="nofollow">贵溪</a>
                                                    <a href="/ganzi" rel="nofollow">甘孜</a>
                                                    <a href="/gaizhou" rel="nofollow">盖州</a>
                                                    <a href="/guyuan" rel="nofollow">固原</a>
                                                    <a href="/gaoyou" rel="nofollow">高邮</a>
                                                    <a href="/guanghan" rel="nofollow">广汉</a>
                                                    <a href="/guigang" rel="nofollow">贵港</a>
                                                    <a href="/ganzhou" rel="nofollow">赣州</a>
                                                    <a href="/guiyang" rel="nofollow">贵阳</a>
                                                    <a href="/guilin" rel="nofollow">桂林</a>
                                                    <a href="/guangzhou" rel="nofollow">广州</a>
                                            </dd>
                                        </dl>
                            </div>                            
                            <div id="cityList_2" class="cityListGroup none">
                                        <dl>
                                            <dt>H</dt>
                                            <dd>
                                                    <a href="/hainan" rel="nofollow">海南</a>
                                                    <a href="/heihe" rel="nofollow">黑河</a>
                                                    <a href="/haiyan" rel="nofollow">海盐</a>
                                                    <a href="/hulin" rel="nofollow">虎林</a>
                                                    <a href="/huaying" rel="nofollow">华蓥</a>
                                                    <a href="/houma" rel="nofollow">侯马</a>
                                                    <a href="/heshan" rel="nofollow">鹤山</a>
                                                    <a href="/honghu" rel="nofollow">洪湖</a>
                                                    <a href="/huaihua" rel="nofollow">怀化</a>
                                                    <a href="/huaibei" rel="nofollow">淮北</a>
                                                    <a href="/hengshui" rel="nofollow">衡水</a>
                                                    <a href="/hechi" rel="nofollow">河池</a>
                                                    <a href="/hegang" rel="nofollow">鹤岗</a>
                                                    <a href="/haimen" rel="nofollow">海门</a>
                                                    <a href="/hebi" rel="nofollow">鹤壁</a>
                                                    <a href="/haian" rel="nofollow">海安</a>
                                                    <a href="/huanggang" rel="nofollow">黄冈</a>
                                                    <a href="/hanzhong" rel="nofollow">汉中</a>
                                                    <a href="/hezhou" rel="nofollow">贺州</a>
                                                    <a href="/hulunbeier" rel="nofollow">呼伦贝尔</a>
                                                    <a href="/huangshi" rel="nofollow">黄石</a>
                                                    <a href="/heyuan" rel="nofollow">河源</a>
                                                    <a href="/huangshan" rel="nofollow">黄山</a>
                                                    <a href="/huainan" rel="nofollow">淮南</a>
                                                    <a href="/handan" rel="nofollow">邯郸</a>
                                                    <a href="/huaian" rel="nofollow">淮安</a>
                                                    <a href="/haikou" rel="nofollow">海口</a>
                                                    <a href="/huludao" rel="nofollow">葫芦岛</a>
                                                    <a href="/heze" rel="nofollow">菏泽</a>
                                                    <a href="/hengyang" rel="nofollow">衡阳</a>
                                                    <a href="/hefei" rel="nofollow">合肥</a>
                                                    <a href="/huzhou" rel="nofollow">湖州</a>
                                                    <a href="/haerbin" rel="nofollow">哈尔滨</a>
                                                    <a href="/honghe" rel="nofollow">红河</a>
                                                    <a href="/huizhou" rel="nofollow">惠州</a>
                                                    <a href="/huhehaote" rel="nofollow">呼和浩特</a>
                                                    <a href="/hangzhou" rel="nofollow">杭州</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>J</dt>
                                            <dd>
                                                    <a href="/jinchang" rel="nofollow">金昌市</a>
                                                    <a href="/jiangshan" rel="nofollow">江山</a>
                                                    <a href="/jiangyou" rel="nofollow">江油</a>
                                                    <a href="/jinjinag" rel="nofollow">晋江</a>
                                                    <a href="/jilin" rel="nofollow">吉林</a>
                                                    <a href="/jintan" rel="nofollow">金坛</a>
                                                    <a href="/jimo" rel="nofollow">即墨</a>
                                                    <a href="/jian" rel="nofollow">吉安</a>
                                                    <a href="/jinzhong" rel="nofollow">晋中</a>
                                                    <a href="/jurong" rel="nofollow">句容</a>
                                                    <a href="/jiuquan" rel="nofollow">酒泉</a>
                                                    <a href="/jiaozhou" rel="nofollow">胶州</a>
                                                    <a href="/jiayuguan" rel="nofollow">嘉峪关</a>
                                                    <a href="/jixi" rel="nofollow">鸡西</a>
                                                    <a href="/jingmen" rel="nofollow">荆门</a>
                                                    <a href="/jingzhou" rel="nofollow">荆州</a>
                                                    <a href="/jiyuan" rel="nofollow">济源</a>
                                                    <a href="/jinzhou" rel="nofollow">锦州</a>
                                                    <a href="/jiaozuo" rel="nofollow">焦作</a>
                                                    <a href="/jieyang" rel="nofollow">揭阳</a>
                                                    <a href="/jiangyin" rel="nofollow">江阴</a>
                                                    <a href="/jingdezhen" rel="nofollow">景德镇</a>
                                                    <a href="/jincheng" rel="nofollow">晋城</a>
                                                    <a href="/jiangmen" rel="nofollow">江门</a>
                                                    <a href="/jinan" rel="nofollow">济南</a>
                                                    <a href="/jiamusi" rel="nofollow">佳木斯</a>
                                                    <a href="/jining" rel="nofollow">济宁</a>
                                                    <a href="/jiujiang" rel="nofollow">九江</a>
                                                    <a href="/jingjiang" rel="nofollow">靖江</a>
                                                    <a href="/jiande" rel="nofollow">建德</a>
                                                    <a href="/jinhua" rel="nofollow">金华</a>
                                                    <a href="/jiaxing" rel="nofollow">嘉兴</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>K</dt>
                                            <dd>
                                                    <a href="/kelamayi" rel="nofollow">克拉玛依</a>
                                                    <a href="/kashi" rel="nofollow">喀什</a>
                                                    <a href="/kaili" rel="nofollow">凯里</a>
                                                    <a href="/kaiping" rel="nofollow">开平</a>
                                                    <a href="/kaifeng" rel="nofollow">开封</a>
                                                    <a href="/kunshan" rel="nofollow">昆山</a>
                                                    <a href="/kunming" rel="nofollow">昆明</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>L</dt>
                                            <dd>
                                                    <a href="/ledong" rel="nofollow">乐东</a>
                                                    <a href="/lingaoxian" rel="nofollow">临高县</a>
                                                    <a href="/laibin" rel="nofollow">来宾</a>
                                                    <a href="/linzhi" rel="nofollow">林芝</a>
                                                    <a href="/linxia2" rel="nofollow">临夏</a>
                                                    <a href="/lianjiang" rel="nofollow">廉江</a>
                                                    <a href="/lianzhou" rel="nofollow">连州</a>
                                                    <a href="/laizhou" rel="nofollow">莱州</a>
                                                    <a href="/luquanshi" rel="nofollow">鹿泉市</a>
                                                    <a href="/liling" rel="nofollow">醴陵</a>
                                                    <a href="/lichuan" rel="nofollow">利川</a>
                                                    <a href="/leping" rel="nofollow">乐平</a>
                                                    <a href="/linqing" rel="nofollow">临清</a>
                                                    <a href="/longkou" rel="nofollow">龙口</a>
                                                    <a href="/longquan" rel="nofollow">龙泉</a>
                                                    <a href="/lvliang" rel="nofollow">吕梁</a>
                                                    <a href="/lasa" rel="nofollow">拉萨</a>
                                                    <a href="/lijiang" rel="nofollow">丽江</a>
                                                    <a href="/lincang" rel="nofollow">临沧</a>
                                                    <a href="/longnan" rel="nofollow">陇南</a>
                                                    <a href="/luohe" rel="nofollow">漯河</a>
                                                    <a href="/liaoyang" rel="nofollow">辽阳</a>
                                                    <a href="/laiyang" rel="nofollow">莱阳</a>
                                                    <a href="/linhai" rel="nofollow">临海</a>
                                                    <a href="/liupanshui" rel="nofollow">六盘水</a>
                                                    <a href="/leiyang" rel="nofollow">耒阳</a>
                                                    <a href="/liaoyuan" rel="nofollow">辽源</a>
                                                    <a href="/liuan" rel="nofollow">六安</a>
                                                    <a href="/linan" rel="nofollow">临安</a>
                                                    <a href="/liyang" rel="nofollow">溧阳</a>
                                                    <a href="/luzhou" rel="nofollow">泸州</a>
                                                    <a href="/longyan" rel="nofollow">龙岩</a>
                                                    <a href="/lishui" rel="nofollow">丽水</a>
                                                    <a href="/lianyungang" rel="nofollow">连云港</a>
                                                    <a href="/linyi" rel="nofollow">临沂</a>
                                                    <a href="/liuzhou" rel="nofollow">柳州</a>
                                                    <a href="/laiwu" rel="nofollow">莱芜</a>
                                                    <a href="/liaocheng" rel="nofollow">聊城</a>
                                                    <a href="/leshan" rel="nofollow">乐山</a>
                                                    <a href="/linfen" rel="nofollow">临汾</a>
                                                    <a href="/luoyang" rel="nofollow">洛阳</a>
                                                    <a href="/langfang" rel="nofollow">廊坊</a>
                                                    <a href="/loudi" rel="nofollow">娄底</a>
                                                    <a href="/lanzhou" rel="nofollow">兰州</a>
                                            </dd>
                                        </dl>
                            </div>
                            <div id="cityList_3" class="cityListGroup none">
                                        <dl>
                                            <dt>M</dt>
                                            <dd>
                                                    <a href="/maerkang" rel="nofollow">马尔康</a>
                                                    <a href="/mangshi" rel="nofollow">芒市</a>
                                                    <a href="/mianzhu" rel="nofollow">绵竹</a>
                                                    <a href="/macheng" rel="nofollow">麻城</a>
                                                    <a href="/meishan" rel="nofollow">眉山</a>
                                                    <a href="/meizhou" rel="nofollow">梅州</a>
                                                    <a href="/maoming" rel="nofollow">茂名</a>
                                                    <a href="/mudanjiang" rel="nofollow">牡丹江</a>
                                                    <a href="/mianyang" rel="nofollow">绵阳</a>
                                                    <a href="/maanshan" rel="nofollow">马鞍山</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>N</dt>
                                            <dd>
                                                    <a href="/ningguo" rel="nofollow">宁国</a>
                                                    <a href="/nanping" rel="nofollow">南平</a>
                                                    <a href="/ningde" rel="nofollow">宁德</a>
                                                    <a href="/neijiang" rel="nofollow">内江</a>
                                                    <a href="/nanchong" rel="nofollow">南充</a>
                                                    <a href="/nanyang" rel="nofollow">南阳</a>
                                                    <a href="/nanchang" rel="nofollow">南昌</a>
                                                    <a href="/nanjing" rel="nofollow">南京</a>
                                                    <a href="/nanning" rel="nofollow">南宁</a>
                                                    <a href="/ningbo" rel="nofollow">宁波</a>
                                                    <a href="/nantong" rel="nofollow">南通</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>P</dt>
                                            <dd>
                                                    <a href="/puer" rel="nofollow">普洱</a>
                                                    <a href="/pizhou" rel="nofollow">邳州</a>
                                                    <a href="/pingliang" rel="nofollow">平凉</a>
                                                    <a href="/panzhihua" rel="nofollow">攀枝花</a>
                                                    <a href="/pingxiang" rel="nofollow">萍乡</a>
                                                    <a href="/panjin" rel="nofollow">盘锦</a>
                                                    <a href="/puyang" rel="nofollow">濮阳</a>
                                                    <a href="/pingdingshan" rel="nofollow">平顶山</a>
                                                    <a href="/putian" rel="nofollow">莆田</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>Q</dt>
                                            <dd>
                                                    <a href="/qianxinan2" rel="nofollow">黔西南</a>
                                                    <a href="/qiannan2" rel="nofollow">黔南州</a>
                                                    <a href="/qingyang" rel="nofollow">庆阳</a>
                                                    <a href="/qingzhou" rel="nofollow">青州</a>
                                                    <a href="/qionghai" rel="nofollow">琼海</a>
                                                    <a href="/qujing" rel="nofollow">曲靖</a>
                                                    <a href="/qianjiang" rel="nofollow">潜江</a>
                                                    <a href="/qinzhou" rel="nofollow">钦州</a>
                                                    <a href="/qianan" rel="nofollow">迁安</a>
                                                    <a href="/qidong" rel="nofollow">启东</a>
                                                    <a href="/qiqihaer" rel="nofollow">齐齐哈尔</a>
                                                    <a href="/qinhuangdao" rel="nofollow">秦皇岛</a>
                                                    <a href="/quanzhou" rel="nofollow">泉州</a>
                                                    <a href="/qingyuan" rel="nofollow">清远</a>
                                                    <a href="/qingdao" rel="nofollow">青岛</a>
                                                    <a href="/quzhou" rel="nofollow">衢州</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>R</dt>
                                            <dd>
                                                    <a href="/renhuai" rel="nofollow">仁怀</a>
                                                    <a href="/rugao" rel="nofollow">如皋</a>
                                                    <a href="/rizhao" rel="nofollow">日照</a>
                                                    <a href="/ruian" rel="nofollow">瑞安</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>S</dt>
                                            <dd>
                                                    <a href="/shuangyashan" rel="nofollow">双鸭山</a>
                                                    <a href="/shuozhou" rel="nofollow">朔州</a>
                                                    <a href="/sihong" rel="nofollow">泗洪</a>
                                                    <a href="/shifang" rel="nofollow">什邡</a>
                                                    <a href="/shangzhi" rel="nofollow">尚志</a>
                                                    <a href="/shouguang" rel="nofollow">寿光</a>
                                                    <a href="/sanhe" rel="nofollow">三河市</a>
                                                    <a href="/shaoshan" rel="nofollow">韶山</a>
                                                    <a href="/shangyu" rel="nofollow">上虞</a>
                                                    <a href="/suzhou1" rel="nofollow">宿州</a>
                                                    <a href="/shanwei" rel="nofollow">汕尾</a>
                                                    <a href="/shangluo" rel="nofollow">商洛</a>
                                                    <a href="/sheyang" rel="nofollow">射阳</a>
                                                    <a href="/suihua" rel="nofollow">绥化</a>
                                                    <a href="/suizhou" rel="nofollow">随州</a>
                                                    <a href="/sanmenxia" rel="nofollow">三门峡</a>
                                                    <a href="/shizuishan" rel="nofollow">石嘴山</a>
                                                    <a href="/siping" rel="nofollow">四平</a>
                                                    <a href="/suining" rel="nofollow">遂宁</a>
                                                    <a href="/shihezi" rel="nofollow">石河子</a>
                                                    <a href="/songyuan" rel="nofollow">松原</a>
                                                    <a href="/shangrao" rel="nofollow">上饶</a>
                                                    <a href="/shaoguan" rel="nofollow">韶关</a>
                                                    <a href="/sanya" rel="nofollow">三亚</a>
                                                    <a href="/shiyan" rel="nofollow">十堰</a>
                                                    <a href="/shangqiu" rel="nofollow">商丘</a>
                                                    <a href="/suqian" rel="nofollow">宿迁</a>
                                                    <a href="/shantou" rel="nofollow">汕头</a>
                                                    <a href="/shaoyang" rel="nofollow">邵阳</a>
                                                    <a href="/sanming" rel="nofollow">三明</a>
                                                    <a href="/shaoxing" rel="nofollow">绍兴</a>
                                                    <a href="/suzhou" rel="nofollow">苏州</a>
                                                    <a href="/shijiazhuang" rel="nofollow">石家庄</a>
                                                    <a href="/shenzhen" rel="nofollow">深圳</a>
                                                    <a href="/shenyang" rel="nofollow">沈阳</a>
                                                    <a href="/shanghai" rel="nofollow">上海</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>T</dt>
                                            <dd>
                                                    <a href="/taixing" rel="nofollow">泰兴</a>
                                                    <a href="/tongren" rel="nofollow">铜仁</a>
                                                    <a href="/tongliao" rel="nofollow">通辽</a>
                                                    <a href="/tongchuan" rel="nofollow">铜川</a>
                                                    <a href="/tieling" rel="nofollow">铁岭</a>
                                                    <a href="/tianmen" rel="nofollow">天门</a>
                                                    <a href="/tonghua" rel="nofollow">通化</a>
                                                    <a href="/tianshui" rel="nofollow">天水</a>
                                                    <a href="/tengzhou" rel="nofollow">滕州</a>
                                                    <a href="/tongling" rel="nofollow">铜陵</a>
                                                    <a href="/tongxiang" rel="nofollow">桐乡</a>
                                                    <a href="/taian" rel="nofollow">泰安</a>
                                                    <a href="/taizhou2" rel="nofollow">泰州</a>
                                                    <a href="/taizhou" rel="nofollow">台州</a>
                                                    <a href="/tangshan" rel="nofollow">唐山</a>
                                                    <a href="/taiyuan" rel="nofollow">太原</a>
                                                    <a href="/tianjin" rel="nofollow">天津</a>
                                            </dd>
                                        </dl>
                            </div>
                            <div id="cityList_4" class="cityListGroup none">
                                        <dl>
                                            <dt>W</dt>
                                            <dd>
                                                    <a href="/wenchang" rel="nofollow">文昌</a>
                                                    <a href="/wuzhong" rel="nofollow">吴忠</a>
                                                    <a href="/wanning" rel="nofollow">万宁</a>
                                                    <a href="/wulanchabu" rel="nofollow">乌兰察布</a>
                                                    <a href="/wenshan" rel="nofollow">文山</a>
                                                    <a href="/wulanhaote" rel="nofollow">乌兰浩特</a>
                                                    <a href="/wuhai" rel="nofollow">乌海</a>
                                                    <a href="/wuwei" rel="nofollow">武威</a>
                                                    <a href="/weinan" rel="nofollow">渭南</a>
                                                    <a href="/wulumuqi" rel="nofollow">乌鲁木齐</a>
                                                    <a href="/wuhu" rel="nofollow">芜湖</a>
                                                    <a href="/wenzhou" rel="nofollow">温州</a>
                                                    <a href="/wujiang" rel="nofollow">吴江</a>
                                                    <a href="/weifang" rel="nofollow">潍坊</a>
                                                    <a href="/weihai" rel="nofollow">威海</a>
                                                    <a href="/wuxi" rel="nofollow">无锡</a>
                                                    <a href="/wuzhou" rel="nofollow">梧州</a>
                                                    <a href="/wuhan" rel="nofollow">武汉</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>X</dt>
                                            <dd>
                                                    <a href="/xichong" rel="nofollow">西充县</a>
                                                    <a href="/xinzhou" rel="nofollow">忻州</a>
                                                    <a href="/xilinhaote" rel="nofollow">锡林浩特</a>
                                                    <a href="/xinghua" rel="nofollow">兴化</a>
                                                    <a href="/xiangxiang" rel="nofollow">湘乡</a>
                                                    <a href="/xichang" rel="nofollow">西昌</a>
                                                    <a href="/xingcheng" rel="nofollow">兴城</a>
                                                    <a href="/xiangxi" rel="nofollow">湘西</a>
                                                    <a href="/xishuangbanna" rel="nofollow">西双版纳</a>
                                                    <a href="/xiantao" rel="nofollow">仙桃</a>
                                                    <a href="/xianning" rel="nofollow">咸宁</a>
                                                    <a href="/xuchang" rel="nofollow">许昌</a>
                                                    <a href="/xiaogan" rel="nofollow">孝感</a>
                                                    <a href="/xuancheng" rel="nofollow">宣城</a>
                                                    <a href="/xinyu" rel="nofollow">新余</a>
                                                    <a href="/xinyang" rel="nofollow">信阳</a>
                                                    <a href="/xianyang" rel="nofollow">咸阳</a>
                                                    <a href="/xining" rel="nofollow">西宁</a>
                                                    <a href="/xiangtan" rel="nofollow">湘潭</a>
                                                    <a href="/xinxiang" rel="nofollow">新乡</a>
                                                    <a href="/xiangyang" rel="nofollow">襄阳</a>
                                                    <a href="/xingtai" rel="nofollow">邢台</a>
                                                    <a href="/xiamen" rel="nofollow">厦门</a>
                                                    <a href="/xuzhou" rel="nofollow">徐州</a>
                                                    <a href="/xian" rel="nofollow">西安</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>Y</dt>
                                            <dd>
                                                    <a href="/yichun2" rel="nofollow">伊春</a>
                                                    <a href="/yaan" rel="nofollow">雅安</a>
                                                    <a href="/yongan" rel="nofollow">永安</a>
                                                    <a href="/yongkang" rel="nofollow">永康</a>
                                                    <a href="/yanzhou" rel="nofollow">兖州</a>
                                                    <a href="/yuyao" rel="nofollow">余姚</a>
                                                    <a href="/yiwu" rel="nofollow">义乌</a>
                                                    <a href="/yulin1" rel="nofollow">玉林</a>
                                                    <a href="/yunfu" rel="nofollow">云浮</a>
                                                    <a href="/yingtan" rel="nofollow">鹰潭</a>
                                                    <a href="/yangzhong" rel="nofollow">扬中</a>
                                                    <a href="/yuxi" rel="nofollow">玉溪</a>
                                                    <a href="/yiyang" rel="nofollow">益阳</a>
                                                    <a href="/yongzhou" rel="nofollow">永州</a>
                                                    <a href="/yanan" rel="nofollow">延安</a>
                                                    <a href="/yibin" rel="nofollow">宜宾</a>
                                                    <a href="/yichun" rel="nofollow">宜春</a>
                                                    <a href="/yanbian" rel="nofollow">延边</a>
                                                    <a href="/yulin" rel="nofollow">榆林</a>
                                                    <a href="/yueyang" rel="nofollow">岳阳</a>
                                                    <a href="/yixing" rel="nofollow">宜兴</a>
                                                    <a href="/yuncheng" rel="nofollow">运城</a>
                                                    <a href="/yinchuan" rel="nofollow">银川</a>
                                                    <a href="/yancheng" rel="nofollow">盐城</a>
                                                    <a href="/yili" rel="nofollow">伊犁</a>
                                                    <a href="/yingkou" rel="nofollow">营口</a>
                                                    <a href="/yangquan" rel="nofollow">阳泉</a>
                                                    <a href="/yichang" rel="nofollow">宜昌</a>
                                                    <a href="/yangzhou" rel="nofollow">扬州</a>
                                                    <a href="/yangjiang" rel="nofollow">阳江</a>
                                                    <a href="/yizheng" rel="nofollow">仪征</a>
                                                    <a href="/yantai" rel="nofollow">烟台</a>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>Z</dt>
                                            <dd>
                                                    <a href="/zhaotong" rel="nofollow">昭通</a>
                                                    <a href="/zhuji" rel="nofollow">诸暨</a>
                                                    <a href="/zoucheng" rel="nofollow">邹城</a>
                                                    <a href="/zhongwei" rel="nofollow">中卫</a>
                                                    <a href="/zhangye" rel="nofollow">张掖</a>
                                                    <a href="/zhangjiajie" rel="nofollow">张家界</a>
                                                    <a href="/zhucheng" rel="nofollow">诸城</a>
                                                    <a href="/ziyang" rel="nofollow">资阳</a>
                                                    <a href="/zunyi" rel="nofollow">遵义</a>
                                                    <a href="/zhoushan" rel="nofollow">舟山</a>
                                                    <a href="/zhangjiakou" rel="nofollow">张家口</a>
                                                    <a href="/zhangjiagang" rel="nofollow">张家港</a>
                                                    <a href="/zhangzhou" rel="nofollow">漳州</a>
                                                    <a href="/zaozhuang" rel="nofollow">枣庄</a>
                                                    <a href="/zhuhai" rel="nofollow">珠海</a>
                                                    <a href="/zibo" rel="nofollow">淄博</a>
                                                    <a href="/zigong" rel="nofollow">自贡</a>
                                                    <a href="/zhumadian" rel="nofollow">驻马店</a>
                                                    <a href="/zhuzhou" rel="nofollow">株洲</a>
                                                    <a href="/zhaoqing" rel="nofollow">肇庆</a>
                                                    <a href="/zhenjiang" rel="nofollow">镇江</a>
                                                    <a href="/zhongshan" rel="nofollow">中山</a>
                                                    <a href="/zhengzhou" rel="nofollow">郑州</a>
                                                    <a href="/zhanjiang" rel="nofollow">湛江</a>
                                                    <a href="/zhoukou" rel="nofollow">周口</a>
                                            </dd>
                                        </dl>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    	<ul class="shift">  
            <li>
                <a  class="" href="/beijing/movie/page-1-type-0.html" rel="nofollow">首页</a>
            </li>  		
    		<li class="movie" id="movieLink">
				<a  class="" href="javascript:;">电影<i class="triangle2"></i></a>
			     <dl  id="movieMenu">
                    <dd><a href="/movie/onshow.html" rel="nofollow">正在热映</a></dd>
                    <dd><a href="/movie/upComing.html" rel="nofollow">即将上映</a></dd>                    
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

<script>
	Core.movieId = 48542;
	Core.cinemaId = 1533;
	Core.date = '20170719';	
	Core.city='beijing';
</script>
	<script type="text/javascript">
    	Core.maxSeatNum=4;//接入新空气，修改最多选择座位数
    </script>


<form id="seatForm" action="/order/local_confirm.html" method="post">
<div class="wrap">
    <div class="procedure2 mt10" id="seatArea"></div>
    
    <div class="seatBox">
        
        
        <div class="middle seatWarp clearfix">
        	 <div class="seatWarp_hall">
             	<div class="seat_info" style=" position:relative;zoom:1;">
                	<div class="legend clearfix">
                    	<span class="able">可购座位</span>
                        <span class="sel">您选择的座位</span>
                        <span class="disable">已售出座位</span>  
                        <span class="ql">情侣座位</span>    
                        <span class="shake">振动座位</span>
                    </div>
                    <div class="hall_name">横店电影城(王府井店)5号厅</div>
                    
                    <div id="loading_seat" class="loading_seat" style="height:400px;padding-top:110px;">                    	
                    	<img src="Picture/loading.gif" width="60" height="60" alt="正在加载...">
						<p class="mt10">我在努力加载中，麻烦稍等一下下~</p>
                    </div>   
                </div>
                <div class="bot">
		        	<ul>
		        		<li>使用说明：</li>
		        		<li>1、选择你要预订的座位单击选中，重复点击取消所选座位；</li>
		        		<li>2、每笔订单最多可选购4张电影票；情侣座不单卖；</li>
		        		<li>3、选座时，请尽量选择相邻座位，请不要留下单个座位；</li>
		        		<li>4、部分影院3D眼镜需要押金，请观影前准备好现金；</li>
                        	<li>5、点击"立即购票"进入付款页面后，请在15分钟内完成支付，超时系统将释放你选定的座位；</li>
                        <li>6、出票成功后，如无使用问题，不得退换；</li>
		        		<li>7、购票过程产生的各项咨询，请拨打0571-26201163。</li>
		        	</ul>
		        </div>
             </div> 
        	 <div class="seatWarp_buy">
             	<div class="choose_movie clearfix">
                	<div class="poster"><img src="Picture/149672625536611547_220_293_webp.jpg" width="70" height="93" alt="神偷奶爸3" /></div>
                    <dl class="info">
                    	<dt><a href="/beijing/movie/48542.html" class="imp">神偷奶爸3</a></dt>
                        <dd>版本：3D</dd>
                        <dd>片长：1小时36分钟</dd>
                        	<dd>单价：<span class="imp fb">¥<em class="f16 fb" id="price">33</em></span></dd>
                    </dl>
                </div>
                <dl class="choose_cinema mt15 clearfix">
                	<dt>影院：</dt>
                    <dd>横店电影城(王府井店) </dd>
                </dl>
                <dl class="choose_cinema clearfix">
                	<dt>场次：</dt>
                    <dd>
                    	<div class="sech">
                        	<div class="date_box">
                            	<div class="fb f14">07-19</div>
                                <div>（周三）</div>
                            </div>
                            <div class="time_box">
                            	<div class="f20 fb">12:40</div>
                                <div class="changeScreen" id="changeScreen">
                                	<a href="javascript:;" class="sBar" id="sBar" tid="593385284">[更改场次　<b></b>]</a>
			                        <div class="sList" id="sList">                      
				                        <table cellspacing="0" cellpadding="0" border="0" class="cinemaAdd">
				                        <thead>
				                            <tr>
				                                <th width="17%">放映时间</th>
				                                <th width="17%">版本</th>
				                                <th width="17%">语言</th>  
				                                <th width="17%">放映厅</th>
			                                    <th width="16%">原价</th>
			                                    <th width="16%">优惠价</th>
				                            </tr>
				                        </thead>
		                                </table>
		                                <div id="change_wrap">
		                                <table cellspacing="0" cellpadding="0" border="0" class="cinemaAdd" style="border-top:0">
		                                <tbody class="movieTbodyAct" id="moreScreen">                              	
		                                </tbody>
				                        </table>
		                                </div>                                                                    
				                    </div>
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
             	<dl class="selSeatBox">
                	<dt>您选择的座位：</dt>
                    <dd>
                    	<ul id="selSeatList">
                        </ul>
                        <p>请先在左侧选座<br/>每次可选4座</p>
                    </dd>
                </dl>
                <dl class="choose_cinema mt10 clearfix" >
                	<dt style="padding-top:2px\9;">总价：</dt>
                    <dd class="imp fb">¥<span class="f16" id="totalPrice">0</span> </dd>
                </dl>
                <dl class="tel mt10">
                	<dt>请输入您接收电子票的手机号码：</dt>
                    <dd>                    	
						<input type="hidden" value="593385284" name="ticketId" id="ticketId" />
						<input type="hidden" name="lockedSeatList" id="lockedSeatList" />
						<input type="hidden" name="isReserve" id="isReserve" />
						<div class="clearfix">
                        	<input type="text" name="mobileText" value='' id="mobileText"/>
							<input type="hidden" name="mobile" value="" id="mobile"/>
						</div>
						<div class="btn" style="position:relative;zoom:1;">                            	
                            	<div class="tip">
                                	<div class="up"></div>
                                	点击"立即购票"后，将为您锁座15分钟！
                                </div>
                            	<input type="submit" id="seatSub" class="btn_buy" autoComplete="off" value="立即购票"/>
                        </div>                         
                    </dd>
                </dl>
             </div> 
        </div>        
    </div>	
</div>
</form>


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
	
	<script src="Scripts/local_choose_seat.js"></script><script src="Scripts/jquery.mousewheel.js"></script><script src="Scripts/jquery.jscrollpane.min.js"></script>
<script>Core && Core.fastInit && Core.fastInit("1");</script>

<script src="Scripts/ntes.js"></script>
<script>_ntes_nacc = "dianying";neteaseTracker();</script>
</body>
</html>





