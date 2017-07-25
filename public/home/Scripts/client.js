/*
 * 首页js
 */
(function(window,$,Core){
$.extend(Core, {
	//入口函数
	myInit : function(){
		var core=Core;
		//剧照轮播效果
		$.imgScroll({
			showType:0,
			autoScroll:true,
			isLoop:true,
			delayTime:3000,
			imgBigList:$('.photo_b_list')
		});
		//iphone下载弹层
		/*$("#popIos").click(function(){
			//统计点击
			try{
				downIphone='http://piao.163.com/client.html?iphone';
				neteaseTracker(true,downIphone,"iphone",null);
			}catch(e){}
			core.showDialog(796,'<div class="client_pop"><div class="client_pop_left"><h3 class="client_pop_title"><b class="phone"></b>手机下载安装：</h3><ul><li><b class="num num1">1</b>手机访问app store下载安装：<br />用手机进入app store—>搜索“网易电影”—>下载安装<br /><span class="install_ios mt10"></span></li><li class="mt20"><b class="num num2"></b>在手机浏览器中输入网址下载<a href="javascript:;" class="ml5">http://piao.163.com/m/yd.html</a></li></ul></div><div class="client_pop_right"><h3 class="client_pop_title"><b class="pc"></b>电脑下载安装：</h3><a href="https://itunes.apple.com/cn/app/id628309462?ls=1&mt=8" class="link_ios" title="app store下载" target="_blank">app store下载</a></div><div class="clearfix"></div><b class="close"></b></div>');	
		})*/
		
		//android下载弹层
		/*$("#popAndroid").click(function(){
			//统计点击
			try{
				downAndroid='http://piao.163.com/client.html?android';
				neteaseTracker(true,downAndroid,"android",null);
			}catch(e){}
			core.showDialog(956,'<div class="client_pop"><div class="client_pop_left"><h3 class="client_pop_title"><b class="phone"></b>手机下载安装：</h3><ul><li><b class="num num1"></b>手机访问应用市场下载安装：<br />用手机进入应用市场—>搜索“网易电影”—>下载安装<br /><span class="install_android mt10"></span></li><li class="mt20"><b class="num num2"></b>在手机浏览器中输入网址下载<a href="javascript:;" class="ml5">http://piao.163.com/m/yd.html</a></li></ul></div><div class="client_pop_right2"><h3 class="client_pop_title"><b class="pc"></b>电脑下载安装：</h3><a href="http://piao.163.com/dy/a" class="link_android" title="下载到本地电脑">下载到本地电脑</a><em>或</em><ul><li><a href="http://piao.163.com/dy/a" name="网易电影" onclick="return wdapi_apkdl_m(this, \'source\');" class="link_android_other" title="豌豆荚一键安装">豌豆荚一键安装</a></li><li><a href="http://piao.163.com/dy/a?p=android&f_name=%u7F51%u6613%u7535%u5F71&f_version="  name="网易电影" onclick="return Key.Open(this, \'android\');" class="link_android_other" title="91助手一键安装" >91助手一键安装</a></li><li><a href="http://apk.hiapk.com/html/2013/10/1861372.html?module=256&info=UX8TZjV1cV8%3D" class="link_android_other" title="安卓市场" target="_blank">安卓市场</a></li></ul></div><div class="clearfix"></div><b class="close"></b></div>');	
		})*/
		//关闭弹层
		/*$("body").delegate(".close","click",function(){
			$.dialog();
		})*/
	},
	
	//提示弹出层
	showDialog: function(width,content){
		var obj = {
			title:"",
			type:"shell",
			content: content,
			width : width,
			button : []
		};
		$.dialog(obj);
	}
});
})(window,jQuery,Core);