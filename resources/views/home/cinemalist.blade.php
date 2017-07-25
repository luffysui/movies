@extends('home.parent')
@section('title', '影院地图')
@section('content')
    <link rel="stylesheet" href="{{ asset('home/Css/jquery.jscrollpane.codrops.css') }}">
    <link rel="stylesheet" href="{{ asset('home/Css/detail_new.css') }}">
    <style type="text/css">@-webkit-keyframes loginPopAni{0%{opacity:0;-webkit-transform:scale(0);}15%{-webkit-transform:scale(0.667);}25%{-webkit-transform:scale(0.867);}40%{-webkit-transform:scale(1);}55%{-webkit-transform:scale(1.05);}70%{-webkit-transform:scale(1.08);}85%{opacity:1;-webkit-transform:scale(1.05);}100%{opacity:1;-webkit-transform:scale(1);}}@keyframes loginPopAni{0%{opacity:0;transform:scale(0);}15%{transform:scale(0.667);}25%{transform:scale(0.867);}40%{transform:scale(1);}55%{transform:scale(1.05);}70%{transform:scale(1.08);}85%{opacity:1;transform:scale(1.05);}100%{opacity:1;transform:scale(1);}}</style>
    <div class="wrap990">
        {{--<section class="cinema_search">--}}
            {{--<h3>影院搜索：</h3>--}}
            {{--<input style="height: 35px"  type="text" id="cinema_search_input" autocomplete="off" class="cinema_search_input textGray" placeholder="请输入影院名称" maxlength="20"><a href="javascript:;" id="cinema_search_btn" class="cinema_search_btn">搜索</a>--}}
            {{--<div id="cinema_search_hot" class="cinema_search_hot">--}}
                {{--<span>热门搜索：</span>--}}
                {{--<a href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords=IMAX#from=cinema.search">IMAX</a>--}}
                {{--<a href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords=%E4%B8%87%E8%BE%BE#from=cinema.search">万达</a>--}}
                {{--<a href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords=%E9%87%91%E9%80%B8#from=cinema.search">金逸</a>--}}
                {{--<a href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords=%E6%98%9F%E7%BE%8E#from=cinema.search">星美</a>--}}
                {{--<a href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords=%E6%A9%99%E5%A4%A9%E5%98%89%E7%A6%BE#from=cinema.search">橙天嘉禾</a>--}}
                {{--<a href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords=%E5%A4%A7%E5%9C%B0#from=cinema.search">大地</a>--}}
            {{--</div>--}}
        {{--</section>--}}
        <section class="cinema_cont clearfix">
            <section class="cinema_left">
                <div class="cinema_sel clearfix">
                    <div class="cinema_sel_left">当前区域：<em id="num">0</em> 家</div>
                    <div class="cinema_sel_right hide">
                        <a href="javascript:;" id="sel_cinema" class="sel_cinema" onfocus="this.blur();"><span>全部影院</span><i class="triangle"></i></a>
                        <div id="all_type_box" class="all_type_box hide">
                            <a href="javascript:;" class="close" onfocus="this.blur();"></a>
                            <div class="type_module noBack clearfix " ctype="ALL">
                                <div class="type_name">全部：</div>
                                <div class="type_detail">
                                    <a class="all active " typeid="1" href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords="><span>全部影院</span><em>(203)</em></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <ul id="cinema_tab" class="cinema_tab clearfix">
                    <li class="active" t="0"><a href="file:///C:/beijing/cinema/category-ALL-area-0-type-0.html?keywords=">全部</a></li>
                </ul>
                <div id="cinema_left_overflow" class="cinema_left_overflow">
                <!-- 滚动条 -->
                <div class="jspVerticalBar"><div class="jspCap jspCapTop"></div>
                 <div class="jspTrack" style="height: 602px;"><div class="jspDrag" style="height: 94px; top: 13.8924px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div>
                 <div class="jspCap jspCapBottom"></div></div>
                <!-- 滚动条 -->
                    <ul id="cinema_list" class="cinema_list">
                        @foreach( $cinemaList as $v)
                            <li cid="1448" class=""><div class="c_name"><span class="bubble_red">1</span><a target="_blank" href="/cinema/1448.html#from=cinema.enter">{{ $v->cinema_name }}</a><span class="score_s ml5">8.<em class="s">3</em></span></div><div class="c_price"><span><em>{{ $v->min }}</em><i>起</i></span><span class="icon_z"></span><span class="icon_q"></span></div><div class="c_add">地址：{{ $v->cinema_address }}</div><div class="c_tel">电话：{{ $v->cinema_phone }}</div><div class="c_btn mt8"><a href="{{ url('/cinema/'.$v->cinema_id) }}" class="btn_e34551 btn_89_29" target="_blank">购&nbsp;&nbsp;票</a></div></li>

                        @endforeach
                    </ul>
                </div>
            </section>

            <section id="cinema_right" class="cinema_right" style="position:relative;">
                <div class="shadow_top"></div>
                <div class="shadow_left"></div>
                <div class="shadow_bottom"></div>
                <div class="shadow_right"></div>
                <div id="cinemaMapBox" style="width:720px;height:639px;z-index:10;">
                    {{--百度地图--}}



                    <!--百度地图容器-->
                        <div style="width:700px;height:550px;border:#ccc solid 1px;font-size:12px" id="map"></div>
                </div>
                <div class="cinema_float hide">
                    <span class="cinema_float_left">&nbsp;</span><span id="cinema_float_mid" class="cinema_float_mid">搜索到“<em>嘉华国际</em>”影院共<em class="ml5 mr5">200</em>家</span><span class="cinema_float_right" style="font-size:12px;">&nbsp;</span>
                </div>
            </section>
        </section>
    </div>

    <script type="text/javascript">
        Core.postData={'city':'beijing','category':'ALL','area':0,'keywords':'','type':0};
        Core.coord={lng:'116.396',lat:'39.93'};
    </script>
    <script type="text/javascript" src="./asd_files/1ec208539b2f459dadb39bb46677bbed.js"></script><script type="text/javascript" src="./asd_files/getscript"></script><link rel="stylesheet" type="text/css" href="./asd_files/bmap.css">




    <div id="sideBar" class="none">
        <a id="feedback"  rel="nofollow" target="_blank" title="提意见" hidefocus="true"></a>
        <a id="toTop"  rel="nofollow" title="回到顶部" hidefocus="true"></a>
    </div>
    <style>
        .BMap_bubble_title{
            color:#e34551;
            font-weight:bold;
            font-size:14px;
        }
        .BMap_bubble_content{

            color:#a2a2a2;
        }
        .BMapLabel{
            display: none;
        }
    </style>
    <script src="{{ asset('home/Scripts/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('home/Scripts/jquery.jscrollpane.js') }}"></script>
    <script src="{{ asset('home/Scripts/markermanager.js') }}"></script>
    <script src="{{ asset('home/Scripts/richmarker.js') }}"></script>
    <script src="{{ asset('home/Scripts/infobox.js') }}"></script>
    <script src="{{ asset('home/Scripts/cindex.js') }}"></script>
    <script>Core && Core.fastInit && Core.fastInit("1");</script><div id="autoCompleteList"></div>
    <script type="text/javascript">
        Core.statistics_adsage("ca");
    </script>

    <script src="{{ asset('home/Scripts/ntes.js') }}"></script>
    <script>_ntes_nacc = "dianying";neteaseTracker();</script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ni25Wa70RYc7TnTGGmkNAqmC1MOFN4DN"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript">
        //创建和初始化地图函数：
        function initMap(){
            createMap();//创建地图
            setMapEvent();//设置地图事件
            addMapControl();//向地图添加控件
            addMapOverlay();//向地图添加覆盖物
        }
        function createMap(){
            map = new BMap.Map("map");
            map.centerAndZoom(new BMap.Point({{ $cityCode->centerew }},{{ $cityCode->centersn }}),12);
        }
        function setMapEvent(){
            map.enableScrollWheelZoom();
            map.enableKeyboard();
            map.enableDragging();
            map.enableDoubleClickZoom()
        }
        function addClickHandler(target,window){
            target.addEventListener("click",function(){
                target.openInfoWindow(window);
            });
        }

        function addMapOverlay(){




            var markers = [
                    <?php
                    foreach ($cinemaList as $v){
                    ?>

                {content:"<?php echo "地址:".$v->cinema_address."<br/>电话:".$v->cinema_phone.'<br/>路线:'.$v->cinema_travel ; ?>",title:"<?php  echo "<span style='font-size: 14px'>".$v->cinema_name ."</span>" ?>",imageOffset: {width:-46,height:-21},position:{lat:{{ $v->cinema_sn }},lng:{{ $v->cinema_ew }}}},

                <?php
                }
                ?>
            ];







            for(var index = 0; index < markers.length; index++ ){
                var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
                var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",new BMap.Size(20,25),{
                    imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
                })});
                var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
                var opts = {
                    width: 200,
                    title: markers[index].title,
                    enableMessage: false
                };
                var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
                marker.setLabel(label);
                addClickHandler(marker,infoWindow);
                map.addOverlay(marker);
            };
        }
        //向地图添加控件
        function addMapControl(){
            var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
            scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
            map.addControl(scaleControl);
            var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
            map.addControl(navControl);
            var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:true});
            map.addControl(overviewControl);
        }
        var map;
        initMap();
    </script>
@endsection